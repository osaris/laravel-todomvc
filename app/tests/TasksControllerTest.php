<?php

class TasksControllerTest extends TestCase {

	public function testIndex() {
    
    $this->client->request('GET', '/');
    
		$this->assertResponseOk();
	}
  
	public function testCreate() {
    
    $this->client->request('GET', '/tasks/create');
    
    $this->assertResponseOk();
	}

  public function testStoreKo() {
    
    $this->client->request('POST', '/tasks', array('title' => ''));
    
    $this->assertRedirectedToRoute('tasks.create');
  }

  public function testStoreOk() {
    
    $this->client->request('POST', '/tasks', array('title' => 'Test'));
    
    $this->assertRedirectedToRoute('tasks.index');
  }
}