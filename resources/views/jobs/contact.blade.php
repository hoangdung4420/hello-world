@extends('templates.jobs.master')

@section('content')

<div class="container">
	<div class="col-sm-8">
		<div class="col-sm-12">
			<h2 class="text-success">Gửi liên hệ </h2>
			@if(Session::get('msgS') != null)
             	<div class="alert alert-success">{{ Session::get('msgS') }}</div>
	         @elseif(Session::get('msgW') != null)
	            <div class="alert alert-warning">{{ Session::get('msgW') }}</div>
	          @endif
		</div>
		<div class="clearfix"></div>
		<form action="{{ route('jobs.contact') }}" id="formSearch" method="POST">
			{{ csrf_field() }}
		      @if ($errors->any())
		        <div class="alert alert-danger">
		            <ul>
		                @foreach ($errors->all() as $error)
		                    <li>{{ $error }}</li>
		                @endforeach
		            </ul>
		        </div>
		        @endif
		    <div class="col-sm-4 col-xs-4">
		      <input class="form-control" id="focusedInput" type="text" name="fullname" placeholder ="Họ tên">
		    </div>
		    <div class="col-sm-4 col-xs-4">
			  <input class="form-control" id="focusedInput" type="text" name="email" placeholder ="Email">
		    </div>
		    <div class="col-sm-4 col-xs-4">
			  <input class="form-control" id="focusedInput" type="text" name="subject" placeholder ="Tiêu đề">
		    </div>
		    <div class="col-sm-12 col-xs-12">
		    	<br>
			  <textarea class="form-control" name="content" placeholder="Nội dung" rows="10"></textarea>
			  <br>
		    </div>
		    <div class="col-sm-4 col-xs-4 pull-right">
		      <input class="form-control btn btn-danger" type="submit" value="Gửi">
		      <br>
		      <br>
		    </div>
		</form>
	</div>
	<div class="col-sm-4">
		<div class="col-sm-10">
			<h2 class="text-success">Về chúng tôi</h2>

		</div>
		<div class="col-sm-12">
			<ul class="list-group">
			  <li class="list-group-item">
			  	<h4><span class="glyphicon glyphicon-map-marker"></span>Địa chỉ:</h4>
			  	<p>{!! $arAbouts['Liên hệ'] !!}</p>
			  </li>
			  <li class="list-group-item">
			  	<h4><span class="glyphicon glyphicon-comment"></span> Liên hệ:</h4>
			  	<p >SĐT:{!! $arAbouts['Số điện thoại'] !!}</p>
			  	<p >Email:{!! $arAbouts['email'] !!}</p>
			  </li>
			  <li class="list-group-item">
			  	<h4><span class="glyphicon glyphicon-time"></span> Giờ mở cửa:</h4>
			  	<p>{!! $arAbouts['Giờ mở cửa'] !!}</p>
			  </li>
			</ul>
		</div>
	</div>
</div>
@stop
