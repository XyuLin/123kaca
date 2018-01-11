<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>123kaca - {{ $info->title }}</title>

   <!-- Bootstrap core CSS -->
    <link href="{{ asset('Kaca/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{ asset('kaca/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{ asset('Kaca/css/1-col-portfolio.css')}}" rel="stylesheet">

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
      .container {
        font-family: Montserrat,'Helvetica Neue',Helvetica,Arial,sans-serif;
      }
    </style>
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/">123 kaca </a>
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
         <li class="breadcrumb-item">
            <a href="{{ route('gallery') }}">图库</a>
        </li>
        <li class="breadcrumb-item active">{{ $info->title }}</li>
      </ol>

      <!-- Portfolio Item Row -->
      <div class="row">

        <div class="col-md-8">
          <img class="img-fluid" src="/{{ $info->image }}" alt="">
        </div>

        <div class="col-md-4">
          <h3 class="my-3">{{ $info->title }}</h3>
          <p>{{ $info->desc }}</p>
          <h3 class="my-3">素材上传详情</h3>
          <ul>
            <li>作者：{{ $info->user_id }}</li>
            <li>素材类型：{{ $info->type }}</li>
            <li>下载链接：{{ $info->url }}</li>
            <li>密码：{{ $info->cipher }}</li>
            <li>上传时间：{{ $info->created_at }}</li>
          </ul>
        </div>

      </div>
      <!-- /.row -->

      <!-- Related Projects Row -->
      <h3 class="my-4">相关素材</h3>
      <div class="row">
        @if($relate->isEmpty())
          <div class="col-md-3 col-sm-6 mb-4">
            <span>暂时没有相关素材..</span> 
          </div>
        @else
          @foreach($relate as $key => $value)
           <div class="col-md-3 col-sm-6 mb-4">  
            <a href="{{ url('gallery/'.$value->id)}}">
              <img class="img-fluid" src="/{{ $value->image }}" alt="">
            </a>
           <span style="text-align: center; display: block; font-size:14px; color: #000;">{{ $value->title }}</span>
          </div>
          @endforeach     
        @endif

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

     <!-- Footer -->
    <footer style="background-color:#343a40;">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright" style="color:#fff;">Copyright &copy; Your Website 2017</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="https://shop350644474.taobao.com" target="view_window">
                  <i class="fa fa-shopping-cart "></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                Privacy Policy
              </li>
              <li class="list-inline-item">
                Terms of Use
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('Kaca/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('Kaca/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  </body>

</html>
