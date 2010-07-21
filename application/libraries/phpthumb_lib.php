<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * PHPThumb wrapper for CodeIgniter
 * 
 * @package			CodeIgniter
 * @subpackage      Libraries
 * @category		Image Manipulation
 * @based on		PHPThumb by Ian Selby <ian@gen-x-design.com>
 * @author			Jens Roland <mail@jensroland.com>
 * @link            http://phpthumb.gxdlabs.com
 * 
 */

require_once 'phpthumb/ThumbLib.inc.php';
class Phpthumb_lib extends PhpThumbFactory {

	private static $last_created_original;

	public static function create ($filename = null, $options = array(), $isDataStream = false)
	{
		self::$last_created_original = parent::create($filename, $options, $isDataStream);
		return clone self::$last_created_original;
	}

	public static function last_created_original ()
	{
		return clone self::$last_created_original;
	}

}

/* End of file phpthumb_lib.php */
/* Location: ./system/app/libraries/phpthumb_lib.php */