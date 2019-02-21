<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registration </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">
   
  <link rel="shortcut icon" href="./image/favicon.png">
  <link rel="stylesheet" href="/css/app.css">

<style>
.register-box{ 
        margin-top : 10px !important;
        
}

body{
  background: #083952 !important;
}
 
</style>

</head>
<body class="hold-transition register-page">
<div class="register-box">   
    <div class="card">
  <div class="register-logo">{{ __('Register') }}</div>
      <div class="card-body register-card-body">      
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group has-feedback">
        <input id="name" placeholder="Enter Name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
          <span class="fa fa-user form-control-feedback"> <b> Name </b> </span>
        </div>
        <div class="form-group has-feedback">
        <input id="email" placeholder="Enter Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
          <span class="fa fa-envelope form-control-feedback"> <b> Email </b> </span>
        </div>
        <div class="form-group has-feedback">
        <input id="password" placeholder="Enter Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
          <span class="fa fa-lock form-control-feedback"> <b> Password </b> </span>
        </div>
        <div class="form-group has-feedback">
        <input id="password-confirm" placeholder="Enter Confirm Password" type="password" class="form-control" name="password_confirmation" required>
          <span class="fa fa-lock form-control-feedback"> <b> Confirm Password </b> </span>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox" required> I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
          <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>         
        <a class="btn btn-block btn-success" href="{{ route('login') }}"><i class="fas fa-user"></i> Already Member!! Login</a>
        <a class="btn btn-block btn-warning" href="{{ url('/') }}"><i class="fas fa-home"></i> Home!!</a>
                                
      
   
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->


<script src="/js/app.js"></script>
<!-- iCheck --> 
</body>
</html>
