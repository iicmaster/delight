<div class="navbar navbar-static">
  <div class="navbar-inner">
    <div class="container">
      <ul role="navigation" class="nav">
        <li class="dropdown"><a href="/admin/home">Home</a></li>
        <li class="dropdown"><a href="/admin/products/index">Product</a></li>
        <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#" id="drop1">Material <b class="caret"></b></a>
          <ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
            <li>{{ HTML::link('/admin/materials/index', 'Raw materials.') }}</li>
            <li>{{ HTML::link('/admin/materials/stock/restock', 'Materials recommended to purchase.') }}</li>
            <li>{{ HTML::link('/admin/materials/orders', 'Purchased orders sheet.') }}</li>
            <li>{{ HTML::link('/admin/suppliers', 'Raw material suppliers.') }}</li>
          </ul>
        </li>
        <li class="dropdown"><a href="/admin/locations">Location</a></li>
        <li class="dropdown">
          <a role="button" href="/admin/orders">Orders</a>
        </li>
        <li class="dropdown"><a href="/admin/users">Users</a></li>
        <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#" id="drop1">Report <b class="caret"></b></a>
          <ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
            <li>{{ HTML::link('#', 'Material used report.') }}</li>
            <li>{{ HTML::link('#', 'Material purchased report.') }}</li>
            <li>{{ HTML::link('#', 'Product sales report.') }}</li>
            <li>{{ HTML::link('#', 'Profit - loss report.') }}</li>
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