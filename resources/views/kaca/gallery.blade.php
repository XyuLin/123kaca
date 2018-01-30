<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>123kaca - 素材图库</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('kaca/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{ asset('kaca/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{ asset('kaca/css/1-col-portfolio.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
    <link href="{{ asset('kaca/css/agency.min.css') }}" rel="stylesheet">

    <style>
     .breadcrumb a{
          color:#0056b3;
      }
      .breadcrumb a:hover{
            color: #0056b3;
            text-decoration: none;
      }
  
      .container .btn-primary{
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
      }
      .container {
        font-family: Montserrat,'Helvetica Neue',Helvetica,Arial,sans-serif;
      }
    </style>
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{ url('/')}}">123 kaca </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ url('/') }}">首页</a>
            </li>
            <li class="nav-item">
               <a class="nav-link js-scroll-trigger" href="{{ route('type') }}">图库</a>
            </li>
            <li class="nav-item">
               <a class="nav-link js-scroll-trigger" href="https://shop350644474.taobao.com">淘宝</a>
            </li>
            <li class="nav-item"> 
              
            @auth
                <a class="nav-link js-scroll-trigger" href="/user">{{ Auth::user()->name }}</a>
            @endauth

            @guest
               <a class="nav-link js-scroll-trigger" href="/login">登录</a>
            @endguest
              
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

       <h1 class="mt-4 mb-3">
        <small>图片素材</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/">首页</a>
        </li>
        <li class="breadcrumb-item active">图库</li>
      </ol>

      <!-- Project One -->
      @foreach($lists as $key => $value)
      <div class="row">
        <div class="col-md-7">
          <a href="{{ url('gallery/'.$value->id) }}">
            <img class="img-fluid rounded mb-3 mb-md-0" src="/{{ $value->image }}" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3>{{ $value->title }}</h3>
          <p>{{ $value->desc }}</p>
          <a class="btn btn-primary" href="{{ url('gallery/'.$value->id) }}">预览/下载</a>
        </div>
      </div>

      <hr>
      @endforeach
      <hr>

      <!-- Pagination -->
      {{ $lists->links('vendor.pagination.bootstrap-4') }}
    </div>
    <!-- /.container -->

     <!-- Footer -->
    <footer style="background-color:#343a40;">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <span class="copyright" style="color:#fff;">Copyright © 2018 杭州摄手科技有限公司, All Rights Reserved</span>
          </div>
          <div class="col-md-2">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="https://shop350644474.taobao.com" target="view_window">
                  <i class="fa fa-shopping-cart "></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-5">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                备案号：浙ICP备16031327号
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('kaca/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{asset('kaca/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  </body>

</html>
