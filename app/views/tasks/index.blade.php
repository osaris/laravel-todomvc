@extends('layouts.default')
@if($done)
  @section('title', 'List of done tasks')
@else
  @section('title', 'List of tasks')
@endif
@section('content')
  <div class="row pull-right">
    {{ HTML::decode(link_to_action('TasksController@create', '<span class="glyphicon glyphicon-plus-sign"></span> '.trans('messages.add'), null,array('class' => 'btn btn-primary'))) }}    
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
                    {{ HTML::decode(Form::button('<span class="glyphicon glyphicon-ok"></span> '.trans('messages.done'), array('type' => 'submit', 'class' => 'btn btn-success btn-sm'))) }}      
                  {{ Form::close() }}             
                @endif
                {{ Form::model('task', array('action' => array('TasksController@destroy', $task->id), 'method' => 'delete', 'class' => 'form-delete form-inline')) }}
                  {{ HTML::decode(Form::button('<span class="glyphicon glyphicon-remove"></span> '.trans('messages.delete'), array('type' => 'submit', 'class' => 'btn btn-danger btn-sm'))) }}      
                {{ Form::close() }}
            </td>
          </tr>
        @endforeach
        <tfooter>
          <tr>
            <td colspan="2">{{ $tasksnb }} {{ trans_choice('messages.task', $tasksnb) }}</td>
          </tr>
        </tfooter>
        @section('script')
          $(".form-delete").submit(function(e){
            if (!confirm({{ trans('messages.sure') }})) {
                  e.preventDefault();
                  return;
              }
          });
        @stop
      @else
        <tr>
          <td colspan="2">
            @if($done)            
              {{ trans('messages.notaskdone') }}            
            @else
              {{ trans('messages.notask') }}
            @endif
          </td>
        </tr>
      @endif
    </tbody>
  </table>
  {{ $tasks->appends(Input::except('page'))->links() }}
  </div>
@stop