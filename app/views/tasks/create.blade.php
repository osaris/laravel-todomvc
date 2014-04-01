@extends('layouts.default')
@section('title', 'New task')
@section('content')

  <!-- if there are creation errors, they will show here -->
  {{ HTML::ul($errors->all()) }}
  
  {{ Form::model('task', array('action' => 'TasksController@store','class' => 'form-inline')) }}
  
    <div class="form-group">
      {{ Form::label('title', 'Title') }}
      {{ Form::text('title', null, array('class' => 'form-control')) }}
    </div>
    
    {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
  
  {{ Form::close() }}

@stop