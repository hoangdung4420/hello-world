<!DOCTYPE html>
<html>
<head>
	<title>{{ $title or 'Trang quản lý' }}</title>
	<meta charset="utf-8">
  <link rel="shortcut icon" href="{{$PublicUrl}}/img/unnamed.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{$PublicUrl}}/css/main.css">
	<link rel="stylesheet" href="{{$AdminUrl}}/css/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
  @yield('ckeditor')
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand " href="{{ route('admin.index.index') }}">YOUR-WORK </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            @if(Auth::user()->level_id <= 2)
            <li class="{{ Request::is('*about*')?'active':''}}"><a href="{{ route('admin.about.index') }}">Thông tin</a></li>
            <li class="{{ Request::is('*category*')?'active':''}}"><a href="{{route('admin.category.index')}}">Danh mục</a></li>
            @endif
            <li class="{{Request::is('*job*')?'active':''}}"><a href="{{route('admin.job.index')}}">Công việc</a></li>
            <li class ="{{ Request::is('*company*')?'active':''}}"><a href="{{route('admin.company.index')}}">Công ty</a></li>
            <li class ="{{ Request::is('*candidate*')?'active':''}}"><a href="{{ route('admin.candidate.index') }}">Ứng viên</a></li>
            <li class ="{{ Request::is('*user*')?'active':''}}"><a href="{{ route('admin.user.index') }}">Người dùng</a></li>
            <li class ="{{ Request::is('*comment*')?'active':''}}"><a href="{{route('admin.comment.index')}}">Bình luận</a></li>
            <li class ="{{ Request::is('*contact*')?'active':''}}"><a href="{{route('admin.contact.index')}}">Liên hệ</a></li>
            @if(Auth::user()->level_id <= 2)
            <li class="{{ Request::is('*adv*')?'active':''}}"><a href="{{route('admin.adv.index')}}">Quảng cáo</a></li>
            @endif
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <?php 
              $picture = (Auth::user()->picture != '')?Auth::user()->picture:'vodanh.jpeg';
               ?>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="/storage/app/files/{{ $picture }}" class="img-circle" alt="Cinque Terre" width="25" height="25"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('admin.index.index') }}">Tài khoản</a></li>
                @if(Auth::user()->level_id == 3)
                <li><a href="{{route('admin.company.index')}}"><span  class="btn btn-warning btn-block" >Hồ sơ</a></a></li>
                @else(Auth::user()->level_id == 4) 
                <li><a href="{{route('admin.candidate.index')}}"><span  class="btn btn-warning btn-block">Hồ sơ</a></a></li>
                @endif
                <li><a href="{{route('admin.job.index')}}">Công việc<span class="badge pull-right">3</span></a></li>
                <li><a href="{{route('admin.contact.index')}}">Liên hệ<span class="badge pull-right">3</span></a></li>
                <li><a href="{{route('admin.comment.index')}}">Bình luận<span class="badge pull-right">3</span></a></li>
                <li><a href="{{ route('jobs.index') }}">Trang public</a></li>
              </ul>
            </li>
            <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
