@extends('templates.jobs.master')

@section('content')

<div class="container">
	<div class="col-sm-8">
		<div class="col-sm-10">
			<h2 class="text-success">Gửi liên hệ </h2>
		</div>
		<form action="" id="formSearch">
		    <div class="col-sm-4 col-xs-4">
		      <input class="form-control" id="focusedInput" type="text" name="fullname" placeholder ="Họ tên">
		    </div>
		    <div class="col-sm-4 col-xs-4">
			  <input class="form-control" id="focusedInput" type="text" name="email" placeholder ="Email">
		    </div>
		    <div class="col-sm-4 col-xs-4">
			  <input class="form-control" id="focusedInput" type="text" name="subject" placeholder ="Tiêu đề">
		    </div>
		    <div class="col-sm-12 col-xs-12">
		    	<br>
			  <textarea class="form-control" name="content" placeholder="Nội dung" rows="10"></textarea>
			  <br>
		    </div>
		    <div class="col-sm-4 col-xs-4 pull-right">
		      <input class="form-control btn btn-danger" type="submit" value="Gửi">
		      <br>
		      <br>
		    </div>
		</form>
	</div>
	<div class="col-sm-4">
		<div class="col-sm-10">
			<h2 class="text-success">Về chúng tôi</h2>
		</div>
		<div class="col-sm-12">
			<ul class="list-group">
			  <li class="list-group-item">
			  	<h4><span class="glyphicon glyphicon-map-marker"></span>Địa điểm:</h4>
			  	<p> 123 Đống Đa Hà Nội</p>
			  </li>
			  <li class="list-group-item">
			  	<h4><span class="glyphicon glyphicon-comment"></span> Liên hệ:</h4>
			  	<p >SĐT:0989909992</p>
			  	<p >Email:test@gmail.com</p>
			  </li>
			  <li class="list-group-item">
			  	<h4><span class="glyphicon glyphicon-time"></span> Giờ mở cửa:</h4>
			  	<p>8:00 Sáng đến 17:00 chiều</p>
			  	<p>Từ thứ 2 đến thứ 7</p>
			  </li>
			</ul>
		</div>
	</div>
</div>
@stop
