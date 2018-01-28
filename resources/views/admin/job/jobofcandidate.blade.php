@extends('templates.admin.master')
@section('content')
<div class="container panel">
  <br>
  <a href="{{route('admin.job.index')}}" class="btn btn-{{ Request::is('*job')?'success':'default'}}">Công việc gợi ý</a>
  <a href="{{route('admin.job.hadsendcv',Auth::user()->id)}}" class="btn btn-{{ Request::is('*hadsendcv*')?'success':'default'}}">Đã ứng tuyển</a>
  <a href="{{route('admin.job.likejob',Auth::user()->id)}}" class="btn btn-{{ Request::is('*/like*')?'success':'default'}}">Đã Like</a>
  <a href="{{route('admin.job.dislikejob',Auth::user()->id)}}" class="btn btn-{{ Request::is('*dislike*')?'success':'default'}}">Đã Dislike</a>
<br>
<br>
<div>
 <h4 class="text-success">{{ $notice or ''}}</h4> 
</div>
@if(count($arItems))
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
          @if(!isset($dotime))
          <th>Thời gian</th>
          @endif
        </tr>
    </thead>
    <tbody>
       @foreach($arItems as $arItem)            
        <tr>
          <td> {{ $arItem->id_job }}</td>
          <td>
              <p><a href="{{ route('jobs.detail_job',['name' => str_slug($arItem->title), 'id' => $arItem->id_job ]) }}">{{ $arItem->title }}</a></p>
              <p>{{ $arItem->fullname }}</p>
              @if(isset($arItem->cv_file))
                <a href="/storage/app/cv/{{ $arItem->cv_file }}" target="blanck">Xem cv</a>
              @endif
          </td>
          <td>{{ $arItem->job_categories }}</td>
          <td>{{ $arItem->created_at }}</td>
          <td>{{ $arItem->expired }}</td>
          <td>{{ $arItem->address }}</td>
          <td>{{ $arItem->dotime }}</td>
        </tr>
          @endforeach
      </tbody>
  </table>
</div> 
<div class="pull-right">
 {{ $arItems->links() }}
</div>
<br>
@else 
<div style="height: 300px">
</div>
@endif
</div>

@stop