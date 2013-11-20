<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>The Myth of Clan Website - @yield('title')</title>
  <!-- FONTS -->
  {{ HTML::style('http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic|Ubuntu:400,700,500|Source+Sans+Pro:400,600,700,900|Open+Sans:400,600,700,800,600italic&subset=latin,latin-ext') }}
  <!-- ./FONTS -->
	{{ HTML::style('assets/css/bootstrap.min.css') }}	
	{{ HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css') }}
	{{ HTML::style('assets/css/custom.css') }}

</head>
<body>

    <!-- Wrap all page content here -->
    <div id="wrap">
      <!-- Fixed navbar -->
      <div id="topblue"></div>
      <div class="container">
        <div id="topmenu" class="hidden-xs">
        	<div id="above-logo" class="col-sm-3">
        		It is {{ date('l').", ".date('d')." of ".date('F Y') }}
        	</div>
        	<div id="above-nav-panel" class="col-sm-9">
            <div class="js-menu">
          		<i id="js-login" class="js-menu-icon glyphicon glyphicon-user" onClick="showMenu(this.id)"></i>
              <ul id="js-login-menu" class="js-menu-list list-unstyled">
                <li>
                  {{ Form::open(array('url' => 'user')) }}
                  <span class="boxer-heading">Login</span>
                  <div class="form-group">
                    {{ Form::label('email', 'E-mail address') }}
                    {{ Form::text('email', Input::old('email'), array('placeholder' => 'Your e-mail address')) }}
                    <ul class="list-unstyled text-danger">
                      @foreach($errors->get('email') as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  <div class="form-group">
                    {{ Form::label('password', "Password") }}
                    {{ Form::password('password') }}
                    <ul class="list-unstyled text-danger">
                      @foreach($errors->get('password') as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  <div class="checkbox">
                    <label>
                      {{ Form::checkbox('remember') }} Remember me
                    </label>
                  </div>
                  <ul class="list-unstyled">
                    <li><a href="#">Forgot your password?</a></li>
                    <li><a href="#">Register a new account.</a></li>
                  </ul>
                  {{ Form::submit('Login', array("class" => "btn btn-default")) }}
                  {{ Form::close() }}
                </li>
              </ul>
            </div>
            <div class="js-menu">
          		<i id="js-chat" class="js-menu-icon glyphicon glyphicon-asterisk" onClick="showMenu(this.id)"></i>
              <ul id="js-chat-menu" class="js-menu-list">
                
              </ul>
            </div>
            <div class="search-menu">
              {{ Form::open(array('url' => 'war/search', 'method' => 'get')) }}
                <div class="input-group">
                  <div id="aka-label" class="input-group-addon">
                    War search:
                  </div>
                  {{ Form::text('search', Input::old('search'), array('placeholder' => 'Opponent name.')) }}
                  <span class="input-group-addon">
                    <button type="submit"><i class="glyphicon glyphicon-search"></i></button>
                  </span>
                  <div id="helpbtn" class="input-group-addon">
                    <a href="help" class="btn">Help</a>
                  </div>
                </div>
              {{ Form::close() }}
            </div>
        	</div>
        </div>
      </div>
      <div id="topred"></div> 

      <div id="nav">
        <div id="navblue"></div>
        <div class="container">
        	<div id="logo" class="col-sm-3">
        			<a href="{{ URL::to('/') }}"><img src="{{ URL::asset('assets/img/logo.png') }}" alt="The Myth Logo"></a>
        	</div>
        	<div id="nav-panel" class="col-sm-9">
        		<ul class="list-unstyled">
        			<li><a href="#">Home</a></li>
        			<li><a href="#">History</a></li>
        			<li><a href="#">Wars</a></li>
        			<li><a href="#">Members</a></li>
              <li><a href="#">Registration</a></li>
        			<li><a href="#">Forum</a></li>
        			<li><a href="#">Contact</a></li>
        		</ul>
        	</div>
        </div>
        <div id="navred"></div>
      </div>

      <!-- Begin page content -->
      @yield('breadcrumbs')
      <div id="headline">
        <div class="container">
          <div class="col-sm-8" style="padding-left:0;">
            <h1>@yield('headline')</h1>
          </div>
          <div class="col-sm-4">
            <h1>Chat <span class="badge"><span class="circle"></span>42 online</span></h1>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-8">
            @yield('content')
          </div>
          @include('includes.chat');
        </div>
      </div>
    </div>
    <div id="footer">
      <div class="container">
        <p class="text-muted credit">MYTH Revisited 1.0 by <a href="http://">FATAL</a>.</p>
      </div>
    </div>

	{{ HTML::script('http://code.jquery.com/jquery-2.0.0.min.js') }}
	{{ HTML::script('assets/js/bootstrap.min.js') }}
  {{ HTML::script('assets/js/default.js') }}
</body>
</html>