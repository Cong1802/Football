<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>ADMIN LOGIN</title>

    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Style -->
    <link rel="stylesheet" href="{{asset('public/backend/css/snow-login.css')}}" type="text/css" media="all" />
</head>

<body>
    <!-- login form -->
    <section class="w3l-login">
        <div class="overlay">
            <div class="wrapper">
                <div class="logo">
                    <a class="brand-logo" href="index.html">DHNT FOOTBALL</a>
                </div>
                <div class="form-section">
                    <h3>ĐĂNG NHẬP</h3>
                    <h6>QUẢN LÝ SÂN BÓNG</h6>
                    	<?php
                        $message = Session::get('message');
                        if($message){
                            echo '<span class="text-alert">'.$message.'</span>';
                            Session::put('message',null);
                        }
                        ?>
                    <form action="{{URL::to('admin/admin-dashboard')}}" method="post" class="signin-form">
                    {{ csrf_field() }}
                        <div class="form-input">
                            <input type="email" name="admin_email" placeholder="Email" required="" autofocus>
                        </div>
                        <div class="form-input">
                            <input type="password" name="admin_password" placeholder="Password" required="">
                        </div>
                        <label class="check-remaind">
							<input type="checkbox">
							<span class="checkmark"></span>
							<p class="remember">Giữ đăng nhập</p>
						</label>
                        <button type="submit" name="login" class="btn btn-primary theme-button mt-4">Đăng Nhập</button>
                        {{-- <div class="new-signup">
                            <a href="#reload" class="signuplink">Forgot username or password?</a>
                        </div> --}}
                    </form>
                    {{-- <p class="signup">Don’t have account yet? <a href="#signup.html" class="signuplink">Sign Up</a></p> --}}
                </div>
            </div>
        </div>
        <div id='stars'></div>
        <div id='stars2'></div>
        <div id='stars3'></div>

    </section>

    <!-- /login form -->
</body>

</html>