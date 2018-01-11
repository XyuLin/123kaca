<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>123kaca - 美食摄影工作室</title>
  
    <link rel="stylesheet" type="text/css" href="{{ asset('kaca/css/index.css') }}">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('kaca/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ asset('kaca/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{ asset('kaca/css/agency.min.css') }}" rel="stylesheet">

  <style>
    
    ::-webkit-input-placeholder {
      color: red;
    }
    :-moz-placeholder {/* Firefox 18- */
      color: red;
    }
    ::-moz-placeholder{/* Firefox 19+ */
     color: red;
    }
    :-ms-input-placeholder {
      color: red;
    }

  </style>
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/">123 kaca </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
               <a class="nav-link js-scroll-trigger" href="#news-works">案例</a>
            </li>
            <li class="nav-item">
               <a class="nav-link js-scroll-trigger" href="#services">服务</a>
            </li>
            <li class="nav-item">
               <a class="nav-link js-scroll-trigger" href="#fine-works">优秀案例</a>
            </li>
            <li class="nav-item">
               <a class="nav-link js-scroll-trigger" href="#contact">联系</a>
            </li>
            <li class="nav-item">
               <a class="nav-link js-scroll-trigger" href="https://shop350644474.taobao.com"  target="view_window">淘宝</a>
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

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">咔嚓鱼美食摄影工作室</div>
          <div class="intro-lead-in text-uppercase">· 1 2 3 咔 嚓 ·</div>
          <a class="btn btn-info btn-xl text-uppercase js-scroll-trigger" style="border-radius:50px" href="#news-works">你好</a>
        </div>
      </div>
    </header>

   <!-- Portfolio Grid -->
    <section  id="news-works">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">最新案例</h2>
            <h3 class="section-subheading text-muted"><a href="{{ route('type')}}"  style="color:#868e96;"> more</a></h3>
          </div>
        </div>
        <div class="row">

          @foreach( $workList as $work)
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" href="{{ url('work/'.$work->id) }}">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="thumb/{{ $work->image }} " alt="">
            </a>
            <div class="portfolio-caption">
              <h4>{{ $work->customer }}</h4>
              <p class="text-muted">{{ $work->describe }} </p>
            </div>
          </div>
          @endforeach
        </div>
        <!-- weixin -->
        <div class="row">
            <div class="col-md-12 wx-bg"></div>
        </div>
      </div>
    </section>

    <!-- Services -->
    <section class="bg-light" id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">素材下载</h2>
            <h3 class="section-subheading text-muted"></h3>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-3">
            <a href="{{ route('gallery') }}">
              <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa fa-file-image-o fa-stack-1x fa-inverse"></i>
              </span>
            </a>
            <h4 class="service-heading">图片素材</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto.</p>
          </div>
          <div class="col-md-3">
            <a href="#">
              <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
              </span>
            </a>
            <h4 class="service-heading">海报模版</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto.</p>
          </div>
          <div class="col-md-3">
            <a href="#">
              <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa fa-book fa-stack-1x fa-inverse"></i>
              </span>
            </a>
            <h4 class="service-heading">菜单模版</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto.</p>
          </div>
           <div class="col-md-3">
            <a href="{{ route('type') }}">
              <span class="fa-stack fa-4x">
                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa fa-font fa-stack-1x fa-inverse"></i>
              </span>
            </a>
            <h4 class="service-heading">特效字体模版</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- fine-works -->
       <section  id="fine-works">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">优秀作品</h2>
            <h3 class="section-subheading text-muted"><a href="{{ route('type')}}" style="color:#868e96;"> more</a></h3>
          </div>
        </div>
        <div class="row">
          @foreach($hotList as $hot)
          <div class="col-md-4 col-sm-6 portfolio-item">
           <a class="portfolio-link" href="{{ url('work/'.$hot->id) }}">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="thumb/{{ $hot->image }}" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>{{ $hot->customer }}</h4>
              <p class="text-muted">{{ $hot->describe }} </p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">联系我们</h2>
            <h3 class="section-subheading" style="color:#fff;">咔嚓鱼美食摄影工作室</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="contactForm" name="sentMessage" novalidate>
              <div class="row">
                <div class="col-md-6 offset-md-3">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" value="咔嚓鱼美食摄影工作室" disabled > 
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" value="邮箱：lilinphp@163.com "  disabled >
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" value="手机号：13734715267"  disabled >
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit" disabled >联系我们吧！</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; Your Website 2017</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="https://shop350644474.taobao.com" target="view_window">
                  <i class="fa fa-shopping-cart "></i>
                </a>
              </li>
              {{-- <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li> --}}
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
    <script src="{{ asset('kaca/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('kaca/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ asset('kaca/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Contact form JavaScript -->
    <script src="{{ asset('kaca/js/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('kaca/js/contact_me.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('kaca/js/agency.min.js') }}"></script>

  </body>

</html>
