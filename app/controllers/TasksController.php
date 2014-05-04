<?php

class TasksController extends \BaseController {

	/**
	 * Display a listing of tasks
	 *
	 * @return Response
	 */
	public function index()
	{
    if (Input::get('filter', '') == 'done') 
    {
      $tasks = Task::done()->paginate(Task::$per_page);
      $done  = true;
    }
    else
    {
      $tasks = Task::active()->paginate(Task::$per_page);
      $done  = false;
    }

		return View::make('tasks.index', compact('tasks'))->with('done', $done)
                                                      ->with('tasksnb', Task::count());
	}

	/**
	 * Show the form for creating a new task
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('tasks.create');
	}

	/**
	 * Store a newly created task in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Task::$rules);

		if ($validator->fails())
		{
			return Redirect::action('TasksController@create')->withErrors($validator)->withInput();
		}

		Task::create($data);

		return Redirect::action('TasksController@index');
	}

  /**
	 * Show the form for editing the specified task.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$task = Task::find($id);

		return View::make('tasks.edit', compact('task'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$task = Task::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Task::$rules);

		if ($validator->fails())
		{
			return Redirect::action('TasksController@edit')->withErrors($validator)->withInput();
		}

		$task->update($data);

		return Redirect::action('TasksController@index');
	}
  
  public function done($id)
  {
		$task = Task::findOrFail($id);
    $task->done = true;
    $task->save();
    
    return Redirect::action('TasksController@index')->with('result', 'success')
                                                    ->with('message', 'Task is now in done list !');
  }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
    $task = Task::findOrFail($id);
    $task->delete();

		return Redirect::action('TasksController@index');
	}

}