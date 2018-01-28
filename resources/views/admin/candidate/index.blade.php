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
    <div class="row">
         @if(Session::get('msgS') != null)
       <div class="alert alert-success">{{ Session::get('msgS') }}</div>
       @elseif(Session::get('msgW') != null)
          <div class="alert alert-warning">{{ Session::get('msgW') }}</div>
        @endif
    </div> 
        

 @if(Auth::user()->level_id <4)
<div class="">
<form action="{{route('admin.candidate.searchcandidate')}}" id="formS" method="GET">
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
    <input class="form-control"  type="text" id="name" name="name" placeholder ="Tên ứng viên">
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

    <br><br>
    <div class="table-responsive">
        <table class="table tab-border table-hover center">
            <thead>
                <tr class="active">
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th width="20%">Công việc</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
              
               @foreach($arItems as $arItem)
               <?php $id = $arItem->id_file; ?>            
                <tr class="unread checked">
                    <td>{{ $id }}</td>
                    <td>
                      <?php $picture = ($arItem->picture != '')?$arItem->picture:'vodanh.jpeg'; ?>
                        <img src="/storage/app/files/{{ $picture }}" alt="" class="imgComany" width="50px" >
                       <span>{{ $arItem->fullname }}</span>
                       
                        @if(Auth::user()->level_id < 3)
                          <a href="{{route('admin.user.edit',$arItem->id)}}" class="btn">Xem tài khoản</a>
                        @endif
                        <div class="clearfix"></div>
                    </td>
                    <td>
                        {{ $arItem->cate }}
                    </td>
                    <td>
                      @if(Auth::user()->level_id !=3)
                        <a href="{{ route('admin.candidate.edit',$id) }}"><span class="btn" ><i class="fa fa-mail-reply" aria-hidden="true" >Sửa</i></span></a>
                        <br />
                      @endif
                         <a href="{{ route('admin.candidate.view',$id) }}"><span class="btn text-success"><i class="fa fa-eye" aria-hidden="true">Xem</i></span></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

   </div> 
   @if(count($arItems)!=0)
   <div class="pull-right">
       {{ $arItems->links() }}
   </div>
   @endif
</div>

@stop