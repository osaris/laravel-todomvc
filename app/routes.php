<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array(
    'prefix' => LaravelLocalization::setLocale(),
    'before' => 'LaravelLocalizationRedirectFilter' // LaravelLocalization filter
  ),
  function() {
    Route::resource('tasks', 'TasksController', array('except' => array('show')));

    Route::post('tasks/{tasks}/done', array('as' => 'tasks.done', 'uses' => 'TasksController@done'));

    Route::get('/', 'TasksController@index');
});