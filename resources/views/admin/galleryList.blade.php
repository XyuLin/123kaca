@extends('layouts.admin')

@section('title', '图库素材列表')

@section('work')
<li class="opened active">
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
		<li class="active">
			<a href="{{ route( 'galleryList') }}">
				<span class="title">图库列表</span>
			</a>
		</li>
	</ul>
</li>
@endsection

@section('content')
<!-- 数据表 -->
<div class="page-title">
	<div class="title-env">
		<h1 class="title">美食图库列表</h1>
		<p class="description">GalleryList</p>
	</div>

	<div class="breadcrumb-env">
		<ol class="breadcrumb bc-1">
			<li>
				<a href="#"><i class="fa-home"></i>主页</a>
			</li>
			<li>
				<a href="#">作品信息</a>
			</li>
			<li class="active">
				<strong>作品列表</strong>
			</li>
		</ol>
	</div>

</div>

<!-- Table exporting -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">作品信息表</h3>
		<div class="panel-options">
			<a href=" {{ route('galleryUp') }} " class="btn btn-success" style="color:#fff">
			上传作品
			</a>
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
		<script type="text/javascript">
			jQuery(document).ready(function($)
			{
			$("#example-4").dataTable({
			dom: "<'row'<'col-sm-5'l><'col-sm-7'Tf>r>"+
			"t"+
			"<'row'<'col-xs-6'i><'col-xs-6'p>>",
			tableTools: {
			sSwfPath: "/static/mstp/assets/js/datatables/tabletools/copy_csv_xls_pdf.swf"
			}
			});
			});
		</script>

		<table class="table table-bordered table-striped" id="example-4">
			<thead>
				<tr>
					<th>序列</th>
					<th>上传用户</th>
					<th>类型</th>
					<th>image</th>
					<th>素材名称</th>
					<th>素材描述</th>
					<th>上传时间</th>
					<th>删除</th>
				</tr>
			</thead>

			<tfoot>
				<tr>
					<th>序列</th>
					<th>上传用户</th>
					<th>类型</th>
					<th>image</th>
					<th>素材名称</th>
					<th>素材描述</th>
					<th>上传时间</th>
					<th>删除</th>
				</tr>
			</tfoot>

			<tbody>
				@foreach($lists as $list)	
					<tr>
						<td class="text-center"><a href="{{ url('editG/'.$list->id) }}"> {{ $list->id }} </td></a>
						<td> {{ $list->user_id }} </td>
						<td> {{ $list->type }} </td>
						<td> <img src="thumb/{{ $list->image }}"/> </td>
						<td> {{ $list->title }} </td>
						<td> {{ $list->desc }} </td>
						<td> {{ $list->created_at }} </td>
						<td class="text-center"><a style="color: #c13e6d;" href="{{ route('destroyGallery',$list) }}"> 删除 </td></a>
					</tr>				
				@endforeach
			</tbody>
		</table>
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


	<link rel="stylesheet" href="{{ asset('kaca/admin/js/datatables/dataTables.bootstrap.css') }}">

	<script src=" {{ asset('kaca/admin/js/datatables/js/jquery.dataTables.min.js') }}"></script>


	<!-- Imported scripts on this page -->
	<script src="{{ asset('kaca/admin/js/datatables/dataTables.bootstrap.js') }}"></script>
	<script src="{{ asset('kaca/admin/js/datatables/yadcf/jquery.dataTables.yadcf.js') }}"></script>
	<script src="{{ asset('kaca/admin/js/datatables/tabletools/dataTables.tableTools.min.js') }}"></script>

	<!-- JavaScripts initializations and stuff -->
	<script src="{{ asset('kaca/admin/js/xenon-custom.js')}}"></script>
@endsection
