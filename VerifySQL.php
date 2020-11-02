<?php

  /**
   * This is a verification class that prevents
   * SQL commands from being entered as inputs.
   * @author Nick Foley
   */
  Class VerifySQL{

      /**
       * @param $input
       * @return boolean
       */
      public static function checkSQL($input){
        $commands = array('DELETE','SELECT','FROM','UPDATE');
        foreach($commands as &$value){
          if(strpos(strtoupper($input), $value) !== FALSE){
            return FALSE;
          }
        }
        return TRUE;
      }
    }
?>