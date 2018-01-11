@extends('templates.jobs.master')

@section('content')

<div class="jumbotron" id="sumary">
	<div class="container">
		<div class="col-sm-2">
			<img src="{{$PublicUrl}}/img/member.jpg" alt="" class="thumbnail img-responsive">
		</div>
		<div class="col-sm-8">
			<h3>Phó Tổng Giám Đốc Kinh Doanh BĐS Chủ Đầu Tư</h3>
			<p><a href="">Công Ty Cổ Phần Casablanca Việt Nam</a></p>
			<p>456 Lượt xem - Hết hạn trong 3 ngày</p>
			<p><span class="fa fa-heart"></span> 3 Lượt thích </p>
		</div>
		<div class="col-sm-2 button">
			<button  class="btn btn-danger btn-block btn-lg">Nộp đơn</button>
			<button  class="btn btn-default btn-block btn-lg"><span class="fa fa-heart"></span>Khen ngợi</button>
		</div>
	</div>
</div>
<div class=" detail_jop">
	<div class="container">
		<ul class="nav nav-tabs">
		  <li class="active"><a data-toggle="tab" href="#home">THÔNG TIN</a></li>
		  <li><a data-toggle="tab" href="#menu1">CÔNG TY</a></li>
		  <li><a data-toggle="tab" href="#menu2">VIỆC LÀM KHÁC TỪ CÔNG TY</a></li>
		  <li><a data-toggle="tab" href="#menu3">BÌNH LUẬN & ĐÁNH GIÁ</a></li>
		</ul>

		<div class="tab-content">
		  <div id="home" class="tab-pane fade in active">
		    <div class="col-sm-8">
		    	<h3>MÔ TẢ CÔNG VIỆC</h3>
				<p>- Thực hiện các thủ tục liên quan đến thành lập, thay đổi, chia tách, sáp nhập doanh nghiệp, đầu tư tài chính, đầu tư xây dựng, sở hữu trí tuệ.<br/>
				- Xây dựng và chủ trì soạn thảo các văn bản định chế phục vụ cho công tác quản lý, điều hành của Tập đoàn và các công ty thành viên.<br/>
				- Trực tiếp rà soát, soạn thảo các hợp đồng kinh tế, các biên bản cuộc họp hoặc các văn bản liên quan đến pháp luật.<br/>
				- Kiểm tra tính pháp lý các hợp đồng, văn bản quy chế hoạt động do các đơn vị trong Tập đoàn dự thảo và đề xuất.<br/>
				- Hệ thống hóa, quản lý văn bản pháp lý phục vụ hoạt động sản xuất kinh doanh của Tập đoàn và các công ty thành viên.<br/>
				- Thực hiện một số công việc khác theo sự chỉ đạo của Ban tổng giám đốc Tập đoàn.</p>
		    
			    <h3>YÊU CẦU CÔNG VIỆC</h3>
				<p>- Nam, Nữ, ngoại hình khá, tốt nghiệp Đại học trở lên thuộc chuyên ngành Luật.</p>
				<p>- Tuổi : từ 32 tuổi trở lên</p>
				<p>- Ưu tiên những ứng cử viên đã có kinh nghiệm công tác trong lĩnh vực pháp luật về tài chính, </p>chứng khoán, lập và triển khai dự án đầu tư và phân phối về xây dựng, sở hữu trí tuệ và quản trị doanh nghiệp
				<p>- Ưu tiên những ứng cử viên đã làm việc tại các Tập đoàn tư nhân quy mô lớn, đầu tư đa ngành </p>nghề
				<p>- Ưu tiên có thẻ Luật sư</p>nghề>
				<p>- Năng động, sáng tạo, có khả năng làm việc độc lập, chịu được áp lực công việc cao</p>
				<p>- Sử dụng thành thạo phần mềm vi tính văn phòng của Microsoft.</p>
				<p>- Ưu tiên biết Tiếng Anh.</p>

				<h3>QUYỀN Lợi</h3>
	    		<p>Tăng lương định kỳ dựa trên mức độ hoàn thành công việc.</p>
				<p>Hưởng đầy đủ quyền lợi BHXH, BHYT, BHTN theo luật lao động VN.</p>
				<p>Các chế độ phúc lợi khác như: Nghỉ lễ, tết, phép năm, tham quan du lịch hằng năm.</p>
			</div>
			<div class="col-sm-4">
				<br>
				<ul class="list-group">
				  <li class="list-group-item">
				  	<h4><span class="glyphicon glyphicon-calendar"></span> Ngày đăng tuyển:</h4>
				  	<p > 09/08/2017</p>
				  </li>
				  <li class="list-group-item">
				  	<h4><span class="glyphicon glyphicon-user"></span> Cấp bậc:</h4>
				  	<p >Nhân viên</p>
				  </li>
				  <li class="list-group-item">
				  	<h4><span class="glyphicon glyphicon-folder-close"></span> Ngành nghề:</h4>
				  	<p >Marketing</p>
				  </li>
				  <li class="list-group-item">
				  	<h4><span class="glyphicon glyphicon-fire"></span> Kỹ năng:</h4>
				  	<p >Tiếng anh, Giao tiếp, Làm việc nhóm</p>
				  </li>
				  <li class="list-group-item">
				  	<button  class="btn btn-block btn-danger btn-lg">Nộp đơn</button>
				  </li>
				</ul>
			</div>	
			<div class="clearfix"></div>
		  </div>
		  <div id="menu1" class="tab-pane fade">
		    <div class="col-sm-8">
				<p>Trải qua chặng đường 5 năm hình thành và không ngừng kiện toàn, Danko Group đã tích lũy nguồn lực về tài chính cũng như tầm nhìn và quản lý. </p><p>Đến tháng 4/2016, Danko Group trải qua quá trình chuyển mình mạnh mẽ khi chính thức gia nhập lĩnh vực đầu tư - kinh doanh dịch vụ bất động sản.</p><p> Chỉ sau một năm, với cách làm quyết liệt, sáng tạo và hiệu quả, Danko Group đã nhanh chóng mở rộng quy mô hoạt động, thu hút nhân tài, hoàn thiện bộ máy.</p><p>Giờ đây, nhắc đến Danko Group là nghĩ đến sự phát triển thần tốc, dịch vụ uy tín, đội ngũ CBNV nhiệt huyết, chuyên nghiệp và lộ trình phát triển rõ ràng đầy mạnh mẽ.</p>
		    	<img src="{{$PublicUrl}}/img/member.jpg" alt="" class="thumbnail img-responsive">
			</div>
			<div class="col-sm-4">
				<ul class="list-group">
				  <li class="list-group-item">
				  	<h4><span class="glyphicon glyphicon-map-marker"></span> Địa điểm:</h4>
				  	<p> 123 Đống Đa Hà Nội</p>
				  </li>
				  <li class="list-group-item">
				  	<h4><span class="glyphicon glyphicon-user"></span> Quy mô:</h4>
				  	<p >Nhân viên</p>
				  </li>
				  <li class="list-group-item">
				  	<h4><span class="glyphicon glyphicon-comment"></span> Liên hệ:</h4>
				  	<p >SĐT:0989909992</p>
				  	<p >Email:test@gmail.com</p>
				  </li>
				  <li class="list-group-item">
				  	<button  class="btn btn-block btn-success btn-lg">Tìm hiểu thêm</button>
				  </li>
				</ul>
			</div>	
			<div class="clearfix"></div>
		  </div>
		  <div id="menu2" class="tab-pane fade">
		    <div class="list-group">
		    @for($i=1;$i<=6;$i++)
				<div class="list-group-item">
					<!--viec con thoi han-->
					<h4><a href="/detail_job">Phó Tổng Giám Đốc Kinh Doanh BĐS Chủ Đầu Tư</a></h4>
					<span>Từ 500$ | Hà Nội | 1 ngày trước</span>
				</div>
			@endfor	
		    </div>
		  </div>
		  <div id="menu3" class="tab-pane fade">

		  	<!--Bình luận-->
		  </div>
		</div>	
	</div>
</div>
<div class="jumbotron list-jop">
	<div class="container">
		<div class="col-sm-11"><h4>VIỆC LÀM KHÁC</h4></div>
@for($i=1;$i<=6;$i++)
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="col-sm-3">
					<img src="{{$PublicUrl}}/img/member.jpg" alt="" class="thumbnail img-responsive">
				</div>
				<div class="col-sm-9">
					<h4><a href="/detail_job">Phó Tổng Giám Đốc Kinh Doanh BĐS Chủ Đầu Tư</a></h4>
					<span><a href="">Công Ty Cổ Phần Casablanca Việt Nam</a></span>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
@endfor		

	</div>
</div>

@stop
