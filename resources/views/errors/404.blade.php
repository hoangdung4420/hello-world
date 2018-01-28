@extends('templates.jobs.master')

@section('content')
<div>
    <div class="logo-404">
        <a href="index.html"><img src="images/home/logo.png" alt="" /></a>
    </div>
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="col-sm-6">
            <img src="{{ $PublicUrl }}/img/404.png" class="img-responsive" alt="" />
        </div>
        <div class="col-sm-6">
            <h1><b>OPPS!</b> Trang bạn tìm không tồn tại</h1>
            <h2><a href="/" style="color:#49c29f">Trở lại trang chủ</a></h2>
        </div>
    </div>
    <div class="col-sm-2"></div>
    <div class="clearfix"></div>
</div>

@stop
