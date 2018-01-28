@extends('templates.jobs.master')

@section('content')
<div>
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
         @if(Session::get('msg') != null)
         <div class="alert alert-success">{{ Session::get('msg') }}</div>
          @endif
        <form action="{{route('jobs.contactcheckmember')}}" method="post">
            {{ csrf_field() }}
            <div class="col-sm-8">
              <input class="form-control"  type="password" name="password" placeholder ="Mật khẩu">
            </div>
            <div class="col-sm-4">
                <input class="form-control btn btn-danger" type="submit" value="Gửi">
            </div>
            <div class="clearfix"></div>
            <br>
        </form>
    </div>
    <div class="col-sm-2"></div>
    <div class="clearfix"></div>
</div>

@stop
