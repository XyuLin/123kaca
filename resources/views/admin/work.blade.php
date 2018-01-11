@extends('layouts.admin')

@section('title', '作品列表')

@section('work')
<li class="opened active">
	<a href="#">
		<i class="linecons-photo"></i>
		<span class="title">作品信息</span>
	</a>
	<ul>
		<li class="active">
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
@endsection

@section('content')
<!-- 数据表 -->
<div class="page-title">
	<div class="title-env">
		<h1 class="title">作品信息表</h1>
		<p class="description">Work information table</p>
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
			<a href=" {{ route('upload') }} " class="btn btn-success" style="color:#fff">
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
					<th>摄影师</th>
					<th>客户</th>
					<th>作品描述</th>
					<th>作品风格</th>
					<th>点赞人数</th>
					<th>拍摄时间</th>
				</tr>
			</thead>

			<tfoot>
				<tr>
					<th>序列</th>
					<th>摄影师</th>
					<th>客户</th>
					<th>作品描述</th>
					<th>作品风格</th>
					<th>点赞人数</th>
					<th>拍摄时间</th>
				</tr>
			</tfoot>

			<tbody>
				@foreach($lists as $list)	
					<tr>
						<td><a href="{{ url('editW/'.$list->id) }}" >{{ $list->id }} </a></td>
						<td> {{ $list->user_id }} </td>
						<td> {{ $list->customer }} </td>
						<td> {{ $list->describe }} </td>
						<td> {{ $list->type }} </td>
						<td> {{ $list->count }} </td>
						<td> {{ $list->created_at }} </td>
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