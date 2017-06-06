@extends('admin.layout.app')
@section('title', 'Sign Up')
    
@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="/"><b>Demo</b> App</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops! Something went wrong!</strong>
                <br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </p>

    <form action="/signup" method="post">
      <div class="form-group has-feedback">
        <label for="user_name">User Name *</label>
        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Username" value="{{ Request::old('user_name') }}">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label for="email">Email ID *</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ Request::old('email') }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label for="password">Password *</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ Request::old('password') }}">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label for="re-password">Retype Password *</label>
        <input type="password" class="form-control" id="re-password" name="re-password" placeholder="Retype Password" value="{{ Request::old('re-password') }}">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign Up</button>
        </div>
      </div>

      <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <a href="/" class="text-center">I already have a membership</a>
  </div>
</div>
@endsection