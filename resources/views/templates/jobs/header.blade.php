<!DOCTYPE html>
<html>
<head>
	<title>{{ $title or 'Tuyển dụng, tìm việc' }}</title>
	<meta charset="utf-8">
  <link rel="shortcut icon" href="{{$PublicUrl}}/img/unnamed.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{$PublicUrl}}/css/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
  <script src="/resources/assets/js/jquery-3.2.1.min.js"></script>
@yield('ui')
  <script src="/bootstrap/js/bootstrap.min.js"></script>
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
          <a class="navbar-brand" href="{{ route('jobs.index') }}">YOUR-WORK</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="{{ Request::is('*job*')?'active':''}}"><a href="{{ route('jobs.job') }}">Công việc</a></li>
            <li class="{{ Request::is('*company*')?'active':''}}" ><a href="{{ route('jobs.company') }}">Công ty</a></li>
            <li class="{{ Request::is('*contact*')?'active':''}}"><a href="{{ route('jobs.contact') }}">Liên hệ</a></li>
          </ul>
          
          <ul class="nav navbar-nav navbar-right">
          @if(!Auth::check())
             <li>
                <button class="btn btn-warning btn-block btn-lg myBtnLg" id="myBtnLg">Ứng viên</button>
             </li>
             <li><button  class="btn btn-primary btn-block btn-lg myBtnLg" id="companyBT" >Công ty</button></li>
          @else
            <li class="dropdown">
              <?php 
              $picture = (Auth::user()->picture != '')?Auth::user()->picture:'vodanh.jpeg';
               ?>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="/storage/app/files/{{ $picture }}" class="img-circle" alt="Cinque Terre" width="25" height="25"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{route('admin.index.index')}}">Tài khoản</a></li>
                @if(Auth::user()->level_id == 3)
                <li><a href="{{route('admin.company.index')}}"><span  class="btn btn-warning btn-block" >Hồ sơ</a></a></li>
                @else(Auth::user()->level_id == 4) 
                <li><a href="{{route('admin.candidate.index')}}"><span  class="btn btn-warning btn-block">Hồ sơ</a></a></li>
                @endif
                <li><a href="{{route('admin.job.index')}}">Công việc</a></li>
                <li><a href="{{route('admin.contact.index')}}">Liên hệ</a></li>
                <li><a href="{{route('admin.comment.index')}}">Bình luận</a></li>
                <li><a href="{{ route('jobs.index') }}">Trang public</a></li>
              </ul>
            </li>
            <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
         @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<div class="modal fade" id="myModalLg" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
      <div class="modal-content" id="login_singup">
         @include('auth.logina')
      </div>
    </div>
  </div> 
<script >
$(document).ready(function(){
    $("#myBtnLg").click(function(){
        $("#myModalLg").modal();
    });
});
$(document).ready(function(){
    $("#companyBT").click(function(){
        window.location="{{route('auth.companylogin')}}";
    });
});
@if(Session::get('msgW') != null)
window.onload = function()
{
    $("#myModalLg").modal();
};
@endif
</script>
<script type="text/javascript">
  function signupa(){
    $.ajax({
        url: "{{route('auth.signup')}}", 
        type: 'GET',
        dataType: 'html',
        data: {
        },
        success: function(data){
            var a ='#login_singup';
            $(a).html(data);
        },
        error: function(){
          alert('Sai');
        }
      });
    }
</script>
<script type="text/javascript">
  function loginpa(){
    $.ajax({
        url: "{{route('auth.ajaxlogin')}}", 
        type: 'GET',
        dataType: 'html',
        data: {
        },
        success: function(data){
            var a ='#login_singup';
            $(a).html(data);
        },
        error: function(){
          alert('Sai');
        }
      });
    }
</script>
