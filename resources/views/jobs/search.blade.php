@extends('templates.jobs.master')

@section('content')

@include('templates.jobs.slide')

@include('templates.jobs.sumary')

<div class="content-page">
  	@include('templates.jobs.leftbar')
  	<div class="col-sm-8 col-sx-8">
  		<div class="title">
			<h3>1,000 việc làm cho It</h3>
			<p class="text-danger">Còn chần chừ gì nữa, hãy ứng tuyển ngay nào!</p>
		</div>

		@for($i=1;$i<=5;$i++)

		<div class="row">
			<div class="col-sm-2">
				<img src="{{$PublicUrl}}/img/member.jpg" alt="" class="thumbnail img-responsive">
			</div>
			<div class="col-sm-9">
				<h3><a href="/detail_job">Phó Tổng Giám Đốc Kinh Doanh BĐS Chủ Đầu Tư</a></h3>
				<p><a href="">Công Ty Cổ Phần Casablanca Việt Nam</a></p>
				<p><span class="glyphicon glyphicon-map-marker"></span>Đà Nẵng | <span class="glyphicon glyphicon-usd"></span>500-800 | <span class="glyphicon glyphicon-calendar"></span>3/6/2018</p>
				<button  class="btn btn-default">Markerting</button>
				<button  class="btn btn-default">Sales</button>
				<button  class="btn btn-default">Tiếng Anh</button>

			</div>
			<div class="col-sm-1 ">
				<br>
				<button  class="btn btn-danger">Mới</button>
				<br>
				<br>
				<button  class="btn btn-default"><i class="fa fa-heart-o fa-2x" aria-hidden="true"></i></button>

			</div>
			<div class="clearfix"></div>
			<br>
		</div>
		
		<div class="row">

			<div class="col-sm-2">
				<img src="{{$PublicUrl}}/img/member.jpg" alt="" class="thumbnail img-responsive">
			</div>
			<div class="col-sm-9">
				<h3><a href="/detail_job">Phó Tổng Giám Đốc Kinh Doanh BĐS Chủ Đầu Tư</a></h3>
				<p><a href="">Công Ty Cổ Phần Casablanca Việt Nam</a></p>
				<p><span class="glyphicon glyphicon-map-marker"></span>Đà Nẵng | <span class="glyphicon glyphicon-usd"></span>500-800 | <span class="glyphicon glyphicon-calendar"></span>3/6/2018</p>
				<button  class="btn btn-default">Markerting</button>
				<button  class="btn btn-default">Sales</button>
				<button  class="btn btn-default">Tiếng Anh</button>

			</div>
			<div class="col-sm-1 ">
				<br>
				<button  class="btn btn-default"><i class="fa fa-heart fa-2x" aria-hidden="true"></i></button>

			</div>
			<div class="clearfix"></div>
			<br>
		</div>

		@endfor

		<ul class="pagination">
		  <li><a href="#">1</a></li>
		  <li><a href="#">2</a></li>
		  <li><a href="#">3</a></li>
		  <li><a href="#">4</a></li>
		  <li><a href="#">5</a></li>
		</ul>
  	</div>
  	
	<div class="col-sm-2 col-sx-2 text-center ">
		@include('templates.jobs.adv')	
	</div>

  	<div class="clearfix"></div>
</div>
@stop
