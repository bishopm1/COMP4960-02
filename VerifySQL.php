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
        if(strpos(strtoupper($input), 'DELETE') !== FALSE){
          return FALSE;
        }
        elseif(strpos(strtoupper($input), 'SELECT') !== FALSE){
          return FALSE;
        }
        elseif(strpos(strtoupper($input), 'FROM') !== FALSE){
          return FALSE;
        }
        else{
          return TRUE;
        }
      }
    }
?>