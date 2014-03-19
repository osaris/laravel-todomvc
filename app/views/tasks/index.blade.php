@extends('layouts.default')
@section('content')
  <div class="row pull-right">
    {{ HTML::decode(link_to_action('TasksController@create', '<span class="glyphicon glyphicon-plus-sign"></span> Add a new task', null,array('class' => 'btn btn-primary'))) }}    
  </div>

  <div class="row">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Description</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @if (count($tasks) > 0)
        @foreach($tasks as $task)
          <tr>
            <td>{{ $task->description }}</td>
            <td></td>
          </tr>
        @endforeach
        <tfooter>
          <tr>
            <td colspan="2">{{ count($task) }} tasks</td>
          </tr>
        </tfooter>
      @else
        <tr>
          <td colspan="2">No task ! Please create one first !</td>
        </tr>
      @endif
    </tbody>
  </table>
  </div>
@stop