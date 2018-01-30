<!DOCTYPE HTML>
<!--
	Lens by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>123kaca - {{ $work->customer }}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{ asset('lens/assets/css/main.css') }}" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="{{ asset('lens/assets/css/noscript.css') }}" /></noscript>
	</head>
	<body class="is-loading-0 is-loading-1 is-loading-2">

		<!-- Main -->
			<div id="main">

				<!-- Header -->
					<header id="header">
						<h1>{{ $work->customer }}</h1>
						<p>{{ $work->describe }} </p>
						<p>
							作者：{{ $work->user_id }}<br/>
							风格：{{ $work->typeName }}<br/>
							喜欢它的：{{ $work->count }}<br/>
							上传时间：{{ str_before($work->created_at,' ') }} 
						</p>
						
						<ul class="icons">
							{{-- <li><a href="#" class="icon fa-heart-o"><span class="label">heart</span></a></li> --}}
							<li><a href="#" onClick="javascript :history.back(-1);" class="icon fa-hand-o-left"></a></li>
								
							<li><a href="{{ url('likes/'.$work->id)}}" @if($work->judge == false) class="icon fa-thumbs-o-up" @else class="icon fa-thumbs-up" style="color:#00D3B7;" @endif ></a></li>

							<li><a href="{{ route('type')}}" class="icon fa-image"></a></li>
							<li><a href="/" class="icon fa-home"></a></li>
						</ul>
					</header>

				<!-- Thumbnail -->
					<section id="thumbnails">
						@foreach($album as $key => $img)
						<article>
							<a class="thumbnail" href="/{{ $img->path }}" data-position="center center"><img src="/thumb/{{ $img->path }}" alt="" /></a>
							<h2>{{ $work->customer }}</h2>
						</article>
						@endforeach
					</section>

				<!-- Footer -->
					<footer id="footer">
						<ul class="copyright">
							<li>Copyright © 2018 杭州摄手科技有限公司, All Rights Reserved</li>
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="{{ asset('lens/assets/js/jquery.min.js') }}"></script>
			<script src="{{ asset('lens/assets/js/skel.min.js')}}"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="{{ asset('lens/assets/js/main.js')}}"></script>

	</body>
</html>
