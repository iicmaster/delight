<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
  <meta charset="UTF-8" />
  <title>Cake Delights - @yield('title')</title>
  @section('css')
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('js/select2/select2.css') }}
    {{ HTML::style('css/template.css') }}
    {{ HTML::style('css/style.css') }}
    {{ HTML::style('css/admin.css') }}
    {{ HTML::style('js/jquery-ui/themes/base/jquery-ui.css') }}
    {{ HTML::style('js/jquery-ui/themes/base/jquery.ui.datepicker.css') }}
  @yield_section
</head>
<body>
  <div id="header">
    <div class="warper">
      <div>
        <div id="logo">
          <a href="/">{{ HTML::image('img/logo.gif', 'Logo') }}</a>
        </div>
      </div>
    </div>
  </div>
  <nav id="nav">
    @include('admin.menu')
  </nav>

  <div id="content">
    @yield('content')
  </div>

  @include('layout.footer')
  
  @section('js')
    {{ HTML::script('js/jquery-1.8.3.js') }}
    {{ HTML::script('js/bootstrap.js') }}
    {{ HTML::script('js/bootstrap.file-input.js') }}
    {{ HTML::script('js/select2/select2.js') }}
    <script>
      $(function() {
        $('#select-all').click(function() {
          var root = $(this).parent().parent().parent().parent();
          root.find(':checkbox').attr('checked', $(this).is(':checked'));
        })
      })
    </script>
  @yield_section
</body>
</html>