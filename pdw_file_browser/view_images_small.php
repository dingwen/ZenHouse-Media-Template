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

print '<ul id="small_images" class="files clear">';
						
foreach($dirs as $key => $value){
	if($value != "folder"){
		if(strtolower($value) == "png" || strtolower($value) == "jpg" || strtolower($value) == "jpeg" || strtolower($value) == "gif" || strtolower($value) == "bmp"){
																
			$htmlFiles .= sprintf('<li>
								  		<a href="%1$s" title="%2$s" class="image">
											<span class="begin"></span>
											<span class="filename">%2$s</span>
											<span class="icon image"><img src="phpthumb/phpThumb.php?h=48&w=48&src=%4$s&far=1&bg=0000FF" /></span>
										</a>
									</li>', 
										$selectedpath.$key, 
										$key, 
										$value, 
										urlencode($selectedpath.$key));	
		} else {
									
			$htmlFiles .= sprintf('<li>
								  		<a href="%1$s" title="%2$s" class="file">
											<span class="begin"></span>
											<span class="filename">%2$s</span>
											<span class="icon %3$s"></span>
										</a>
								   </li>', 
									   $selectedpath.$key, 
									   $key, 
									   $value);	
		}
	} else {
								
		$htmlFolders .= sprintf('<li>
									<a href="%1$s" title="%2$s" class="folder">
										<span class="begin"></span>
										<span class="filename">%2$s</span>
										<span class="icon folder"></span>
									</a>
								 </li>', 
								 	$selectedpath.$key."/", 
									$key);
	}
}

print $htmlFolders;
print $htmlFiles;
print '</ul>';
?>