<?php

class Helper {
  
    public static function notification($message,$type)
    {
      if(strlen($message) > 0) 
      {
        return '<div class="alert alert-'.$type.'">'.$message.'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>';
      }
    }
}