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

require("functions.php");

switch($_POST["action"]){
	
	case "cut_paste":
		$files = $_POST["files"];
		$folder = urldecode($_POST["folder"]);
	
		if($folder = checkpath($folder, $uploadpath)){
			$folder = DOCUMENTROOT.$folder;
			if(count($files) && is_dir($folder)){
				
				$result = true;
				
				foreach($files as $key => $value){
					
					$value = urldecode($value);
					
					if(($file = checkpath($value, $uploadpath)) && (DOCUMENTROOT.$file != $folder)) { //Check if folder/file is valid
						
						$source = DOCUMENTROOT.$file;
						$dest = $folder;
						
						if (is_dir($source) && $source[strlen($source) - 1] != '/') # add '/' if necessary 
            				$source=$source."/"; 
							
						if ($dest[strlen($dest) - 1] != '/') # add '/' if necessary 
            				$dest=$dest."/"; 
							
						if(is_dir($source)){			
							$dest=$dest.basename(rtrim($source, '/'));
						} else {
							$dest=$dest.basename($source);	
						}
						
						if(!smartCopy($source, $dest))
							$result = false;
							
					} else {
						echo '0||'.$lang["file_tampered_with"];	
						break;	
					}
				}
				
				if($result){
					// Delete files since this is cut and paste
					foreach($files as $key => $value){
						
						$value = urldecode($value);
						
						if( $file = checkpath($value, $uploadpath) ) { //Check if folder/file is valid
							
							if(!recursiveDelete(DOCUMENTROOT . $file))
								$result = false;
								
						} else {
							echo '0||'.$lang["file_tampered_with"];	
							break;	
						}
						
						if($result){
							echo '1||'.$lang["delete_success_1"];
						} else {
							echo '0||'.$lang["delete_error_1"];	
						}
					}
				} else {
					echo '0||'.$lang["delete_error_1"];	
				}
				
			} elseif(!count($files)) {
				
				// Array is empty @return true
				echo '1||'.$lang["delete_success_1"];
				
			} else {
				
				// DOCUMENTROOT.$folder isn't a folder
				echo '0||'.$lang["delete_error_1"];	
				
			}
		} else {
			echo '0||'.$lang["paste_error_2"];
		}
		break;
	
	case "copy_paste":
		$files = $_POST["files"];
		$folder = urldecode($_POST["folder"]);
	
		if($folder = checkpath($folder, $uploadpath)){
			$folder = DOCUMENTROOT.$folder;
			if(count($files) && is_dir($folder)){
				
				$result = true;
				
				foreach($files as $key => $value){
					
					$value = urldecode($value);
					
					if( ($file = checkpath($value, $uploadpath)) && (DOCUMENTROOT.$file != $folder) ) { //Check if folder/file is valid
						
						$source = DOCUMENTROOT.$file;
						$dest = $folder;
						
						if (is_dir($source) && $source[strlen($source) - 1] != '/') # add '/' if necessary 
            				$source=$source."/"; 
							
						if ($dest[strlen($dest) - 1] != '/') # add '/' if necessary 
            				$dest=$dest."/"; 
							
						if(is_dir($source)){			
							$dest=$dest.basename(rtrim($source, '/'));
						} else {
							$dest=$dest.basename($source);	
						}
						
						if(!smartCopy($source, $dest))
							$result = false;

					} else {
						echo '0||actions.php line 120: '.$lang["file_tampered_with"];	
						break;	
					}
				}
				
				if($result){
					echo 'actions.php line 126: '."\n".$lang["paste_success_1"];
				} else {
					echo 'actions.php line 128: '."\n". $source . "\n" . $dest . "\n" . $lang["delete_error_1"];	
				}
				
			} elseif(!count($files)) {
				
				// Array is empty @return true
				echo 'actions.php line 134: '."\n".$lang["delete_success"];
				
			} else {
				
				// DOCUMENTROOT.$folder isn't a folder
				echo 'actions.php line 139: '."\n".$lang["delete_error_1"];	
				
			}
		} else {
			echo $lang["paste_error_2"];
		}
		break;
		
	case "rename":
		$new_filename = urldecode($_POST["new_filename"]);
		$old_filename = urldecode($_POST["old_filename"]);
		$folderpath = urldecode($_POST["folder"]);
		$type = $_POST["type"];
		
		$result = false;
	
		if($folderpath = checkpath($folderpath, $uploadpath)){
			$folder = DOCUMENTROOT.$folderpath;
			
			if($new_filename != "" && $old_filename != "" && is_dir($folder)){
				
				$result = true;
				
				if ($folder[strlen($folder) - 1] != '/') # add '/' if necessary 
            		$folder=$folder."/"; 
				
				$source = $folder . $old_filename;
				$dest = $folder . $new_filename;
				
				//Check if new file already exists
				if($type == 'folder'){
					if(is_dir($dest)){
						echo "0||" . $lang["directory_already_exists"];
						break;
					} else {
						if(!CreateDirectory($folderpath, $new_filename, $uploadpath)){
							echo 'error||' . $lang["create_folder_failed"];
							break;
						}
					}			
				} else {
					if(is_file($dest)){
						echo "0||" . $lang["file_already_exists"];
						break;
					}
				}
					
				if(!smartCopy($source, $dest))
					$result = false;
					
				if($result){
					if(recursiveDelete($source)){
						echo "1||Rename success!";	
					} else {
						echo "0||" . $lang["rename_failed"];		
					}
				} else {
					echo "0||" . $lang["rename_failed"];	
				}
							
			}
			
		} else {
			echo '0||' . $lang["file_tampered_with"];	
			break;	
		}

		break;

	case "delete":
		$files = $_POST["files"];
		$result = true;
		
		foreach ($files as $key => $file) {
			
			// Check if file path is valid
			$file = urldecode($file);
			if (!($file = checkpath($file, $uploadpath))){
				echo $lang["file_tampered_with"];
				break;
			}
			
			// Delete file
			if (!recursiveDelete(DOCUMENTROOT . $file))
				$result=false;
			
		}
		
		if($result){
			echo 'success||'.count($files) . $lang["delete_success"];	
		} else {
			echo $lang["delete_error_2"];	
		}
		
		break;
		
	case "create_folder":
		$folderpath = urldecode($_POST["folderpath"]);
		$foldername = urldecode($_POST["foldername"]);

		if (CreateDirectory($folderpath, $foldername, $uploadpath)){
			echo 'success||' . $lang["create_folder_successful"];
		} else {
			echo 'error||' . $lang["create_folder_failed"];
		}
		
		break;
}

function CreateDirectory($dirpath, $dirname, $uploadpath){
	//Check if folder name is valid
	if(!checkFolderName($dirname))
		return false;

	//Check if folder path is valid
	if (!($dirpath = checkpath($dirpath, $uploadpath)))
		return false;
		
	//Create directory
	if(!rmkdir(DOCUMENTROOT.$dirpath.$dirname))
		return false;
	
	return true;
}
?>