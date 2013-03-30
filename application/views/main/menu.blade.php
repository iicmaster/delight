<div class="navbar navbar-static">
	<div class="navbar-inner">
		<div class="container">
			<ul role="navigation" class="nav">
				<li class="dropdown"><a href="/">Home</a></li>
				<li class="dropdown"><a href="/products">Products</a></li>
				<li class="dropdown"><a href="/contact">Contact us</a></li>
				@if (Auth::check())
					<li class="dropdown"><a href="/cart">Check Cart <i class="icon-shopping-cart"></i></a></li>
				@endif
			</ul>
			<ul class="nav pull-right">
				@if (Auth::check())
					<li  id="fat-menu">
						<a role="button" href="/profile">Profile</a>
					</li>
					<li  id="fat-menu">
						<a role="button" href="/logout">Logout</a>
					</li>
				@else
					<li  id="fat-menu">
						<a role="button" href="/login">Login</a>
					</li>
					<li  id="fat-menu">
						<a role="button" href="/register">Register</a>
					</li>
				@endif
			</ul>
		</div>
	</div>
</div>