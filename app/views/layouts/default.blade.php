<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TodoMVC</title>
  {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}
  {{ HTML::style('/css/main.css') }}
  {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
  {{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') }}  
</head>
<body>
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">TodoMVC</a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="/">Home</a></li>
          <li>{{ link_to_action('TasksController@index', 'Done', array('filter=done')) }}</li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
  
	<div class="container">
    {{ Helper::notification(Session::get('message'), Session::get('result')) }}
    
			@yield('content')
	</div>
  
  <script>
  $(function() {
    @yield('script')
  });
  </script>
</body>
</html>
