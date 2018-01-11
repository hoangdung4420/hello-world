@extends('templates.jobs.master')

@section('content')

@include('templates.jobs.slide')

@include('templates.jobs.sumary')

<div class="content-page">
	<br>
  	<div class="col-sm-8 col-sx-8">
  		<div class="panel panel-default">
		  <div class="panel-body">
		    <h4>Việc làm theo ngành nghề</h4>
		  </div>
		  <div class="panel-footer list-cate">
		  	<div class="col-sm-4">
		  		<ul>
		  			<li>
		  				<h4>Dịch vụ</h4>
		  				<ul>
							<li><a href="">Phi chính phủ/Phi lợi nhuận (49)</a></li>
							<li><a href="">Giáo dục/Đào tạo (395)</a></li>
							<li><a href="">Y tế/Chăm sóc sức khỏe (210)</a></li>
							<li><a href="">Tư vấn (250)</a></li>
						</ul>
		  			</li>
		  			<li>
		  				<h4>Dịch vụ</h4>
		  				<ul>
							<li><a href="">Phi chính phủ/Phi lợi nhuận (49)</a></li>
							<li><a href="">Giáo dục/Đào tạo (395)</a></li>
							<li><a href="">Y tế/Chăm sóc sức khỏe (210)</a></li>
							<li><a href="">Tư vấn (250)</a></li>
							<li><a href="">Giáo dục/Đào tạo (395)</a></li>
							<li><a href="">Y tế/Chăm sóc sức khỏe (210)</a></li>
							<li><a href="">Tư vấn (250)</a></li>
						</ul>
		  			</li>
		  			<li>
		  				<h4>Dịch vụ</h4>
		  				<ul>
							<li><a href="">Phi chính phủ/Phi lợi nhuận (49)</a></li>
							<li><a href="">Giáo dục/Đào tạo (395)</a></li>
							<li><a href="">Y tế/Chăm sóc sức khỏe (210)</a></li>
							<li><a href="">Tư vấn (250)</a></li>
						</ul>
		  			</li>
		  		</ul>
		  	</div>
			<div class="col-sm-4">
		  		<ul>
		  			<li>
		  				<h4>Dịch vụ</h4>
		  				<ul>
							<li><a href="">Phi chính phủ/Phi lợi nhuận (49)</a></li>
							<li><a href="">Giáo dục/Đào tạo (395)</a></li>
							<li><a href="">Y tế/Chăm sóc sức khỏe (210)</a></li>
							<li><a href="">Tư vấn (250)</a></li>
						</ul>
		  			</li>
		  			<li>
		  				<h4>Dịch vụ</h4>
		  				<ul>
							<li><a href="">Phi chính phủ/Phi lợi nhuận (49)</a></li>
							<li><a href="">Giáo dục/Đào tạo (395)</a></li>
							<li><a href="">Y tế/Chăm sóc sức khỏe (210)</a></li>
							<li><a href="">Tư vấn (250)</a></li>
							<li><a href="">Giáo dục/Đào tạo (395)</a></li>
							<li><a href="">Y tế/Chăm sóc sức khỏe (210)</a></li>
							<li><a href="">Tư vấn (250)</a></li>
						</ul>
		  			</li>
		  			<li>
		  				<h4>Dịch vụ</h4>
		  				<ul>
							<li><a href="">Phi chính phủ/Phi lợi nhuận (49)</a></li>
							<li><a href="">Giáo dục/Đào tạo (395)</a></li>
							<li><a href="">Y tế/Chăm sóc sức khỏe (210)</a></li>
							<li><a href="">Tư vấn (250)</a></li>
						</ul>
		  			</li>
		  		</ul>
		  	</div>
		  	<div class="col-sm-4">
		  		<ul>
		  			<li>
		  				<h4>Dịch vụ</h4>
		  				<ul>
							<li><a href="">Phi chính phủ/Phi lợi nhuận (49)</a></li>
							<li><a href="">Giáo dục/Đào tạo (395)</a></li>
							<li><a href="">Y tế/Chăm sóc sức khỏe (210)</a></li>
							<li><a href="">Tư vấn (250)</a></li>
						</ul>
		  			</li>
		  			<li>
		  				<h4>Dịch vụ</h4>
		  				<ul>
							<li><a href="">Phi chính phủ/Phi lợi nhuận (49)</a></li>
							<li><a href="">Giáo dục/Đào tạo (395)</a></li>
							<li><a href="">Y tế/Chăm sóc sức khỏe (210)</a></li>
							<li><a href="">Tư vấn (250)</a></li>
							<li><a href="">Giáo dục/Đào tạo (395)</a></li>
							<li><a href="">Y tế/Chăm sóc sức khỏe (210)</a></li>
							<li><a href="">Tư vấn (250)</a></li>
						</ul>
		  			</li>
		  			<li>
		  				<h4>Dịch vụ</h4>
		  				<ul>
							<li><a href="">Phi chính phủ/Phi lợi nhuận (49)</a></li>
							<li><a href="">Giáo dục/Đào tạo (395)</a></li>
							<li><a href="">Y tế/Chăm sóc sức khỏe (210)</a></li>
							<li><a href="">Tư vấn (250)</a></li>
						</ul>
		  			</li>
		  		</ul>
		  	</div>
		  	<div class="clearfix"></div>
		  </div>
		</div>


		<div class="panel panel-default">
		  <div class="panel-body">
		  		<h4>Gợi ý việc làm</h4>
		  	</div>
		  <div class="panel-footer ">
		  	@for($i=1;$i<=12;$i++)
		    <div class="col-sm-6">
				<div class="panel panel-default">
					<div class="col-sm-3">
						<img src="{{$PublicUrl}}/img/member.jpg" alt="" class="thumbnail img-responsive">
					</div>
					<div class="col-sm-9">
						<h4><a href="detail_jop.html">Phó Tổng Giám Đốc Kinh Doanh BĐS Chủ Đầu Tư</a></h4>
						<span><a href="">Công Ty Cổ Phần Casablanca Việt Nam</a></span>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			@endfor

			<div class="clearfix"></div>
			<br>
		  </div>
		</div>	

  	</div>

	<div class="col-sm-4 col-sx-4">
		<div class="panel panel-default">
		  <div class="panel-body">
		  		<h4><a href="">Công ty tuyển dụng hàng đầu</a>  <span>Xem thêm>></span></h4>
		  	</div>
		  <div class="panel-footer ">
		  	@for($i=1;$i<=14;$i++)
		    <div class="col-sm-6">
				<a href=""><img src="{{$PublicUrl}}/img/member.jpg" alt="" class="thumbnail img-responsive"></a>
			</div>
			@endfor
			
			<div class="clearfix"></div>
		  </div>
		</div>	
	</div>
  	<div class="clearfix"></div>
</div>
@stop
