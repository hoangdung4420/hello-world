@extends('templates.jobs.master')

@section('content')

<div class="jumbotron" id="sumary">
	<div class="container">
		<div class="col-sm-2"> 
			<?php $picture = ($oItem->picture != '')?$oItem->picture:'vodanh.jpeg'; ?>
			<a href=""><img src="/storage/app/files/{{ $picture }}" alt="" class="thumbnail img-responsive"></a>
		</div>
		<div class="col-sm-8">
			<h3>{{ $oItem->title }}</h3>
			<p><a href="{{ route('jobs.detail_company', ['name'=>str_slug($oItem->fullname),'id'=>$oItem->user_id]) }}">{{ $oItem->fullname }}</a></p>
			<?php 
			$today = date('d-m-Y');
			$dateOut = date('d-m-Y',strtotime($oItem->expired));
			if($today < $dateOut){
				$dem = 'Hết hạn vào ngày '.date('d-m-Y',strtotime($oItem->expired));
			}elseif($today > $dateOut){
				$dem = 'Đã hết hạn';
			}else{
				$dem = "Hết hạn trong hôm nay";
			}

			 ?>
			<p>456 Lượt xem -  {{ $dem }}</p>
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
		  <li><a data-toggle="tab" href="#menu2">VIỆC LÀM KHÁC CÙNG CÔNG TY</a></li>
		  <li><a data-toggle="tab" href="#menu3">BÌNH LUẬN & ĐÁNH GIÁ</a></li>
		</ul>

		<div class="tab-content">
		  <div id="home" class="tab-pane fade in active">
		    <div class="col-sm-8">
		    	<h3>MÔ TẢ CÔNG VIỆC</h3>
				<p>{!! $oItem->preview !!}</p>
		    
			    <h3>YÊU CẦU CÔNG VIỆC</h3>
				<p>{!! $oItem->required !!}</p>
			</div>
			<div class="col-sm-4">
				<br>
				<ul class="list-group">
				  <li class="list-group-item">
				  	<h4><span class="glyphicon glyphicon-user"></span> Cấp bậc:</h4>
				  	<p >{{ $oItem->job_level }}</p>
				  </li>
				  <li class="list-group-item">
				  	<h4><span class="glyphicon glyphicon-folder-close"></span> Ngành nghề:</h4>
				  	<p >{{ $oItem->job_categories }}</p>
				  </li>
				  <li class="list-group-item">
				  	<h4><span class="glyphicon glyphicon-map-marker"></span> Địa điểm:</h4>
				  	<p> {{ $oItem->address }}</p>
				  </li>
				  <li class="list-group-item">
				  	<h4><span class="glyphicon glyphicon-comment"></span> Liên hệ:</h4>
				  	<p >{{ $oItem->agency }}</p>
				  	<p >SĐT: {{ $oItem->phone }}</p>
				  	<p >Email: {{ $oItem->email }}</p>
				  </li>
				   <li class="list-group-item">
				  	<h4><span class="glyphicon glyphicon-calendar"></span> Hạn nộp đơn:</h4>
				  	<p > {{ $dateOut }}</p>
				  </li>
				  <li class="list-group-item">
				  	<button  class="btn btn-block btn-danger btn-lg">Nộp đơn</button>
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
			@include('jobs.comment')
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
