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
            <td>{{{ $task->title }}}</td>
            <td>
                @if(!$done)
                  {{ Form::model('task', array('action' => array('TasksController@done', $task->id), 'method' => 'post', 'class' => 'form-inline')) }}
                    {{ HTML::decode(Form::button('<span class="glyphicon glyphicon-ok"></span> Done', array('type' => 'submit', 'class' => 'btn btn-success btn-sm'))) }}      
                  {{ Form::close() }}             
                @endif
                {{ Form::model('task', array('action' => array('TasksController@destroy', $task->id), 'method' => 'delete', 'class' => 'form-delete form-inline')) }}
                  {{ HTML::decode(Form::button('<span class="glyphicon glyphicon-remove"></span> Delete', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm'))) }}      
                {{ Form::close() }}
            </td>
          </tr>
        @endforeach
        <tfooter>
          <tr>
            <td colspan="2">{{ count($tasks) }} {{ trans_choice('task|tasks', count($tasks)) }}</td>
          </tr>
        </tfooter>
        @section('script')
          $(".form-delete").submit(function(e){
              if (!confirm("Are you sure ?")) {
                  e.preventDefault();
                  return;
              }
          });
        @stop
      @else
        <tr>
          <td colspan="2">
            @if($done)            
              No task ! Please do some job first !
            @else
              No task ! Please create one first !
            @endif
          </td>
        </tr>
      @endif
    </tbody>
  </table>
  </div>
@stop