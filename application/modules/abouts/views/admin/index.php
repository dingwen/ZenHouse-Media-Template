<div id="content-list">
    <table id="datatable">
        <thead>
            <tr>
                <th>Title</th>
                <?php if($category_enable): ?>
                <th>Category</th>
                <?php endif; ?>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <th>Title</th>
                <?php if($category_enable): ?>
                <th>Category</th>
                <?php endif; ?>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>
<script type="text/javascript">
    var oCache = { iCacheLower: -1 };

    function fnSetKey( aoData, sKey, mValue )
    {
        for ( var i=0, iLen=aoData.length ; i<iLen ; i++ )
        {
            if ( aoData[i].name == sKey )
            {
                aoData[i].value = mValue;
            }
        }
    }

    function fnGetKey( aoData, sKey )
    {
        for ( var i=0, iLen=aoData.length ; i<iLen ; i++ )
        {
            if ( aoData[i].name == sKey )
            {
                return aoData[i].value;
            }
        }
        return null;
    }

    function fnDataTablesPipeline ( sSource, aoData, fnCallback ) {
        var iPipe = 5; /* Ajust the pipe size */

        var bNeedServer = false;
        var sEcho = fnGetKey(aoData, "sEcho");
        var iRequestStart = fnGetKey(aoData, "iDisplayStart");
        var iRequestLength = fnGetKey(aoData, "iDisplayLength");
        var iRequestEnd = iRequestStart + iRequestLength;
        oCache.iDisplayStart = iRequestStart;

        /* outside pipeline? */
        if ( oCache.iCacheLower < 0 || iRequestStart < oCache.iCacheLower || iRequestEnd > oCache.iCacheUpper )
        {
            bNeedServer = true;
        }

        /* sorting etc changed? */
        if ( oCache.lastRequest && !bNeedServer )
        {
            for( var i=0, iLen=aoData.length ; i<iLen ; i++ )
            {
                if ( aoData[i].name != "iDisplayStart" && aoData[i].name != "iDisplayLength" && aoData[i].name != "sEcho" )
                {
                    if ( aoData[i].value != oCache.lastRequest[i].value )
                    {
                        bNeedServer = true;
                        break;
                    }
                }
            }
        }

        /* Store the request for checking next time around */
        oCache.lastRequest = aoData.slice();

        if ( bNeedServer )
        {
            if ( iRequestStart < oCache.iCacheLower )
            {
                iRequestStart = iRequestStart - (iRequestLength*(iPipe-1));
                if ( iRequestStart < 0 )
                {
                    iRequestStart = 0;
                }
            }

            oCache.iCacheLower = iRequestStart;
            oCache.iCacheUpper = iRequestStart + (iRequestLength * iPipe);
            oCache.iDisplayLength = fnGetKey( aoData, "iDisplayLength" );
            fnSetKey( aoData, "iDisplayStart", iRequestStart );
            fnSetKey( aoData, "iDisplayLength", iRequestLength*iPipe );

            $.ajax({
                "dataType": 'json',
                "type": "POST",
                "url": sSource,
                "data": aoData,
                "success": function (json) {
                    /* Callback processing */
                    oCache.lastJson = jQuery.extend(true, {}, json);

                    if ( oCache.iCacheLower != oCache.iDisplayStart )
                    {
                        json.aaData.splice( 0, oCache.iDisplayStart-oCache.iCacheLower );
                    }
                    json.aaData.splice( oCache.iDisplayLength, json.aaData.length );

                    fnCallback(json)
                }
            });
        }
        else
        {
            json = jQuery.extend(true, {}, oCache.lastJson);
            json.sEcho = sEcho; /* Update the echo for each response */
            json.aaData.splice( 0, iRequestStart-oCache.iCacheLower );
            json.aaData.splice( iRequestLength, json.aaData.length );
            fnCallback(json);
            return;
        }
    }
    $(function() {
        $('#datatable').dataTable( {
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": BASE_URL + "admin/abouts/datatable",
            "fnServerData": fnDataTablesPipeline,
        <?php if($category_enable): ?>
            "aoColumns" : [null, null, null, { "bSortable" : false, "bSearchable" : false }],
        <?php else: ?>
            "aoColumns" : [null, null, { "bSortable" : false, "bSearchable" : false }],
        <?php endif; ?>
            "fnDrawCallback" : function() {
                update_status();
                $('a.confirm').click(function() { return confirm("Are you sure to delete these items?"); });
            }
        }).fnSetFilteringDelay();

        function update_status() {
            $('select[name="status"]').bind('change keyup', function(){
                $.post(BASE_URL + "admin/abouts/update_status",
                {
                    id: $(this).attr('id'),
                    status: $(this).val()
                }, function(data) {
                    if(data == "updated") {
                        alert("Status is updated." + data);
                    } else {
                        alert("Can't update status" + data);
                    }
                });
            });
        }
    });
</script>