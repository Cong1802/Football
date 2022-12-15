
<!doctype html>
<html lang="en">

<head>
    <title>Error Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i%7CMerriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">


    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome Stylesheet -->
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Custom Stylesheets -->
    <link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/orange.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
</head>


<body>

    <!--====== LOADER =====-->
    <div class="loader"></div>

    <div class="position-relative page404">
        <img src="{{ asset('public/frontend/images/004.jpg') }}">
        <div class="d-flex text-center">
            <a href="{{ URL::to('/') }}" class="btn">Trở về trang chủ</a>
        </div>
    </div>
    
    <script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/custom-navigation.js')}}"></script>
</body>

</html>
