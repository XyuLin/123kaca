@extends('layouts.admin')

@section('title','用户注册')

@section('users')
<li class="opened active">
	<a href="#">
		<i class="linecons-user"></i>
		<span class="title">用户信息</span>
	</a>
	<ul>
		<li>
			<a href="{{ route( 'user') }}">
				<span class="title">用户列表</span>
			</a>
		</li>
		<li class="active">
			<a href=" {{ route('insert') }}">
				<span class="title">用户注册</span>
			</a>
		</li>
	</ul>
</li>
@endsection

@section('content')
			<!-- Responsive Table -->
			<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">用户注册</h1>
					<p class="description">User registration table</p>
				</div>
				
				<div class="breadcrumb-env">
					<ol class="breadcrumb bc-1">
						<li>
							<a href="#"><i class="fa-home"></i>主页</a>
						</li>
						<li>
							<a href="#">用户信息</a>
						</li>
						<li class="active">
							<strong>用户注册</strong>
						</li>
					</ol>			
				</div>
					
			</div>
			<div class="row">
				<div class="col-sm-12">
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">添加用户信息</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								<a href="#" data-toggle="remove">
									&times;
								</a>
							</div>
						</div>
						<div class="panel-body">
					
							<form role="form" action="/insert" class="form-horizontal validate" method="post">
								{{ csrf_field() }}
								<div class="form-group @if($errors->has('name')) validate-has-error @endif ">
									<label class="col-sm-2 control-label" for="field-11">用户昵称</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" name="name" data-validate="required" placeholder="用户昵称">
 										@if ($errors->has('name'))
											<span id="lar_error" class="validate--error">
												{{ $errors->first('name') }}
											</span>
										@endif
									</div>
								</div>

								<div class="form-group-separator"></div>
						
								<div class="form-group @if ($errors->has('email')) validate-has-error @endif">
									<label class="col-sm-2 control-label" for="field-1">邮箱</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" name="email"  data-validate="email"  placeholder="邮箱">
										@if ($errors->has('email'))
											<span id="lar_error" class="validate--error">
												{{ $errors->first('email') }}
											</span>
										@endif
									</div>


								</div>

								<div class="form-group-separator"></div>

								<div class="form-group @if ($errors->has('password'))  validate-has-error @endif">
									<label class="col-sm-2 control-label" for="field-5">登录密码</label>
									
									<div class="col-sm-10">
										<input type="password" class="form-control" name="password"  data-validate="required"  placeholder="登录密码">
										@if ($errors->has('password'))
											<span id="lar_error" class="validate--error">
												{{ $errors->first('password') }}
											</span>
										@endif
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group @if ($errors->has('password_confirmation')) validate-has-error @endif ">
									<label class="col-sm-2 control-label" for="field-5">重复密码</label>
									
									<div class="col-sm-10">
										<input type="password" class="form-control" name="password_confirmation"  data-validate="required"  placeholder="重复密码">
										@if ($errors->has('password_confirmation'))
											<span id="lar_error" class="validate--error">
												{{ $errors->first('password_confirmation') }}
											</span>
										@endif
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group">
									<div class="col-sm-2 ">
										<button type="submit" class="btn btn-info pull-right">提交</button>
									</div>
								</div>
							</form>	
						</div>
					</div>
				</div>
			</div>	
@endsection

	
	
	

@section('script')

	<!-- Bottom Scripts -->
	<script src="{{ asset('kaca/admin/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('kaca/admin/js/TweenMax.min.js')}}"></script>
	<script src="{{ asset('kaca/admin/js/resizeable.js')}}"></script>
	<script src="{{ asset('kaca/admin/js/joinable.js')}}"></script>
	<script src="{{ asset('kaca/admin/js/xenon-api.js')}}"></script>
	<script src="{{ asset('kaca/admin/js/xenon-toggles.js')}}"></script>

	<script src=" {{ asset('kaca/admin/js/jquery-validate/jquery.validate.min.js') }}   "></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="{{ asset('kaca/admin/js/xenon-custom.js')}}"></script>
@endsection