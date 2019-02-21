<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LogIn</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">
   
  <link rel="shortcut icon" href="./image/favicon.png">
  <link rel="stylesheet" href="/css/app.css">

<style>
.body{
        background-image :  ;
}
</style>

 
</head>
<body class="hold-transition login-page">
<div class="login-box">   
  <!-- /.login-logo -->
  <div class="card">
  <div class="login-logo">{{ __('Login') }}</div>
    <div class="card-body login-card-body">
    <form method="POST" action="{{ route('login') }}">
    @csrf
        <div class="form-group has-feedback">
        
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
          <span class="fa fa-envelope form-control-feedback"> <b> Email </b></span>
        </div>
        <div class="form-group has-feedback">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

          <span class="fa fa-lock form-control-feedback"><b> Password </b></span>
         
                               @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
        </div>
        <div class="row">
          <div class="col-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            
            <button type="submit" class="btn btn-success btn-block btn-flat">
                                    {{ __('Login') }}
                                </button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
                               @if (Route::has('password.request'))
                                    <a  class="btn btn-block btn-danger" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                
                                <a class="btn btn-block btn-primary" href="{{ route('register') }}">Register</a>
      </p>
    </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<script src="/js/app.js"></script> 
</body>
</html>
