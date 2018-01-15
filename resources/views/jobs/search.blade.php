@extends('templates.jobs.master')

@section('content')

@include('templates.jobs.slide')

@include('templates.jobs.sumary')

<div class="content-page">
  	@include('templates.jobs.leftbar')
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
				<p><span class="fa fa-money"></span>{{ number_format($value->salary,0,'.',',') }} | <span class="glyphicon glyphicon-calendar"></span>{{ date("d-m-Y", strtotime($value->expired)) }} | <span class="glyphicon glyphicon-map-marker"></span>Đà Nẵng</p>
				<!-- <button  class="btn btn-default">Markerting</button>
				<button  class="btn btn-default">Sales</button>
				<button  class="btn btn-default">Tiếng Anh</button> -->

			</div>
			<div class="col-sm-1 ">
				<br>
				<button class="btn btn-danger">Mới</button>
				<br>
				<br>
				<button  class="btn btn-default"><i class="fa fa-heart-o fa-2x" aria-hidden="true"></i></button>
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
