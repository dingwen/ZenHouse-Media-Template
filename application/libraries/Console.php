<?php
class Console {

  public $enabled;
  private $index = 1;
  private $CI;

  function Console($enable=true) {
    $this->CI =& get_instance();
    $this->enabled = $this->CI->config->item('firephp_enable') && $enable;
  }

  /**
   * Log data to the fireBug Console (via firePHP)
   * @param Mixed $type
   * @param Mixed $message
   * @param Bool $write_to_file [optional]
   */
  function log($message, $type='log', $write_to_file=false) {
    $header_name = 'X-Wf-1-1-1-'.$this->index;

    if (!is_array($type) && !is_object($type)) {
      if (in_array(strtolower($type), array('log','info','warn','error'))) {
        // create header value
        $header_value = '[{"Type":"'.strtoupper($type).'"},'.json_encode($message).']';
        if ($write_to_file==true) {
          log_message($type, print_r($message, true));
        }
      }
    }
    else {
      $meta;
      // create meta Object
      foreach ($type as $key=>$value) {
        $key = ucfirst($key);
        $meta->$key = $value;
      }

      $body;
      // create body object
      foreach ($message as $key=>$value) {
        $key = ucfirst($key);
        $body->$key = $value;
      }
      // create header value
      $header_value = '['.json_encode($meta).','.json_encode($body).']';

      if ($write_to_file==true) {
        log_message($meta->Type, $body->Trace.': '.print_r(json_decode($body->Trace), true));
      }
    }

    if ($this->enabled) {
      if ($this->index==1) {
        // set base firePHP headers
        $this->CI->output->set_header('X-Wf-Protocol-1: http://meta.wildfirehq.org/Protocol/JsonStream/0.2');
        $this->CI->output->set_header('X-Wf-1-Plugin-1: http://meta.firephp.org/Wildfire/Plugin/FirePHP/Library-FirePHPCore/0.3');
        $this->CI->output->set_header('X-Wf-1-Structure-1: http://meta.firephp.org/Wildfire/Structure/FirePHP/FirebugConsole/0.1');
      }

      // set output header
      $this->CI->output->set_header($header_name.': '.strlen($header_value).'|'.$header_value.'|');

      // increase log index
      $this->index++;
    }
  }
}

/* End of file console.php */
/* Location: application/libraries/console.php */