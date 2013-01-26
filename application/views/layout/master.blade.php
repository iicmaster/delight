<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8" />
	<title>Cake Delights - @yield('title')</title>
	@section('css')
	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('js/select2/select2.css') }}
	{{ HTML::style('css/style.css') }}
	<!--[if IE 8]>
		{{ HTML::style('css/ie8.css') }}
	<![endif]-->
	<!--[if IE 7]>
		{{ HTML::style('css/ie7.css') }}
	<![endif]-->
	<!--[if IE 6]>
		{{ HTML::style('css/ie6.css') }}
	<![endif]-->
	@yield_section
</head>
<body>
	<div id="header">
		<div class="warper">
			<div>
				<div id="logo">
					<a href="index.php">{{ HTML::image('img/logo.gif', 'Logo') }}</a>
				</div>
			</div>
		</div>
	</div>
	<nav id="nav">
		@yield('menu')
	</nav>

	<div id="content">
		@yield('content')
	</div>
	@include('layout.footer')
	@section('js')
	{{ HTML::script('js/jquery-1.9.0.js') }}
	{{ HTML::script('js/bootstrap.js') }}
	{{ HTML::script('js/select2/select2.js') }}
	@yield_section
</body>
</html>