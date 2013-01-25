<div class="navbar navbar-static">
	<div class="navbar-inner">
		<div style="width: auto;" class="container">
			<ul role="navigation" class="nav">
				<li class="dropdown"><a href="/admin/home">Home</a></li>
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#" id="drop1">Location <b class="caret"></b></a>
					<ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
						<li>{{ HTML::link('#', 'สถานที่จักส่งทั้งหมด') }}</li>
						<li>{{ HTML::link('#', 'เพิ่มสถานที่จักส่ง') }}</li>
					</ul>
				</li>
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#" id="drop1">Material <b class="caret"></b></a>
					<ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
						<li>{{ HTML::link('admin/materials', 'วัตถุดิบทั้งหมด') }}</li>
						<li>{{ HTML::link('#', 'วัตถุดิบที่แนะนำให้ซื้อเพิ่ม') }}</li>
						<li>{{ HTML::link('#', 'สั่งซื้อวัตถุดิบ') }}</li>
						<li>{{ HTML::link('#', 'ใบสั่งซื้อวัตถุดิบ') }}</li>
						<li>{{ HTML::link('admin/suppliers', 'ผู้จำหน่ายวัดถุดิบ') }}</li>
					</ul>
				</li>
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#" id="drop1">Product <b class="caret"></b></a>
					<ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
						<li>{{ HTML::link('#', 'สินค้าทั้งหมด') }}</li>
						<li>{{ HTML::link('#', 'เพิ่มชนิดสินค้า') }}</li>
					</ul>
				</li>
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#" id="drop1">Menufacturing <b class="caret"></b></a>
					<ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
						<li>{{ HTML::link('#', 'ผลิตสินค้า') }}</li>
						<li>{{ HTML::link('#', 'รายการผลิตสินค้า') }}</li>
					</ul>
				</li>
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#" id="drop1">Users <b class="caret"></b></a>
					<ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
						<li>{{ HTML::link('/admin/users', 'Users') }}</li>
					</ul>
				</li>
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#" id="drop1">Report <b class="caret"></b></a>
					<ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
						<li>{{ HTML::link('#', 'รายงาน') }}</li>
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