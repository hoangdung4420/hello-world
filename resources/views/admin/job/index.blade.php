@extends('templates.admin.master')
@section('ui')
<link rel="stylesheet" href="/resources/assets/css/jquery-ui.css">
  <script src="/resources/assets/js/jquery-ui.js"></script>
 <!--  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
@stop
@section('content')
<div class="container panel">
  <br>
<div class="col-sm-2">
  <a href="{{ route('admin.job.add') }}" class="btn btn-success btn-lg h3" style="margin-top: 4px"><i class="fa fa-plus" aria-hidden="true"></i>Thêm</a>
</div>
<div class="col-sm-10">
@if(Session::get('msgS') != null)
 <div class="alert alert-success">{{ Session::get('msgS') }}</div>
 @elseif(Session::get('msgW') != null)
    <div class="alert alert-warning">{{ Session::get('msgW') }}</div>
@endif
</div>
   <div class="clearfix"></div>
<br>
@if(Auth::user()->level_id <3)
<div class="">
<form action="{{route('admin.job.searchjob')}}" id="formS" method="GET">
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
  <div class="col-sm-3 col-xs-3">
    <input class="form-control"  type="text" id="name" name="name" placeholder ="Tên công việc">
  </div>
  <div class="col-sm-3 col-xs-3">
    <input class="form-control"  type="text" id="category" name="category" placeholder ="Tất cả ngành nghề">
  </div>
  <div class="col-sm-3 col-xs-3">
    <input class="form-control"  type="text" id="cities" name="cities"  placeholder ="Tất cả địa điểm" onmousemove="changeDistrict()">
  </div>
   <div class="col-sm-1 col-xs-1">
    <input class="form-control btn btn-default" type="reset" value="X">
  </div>
  <div class="col-sm-2 col-xs-2">
    <input class="form-control btn btn-danger" type="submit" value="Tìm kiếm">
  </div>
</form>
<br>
</div>
<script>
$(function() {
    $( "#cities" ).autocomplete({ 
      source: "{{route('plus.autocompleteprovince')}}",
    });
});
</script>
<script>
$(function() {
    $( "#category" ).autocomplete({ 
      source: "{{route('plus.autocompletecategory')}}",
    });
});
</script>
@if(isset($key))
<script>
  window.onload = function()
{
    $("#name").val("{{$key['name']}}");
    $("#category").val("{{$key['category']}}");
    $("#cities").val("{{$key['cities']}}");
};
</script>
<p>Có {{$sum or 'rất nhiều'}} kết quả tìm kiếm</p>
@endif
@endif
<br>
<div class="table-responsive">
  <table class="table tab-border table-hover center">
      <thead>
        <tr class="active">
          <th>STT</th>
          <th>Tên công việc</th>
          <th>Nghề nghiệp</th>
          <th>Ngày đăng</th>
          <th>Hạn ứng tuyển</th>
          <th>Tỉnh/Thành phố</th>
          <th width="20%">Ứng tuyển</th>
          <th>Lượt like</th>
          <th>Lượt dislike</th>
          <th>Lượt đọc</th>
          <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
       @foreach($arItems as $arItem)            
        <tr>
          <td>{{ $arItem->id_job }}</td>
          <td>
              <p>{{ $arItem->title }}</p>
              <p>{{ $arItem->fullname }}</p>
          </td>
          <td>{{ $arItem->job_categories }}</td>
          <td>{{ date("d-m-Y H:i:s", strtotime($arItem->created_at)) }}</td>
          <td>{{ $arItem->expired }}</td>
          <td>{{ $arItem->address }}</td>
          <td>
              <a href="{{ route('admin.job.cv', $arItem->id_job) }}" class="btn btn-success btn-block count-job">{{ $arItem->totalcv }} CV</a>
          </td>
          <td><a href="">{{ $arItem->like }}</a></td>
          <td><a href="">{{ $arItem->dislike }}</a></td>
          <td>{{ $arItem->reader }}</td>
          <td>
              <a href="{{ route('admin.job.edit', $arItem->id_job) }}" ><span class="btn" ><i class="fa fa-mail-reply" aria-hidden="true" >Sửa</i></span></a>
               <br />
              <a href="{{ route('admin.job.del', $arItem->id_job) }}" onclick="return confirm('Bạn có thật sự muốn xóa không?')"><span class="btn text-danger"><i class="fa fa-times" aria-hidden="true">Xóa</i></span></a>
          </td>
        </tr>
          @endforeach
      </tbody>
  </table>
</div> 
<div class="pull-right">
 {{ $arItems->links() }}
</div>
<br>
</div>

@stop