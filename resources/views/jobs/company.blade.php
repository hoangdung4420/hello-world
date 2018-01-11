@extends('templates.jobs.master')

@section('content')
@include('templates.jobs.slide_company')

@include('templates.jobs.sumary')

<div class="container content-page list-company">
  	<div class="col-sm-12 col-sx-10">
  		<div>
  		<div class="title">
			<h3>DANH SÁCH CÔNG TY</h3>
		</div>
		
		@for($i=1;$i<=8;$i++)
		<div class="col-sm-3 company">
			<img src="{{$PublicUrl}}/img/member.jpg" alt="" class="thumbnail img-responsive">
			<h3><a href="/detail_company">FPT-TELECOM</a></h3>
			<p><span class="glyphicon glyphicon-map-marker"></span>Đà Nẵng | <span class="glyphicon glyphicon-folder-close"></span> IT-Phần mềm</p>
			<button  class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span>Xem thêm</button>
			<button  class="btn btn-default"><span class="fa fa-heart-o"></span> Khen ngợi</button>
			<div class="clearfix"></div>
			<br>
		</div>
		@endfor
		<div class="clearfix"></div>
		<ul class="pagination pull-right">
		  <li><a href="#">1</a></li>
		  <li><a href="#">2</a></li>
		  <li><a href="#">3</a></li>
		  <li><a href="#">4</a></li>
		  <li><a href="#">5</a></li>
		</ul>
		<div class="clearfix"></div>
  		</div>


  	</div>
  	<div class="clearfix"></div>

  	<div class="">
  		<div>
  		<div class="title">
			<h3>TOP 10 KHEN NGỢI</h3>
		</div>
		@for($i=1;$i<=6;$i++)
		<div class="col-sm-2 company">
			<img src="{{$PublicUrl}}/img/member.jpg" alt="" class="thumbnail img-responsive">
			<h4><a href="/detail_company">FPT-TELECOM</a></h4>
			<p><span class="glyphicon glyphicon-map-marker"></span>Đà Nẵng | <span class="glyphicon glyphicon-folder-close"></span> IT-Phần mềm</p>
			<button  class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span></button>
			<button  class="btn btn-default"><span class="fa fa-heart-o"></span></button>
			<div class="clearfix"></div>
			<br>
		</div>
		@endfor

		<div class="clearfix"></div>
		<ul class="pagination pull-right">
		  <li><a href="#">1</a></li>
		  <li><a href="#">2</a></li>
		  <li><a href="#">3</a></li>
		</ul>
		<div class="clearfix"></div>
  		</div>

  		<div>
  		<div class="title">
			<h3>CÔNG TY MỚI THAM GIA</h3>
		</div>
		@for($i=1;$i<=6;$i++)
		<div class="col-sm-2 company">
			<img src="{{$PublicUrl}}/img/member.jpg" alt="" class="thumbnail img-responsive">
			<h4><a href="/detail_company">FPT-TELECOM</a></h4>
			<p><span class="glyphicon glyphicon-map-marker"></span>Đà Nẵng | <span class="glyphicon glyphicon-folder-close"></span> IT-Phần mềm</p>
			<button  class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span></button>
			<button  class="btn btn-default"><span class="fa fa-heart-o"></span></button>
			<div class="clearfix"></div>
			<br>
		</div>
		@endfor

		<div class="clearfix"></div>
		<ul class="pagination pull-right">
		  <li><a href="#">1</a></li>
		  <li><a href="#">2</a></li>
		  <li><a href="#">3</a></li>
		  <li><a href="#">4</a></li>
		  <li><a href="#">5</a></li>
		</ul>
		<div class="clearfix"></div>
  		</div>
  	</div>
</div>
@stop
