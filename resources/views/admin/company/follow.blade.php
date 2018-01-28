@extends('templates.admin.master')
@section('content')
<div class="container panel">
  <br>
<div class="row">
 @if(Session::get('msgS') != null)
 <div class="alert alert-success">{{ Session::get('msgS') }}</div>
 @elseif(Session::get('msgW') != null)
    <div class="alert alert-warning">{{ Session::get('msgW') }}</div>
  @endif
</div>   
<h4 class="text-success">Các công ty bạn đã theo dõi</h4>
<br><div class="table-responsive">
<table class="table tab-border table-hover center">
<thead>
	<tr class="active">
  		<th>STT</th>
        <th>Tên công ty</th>
        <th>Tỉnh/Thành phố</th>
    		<th>Thời gian</th>
        <th>Bỏ theo dõi</th>
  	</tr>
</thead>
  <tbody>
     @foreach($arItems as $arItem)    
     <?php $id = $arItem->id; ?>       	
      <tr>
      	<td>{{$arItem->id_follow}}</td>
          <td>
            <?php $picture = ($arItem->picture != '')?$arItem->picture:'vodanh.jpeg'; ?>
            <img src="/storage/app/files/{{ $picture }}" alt="" class="imgComany" width="50px" >
            <a href="{{route('jobs.detail_company',['name'=>str_slug($arItem->fullname),'id'=>$arItem->id])}}"><span>{{ $arItem->fullname }}</span></a>
             @if(Auth::user()->level_id == 1)
              <a href="{{route('admin.user.edit',$arItem->id)}}" class="btn">Xem tài khoản</a>
              @endif
             <div class="clearfix"></div>
          </td>
          <td>Đà Nẵng</td>
          <td>{{ date('d-m-Y H:i:s', strtotime($arItem->created_at)) }}</td>
          <td>
            <a href="{{ route('admin.company.delfollow',$arItem->id_follow) }}"><span class="btn" ><i class="fa fa-time text-danger" aria-hidden="true" >x</i></span></a>
               <br />
          </td>
      </tr>
      @endforeach
  </tbody>
</table>
</div> 
<div class="pull-right">
 {{ $arItems->links() }}
</div>
</div>

@stop