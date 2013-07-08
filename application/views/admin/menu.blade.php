<div class="navbar navbar-static">
  <div class="navbar-inner">
    <div class="container">
      <ul role="navigation" class="nav">
        <li class="dropdown"><a href="/admin/home">{{ __('admin.home') }}</a></li>
        <li class="dropdown"><a href="/admin/products/index">{{ __('products.products') }}</a></li>
        <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#" id="drop1">{{ __('materials.materials') }} <b class="caret"></b></a>
          <ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
            <li>{{ HTML::link('/admin/materials/index', __('materials.list')) }}</li>
            <li>{{ HTML::link('/admin/materials/stock/restock', __('materials.stock')) }}</li>
            <li>{{ HTML::link('/admin/materials/orders', __('materials.orders')) }}</li>
            <li>{{ HTML::link('/admin/suppliers', __('suppliers.list')) }}</li>
          </ul>
        </li>
        <li class="dropdown"><a href="/admin/locations">{{ __('locations.locations') }}</a></li>
        <li class="dropdown">
          <a role="button" href="/admin/orders">{{ __('orders.orders') }}</a>
        </li>
        <li class="dropdown"><a href="/admin/users">{{ __('users.user') }}</a></li>
        <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#" id="drop1">{{ __('reports.reports') }} <b class="caret"></b></a>
          <ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
            <li>{{ HTML::link('/admin/reports/materials/used', __('reports.material_used')) }}</li>
            <li>{{ HTML::link('/admin/reports/materials/purchased', __('reports.material_purchased')) }}</li>
            <li>{{ HTML::link('/admin/reports/products/sales', __('reports.product_sales')) }}</li>
            <li>{{ HTML::link('#', __('reports.income_charge')) }}</li>
          </ul>
        </li>
      </ul>
      @if (Auth::check())
        <ul class="nav pull-right">
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#" id="drop1">{{ Auth::user()->name }} <b class="caret"></b></a>
            <ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
              <li>{{ HTML::link('/admin/auth/logout', 'Logout') }}</li>
            </ul>
          </li>
        </ul>
      @endif
    </div>
  </div>
</div>