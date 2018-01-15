
<footer class="footer">
	<div class="col-sm-5 ">
		<h3>Trụ sở</h3>
		<ul>
			<li>
				<p>{!! $arAbouts['Liên hệ'] !!}</p>
				<p>SĐT: {!! $arAbouts['Số điện thoại'] !!}</p>
				<p>Email: {!! $arAbouts['email'] !!}</p>
			</li>
		</ul>
		
	</div>
	<div class="col-sm-2">
		<h3>Pages</h3>
		<ul>
			<li><a href="{{ route('jobs.job') }}">Tất cả công việc</a></li>
			<li><a href="{{ route('jobs.company') }}">Công ty</a></li>
			<li><a href="{{ route('jobs.contact') }}">Liên hệ</a></li>
			<li><a href="{{route('auth.login')}}">Nhân viên Đăng nhập</a></li>
		</ul>
		
	</div>
	<div class="col-sm-2">
		<h3>Dịch vụ</h3>
		<ul>
			<li><a href="">Tìm kiếm công việc</a></li>
			<li><a href="">Đăng ký tài khoản</a></li>
			<li><a href="">Đăng tin tuyển dụng</a></li>
			<li><a href="">Đăng quảng cáo</a></li>
		</ul>
	</div>
	<div class="col-sm-3 ">
		<h3>Mạng xã hội</h3>
		<ul class="nav navbar-nav">
			<li><a href="{{ $arAbouts['facebook'] }}"><i class="fa fa-facebook fa-2x"></i></a></li>
			<li><a href="{{ $arAbouts['twitter'] }}"><i class="fa fa-twitter fa-2x"></i></a></li>
			<li><a href="{{ $arAbouts['youtube'] }}"><i class="fa fa-youtube fa-2x"></i></a></li>
			<li><a href="{{ $arAbouts['google'] }}"><i class="fa fa-google-plus fa-2x"></i></a></li>
			<li><a href="{{ $arAbouts['pinterest'] }}"><i class="fa fa-pinterest fa-2x"></i></a></li>
		</ul>
	</div>
	<div class="col-sm-12">
	<br>
	<p class="text-center">Copyright © Nguyễn Hoàng Dung. All Rights Reserved </p>
	</div>	
	<div class="clearfix">
	
	</div>

</footer>
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

	<script src="/resources/assets/js/jquery-3.2.1.min.js"></script>
	<script src="/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>

