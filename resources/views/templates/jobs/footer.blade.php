<div class="clearfix"></div>
<br>
<div class="jumbotron" style="margin-bottom: 0px;padding: 0px 25px 25px 25px;background: #e1ece9">
	<h4 class="alert text-success" style="text-transform: uppercase;">Tìm công việc theo Tỉnh/Thành phố</h4>
	<div class="col-sm-2">
		@foreach($Provinces as $val)
		@if($val->type == 'Thành Phố')
		<div>
			<a href="{{route('jobs.jobprovince',$val->id_province)}}" style="text-transform: uppercase;">{{ $val->name }}</a>
		</div>
		@endif
		@endforeach
	</div>
	<div class="col-sm-10">
		@foreach($Provinces as $val)
		@if($val->type == 'Tỉnh')
		<div class="col-sm-2 col-xs-4">
			<a href="{{route('jobs.jobprovince',$val->id_province)}}" >{{ $val->name }}</a>
		</div>
		@endif
		@endforeach
	</div>
	<div class="clearfix"></div>
</div>

<footer class="footer">
	<div class="col-sm-5 ">
		<h3 class="alert">Trụ sở</h3>
		<ul>
			<li>
				<p>{!! $arAbouts['Liên hệ'] !!}</p>
				<p>SĐT: {!! $arAbouts['Số điện thoại'] !!}</p>
				<p>Email: {!! $arAbouts['email'] !!}</p>
			</li>
		</ul>
	</div>
	<div class="col-sm-2  col-xs-6">
		<h3 class="alert">Pages</h3>
		<ul>
			<li><a href="{{ route('jobs.job') }}">Tất cả công việc</a></li>
			<li><a href="{{ route('jobs.company') }}">Công ty</a></li>
			<li><a href="{{ route('jobs.contact') }}">Liên hệ</a></li>
			<li><a href="{{route('login')}}">Nhân viên Đăng nhập</a></li>
		</ul>
	</div>
	<div class="col-sm-2  col-xs-6">
		<h3 class="alert">Dịch vụ</h3>
		<ul>
			<li><a href="">Tìm kiếm công việc</a></li>
			<li><a href="">Đăng ký tài khoản</a></li>
			<li><a href="">Đăng tin tuyển dụng</a></li>
			<li><a href="">Đăng quảng cáo</a></li>
		</ul>
	</div>
	<div class="col-sm-3 col-sm-12">
		<h3 class="alert">Mạng xã hội</h3>
		<div class="rows text-center">
			<ul class="nav navbar-nav">
			<li class=""><a href="{{ $arAbouts['facebook'] }}"><i class="fa fa-facebook fa-2x"></i></a></li>
			<li class=""><a href="{{ $arAbouts['twitter'] }}"><i class="fa fa-twitter fa-2x"></i></a></li>
			<li class=""><a href="{{ $arAbouts['youtube'] }}"><i class="fa fa-youtube fa-2x"></i></a></li>
			<li class=""><a href="{{ $arAbouts['google'] }}"><i class="fa fa-google-plus fa-2x"></i></a></li>
			<li class=""><a href="{{ $arAbouts['pinterest'] }}"><i class="fa fa-pinterest fa-2x"></i></a></li>
		</ul>
		</div>
	</div>
	<div class="col-sm-12">
	
	</div>	
	<div class="clearfix">
	
	</div>

</footer>
<div class="jumbotron" style="margin-bottom: 0px;padding: 10px 10px;background: #000;color: #fff"><h5 class="text-center">Copyright © Nguyễn Hoàng Dung. All Rights Reserved </h5></div>
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up fa-lg"></i></button>
<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>

	

</body>
</html>

