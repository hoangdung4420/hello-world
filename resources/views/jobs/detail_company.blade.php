@extends('templates.jobs.master')

@section('content')

<div class="jumbotron" id="sumary">
	<div class="container">
		<div class="col-sm-2">
			<img src="{{$PublicUrl}}/img/member.jpg" alt="" class="thumbnail img-responsive">
		</div>
		<div class="col-sm-8">
			<h3>Công Ty Cổ Phần Casablanca Việt Nam</h3>
			<p>456 Lượt xem </p>
			<p><span class="fa fa-heart"></span> 3 Lượt thích </p>
		</div>
		<div class="col-sm-2 button">
			<a href="" class="btn btn-danger btn-block btn-lg">Nộp đơn</a>
			<a  href="" class="btn btn-default btn-block btn-lg"><span class="fa fa-heart"></span>Khen ngợi</a>
		</div>
	</div>
</div>
<div class=" detail_jop">
	<div class="container">
		<div class="rows">
			<div class="col-sm-8"><h2>CƠ HỘI VIỆC LÀM</h2></div>
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="col-sm-10">
						<h4><a href="detail_jop.html">Phó Tổng Giám Đốc Kinh Doanh BĐS Chủ Đầu Tư</a></h4>
						<span>Nhân viên | Hà Nội | ngày đăng | ngày hết hạn</span>
					</div>
					<div class="col-sm-2">
						<br>
						<a href="" class="btn btn-success btn-lg btn-block">Xem</a>
						<br>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="col-sm-10">
						<h4><a href="detail_jop.html">Phó Tổng Giám Đốc Kinh Doanh BĐS Chủ Đầu Tư</a></h4>
						<span>Nhân viên | Hà Nội | ngày đăng | ngày hết hạn</span>
					</div>
					<div class="col-sm-2">
						<br>
						<a href="" class="btn btn-success btn-lg btn-block">Xem</a>
						<br>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

		<div id="home" class="tab-pane fade in active">
		    <div class="col-sm-8">
		    	<h2>GIỚI THIỆU VỀ DOANH NGHIỆP</h2>
				<p>Trải qua chặng đường 5 năm hình thành và không ngừng kiện toàn, Danko Group đã tích lũy nguồn lực về tài chính cũng như tầm nhìn và quản lý. </p><p>Đến tháng 4/2016, Danko Group trải qua quá trình chuyển mình mạnh mẽ khi chính thức gia nhập lĩnh vực đầu tư - kinh doanh dịch vụ bất động sản.</p><p> Chỉ sau một năm, với cách làm quyết liệt, sáng tạo và hiệu quả, Danko Group đã nhanh chóng mở rộng quy mô hoạt động, thu hút nhân tài, hoàn thiện bộ máy.</p><p>Giờ đây, nhắc đến Danko Group là nghĩ đến sự phát triển thần tốc, dịch vụ uy tín, đội ngũ CBNV nhiệt huyết, chuyên nghiệp và lộ trình phát triển rõ ràng đầy mạnh mẽ.</p>

				
			</div>
			<div class="col-sm-4">
				<br>
				<ul class="list-group">
				  <li class="list-group-item">
				  	<h4><span class="glyphicon glyphicon-map-marker"></span> Địa điểm:</h4>
				  	<p > 123 Đống Đa Hà Nội</p>
				  </li>
				  <li class="list-group-item">
				  	<h4><span class="glyphicon glyphicon-user"></span> Quy mô:</h4>
				  	<p >Nhân viên</p>
				  </li>
				  <li class="list-group-item">
				  	<h4><span class="glyphicon glyphicon-folder-close"></span> Liên hệ:</h4>
				  	<p >SĐT:0989909992</p>
				  	<p >Email:test@gmail.com</p>
				  </li>
				  <li class="list-group-item">
				  	<img src="{{$PublicUrl}}/img/member.jpg" class="img-responsive">
				  </li>
				</ul>
			</div>	
			<div class="clearfix"></div>
		  </div>
			
	</div>
</div>


@stop
