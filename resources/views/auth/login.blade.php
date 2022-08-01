<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.statically.io/gh/devanka761/notipin/v1.24.49/all.js"></script>
</head>
<body>
    
    {{-- @if ($errors->any())
    <template id="my-template">
        <swal-title>
            @foreach($errors->all() as $error)
            {{ $error }} 
            @endforeach
        </swal-title>
        <swal-icon type="warning" color="red"></swal-icon>
        <swal-param name="allowEscapeKey" value="false" />
  <swal-param
    name="customClass"
    value='{ "popup": "my-popup" }' />
      </template>
        @endif --}}
	<img class="wave" src="{{ asset('assets/wave.png') }}">
	<div class="container">
		<div class="img">
			<img src="{{ asset('assets/bg.svg') }}">
		</div>
		<div class="login-content">
			<form method="POST" class="form-horizontal mt-3" action="{{ route('login') }}" >
                @csrf
				<img src="{{ asset('assets/avatar.svg') }}">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
                              <input class="input form-control @error('email') is-invalid @enderror" name="email" type="email" required=""  value="{{ old('email') }}">
                              
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input class="input form-control @error('password') is-invalid @enderror" name="password" type="password" required="">
                                        
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
                <button type="submit" class="btn" value="Login">Login</button>
            	<a href="{{ route('register') }}" class="a">Create an account</a>
            </form>
        </div>
    </div>
   
    <script>
        @foreach($errors->all() as $error)
            Notipin.Alert({msg: " {{ $error }} "});
        @endforeach
       
    </script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>


{{-- <!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Login | Upcube - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="{{ asset('backend/assets/css/bootstrap.min.css ') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
          <!-- JAVASCRIPT -->
          <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
          <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
          <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
          <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
          <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
  
          <script src="{{ asset('backend/assets/js/app.js') }}"></script>
    </head>

    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="index.html" class="auth-logo">
                                    <img src="assets/images/logo-dark.png" height="30" class="logo-dark mx-auto" alt="">
                                    <img src="assets/images/logo-light.png" height="30" class="logo-light mx-auto" alt="">
                                </a>
                            </div>
                        </div>
    
                        <h4 class="text-muted text-center font-size-18"><b>Sign In</b></h4>
    
                        <div class="p-3">
                            <form method="POST" class="form-horizontal mt-3" action="{{ route('login') }}" >
                                @csrf
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" required="" placeholder="email" value="{{ old('email') }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" required="" placeholder="Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="form-label ms-1" for="customCheck1">Remember me</label>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="form-group mb-3 text-center row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </div>
    
                                <div class="form-group mb-0 row mt-2">
                                    <div class="col-sm-7 mt-3">
                                        <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                    </div>
                                    <div class="col-sm-5 mt-3">
                                        <a href="{{ route('register') }}" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end -->
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->

      

    </body>
</html> --}}
