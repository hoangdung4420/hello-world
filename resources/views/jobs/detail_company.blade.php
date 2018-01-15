@extends('templates.jobs.master')

@section('content')
<div class="jumbotron" id="sumary">
	<div class="container">
		<div class="col-sm-2">
			 <?php $picture = ($oItem->picture != '')?$oItem->picture:'vodanh.jpeg'; ?>
		  	<img src="/storage/app/files/{{ $picture }}" class="img-responsive">
		</div>
		<div class="col-sm-8">
			<h3>{{ $oItem->fullname }}</h3>
			<p>456 Lượt xem </p>
			<p><span class="fa fa-heart"></span> 3 Lượt thích </p>
		</div>
		<div class="col-sm-2 button">
			<a  href="" class="btn btn-default btn-block btn-lg"><span class="fa fa-heart"></span>Thích</a>
			<a  href="" class="btn btn-default btn-block btn-lg"><span class="fa fa-heart"></span>Không thích</a>
		</div>
	</div>
</div>
<div class=" detail_jop">
	<div class="container">
		<div class="rows">
			<div class="col-sm-8"><h2>CƠ HỘI VIỆC LÀM</h2></div>
			@foreach($listJob as $value)
			<?php $url = route('jobs.detail_job', ['name'=>str_slug($value->title), 'id'=>$value->id_job ]) ?>
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="col-sm-10">
						<h4><a href="{{ $url }}">{{ $value->title }}</a></h4>
						<span>{{ $value->job_level }} | {{ $value->address }} | Ngày đăng: {{ date('d-m-Y', strtotime($value->created_at)) }} | ngày hết hạn: {{ date('d-m-Y', strtotime($value->expired )) }}</span>
					</div>
					<div class="col-sm-2">
						<br>
						<a href="{{ $url }}" class="btn btn-success btn-lg btn-block">Xem</a>
						<br>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			@endforeach
		</div>

		<div id="home" class="tab-pane fade in active">
		    <div class="col-sm-8">
		    	<h2>GIỚI THIỆU VỀ DOANH NGHIỆP</h2>
				<p>{!! $oItem->preview !!}</p>
				<p>{!! $oItem->detail !!}</p>
			</div>
			<div class="col-sm-4">
				<br>
				<ul class="list-group">
				  <li class="list-group-item">
				  	<h4><span class="glyphicon glyphicon-map-marker"></span> Địa điểm:</h4>
				  	<p > {{ $oItem->address }}</p>
				  </li>
				  <li class="list-group-item">
				  	<h4><span class="glyphicon glyphicon-user"></span> Quy mô:</h4>
				  	<p >{{ $oItem->size }} Nhân viên</p>
				  </li>
				  <li class="list-group-item">
				  	<h4><span class="glyphicon glyphicon-folder-close"></span> Liên hệ:</h4>
				  	<p >SĐT:{{ $oItem->phone }}</p>
				  	<p >Email:{{ $oItem->email }}</p>
				  </li>
				  <li class="list-group-item">
				  	 <?php $picture = ($oItem->picture != '')?$oItem->picture:'vodanh.jpeg'; ?>
				  	<img src="/storage/app/files/{{ $picture }}" class="img-responsive">
				  </li>
				</ul>
			</div>	
			<div class="clearfix"></div>
		  </div>
	</div>
</div>
@stop
