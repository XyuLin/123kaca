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
                <a href="/type" class="logo">
                  <span class="symbol"><img src="{{ asset('phantom/images/logo.svg') }} " alt="" /></span><span class="title">{{ $typeName }}</span>
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
               <li><a href="{{ url('type') }}">分类</a></li>
            </ul>
          </nav>
        <!-- Main -->
          <div id="main">
            <div class="inner">
            
              <section class="tiles">
                @foreach($list as $key => $value)
                <article >
                  <span class="image">
                    <img src="/thumb/{{ $value->image }}" alt="" />
                  </span>
                  <a href="{{ url('work/'.$value->id) }}">
                    <h2>{{ $value->customer }}</h2>
                    <div class="content">
                      <p>{{ $value->describe }}</p>
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
