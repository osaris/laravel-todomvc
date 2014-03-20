<?php

class Helper {
  
    public static function notification($message,$type)
    {
      if(strlen($message) > 0) 
      {
        return '<div class="alert alert-'.$type.'">'.$message.'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>';
      }
    }
  
    public static function isActive($pattern)
    {
      $fullPath = str_replace(Request::root(), '', Request::fullUrl());
      return preg_match($pattern, $fullPath) == 1 ? 'active' : '';
    }
}