<!DOCTYPE HTML>
<html>
	<head>
		<title>123kaca - 图库</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{ asset('multiverse/assets/css/main.css')}}" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1 style="font-size:14px;"><a href="/"  ><strong style="font-size:24px;">咔 嚓 鱼</strong>美食摄影工作室</a></h1>
						<nav>
							<ul class="icons">
								<li><a href="#" onClick="javascript :history.back(-1);" class="icon fa-arrow-circle-left"></a></li>
								<li><a href="{{ url('likes/'.$work->id)}}" @if($work->judge == false) class="icon fa-heart" @else class="icon fa-heart" style="color:rgb(239, 9, 105);" @endif ></a></li>
								<li><a href="/" class="icon fa-home"></a></li>
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<div id="main">

						@if($album->count() == 0 )
							<article class="thumb">
								<a href="#" class="image"><img src="{{ asset('Kaca/img/sor.jpg') }}" alt="" width="250px" /></a>
							<h2>暂时没有此类照片</h2>
						</article>
						@else
						@foreach($album as $key => $img)
							<article class="thumb">
								<a href="/{{ $img->path }}" class="image"><img src="/thumb/{{ $img->path }}" alt="" oncontextmenu="return false;" /></a>
								<h2>{{ $work->customer }}</h2>
							</article>
						@endforeach
						@endif
					</div>
	
			</div>

		<!-- Scripts -->
			<script src="{{ asset('multiverse/assets/js/jquery.min.js') }}"></script>
			<script src="{{ asset('multiverse/assets/js/jquery.poptrox.min.js') }}"></script>
			<script src="{{ asset('multiverse/assets/js/skel.min.js') }}"></script>
			<script src="{{ asset('multiverse/assets/js/util.js') }}"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="{{ asset('multiverse/assets/js/main.js') }}"></script>

	</body>
</html>
