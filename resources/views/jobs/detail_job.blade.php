@extends('templates.jobs.master')

@section('content')

<div class="jumbotron" id="sumary">
	<div class="container">
		<div class="col-sm-2"> 
			<?php $picture = ($oItem->picture != '')?$oItem->picture:'vodanh.jpeg'; ?>
			<a href=""><img src="/storage/app/files/{{ $picture }}" alt="" class="thumbnail img-responsive"></a>
		</div>

		<div class="col-sm-8">
			<?php
				$id_job = $oItem->id_job; 
				$titleJob = $oItem->title;
				 $companyName = $oItem->fullname;
			 ?>
			<h3>{{ $titleJob }}</h3>
			<p><a href="{{ route('jobs.detail_company', ['name'=>str_slug($companyName),'id'=>$oItem->user_id]) }}">{{ $companyName }}</a></p>
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
			<p>{{ $oItem->reader }} Lượt xem -  {{ $dem }}</p>
			<p id="like">
				@if($checkLike)
					<span>{{ $oItem->like }}<i class="fa fa-thumbs-up" aria-hidden="true" onclick="changeLike({{ $oItem->id_job }},1)"></i></span> 
				@else 
					<span>{{ $oItem->like }}<i class="fa fa-thumbs-o-up" aria-hidden="true" onclick="changeLike({{ $oItem->id_job }},1)"></i></span> 
				@endif

				@if($checkDisLike)
					<span>{{ $oItem->dislike }}<i class="fa fa-thumbs-down" aria-hidden="true" onclick="changeLike({{ $oItem->id_job }},0)"></i></span> 
				@else 
					<span>{{ $oItem->dislike }}<i class="fa fa-thumbs-o-down" aria-hidden="true" onclick="changeLike({{ $oItem->id_job }},0)"></i></span> 
				@endif
			 </p>
		</div>

		<div class="col-sm-2 button">
		@if($checksendCV)
			<button  class="btn btn-success btn-block btn-lg">Đã Ứng Tuyển</button>
		@else
			@if($today <= $dateOut)
				<button  class="btn btn-danger btn-block btn-lg"  id="myBtnCV">Ứng Tuyển</button>
			     @include('jobs.formsendcv')
			@endif
		@endif 
		</div>
	</div>
</div>
<script type="text/javascript">
  function changeLike(id,status){
  	@if(Auth::check())
  		$.ajax({
	        url: "{{ route('admin.addlike') }}", 
	        type: 'POST',
	        dataType: 'html',
	        data: {
	            _token: '{{ csrf_token() }}',
	            id:id, 
	            status:status,
	        },
	        success: function(data){
	            var a ='#like';
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
				  	<h4><span class="glyphicon glyphicon-calendar"></span> Hạn nộp đơn:</h4>
				  	<p > {{ $dateOut }}</p>
				  </li>
				  <li class="list-group-item">
				  	<h4><span class="glyphicon glyphicon-user"></span> Cấp bậc:</h4>
				  	<p >{{ $oItem->job_level }}</p>
				  </li>
				  <li class="list-group-item">
				  	<h4><span class="glyphicon glyphicon-time"></span> Loại hình công việc:</h4>
				  	<p >{{ $oItem->time_id }}</p>
				  </li>
				  <li class="list-group-item">
				  	<h4><span class="fa fa-money"></span> Lương:</h4>
				  	<p >{{  (empty($value->salary))?'Thỏa thuận':number_format($value->salary,0,'.',',')  }}</p>
				  </li>
				  <li class="list-group-item">
				  	<h4><span class="glyphicon glyphicon-folder-close"></span> Ngành nghề:</h4>
				  	<p >{{ $oItem->job_categories_name }}</p>
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
				   
				</ul>
			</div>	
			<div class="clearfix"></div>
		  </div>
		  <div id="menu2" class="tab-pane fade">
		    <div class="list-group">
		    @foreach($arJobInCompany as $value)
				<div class="list-group-item">
					<!--viec con thoi han-->
					<h4><a href="/detail_job">{{ $value->title }}</a></h4>
					<span>Lương:{{ (empty($value->salary))?'Thỏa thuận':number_format($value->salary,0,'.',',') }} | {{ $value->address }} | 1 ngày trước(chưa xử lí)</span>
				</div>
			@endforeach	
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
@foreach($arJobSame as $val)
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="col-sm-3">
					<?php $picture = ($val->picture != '')?$val->picture:'vodanh.jpeg'; ?>
                    <img src="/storage/app/files/{{ $picture }}"alt="" class="thumbnail img-responsive">
				</div>
				<div class="col-sm-9">
					<h4><a href="{{ route('jobs.detail_job',['name'=>str_slug($val->title),'id'=>$val->id_job])}}">{{ $val->title }}</a></h4>
					<span><a href="{{ route('jobs.detail_company',['name'=>str_slug($val->fullname),'id'=>$val->user_id])}}">{{ $val->fullname }}</a></span>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
@endforeach		
	</div>
</div>

@stop
