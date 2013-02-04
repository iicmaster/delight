<div class="navbar navbar-static">
	<div class="navbar-inner">
		<div class="container">
			<ul role="navigation" class="nav">
				<li class="dropdown"><a href="/">Home</a></li>
				<li class="dropdown"><a href="/products">Products</a></li>
				<li class="dropdown"><a href="/contact">Contact us</a></li>
				<li class="dropdown"><a href="#">Check Cart <i class="icon-shopping-cart"></i></a></li>
			</ul>
			@if (Auth::check())
				<ul class="nav pull-right">
					<li  id="fat-menu">
						<a role="button" href="#">Logout</a>
					</li>
				</ul>
			@endif
		</div>
	</div>
</div>