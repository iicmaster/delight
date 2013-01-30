<div class="navbar navbar-static">
	<div class="navbar-inner">
		<div class="container">
			<ul role="navigation" class="nav">
				<li class="dropdown"><a href="/admin/home">Home</a></li>
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#" id="drop1">Location <b class="caret"></b></a>
					<ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
						<li>{{ HTML::link('#', 'All shipping locations.') }}</li>
						<li>{{ HTML::link('#', 'Add shipping locations.') }}</li>
					</ul>
				</li>
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#" id="drop1">Material <b class="caret"></b></a>
					<ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
						<li>{{ HTML::link('/admin/materials/index', 'All raw materials.') }}</li>
						<li>{{ HTML::link('/admin/materials/stock/restock', 'Materials recommended to purchase.') }}</li>
						<li>{{ HTML::link('#', 'Purchase raw materials.') }}</li>
						<li>{{ HTML::link('/admin/materials/orders', 'Purchased orders sheet.') }}</li>
						<li>{{ HTML::link('admin/suppliers', 'Raw material suppliers.') }}</li>
					</ul>
				</li>
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#" id="drop1">Product <b class="caret"></b></a>
					<ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
						<li>{{ HTML::link('#', 'All products.') }}</li>
						<li>{{ HTML::link('#', 'Add new products.') }}</li>
					</ul>
				</li>
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#" id="drop1">Menufacturing <b class="caret"></b></a>
					<ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
						<li>{{ HTML::link('#', 'Produces.') }}</li>
						<li>{{ HTML::link('#', 'Production lists.') }}</li>
					</ul>
				</li>
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#" id="drop1">Users <b class="caret"></b></a>
					<ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
						<li>{{ HTML::link('/admin/users', 'All users') }}</li>
					</ul>
				</li>
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#" id="drop1">Report <b class="caret"></b></a>
					<ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
						<li>{{ HTML::link('#', 'Report.') }}</li>
					</ul>
				</li>
			</ul>
			@if (Auth::check())
				<ul class="nav pull-right">
					<li  id="fat-menu">
						<a role="button" href="/admin/auth/logout">{{ __('admin.logout') }}</a>
					</li>
				</ul>
			@endif
		</div>
	</div>
</div>