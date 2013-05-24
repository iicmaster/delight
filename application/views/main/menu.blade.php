<div class="navbar navbar-static">
  <div class="navbar-inner">
    <div class="container">
      <ul role="navigation" class="nav">
        <li class="dropdown"><a href="/">Home</a></li>
        <li class="dropdown"><a href="/products">Products</a></li>
        <li class="dropdown"><a href="/contact">Contact us</a></li>
      </ul>
      <ul class="nav pull-right">
        @if (Auth::check())
          <li class="dropdown">
            <a href="/cart">Check Cart <i class="icon-shopping-cart"></i></a>
          </li>
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#" id="drop1">{{ Auth::user()->name }} <b class="caret"></b></a>
                <ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
                  <li  id="fat-menu">
                    <a role="button" href="/profile">Profile</a>
                  </li>
                  <li class="dropdown">
                    {{ HTML::link('orders', 'Orders History') }}
                  </li>
                  <li>{{ HTML::link('/logout', 'Logout') }}</li>
                </ul>
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