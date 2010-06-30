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
session_start();


/* 
 * UPLOAD PATH
 * 
 * absolute path from root to upload folder (DON'T FORGET SLASHES)
 *
 * Example 
 * ---------------------------------------
 * http://www.domain.com/images/upload/
 * $uploadpath = '/images/upload/';
 *
 */
$uploadpath = '/zhm/application/uploads/assets/';

/* 
 * VIEW LAYOUT
 *
 * Set the default view layout when the file browser is first loaded
 *
 * Your options are: 'large_images', 'small_images', 'list', 'content', 'tiles' and 'details'
 *
 */
$viewlayout = 'details';

/* 
 * DEFAULT LANGUAGE
 * 
 * Set default language to load when &language=? is not included in url
 *
 * See lang directory for included languages. For now your options are 'en' and 'nl'
 * But you are free to translate the language files in the /lang/ directory. Copy the
 * en.php file and translate the lines after the =>
 *
 */
$defaultlanguage = 'en';


//--------------------------DON'T EDIT BEYOND THIS POINT ----------------------------------


define(DOCUMENTROOT, $_SERVER['DOCUMENT_ROOT']);
define(STARTINGPATH, DOCUMENTROOT . $uploadpath);


// Figure out which language file to load
if(!empty($_REQUEST['language'])) {
	$language = $_REQUEST['language'];
} elseif (isset($_SESSION['language'])) {
	$language = $_SESSION['language'];
} else {
	$language = $defaultlanguage;
}

require_once('lang/'.$language.'.php');
$_SESSION['language'] = $language;

// Get local settings from language file
$datetimeFormat = $lang['datetime format'];				// 24 hours, AM/PM, etc...
$dec_seperator = $lang['decimal seperator']; 			// character in front of the decimals
$thousands_separator = $lang['thousands separator'];	// character between every group of thousands
?>