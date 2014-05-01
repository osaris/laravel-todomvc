<?php

class Task extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
	  'title' => 'required'
	];
  
  // Number of tasks per page
  public static $per_page = 3;

	// Don't forget to fill this array
	protected $fillable = ['title'];
  
  protected $attributes = array(
    'done' => false
  );  

  public function scopeActive($query)
  {
    return $query->where('done', '=', false);
  }
  
  public function scopeDone($query)
  {
    return $query->where('done', '=', true);
  }  
  
}