<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ ENV('APP_NAME') }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" href="{{ asset('img/j-icon.png') }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('backend/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/ionicons/dist/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/icon-kit/dist/css/iconkit.min.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/css/theme.min.css')}}">
    <script src="{{ asset('backend/js/vendor/modernizr-2.8.3.min.js')}}"></script>
  </head>

  <style>
  
  body{
    background-color: #F6F7FB;
  }
  .auth-wrapper .lavalite-bg .lavalite-overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: linear-gradient(145deg, rgba(1,1,1,0.5) 0%, rgba(1,1,1,.9) 100%);
  }

  .auth-wrapper .authentication-form .logo-centered {
    width: 180px;
    margin: 0 auto;
    margin-bottom: 0px;
    margin-bottom: 40px;
  }

  .btn-wide{
    padding-left:25px;
    padding-right:25px;
    padding-bottom:25px;
  }

  .auth-wrapper .authentication-form {

font-size: .9rem;
width: 95%;
display: block;
padding: 50px 0;

}

  </style>

<body>
  <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <div class="auth-wrapper">
    <div class="container-fluid h-100">
      <div class="row h-100 justify-content-md-center">
        <div class="col-md-3 card mt-20 ml-20 mr-20" style="border:1px solid #ddd">
          <div class="authentication-form mx-auto text-center">
            <div class="logo-centered">
                <a href="#"><img src="{{ asset('img/logo-jp2gi.png')}}" alt="" class="img-fluid"></a>
            </div>
            <h3 class="mb-1">Login to admin account</h3>
            @if(@Session::get('status')=='error')
              <p class="text-danger">{!! @Session::get('message') !!}</p>
            @else
              <p>Enter your username and password</p>
            @endif
            <form method="POST" action="{{ URL('admin/login') }}" id="login_form">
            @csrf
              <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username" required="" value="">
                <i class="ik ik-user"></i>
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required="" value="">
                <i class="ik ik-lock"></i>
              </div>
              <div class="sign-btn text-center">
                <button class="btn btn-primary btn-wide">{{ __('Sign In') }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="{{ asset('backend/plugins/plugins/popper.js/dist/umd/popper.min.js')}}"></script>
  <script src="{{ asset('backend/plugins/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('backend/plugins/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
  <script src="{{ asset('backend/plugins/plugins/screenfull/dist/screenfull.js')}}"></script>
  <script src="{{ asset('backend/plugins/dist/js/theme.js')}}"></script>
      
  </body>
</html>