@extends('templates.admin.master')
@section('content')
@include('templates.admin.sumary')
<br>
<div class="container panel">
	<h4 class="text-danger"><i class="fa fa-plus" aria-hidden="true"></i>Thống kê việc làm</h4>
	<div class="panel panel-default">
	  <div class="panel-body">
	    <div style="height: 450px"></div>
	  </div>
	 </div>
</div>
<div class="container panel">
	<br>
	<div class="col-sm-6" style="padding:0px">
		<ul class="nav nav-tabs">
		  <li class="active"><a data-toggle="tab" href="#home">Hôm nay</a></li>
		  <li><a data-toggle="tab" href="#menu1">Hôm qua</a></li>
		</ul>

		<div class="tab-content">
		  <div id="home" class="tab-pane fade in active">
		    <h4 class="text-success">Hôm nay</h4>
			<ul class="list-group">
			  <li class="list-group-item list-group-item-success">
			    <span class="badge">14</span><a href="">Công việc mới</a>
			   </li>
			   <li class="list-group-item list-group-item-warning">
			    <span class="badge">5</span><a href="">Công ty mới</a>
			   </li>
			   <li class="list-group-item list-group-item-primary">
			    <span class="badge">5</span><a href="">Ứng viên mới</a>
			   </li>
			   <li class="list-group-item list-group-item-danger">
			    <span class="badge">50</span><a href="">CV được gửi đi</a>
			  </li>
			   <li class="list-group-item list-group-item-default">
			    <span class="badge">5</span><a href="">Lượt like</a>
			   </li>
			   <li class="list-group-item list-group-item-warning">
			    <span class="badge">5</span><a href="">Liên hệ mới</a>
			   </li>
			   <li class="list-group-item list-group-item-success">
			    <span class="badge">5</span><a href="">Bình luận mới</a>
			  </li>
			</ul>
		  </div>
		  <div id="menu1" class="tab-pane fade">
		    <h4 class="text-success">Hôm nay</h4>
			<ul class="list-group">
			  <li class="list-group-item list-group-item-success">
			    <span class="badge">14</span><a href="">Công việc mới</a>
			   </li>
			   <li class="list-group-item list-group-item-warning">
			    <span class="badge">5</span><a href="">Công ty mới</a>
			   </li>
			   <li class="list-group-item list-group-item-primary">
			    <span class="badge">5</span><a href="">Ứng viên mới</a>
			   </li>
			   <li class="list-group-item list-group-item-danger">
			    <span class="badge">50</span><a href="">CV được gửi đi</a>
			  </li>
			   <li class="list-group-item list-group-item-default">
			    <span class="badge">5</span><a href="">Lượt like</a>
			   </li>
			   <li class="list-group-item list-group-item-warning">
			    <span class="badge">5</span><a href="">Liên hệ mới</a>
			   </li>
			   <li class="list-group-item list-group-item-success">
			    <span class="badge">5</span><a href="">Bình luận mới</a>
			  </li>
			</ul>
		  </div>
		</div>
		
	</div>
	<div class="col-sm-6" style="padding-right:0px">
		<h4 class="text-success">Danh sách Mod</h4>
		<ul class="list-group">
		  <li class="list-group-item">
		  	<div class="col-sm-6">
		  		<a href="">Nguyễn Văn An</a>
		  	</div>
		  	<div class="col-sm-6">
		  		<a href="javascript:void(0)" data-toggle="modal" data-target="#myModal"><span class="btn" ><i class="fa fa-edit" aria-hidden="true" >Sửa</i></span></a>
	            <a href="" ><span class="btn text-success"><i class="fa fa-eye-slash" aria-hidden="true">Khóa</i></span></a>
	            <a href="" onclick="return confirm('Bạn có thật sự muốn xóa không?')"><span class="btn text-danger"><i class="fa fa-times" aria-hidden="true">Xóa</i></span></a>
		  	</div>
		  	<div class="clearfix"></div>
		  </li>
			<li class="list-group-item">
			  	<div class="col-sm-6">
			  		<a href="">Nguyễn Văn An</a>
			  	</div>
			  	<div class="col-sm-6">
			  		<a href="javascript:void(0)" data-toggle="modal" data-target="#myModal"><span class="btn" ><i class="fa fa-edit" aria-hidden="true" >Sửa</i></span></a>
		            <a href="" ><span class="btn text-success"><i class="fa fa-eye" aria-hidden="true">Mở khóa</i></span></a>
		            <a href="" onclick="return confirm('Bạn có thật sự muốn xóa không?')"><span class="btn text-danger"><i class="fa fa-times" aria-hidden="true">Xóa</i></span></a>
			  	</div>
			  	<div class="clearfix"></div>
			  </li>	   
		</ul>
	</div>
	<div class="clearfix"></div>
</div>

@stop