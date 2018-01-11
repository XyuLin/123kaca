<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>123kaca - 美食摄影工作室</title>

    <link rel="stylesheet" href="{{asset('phantom/assets/css/main.css') }}" />
  </head>

  <body id="page-top">

    
    <!-- Wrapper -->
      <div id="wrapper">
          <!-- Header -->
          <header id="header">
            <div class="inner">

              <!-- Logo -->
                <a href="/" class="logo">
                  <span class="symbol"><img src="{{ asset('phantom/images/logo.svg') }} " alt="" /></span><span class="title">咔嚓鱼</span>
                </a>

              <!-- Nav -->
                <nav>
                  <ul>
                    <li><a href="#menu">Menu</a></li>
                  </ul>
                </nav>

            </div>
          </header>

        <!-- Menu -->
          <nav id="menu">
            <h2>菜单</h2>
            <ul>
              <li><a href="{{ url('/') }}">首页</a></li>
              <li><a href="{{ route('gallery') }}">素材</a></li>
              <li><a href="https://shop350644474.taobao.com">淘宝</a></li>
            </ul>
          </nav>
        <!-- Main -->
          <div id="main">
            <div class="inner">
            
              <section class="tiles">
                <article class="style6">
                  <span class="image">
                    <img src="phantom/images/pic01.jpg" alt="" />
                  </span>
                  <a href="{{ url('works') }}">
                    <h2>全部</h2>
                    <div class="content">
                      <p></p>
                    </div>
                  </a>
                </article>
                @foreach($typeList as $key => $type)
                <article class="style{{$key+1}}">
                  <span class="image">
                    <img src="phantom/images/pic02.jpg" alt="" />
                  </span>
                  <a href="{{ url('food/'.$key)}}">
                    <h2>{{ $type}}</h2>
                    <div class="content">
                      <p></p>
                    </div>
                  </a>
                </article>
                @endforeach
              </section>
            </div>
          </div>
      </div>
    <script src="{{ asset('phantom/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('phantom/assets/js/skel.min.js') }}"></script>
    <script src="{{ asset('phantom/assets/js/util.js') }}"></script>
    <script src=" {{ asset('phantom/assets/js/main.js') }}"></script>

</body>
</html>
