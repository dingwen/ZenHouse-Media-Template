<html>
<head>
<title>Welcome to CodeIgniter</title>

<style type="text/css">

body {
 background-color: #fff;
 margin: 40px;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
}

a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}

h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}

code {
 font-family: Monaco, Verdana, Sans-serif;
 font-size: 12px;
 background-color: #f9f9f9;
 border: 1px solid #D0D0D0;
 color: #002166;
 display: block;
 margin: 14px 0 14px 0;
 padding: 12px 10px 12px 10px;
}

</style>
</head>
<body>

<h1>Welcome to CodeIgniter!</h1>

<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

<p>If you would like to edit this page you'll find it located at:</p>
<code>system/application/views/welcome_message.php</code>

<p>The corresponding controller for this page is found at:</p>
<code>system/application/controllers/welcome.php</code>

<P>Web Profile Cache</P>
<code><?php print_r($web_profile_cache); ?></code>

<p>All Kinds of Directories</p>
<code>$config['cache_dir'] = APPPATH.'cache/' ==> <?php echo $cache_dir; ?></code>
<code>BASE_URL ==> <?php echo BASE_URL; ?></code>
<code>BASE_URI ==> <?php echo BASE_URI; ?></code>
<code>APPPATH_URI ==> <?php echo APPPATH_URI; ?></code>
<code>ASSETS_PATH ==> <?php echo $asset_dir; ?></code>
<code>ASSETS_URL ==> <?php echo $asset_url; ?></code>

<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
<p><br />Page rendered in {elapsed_time} seconds</p>

</body>
</html>