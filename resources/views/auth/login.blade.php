@extends('templates.jobs.master')

@section('content')

<div class="container">
	@if(Session::get('msg') != null)
		<div class="alert alert-warning">{{ Session::get('msg') }}</div>
	@endif
</div>
<div class="container">

<div class="col-sm-7" style="text-align: justify;">
  	<div class="panel">
  		@if(isset($rule))
		<div class="panel-heading">
			<h3 class="panel-title">{{ $rule->title }}</h3>
		</div>
		<div class="panel-body">
			<P>{!! $rule->detail !!}</P>
		</div>
		@else 
		<h3 class="text-success text-center">Trang đăng nhập dành cho nhân viên <br />Chào mừng bạn trở lại website</h3>
		@endif
	</div>
</div>

<div class="col-sm-5">
  	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title text-center">Đăng nhập</h3>
		</div>
		<div class="panel-body">
			<form action="{{ route('login') }}" method="POST">
				{{ csrf_field() }}
			    <div class="form-group">
				  <input class="form-control"  type="text" name="email" placeholder ="Email">
			    </div>
			    <div class="form-group">
				  <input class="form-control"  type="password" name="password" placeholder ="Mật khẩu">
			    </div>
			    <div class="">
			    	<input class="form-control btn btn-danger" type="submit" value="Gửi">
			    </div>
			</form>
		</div>
	</div>
@if(Request::is('*company*') || Request::is('*candidate*'))
	<div class="panel panel-success" >
		<div class="panel-heading">
			<h3 class="panel-title text-center"><span style="color: #000">Bạn chưa có tài khoản? </span>Đăng ký miễn phí</h3>
		</div>
		<div class="panel-body">
			<form action="{{ route('auth.register') }}" method="POST" >
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
			    <div class="form-group">
				  <input class="form-control"  type="text" name="email" placeholder ="Email">
			    </div>
			    <div class="form-group">
				  <input class="form-control"  type="password" name="password" placeholder ="Mật khẩu">
			    </div>
			    <div class="form-group">
				  <input class="form-control"  type="text" name="fullname" placeholder ="Họ tên">
			    </div>
			    <div class="form-group">
				   <input class="form-control"  type="text" name="phone" placeholder ="Số điện thoại">
			    </div>
			    <div class="">
			    	<input class="form-control btn btn-danger" type="submit" value="Gửi">
			    </div>
			</form>
		</div>
	</div>
@endif
</div>	
</div>
@stop
