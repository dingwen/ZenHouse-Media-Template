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
	$uploadpath = urldecode($_REQUEST["path"]);
}

$type = isset($_REQUEST["type"]) ? $_REQUEST["type"] : "folder"; 

switch($type){
	case 'image':
		$filename = DOCUMENTROOT.$uploadpath;
		$image_info = getimagesize($filename);
		$file_modified = date($datetimeFormat, filemtime($filename));
		$file_size = filesize($filename);
		$file_size = $file_size < 1024  ? $file_size. ' bytes' : $file_size < 1048576 ? number_format($file_size / 1024, 2, $dec_seperator, $thousands_separator) . ' kB' : number_format($file_size / 1048576, 2, $dec_seperator, $thousands_separator) . ' MB';
		$filename = array_pop(explode("/", $uploadpath));
	
		printf('<div class="icon image"><img src="phpthumb/phpThumb.php?h=140&amp;w=140&amp;far=1&amp;src=%s&bg=0000FF" alt="%s" /></div>', urlencode($uploadpath), $filename);
   		printf('<div class="filename">%s</div>', $filename);
		printf('<div class="filetype">%s</div>', $image_info['mime']);
		printf('<div class="filemodified"><span>%s:&nbsp;</span>%s</div>',$lang['Modified on'], $file_modified);
		printf('<div class="filesize"><span>%s:&nbsp;</span>%s</div>',$lang['Size'], $file_size);
		printf('<div class="filedim"><span>%s:&nbsp;</span>%s x %s</div>',$lang['Dimensions'], $image_info[0], $image_info[1]);
		break;
	case 'file':
		$filename = DOCUMENTROOT.$uploadpath;
		$file_modified = date($datetimeFormat, filemtime($filename));
		$file_type = mime_content_type($filename);
		$file_size = filesize($filename);
		$file_size = $file_size < 1024  ? $file_size. ' bytes' : $file_size < 1048576 ? number_format($file_size / 1024, 2, $dec_seperator, $thousands_separator) . ' kB' : number_format($file_size / 1048576, 2, $dec_seperator, $thousands_separator) . ' MB';
		$filename = array_pop(explode("/", $uploadpath));
		$fileext = array_pop(explode(".", $uploadpath));
	
		printf('<div class="icon %s"></div>', $fileext);
   		printf('<div class="filename">%s</div>', $filename);
		printf('<div class="filetype">%s</div>', $file_type);
		printf('<div class="filemodified"><span>%s:&nbsp;</span>%s</div>',$lang['Modified on'], $file_modified);
		printf('<div class="filesize"><span>%s:&nbsp;</span>%s</div>',$lang['Size'], $file_size);
		break;
	default: // folder
		$foldername = DOCUMENTROOT.$uploadpath;
		$folder_modified = date($datetimeFormat, filemtime($foldername));
		$foldername = array_pop(explode("/", trim($uploadpath,"/")));
	
		print('<div class="icon folder"></div>');
   		printf('<div class="filename">%s</div>', $foldername);
		printf('<div class="filetype">%s</div>', $lang['Directory']);
		printf('<div class="filemodified"><span>%s:&nbsp;</span>%s</div>',$lang['Modified on'], $folder_modified);
		break;
}

?>