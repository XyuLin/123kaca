<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Xenon Boostrap Admin Panel" />
	<meta name="author" content="" />
	
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title> @yield('title') </title>


	<link rel="stylesheet" href="{{ asset('kaca/admin/css/fonts/linecons/css/linecons.css')}}">
	<link rel="stylesheet" href="{{ asset('kaca/admin/css/fonts/fontawesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{ asset('kaca/admin/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{ asset('kaca/admin/css/xenon-core.css')}}">
	<link rel="stylesheet" href="{{ asset('kaca/admin/css/xenon-forms.css')}}">
	<link rel="stylesheet" href="{{ asset('kaca/admin/css/xenon-components.css')}}">
	<link rel="stylesheet" href="{{ asset('kaca/admin/css/xenon-skins.css')}}">
	<link rel="stylesheet" href="{{ asset('kaca/admin/css/custom.css')}}">

	<script src="{{ asset('kaca/admin/js/jquery-1.11.1.min.js')}}"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	
</head>
<body class="page-body">

	<!-- 顶部窗口 -->
	<div class="settings-pane">	
		<a href="#" data-toggle="settings-pane" data-animate="true">&times;</a>
		<div class="settings-pane-inner">	
			<div class="row">
				<div class="col-md-4">
					<div class="user-info">
						<div class="user-image">
							<a href="extra-profile.html">
								<img src="{{ asset('kaca/admin/images/user-2.png')}}" class="img-responsive img-circle" />
							</a>
						</div>
						<div class="user-details">
							<h3>
								<a href="extra-profile.html"> {{ Auth::user()->name }} </a>
								<!-- 登录状态 -->
								<span class="user-status is-online"></span>
							</h3>
							<p class="user-title">Web Developer</p>
							<div class="user-links">
								<a href="{{ route('logout')}}" class="btn btn-warning">退出</a>{{-- 
								<a href="extra-profile.html" class="btn btn-primary">Upgrade</a> --}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--左侧边栏 -->
	<div class="page-container">
		<div class="sidebar-menu toggle-others fixed">
			<div class="sidebar-menu-inner">
				<!-- 边栏顶部 -->	
				<header class="logo-env">
					<!-- logo -->
					<div class="logo">
						<a href="{{ asset('/') }}" class="logo-expanded">
							<img src="{{ asset('kaca/img/logo2.png')}}" width="162" alt="" />
						</a>
						
						<a href="dashboard-1.html" class="logo-collapsed">
							<img src="{{ asset('kaca/img/logo2.png')}}" width="80" alt="" />
						</a>
					</div>
				
					<div class="mobile-menu-toggle visible-xs">
						<a href="#" data-toggle="user-info-menu">
							<i class="fa-bell-o"></i>
							<span class="badge badge-success">7</span>
						</a>
						
						<a href="#" data-toggle="mobile-menu">
							<i class="fa-bars"></i>
						</a>
					</div>
					
					<div class="settings-icon">
						<a href="#" data-toggle="settings-pane" data-animate="true">
							<i class="linecons-cog"></i>
						</a>
					</div>	
				</header>
			
				<!-- 导航栏 -->

				<ul id="main-menu" class="main-menu">
{{-- 					@section('index')
					<li>
						<a href="#" >
							<i class="linecons-cog"></i>
							<span class="title">仪表盘</span>
						</a>
					</li>
					@show
					@section('search')
					<li>
						<a href="#" >
							<i class="linecons-search"></i>
							<span class="title">搜索</span>
						</a>
					</li>
					@show --}}
					@section('upload')
					<li>
						<a href="#" >
							<i class="linecons-star"></i>
							<span class="title">上传</span>
						</a>
						<ul>
							<li>
								<a href="{{ route('upload') }}">
									<span class="title">作品上传</span>
								</a>
							</li>
							<li>
								<a href="{{ route('galleryUp') }}">
									<span class="title">图库上传</span>
								</a>
							</li>
						</ul>
					</li>
					@show
					@section('users')
					<li>
						<a href="#">
							<i class="linecons-user"></i>
							<span class="title">用户信息</span>
						</a>
						<ul>
							<li>
								<a href="{{ route('user') }}">
									<span class="title">用户列表</span>
								</a>
							</li>
							<li>
								<a href=" {{ route('insert') }}">
									<span class="title">用户注册</span>
								</a>
							</li>
						</ul>
					</li>
					@show
					@section('work')
					<li>
						<a href="#">
							<i class="linecons-photo"></i>
							<span class="title">资料信息</span>
						</a>
						<ul>
							<li>
								<a href="{{ route( 'work') }}">
									<span class="title">作品列表</span>
								</a>
							</li>
							<li>
								<a href="{{ route( 'galleryList') }}">
									<span class="title">图库列表</span>
								</a>
							</li>
						</ul>
					</li>
					@show		
				</ul>
						
			</div>
			
		</div>
		
		<!-- 状态信息栏 -->
		<div class="main-content">		
			<nav class="navbar user-info-navbar" role="navigation">
				<!-- 信息栏 -->
				<ul class="user-info-menu left-links list-inline list-unstyled">
					<li class="hidden-sm hidden-xs">
						<a href="#" data-toggle="sidebar">
							<i class="fa-bars"></i>
						</a>
					</li>
					{{-- <li class="dropdown hover-line">
						<a href="#" data-toggle="dropdown">
							<i class="fa-envelope-o"></i>
							<span class="badge badge-green">0</span>
						</a>
						<ul class="dropdown-menu messages">
							<li>	
								<ul class="dropdown-menu-list list-unstyled ps-scrollbar">
									<li class="active">
										<a href="#">
											<span class="line">
												<strong>Luc Chartier</strong>
												<span class="light small">- yesterday</span>
											</span>
											
											<span class="line desc small">
												This ain’t our first item, it is the best of the rest.
											</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="external">
								<a href="blank-sidebar.html">
									<span>All Messages</span>
									<i class="fa-link-ext"></i>
								</a>
							</li>
						</ul>
					</li>
					<li class="dropdown hover-line">
						<a href="#" data-toggle="dropdown">
							<i class="fa-bell-o"></i>
							<span class="badge badge-purple">0</span>
						</a>
							
						<ul class="dropdown-menu notifications">
							<li class="top">
								<p class="small">
									<a href="#" class="pull-right">Mark all Read</a>
									You have <strong>3</strong> new notifications.
								</p>
							</li>
							
							<li>
								<ul class="dropdown-menu-list list-unstyled ps-scrollbar">
									<li class="active notification-success">
										<a href="#">
											<i class="fa-user"></i>
											
											<span class="line">
												<strong>New user registered</strong>
											</span>
											
											<span class="line small time">
												30 seconds ago
											</span>
										</a>
									</li>
								</ul>
							</li>
							
							<li class="external">
								<a href="#">
									<span>View all notifications</span>
									<i class="fa-link-ext"></i>
								</a>
							</li> --}}
						</ul>
					</li>	
				</ul>
				
				
				<!-- 登录设置 -->
				<ul class="user-info-menu right-links list-inline list-unstyled">
					{{-- <li class="search-form">
						<form method="get" action="extra-search.html">
							<input type="text" name="s" class="form-control search-field" placeholder="Type to search..." />
							
							<button type="submit" class="btn btn-link">
								<i class="linecons-search"></i>
							</button>
						</form>
						
					</li> --}}
					<li class="dropdown user-profile">
						<a href="#" data-toggle="dropdown">
							<img src="{{ asset('kaca/admin/images/user-4.png')}}" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
							<span>
								{{ Auth::user()->name }}
								<i class="fa-angle-down"></i>
							</span>
						</a>
						
						<ul class="dropdown-menu user-profile-menu list-unstyled">
							<li>
								<a href="{{ route('upload') }}">
									<i class="fa-edit"></i>
									上传
								</a>
							</li>
							{{-- <li>
								<a href="#settings">
									<i class="fa-wrench"></i>
									Settings
								</a>
							</li>
							<li>
								<a href="#profile">
									<i class="fa-user"></i>
									Profile
								</a>
							</li>
							<li>
								<a href="#help">
									<i class="fa-info"></i>
									Help
								</a>
							</li> --}}
							<li class="last">
								<a href=" {{ route('logout') }} ">
									<i class="fa-lock"></i>
									Logout
								</a>
							</li>
						</ul>
					</li>
					
					<li>
						<a href="#" {{-- data-toggle="chat" --}}>
							<i class="fa-comments-o"></i>
						</a>
					</li>		
				</ul>	
			</nav>

			@yield('content')

			<!-- 版权 -->
			<footer class="main-footer sticky footer-type-1">
				
				<div class="footer-inner">
				
					<!-- Add your copyright text here -->
					<div class="footer-text">
						&copy; 2014 
						<strong>Xenon</strong> 
						More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a>
					</div>
					
					
					<!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
					<div class="go-up">
					
						<a href="#" rel="go-top">
							<i class="fa-angle-up"></i>
						</a>
						
					</div>
					
				</div>
				
			</footer>
		</div>
		
			
		<!-- start: Chat Section -->
		<div id="chat" class="fixed">	
			<div class="chat-inner">		
				<h2 class="chat-header">
					<a href="#" class="chat-close" data-toggle="chat">
						<i class="fa-plus-circle rotate-45deg"></i>
					</a>
					Chat
					<span class="badge badge-success is-hidden">0</span>
				</h2>
				<script type="text/javascript">
					// Here is just a sample how to open chat conversation box
					jQuery(document).ready(function($)
					{
						var $chat_conversation = $(".chat-conversation");
						
						$(".chat-group a").on('click', function(ev)
						{
							ev.preventDefault();
							
							$chat_conversation.toggleClass('is-open');
							
							$(".chat-conversation textarea").trigger('autosize.resize').focus();
						});
						
						$(".conversation-close").on('click', function(ev)
						{
							ev.preventDefault();
							$chat_conversation.removeClass('is-open');
						});
					});
				</script>
				
				<div class="chat-group">
					<strong>Favorites</strong>
					
					<a href="#"><span class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
					<a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
					<a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
					<a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
				</div>
				
				<div class="chat-group">
					<strong>Work</strong>
					
					<a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
				</div>
				<div class="chat-group">
					<strong>Other</strong>
					<a href="#"><span class="user-status is-online"></span> <em>Dennis E. Johnson</em></a>
					<a href="#"><span class="user-status is-online"></span> <em>Stuart A. Shire</em></a>
					<a href="#"><span class="user-status is-online"></span> <em>Janet I. Matas</em></a>
					<a href="#"><span class="user-status is-online"></span> <em>Mindy A. Smith</em></a>
					<a href="#"><span class="user-status is-busy"></span> <em>Herman S. Foltz</em></a>
					<a href="#"><span class="user-status is-busy"></span> <em>Gregory E. Robie</em></a>
					<a href="#"><span class="user-status is-busy"></span> <em>Nellie T. Foreman</em></a>
					<a href="#"><span class="user-status is-busy"></span> <em>William R. Miller</em></a>
					<a href="#"><span class="user-status is-idle"></span> <em>Vivian J. Hall</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Melinda A. Anderson</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Gary M. Mooneyham</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Robert C. Medina</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Dylan C. Bernal</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Marc P. Sanborn</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Kenneth M. Rochester</em></a>
					<a href="#"><span class="user-status is-offline"></span> <em>Rachael D. Carpenter</em></a>
				</div>
			</div>
			<div class="chat-conversation">
				<div class="conversation-header">
					<a href="#" class="conversation-close">
						&times;
					</a>
					<span class="user-status is-online"></span>
					<span class="display-name">Arlind Nushi</span> 
					<small>Online</small>
				</div>
				<ul class="conversation-body">	
					<li>
						<span class="user">Arlind Nushi</span>
						<span class="time">09:00</span>
						<p>Are you here?</p>
					</li>
					<li class="odd">
						<span class="user">Brandon S. Young</span>
						<span class="time">09:25</span>
						<p>This message is pre-queued.</p>
					</li>
					<li>
						<span class="user">Brandon S. Young</span>
						<span class="time">09:26</span>
						<p>Whohoo!</p>
					</li>
					<li class="odd">
						<span class="user">Arlind Nushi</span>
						<span class="time">09:27</span>
						<p>Do you like it?</p>
					</li>
				</ul>
				
				<div class="chat-textarea">
					<textarea class="form-control autogrow" placeholder="Type your message"></textarea>
				</div>
				
			</div>
			
		</div>
		<!-- end: Chat Section -->
	</div>

	@yield('script')
<script type="text/javascript">
		 $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
</script>
</body>
</html>