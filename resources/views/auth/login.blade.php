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
		<div class="panel-heading">
			<h3 class="panel-title">Điều khoản sử dụng</h3>
		</div>
		<div class="panel-body">
			<P>Đối với người hâm mộ Kpop, việc "khai quật" ra được những hình ảnh từ thuở còn thơ bé của các thần tượng luôn là điều khiến họ cảm thấy hạnh phúc. Ở thời điểm hiện tại, các ngôi sao này sở hữu ngoại hình long lanh, quyến rũ và khi còn nhỏ, họ vô cùng nhí nhảnh, đáng yêu. Hãy thử đoán xem đây là hình ảnh thuở còn nhỏ của những ngôi sao nào nhé.</P>
		</div>
	</div>
</div>
<div class="col-sm-5">
  	@if(Request::is('*login*'))
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
    @else
    <div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title text-center">Đăng ký tài khoản</h3>
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
				  <input class="form-control"  type="password" name="subject" placeholder ="Mật khẩu">
			    </div>
			    <div class="form-group">
				  <input class="form-control"  type="text" name="fullname" placeholder ="Họ tên">
			    </div>
			    <div class="form-group">
				   <input class="form-control"  type="text" name="phone" placeholder ="Số điện thoại">
			    </div>
			    <div class="form-group">
				    <select class="form-control" name="level_id">
			           <option value="3" >Công ty</option>
			           <option value="4" >Ứng viên</option>
			         </select>
			    </div>
			    <div class="">
			    	<input class="form-control btn btn-danger" type="submit" value="Gửi">
			    	<br>
			    </div>
			</form>
		</div>
	</div>
 @endif
</div>	
</div>

@stop
