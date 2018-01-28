@extends('templates.jobs.master')
@section('ui')
<link rel="stylesheet" href="/resources/assets/css/jquery-ui.css">
  <script src="/resources/assets/js/jquery-ui.js"></script>
 <!--  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
@stop
@section('content')

@include('templates.jobs.slide')

@include('templates.jobs.sumary')

<div class="content-page">
  	@include('templates.jobs.leftbar')
  	</form>
  	<div class="col-sm-8 col-sx-8">
  		<div class="title">
			<h3>{{ $sum or 'Rất nhiều' }} việc làm cho {{ $title or 'bạn' }}</h3>
			<p class="text-danger">Còn chần chừ gì nữa, hãy ứng tuyển ngay nào!</p>
		</div>

		@foreach($arItems as $value)
		<?php 
			$urlJob = route('jobs.detail_job',['name'=>str_slug($value->title), 'id'=>$value->id_job]);
			$urlCompany = route('jobs.detail_company',['name'=>str_slug($value->fullname), 'id'=>$value->user_id]);
		 ?>
		<div class="row">
			<div class="col-sm-2">
				 <?php $picture = ($value->picture != '')?$value->picture:'vodanh.jpeg'; ?>
				<a href="{{ $urlJob }}"><img src="/storage/app/files/{{ $picture }}" alt="" class="thumbnail img-responsive"></a>
			</div>
			<div class="col-sm-9">
				<h3><a href="{{ $urlJob }}">{{ $value->title }}</a></h3>
				<p><a href="{{ $urlCompany }}">Công ty {{ $value->fullname }}</a></p>
				<p><span class="fa fa-money"></span>{{ (empty($value->salary))?'Thỏa thuận':number_format($value->salary,0,'.',',') }} | <span class="glyphicon glyphicon-calendar"></span>{{ date("d-m-Y", strtotime($value->expired)) }} | <span class="glyphicon glyphicon-map-marker"></span>{{ $value->address }}</p>
				<!-- <button  class="btn btn-default">Markerting</button>
				<button  class="btn btn-default">Sales</button>
				<button  class="btn btn-default">Tiếng Anh</button> -->

			</div>
			<div class="col-sm-1 ">
				<br>
				@if(date("d-m-Y", strtotime($value->updated_at)) == date("d-m-Y"))
				<button class="btn btn-danger">Mới</button>
				<br>
				@endif
				<br>
				
			</div>
			<div class="clearfix"></div>
			<br>
		</div>

		@endforeach

		{{ $arItems->links() }}
  	</div>
  	
	<div class="col-sm-2 col-sx-2 text-center ">
		@include('templates.jobs.adv')	
	</div>

  	<div class="clearfix"></div>
</div>

@stop
