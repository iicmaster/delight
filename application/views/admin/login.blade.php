@layout('layout.admin')

@section('title')
Login
@endsection

@section('css')
    @parent
    {{ HTML::style('css/auth.css') }}
@endsection

@section('content')
<div id="auth-login">
    <!-- Report Message -->
    @if (isset($message))
        <div class="alert alert-error">
            <button class="close" data-dismiss="alert" type="button">×</button>
            {{ $message }}
        </div>
    @endif

    <h1>Login</h1>   
    <hr>    
    {{ Form::open('admin/auth/validate', 'POST', array('class' => 'form-horizontal')) }}
        <div class="control-group">
            <label class="control-label" for="inputEmail">Email</label>
            <div class="controls">
                <input type="text" name="username" id="inputEmail" placeholder="Email">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputPassword">Password</label>
            <div class="controls">
            <input type="password" name="password" id="inputPassword" placeholder="Password">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn">{{ __('admin.login') }}</button>
            </div>
        </div>
    {{ Form::close() }}
</div>
@endsection