@extends('templates.admin.master')
@section('content')
<div class="container">
    <div class="row">
         @if(Session::get('msgS') != null)
       <div class="alert alert-success">{{ Session::get('msgS') }}</div>
       @elseif(Session::get('msgW') != null)
          <div class="alert alert-warning">{{ Session::get('msgW') }}</div>
        @endif
    </div> 
        
</div>
 <div class="container">
    <form action="" id="formS">
        <div class="col-sm-3 col-xs-3">
          <input class="form-control"  type="text" placeholder ="Tên ứng viên">
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
</div>
<div class="container">
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
                        <p>{{ $arItem->email }}</p> 
                        @if(Auth::user()->level_id == 1)
                          <a href="{{route('admin.user.edit',$arItem->id)}}" class="btn">Xem tài khoản</a>
                        @endif
                        <div class="clearfix"></div>
                    </td>
                    <td>
                        {{ $arItem->preview }}
                    </td>
                    <td>
                        <a href="{{ route('admin.candidate.edit',$id) }}"><span class="btn" ><i class="fa fa-mail-reply" aria-hidden="true" >Sửa</i></span></a>
                         <br />
                         <a href="{{ route('admin.candidate.view',$id) }}"><span class="btn text-success"><i class="fa fa-eye" aria-hidden="true">Xem</i></span></a>
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