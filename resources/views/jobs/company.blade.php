@extends('templates.jobs.master')
@section('ui')
<link rel="stylesheet" href="/resources/assets/css/jquery-ui.css">
  <script src="/resources/assets/js/jquery-ui.js"></script>
 <!--  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
@stop
@section('content')
@include('templates.jobs.slide_company')

@include('templates.jobs.sumary')

<div class="container content-page list-company">
  	<div class="col-sm-12 col-sx-10">
  		<div>
  		<div class="title">
			<h3>DANH SÁCH CÔNG TY</h3>
			<p class="text text-danger">{{ $sum or 'Rất nhiều' }} Công ty được tìm thấy</p>
		</div>
		
		@foreach($arItems as $value)
		<?php 
			$urlCompany = route('jobs.detail_company',['name'=>str_slug($value->fullname), 'id'=>$value->user_id]);
		 ?>
	 	<div class="col-sm-3 company">
			 <?php $picture = ($value->picture != '')?$value->picture:'vodanh.jpeg'; ?>
			<a  href="{{$urlCompany}}"><img src="/storage/app/files/{{ $picture }}" alt="" class="thumbnail img-responsive" id="img_company"></a>
			<h3 id="company_title"><a href="{{$urlCompany}}">Công ty {{ $value->fullname }}</a></h3>
			<p><span class="glyphicon glyphicon-map-marker"></span>Đà Nẵng | <span class="glyphicon glyphicon-folder-close"></span> IT-Phần mềm</p>
			<div class="follow{{$value->user_id}}">
				@if(Auth::check())
					@if($value->checkFollow)
						<button  class="btn btn-success btn-block btn-lg" onclick="changeFollow({{ $value->user_id }},0)">Đã Theo dõi</button>
					@else 
						<button  class="btn btn-default btn-block btn-lg" onclick="changeFollow({{ $value->user_id }},1)">Theo dõi</button>
					@endif
				@else 
					<button  class="btn btn-default btn-block btn-lg" onclick="changeFollow({{ $value->user_id }},1)">Theo dõi</button>
				@endif
			</div>
			<div class="clearfix"></div>
			<br>
		</div>
		@endforeach
		<div class="clearfix"></div>
		<div class="pull-right">
		  {{ $arItems->links() }}
		</div>
		<div class="clearfix"></div>
  		</div>

<script type="text/javascript">
  function changeFollow(id,status){
  	@if(Auth::check())
  		$.ajax({
	        url: "{{ route('plus.changefollow') }}", 
	        type: 'POST',
	        dataType: 'html',
	        data: {
	            _token: '{{ csrf_token() }}',
	            id:id, 
	        },
	        success: function(data){
	            var a ='.follow'+id;
	            $(a).html(data);
	        },
	        error: function(){
	          alert('Sai');
	        }
      });
  	@else
  		alert('Bạn phải đăng nhập để sử dụng chức năng này')
  	@endif
 }	    
</script>

  	</div>
  	<div class="clearfix"></div>

  	<div class="col-sm-12">
  		<!-- <div>
  		<div class="title">
  					<h3>TOP 10 THEO DÕI</h3>
  				</div>
  				@for($i=1;$i<=6;$i++)
  				<div class="col-sm-2 company">
  					<img src="{{$PublicUrl}}/img/member.jpg" alt="" class="thumbnail img-responsive" id="img_company">
  					<h4 id="company_title"><a href="/detail_company">FPT-TELECOM</a></h4>
  					<p><span class="glyphicon glyphicon-map-marker"></span>Đà Nẵng | <span class="glyphicon glyphicon-folder-close"></span> IT-Phần mềm</p>
  					<button  class="btn btn-default btn-block"> Theo dõi</button>
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
  		</div> -->

  		<div>
  		<div class="title">
			<h3>CÔNG TY MỚI THAM GIA</h3>
		</div>
		@foreach($arItemsTopNew as $value)
		<?php 
			$urlCompany = route('jobs.detail_company',['name'=>str_slug($value->fullname), 'id'=>$value->user_id]);
		 ?>
	 	<div class="col-sm-2 company">
			 <?php $picture = ($value->picture != '')?$value->picture:'vodanh.jpeg'; ?>
			<a  href="{{$urlCompany}}"><img src="/storage/app/files/{{ $picture }}" alt="" class="thumbnail img-responsive" id="img_company"></a>
			<h4 id="company_title"><a href="{{$urlCompany}}">Công ty {{ $value->fullname }}</a></h4>
			<p><span class="glyphicon glyphicon-map-marker"></span>Đà Nẵng | <span class="glyphicon glyphicon-folder-close"></span> IT-Phần mềm</p>
			<div class="follow{{$value->user_id}}">
				@if(Auth::check())
					@if($value->checkFollow)
						<button  class="btn btn-success btn-block btn-lg" onclick="changeFollow({{ $value->user_id }},0)">Đã Theo dõi</button>
					@else 
						<button  class="btn btn-default btn-block btn-lg" onclick="changeFollow({{ $value->user_id }},1)">Theo dõi</button>
					@endif
				@else 
					<button  class="btn btn-default btn-block btn-lg" onclick="changeFollow({{ $value->user_id }},1)">Theo dõi</button>
				@endif
			</div>
			<div class="clearfix"></div>
			<br>
		</div>
		@endforeach

		<div class="clearfix"></div>
  		</div>
  	</div>
</div>
@stop
