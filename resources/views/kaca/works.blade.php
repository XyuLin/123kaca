<!DOCTYPE HTML>
<!--
	Multiverse by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
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
						<h1 style="font-size:14px;"><a href="/"><strong style="font-size:24px;">咔 嚓 鱼</strong>美食摄影工作室</a></h1>
						<nav>
							<ul>
								<li><a href="{{ url('works') }}" @if(Request::route('type') == '' ) style="color:#fec503;"  @endif)>全部</a></li>
								@foreach($typeList as $k => $type)
									<li><a href="{{ url('works/'.$k) }}" @if(Request::route('type') === "$k") style="color:#fec503;"  @endif)>{{ $type }}</a></li>
								@endforeach
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<div id="main">

						@if($all->count() == 0 )
							<article class="thumb">
								<a href="#" class="image"><img src="{{ asset('Kaca/img/sor.jpg') }}" alt="" width="250px" /></a>
							<h2>暂时没有此类照片</h2>
						</article>
						@else
						@foreach($all as $value)
							<article class="thumb">
								<a href="/{{ $value }}" class="image"><img src="/thumb/{{ $value }}" alt="" oncontextmenu="return false;" /></a>
								<h2>Magna feugiat lorem</h2>
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