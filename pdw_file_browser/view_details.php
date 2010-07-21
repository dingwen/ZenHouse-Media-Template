<?php
/*
PDW File Browser v1.0 beta
Date: May 9, 2010
Url: http://www.neele.name

Copyright (c) 2010 Guido Neele

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

require_once('functions.php');

if(isset($_REQUEST["ajax"])){
	$selectedpath = urldecode($_REQUEST["path"]);
	if($selectedpath = checkpath($selectedpath, $uploadpath)){
		$dirs = getDirTree(DOCUMENTROOT.$selectedpath, true, false);
	} else {
		die('0||'.$lang["loadfolder_error_1"]);
	}
} else {
	$selectedpath = $uploadpath;	
}

print '<table id="details" class="files">
		<thead>
			<tr>
				<th colspan="3" class="filename">'.$lang["Filename"].'</th>
				<th>'.$lang["Modified on"].'</th>
				<th>'.$lang["Filetype"].'</th>
				<th>'.$lang["Size"].'</th>
				<th>'.$lang["Dimensions"].'</th>
				<th class="end">&nbsp;</th>
			</tr>
		</thead>
		<tbody>';
						
foreach($dirs as $key => $value){
	if($value != "folder"){
		if(strtolower($value) == "png" || strtolower($value) == "jpg" || strtolower($value) == "jpeg" || strtolower($value) == "gif" || strtolower($value) == "bmp"){
							
			$filename = DOCUMENTROOT.$selectedpath.$key;
			$image_info = getimagesize($filename);
			$file_modified = date($datetimeFormat, filemtime($filename));
			$file_size = filesize($filename);
			$file_size = $file_size < 1024  ? $file_size. ' bytes' : $file_size < 1048576 ? number_format($file_size / 1024, 2, $dec_seperator, $thousands_separator) . ' kB' : number_format($file_size / 1048576, 2, $dec_seperator, $thousands_separator) . ' MB';
									
			$htmlFiles .= sprintf('<tr href="%1$s" class="image">
									<td class="begin"></td>
									<td class="icon"><span class="%8$s"></span></td>
									<td class="filename">%2$s</td>
									<td class="filemodified">%7$s</td>
									<td class="filetype">%3$s</td>
									<td class="filesize">%4$s</td>
									<td class="filedim">%5$s x %6$s</td>
									<td class="end">&nbsp;</td>
								   </tr>', 
									$selectedpath.$key, 
									$key, 
									$image_info['mime'],
									$file_size,
									$image_info[0],
									$image_info[1],
									$file_modified,
									strtolower($value)
								 );	
		} else {
									
			$filename = DOCUMENTROOT.$selectedpath.$key;
			$file_modified = date($datetimeFormat, filemtime($filename));
			$file_size = filesize($filename);
			$file_type = mime_content_type($filename);
			$file_size = $file_size < 1024  ? $file_size. ' bytes' : $file_size < 1048576 ? number_format($file_size / 1024, 2, $dec_seperator, $thousands_separator) . ' kB' : number_format($file_size / 1048576, 2, $dec_seperator, $thousands_separator) . ' MB';
									
			$htmlFiles .= sprintf('<tr href="%1$s" class="file">
									<td class="begin"></td>
									<td class="icon"><span class="%6$s"></span></td>
									<td class="filename">%2$s</td>
									<td class="filemodified">%5$s</td>
									<td class="filetype">%3$s</td>
									<td class="filesize">%4$s</td>
									<td class="filedim">&nbsp;</td>
									<td class="end">&nbsp;</td>
								   </tr>', 
									$selectedpath.$key, 
									$key, 
									$file_type,
									$file_size,
									$file_modified,
									$value
								 );	
		}
	} else {
		
		$foldername = DOCUMENTROOT.$selectedpath.$key;
		$folder_modified = date($datetimeFormat, filemtime($foldername));
								
		$htmlFolders .= sprintf('<tr href="%1$s" class="folder">
									<td class="begin"></td>
									<td class="icon"><span class="folder"></span></td>
									<td class="filename">%2$s</td>
									<td class="filemodified">%4$s</td>
									<td class="filetype">%3$s</td>
									<td class="filesize">&nbsp;</td>	
									<td class="filedim">&nbsp;</td>
									<td class="end">&nbsp;</td>
								 </tr>', 
								 	$selectedpath.$key."/", 
									$key, 
									$lang["Directory"],
									$folder_modified
								 );	
	}
}

print $htmlFolders;
print $htmlFiles;
print '</tbody>
	</table>';
?>