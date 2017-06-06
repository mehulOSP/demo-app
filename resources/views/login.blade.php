@extends('admin.layout.app')
@section('title', 'Login') 


@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>Demo</b> App</a>
  </div>
  <div class="login-box-body">
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

  <form action="/login" method="post">
      <div class="form-group has-feedback">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>      
        </div>
      </div>

      <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
    </div>
    
    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

  </div>
</div>
@endsection