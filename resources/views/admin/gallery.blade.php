@extends('layouts.admin');

@section('title','图库填充')
@section('upload')
<li class="opened active">
	<a href="#" >
		<i class="linecons-star"></i>
		<span class="title">上传</span>
	</a>
	<ul>
		<li >
			<a href="{{ route('upload') }}">
				<span class="title">作品上传</span>
			</a>
		</li>
		<li class="active">
			<a href="{{ route('galleryUp') }}">
				<span class="title">图库上传</span>
			</a>
		</li>
	</ul>
</li>
@endsection

@section('content')
	
		<!-- <div class="panel panel-default">
			
				<div class="panel-heading">
					<div class="panel-title">
						上传作品
					</div>
				</div>
				
				<div class="panel-body">
					
				
					<form action="{:url('tables/upload')}" class="dropzone"></form>
					
				</div>
			</div> -->
	


			<div class="panel panel-default">
			
				<div class="panel-heading">
					<h3 class="panel-title">
						图库填充 <small>上传每一组素材信息</small>
					</h3>
				</div>
				
				<div class="panel-body">
					
					<script type="text/javascript">
					
						jQuery(document).ready(function($)
						{
							var i = 1,
								$example_dropzone_filetable = $("#example-dropzone-filetable"),
								example_dropzone = $("#advancedDropzone").dropzone({
								url: "{{ url('galleryUp') }}",
								
								// Events
								addedfile: function(file)
								{
									if(i == 1)
									{
										$example_dropzone_filetable.find('tbody').html('');
									}
									
									var size = parseInt(file.size/1024, 10);
									size = size < 1024 ? (size + " KB") : (parseInt(size/1024, 10) + " MB");
									
									var	$el = $('<tr>\
													<td class="text-center">'+(i++)+'</td>\
													<td>'+file.name+'</td>\
													<td><div class="progress progress-striped"><div class="progress-bar progress-bar-warning"></div></div></td>\
													<td>'+size+'</td>\
													<td>上传中...</td>\
												</tr>');
									
									$example_dropzone_filetable.find('tbody').append($el);
									file.fileEntryTd = $el;
									file.progressBar = $el.find('.progress-bar');
								},
								
								uploadprogress: function(file, progress, bytesSent)
								{
									file.progressBar.width(progress + '%');
								},
								
								success: function(file,data)
								{
									//alert(data.name);

								var $img =
									'<div class="form-group">' + 
										'<label class="col-sm-2 control-label">' + '作品图' + '</label>' +
										
										'<div class="col-sm-10">' +
											'<input type="text" name="image" class="form-control" value="'
											+ data +'" readonly>'+
										'</div>'+
									'</div>';
									$("#form").find(".form-group-separator").before($img);

									file.fileEntryTd.find('td:last').html('<span class="text-success">上传成功</span>');
									file.progressBar.removeClass('progress-bar-warning').addClass('progress-bar-success');
								},
								
								error: function(file)
								{
									file.fileEntryTd.find('td:last').html('<span class="text-danger">失败</span>');
									file.progressBar.removeClass('progress-bar-warning').addClass('progress-bar-red');
								}
							});
							
							$("#advancedDropzone").css({
								minHeight: 200
							});
			
						});
					</script>
					
					<br />
					<div class="row">
						<div class="col-sm-3 text-center">
						
							<form id="advancedDropzone" class="droppable-area">
								{{ csrf_field() }}
								可以拖放文件
							</form>
							
						</div>
						<div class="col-sm-9">
							
							<table class="table table-bordered table-striped" id="example-dropzone-filetable">
								<thead>
									<tr>
										<th width="1%" class="text-center">#</th>
										<th width="50%">名称</th>
										<th width="20%">上传进度</th>
										<th>图片大小</th>
										<th>状态</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td colspan="5">文件列表将出现在这里</td>
									</tr>
								</tbody>
							</table>

						</div>
					</div>
				</div>
				<div class="panel-body">
		@empty($info)					
							<form role="form" id="form" action=" {{ route('sendInfo') }} " class="form-horizontal validate" method="post">
								{{ csrf_field() }}
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">素材名称</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" name="title"  data-validate="required|max:400"  placeholder="素材名称">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">素材描述</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" name="desc"  data-validate="required|max:400"  placeholder="素材描述">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">下载地址</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" name="url"  data-validate="required|max:400"  placeholder="下载地址">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">提取密码</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" name="cipher"  data-validate="required|max:8"  placeholder="提取密码">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">素材类型</label>
									
									<div class="col-sm-10">
										
										<div class="form-block">
											@foreach($typelist as $key => $type )
											<label class="col-sm-2">
												<input type="radio" name="type" class="cbr cbr-info" value="{{ $key }}" @if($loop->first) checked @endif>{{ $type }}				
											</label>				
											@endforeach			
										</div>
										
									</div>
								</div>

								<div class="form-group-separator"></div>
								
								<div class="form-group">
									<div class="col-sm-2 ">
										<button type="submit" class="btn btn-info pull-right">提交</button>
									</div>
								</div>
							</form>	
		@endempty
		@isset($info)

					<form role="form" id="form" action=" {{ url('editGallery/'.$info->id) }} " class="form-horizontal validate" method="post">
								{{ csrf_field() }}
								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">素材名称</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" name="title"  data-validate="required|max:400"  placeholder="素材名称" value="{{ $info->title }}">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">素材描述</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" name="desc"  data-validate="required|max:400"  placeholder="素材描述" value="{{ $info->desc }}">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">下载地址</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" name="url"  data-validate="required|max:400"  placeholder="下载地址" value="{{ $info->url }}">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label" for="field-1">提取密码</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" name="cipher"  data-validate="required|max:8"  placeholder="提取密码" value="{{ $info->cipher }}">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">素材类型</label>
									
									<div class="col-sm-10">
										
										<div class="form-block">
											@foreach($typelist as $key => $type )
											<label class="col-sm-2">
												<input type="radio" name="type" class="cbr cbr-info" value="{{ $key }}" @if($info->type == $key) checked @endif>{{ $type }}				
											</label>				
											@endforeach		
										</div>
										
									</div>
								</div>
								
								@if($info->image != '')
								<div class="form-group">
									<label class="col-sm-2 control-label">以传图片</label>
									<div class="col-sm-2" style="margin-top: 10px;">
										<img src="/{{ $info->image }}" width="100%">
										<a href="{{ url('delimage/'.$info->id) }}"><span class="btn btn-info" style="display: block;" >删除</span></a>
									</div>
								</div>
								@endif


								<div class="form-group-separator"></div>
								
								<div class="form-group">
									<div class="col-sm-2 ">
										<button type="submit" class="btn btn-info pull-right">修改</button>
									</div>
								</div>
							</form>	
		@endisset
				</div>
			</div>
@endsection
	
	
	

@section('script')
	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="{{ asset('kaca/admin/js/dropzone/css/dropzone.css') }}">

	<!-- Bottom Scripts -->
	<script src="{{ asset('kaca/admin/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('kaca/admin/js/TweenMax.min.js') }}"></script>
	<script src="{{ asset('kaca/admin/js/resizeable.js') }}"></script>
	<script src="{{ asset('kaca/admin/js/joinable.js') }}"></script>
	<script src="{{ asset('kaca/admin/js/xenon-api.js') }}"></script>
	<script src="{{ asset('kaca/admin/js/xenon-toggles.js') }}"></script>


	<!-- Imported scripts on this page -->
	<script src="{{ asset('kaca/admin/js/dropzone/dropzone.min.js') }}"></script>
		<!-- Imported scripts on this page -->
	<script src="{{ asset('kaca/admin/js/jquery-validate/jquery.validate.min.js') }}"></script>

	<!-- JavaScripts initializations and stuff -->
	<script src="{{ asset('kaca/admin/js/xenon-custom.js') }}"></script>
@endsection

