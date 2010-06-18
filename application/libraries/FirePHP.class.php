<?php
/**
 * *** BEGIN LICENSE BLOCK *****
 *  
 * This file is part of FirePHP (http://www.firephp.org/).
 * 
 * Software License Agreement (New BSD License)
 * 
 * Copyright (c) 2006-2009, Christoph Dorn
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 * 
 *     * Redistributions of source code must retain the above copyright notice,
 *       this list of conditions and the following disclaimer.
 * 
 *     * Redistributions in binary form must reproduce the above copyright notice,
 *       this list of conditions and the following disclaimer in the documentation
 *       and/or other materials provided with the distribution.
 * 
 *     * Neither the name of Christoph Dorn nor the names of its
 *       contributors may be used to endorse or promote products derived from this
 *       software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
 * ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 * 
 * ***** END LICENSE BLOCK *****
 * 
 * @copyright   Copyright (C) 2007-2009 Christoph Dorn
 * @author      Christoph Dorn <christoph@christophdorn.com>
 * @license     http://www.opensource.org/licenses/bsd-license.php
 * @package     FirePHP
 */
 
 
/**
 * Sends the given data to the FirePHP Firefox Extension.
 * The data can be displayed in the Firebug Console or in the
 * "Server" request tab.
 * 
 * For more information see: http://www.firephp.org/
 * 
 * @copyright   Copyright (C) 2007-2009 Christoph Dorn
 * @author      Christoph Dorn <christoph@christophdorn.com>
 * @license     http://www.opensource.org/licenses/bsd-license.php
 * @package     FirePHP
 */
class FirePHP {
  
  /**
   * FirePHP version
   *
   * @var string
   */
  const VERSION = '0.3';
  
  /**
   * Firebug LOG level
   *
   * Logs a message to firebug console.
   * 
   * @var string
   */
  const LOG = 'LOG';
  
  /**
   * Firebug INFO level
   *
   * Logs a message to firebug console and displays an info icon before the message.
   * 
   * @var string
   */
  const INFO = 'INFO';
  
  /**
   * Firebug WARN level
   *
   * Logs a message to firebug console, displays an warning icon before the message and colors the line turquoise.
   * 
   * @var string
   */
  const WARN = 'WARN';
  
  /**
   * Firebug ERROR level
   *
   * Logs a message to firebug console, displays an error icon before the message and colors the line yellow. Also increments the firebug error count.
   * 
   * @var string
   */
  const ERROR = 'ERROR';
  
  /**
   * Dumps a variable to firebug's server panel
   *
   * @var string
   */
  const DUMP = 'DUMP';
  
  /**
   * Displays a stack trace in firebug console
   *
   * @var string
   */
  const TRACE = 'TRACE';
  
  /**
   * Displays an exception in firebug console
   * 
   * Increments the firebug error count.
   *
   * @var string
   */
  const EXCEPTION = 'EXCEPTION';
  
  /**
   * Displays an table in firebug console
   *
   * @var string
   */
  const TABLE = 'TABLE';
  
  /**
   * Starts a group in firebug console
   * 
   * @var string
   */
  const GROUP_START = 'GROUP_START';
  
  /**
   * Ends a group in firebug console
   * 
   * @var string
   */
  const GROUP_END = 'GROUP_END';
  
  /**
   * Singleton instance of FirePHP
   *
   * @var FirePHP
   */
  protected static $instance = null;
  
  /**
   * Flag whether we are logging from within the exception handler
   * 
   * @var boolean
   */
  protected $inExceptionHandler = false;
  
  /**
   * Flag whether to throw PHP errors that have been converted to ErrorExceptions
   * 
   * @var boolean
   */
  protected $throwErrorExceptions = true;
  
  /**
   * Flag whether to convert PHP assertion errors to Exceptions
   * 
   * @var boolean
   */
  protected $convertAssertionErrorsToExceptions = true;
  
  /**
   * Flag whether to throw PHP assertion errors that have been converted to Exceptions
   * 
   * @var boolean
   */
  protected $throwAssertionExceptions = false;
  
  /**
   * Wildfire protocol message index
   *
   * @var int
   */
  protected $messageIndex = 1;
    
  /**
   * Options for the library
   * 
   * @var array
   */
  protected $options = array('maxObjectDepth' => 10,
                             'maxArrayDepth' => 20,
                             'useNativeJsonEncode' => true,
                             'includeLineNumbers' => true);

  /**
   * Filters used to exclude object members when encoding
   * 
   * @var array
   */
  protected $objectFilters = array();
  
  /**
   * A stack of objects used to detect recursion during object encoding
   * 
   * @var object
   */
  protected $objectStack = array();
  
  /**
   * Flag to enable/disable logging
   * 
   * @var boolean
   */
  protected $enabled = true;

  /**
   * The object constructor
   */
  function __construct() {
  }

  /**
   * When the object gets serialized only include specific object members.
   * 
   * @return array
   */  
  public function __sleep() {
    return array('options','objectFilters','enabled');
  }
    
  /**
   * Gets singleton instance of FirePHP
   *
   * @param boolean $AutoCreate
   * @return FirePHP
   */
  public static function getInstance($AutoCreate=false) {
    if($AutoCreate===true && !self::$instance) {
      self::init();
    }
    return self::$instance;
  }
   
  /**
   * Creates FirePHP object and stores it for singleton access
   *
   * @return FirePHP
   */
  public static function init() {
    return self::$instance = new self();
  }
  
  /**
   * Enable and disable logging to Firebug
   * 
   * @param boolean $Enabled TRUE to enable, FALSE to disable
   * @return void
   */
  public function setEnabled($Enabled) {
    $this->enabled = $Enabled;
  }
  
  /**
   * Check if logging is enabled
   * 
   * @return boolean TRUE if enabled
   */
  public function getEnabled() {
    return $this->enabled;
  }
}