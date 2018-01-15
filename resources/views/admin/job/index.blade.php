@extends('templates.admin.master')
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
<div class="">
<form action="" id="formS">
  <div class="col-sm-3 col-xs-3">
    <input class="form-control"  type="text" placeholder ="Tên công việc">
  </div>
  <div class="col-sm-3 col-xs-3">
    <input class="form-control"  type="text" placeholder ="Tất cả ngành nghề">
  </div>
  <div class="col-sm-3 col-xs-3">
    <input class="form-control"  type="text" placeholder ="Tất cả địa điểm">
  </div>
  <div class="col-sm-3 col-xs-3">
    <input class="form-control btn btn-danger" type="submit" value="Tìm kiếm">
  </div>
</form>
<br>
</div>
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
          <td>{{ $arItem->created_at }}</td>
          <td>{{ $arItem->expired }}</td>
          <td>{{ $arItem->address }}</td>
          <td>
              <a href="{{ route('admin.job.cv', $arItem->id_job) }}" class="btn btn-success btn-block count-job">50 CV</a>
          </td>
          <td><a href="">chưa làm</a></td>
          <td><a href="">chưa làm</a></td>
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