<?php

class TaskTest extends TestCase {
  
  public function testValidatePresenceOfTitleKo() {
    
		$validator = Validator::make(array('title' => ''), Task::$rules);    
    
    $this->assertTrue($validator->fails());
  }
  
  public function testValidatePresenceOfTitleOk() {
    
    $validator = Validator::make(array('title' => 'Not empty'), Task::$rules);
    
    $this->assertFalse($validator->fails());
  }  
  
}