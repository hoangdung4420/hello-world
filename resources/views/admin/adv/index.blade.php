@extends('templates.admin.master')
@section('content')
<div class="container panel">
  <br>
    <div class="col-sm-2">
        <a href="{{ route('admin.adv.add') }}" class="h3 btn btn-success btn-lg" style="margin-top: 4px"><i class="fa fa-plus" aria-hidden="true"></i>Thêm</a>
    </div>
    <div class="col-sm-10">
          @if(Session::get('msgS') != null)
             <div class="alert alert-success">{{ Session::get('msgS') }}</div>
         @elseif(Session::get('msgW') != null)
            <div class="alert alert-warning">{{ Session::get('msgW') }}</div>
          @endif
    </div>
     <div class="clearfix"></div>       

<div class="">
  <a href="{{route('admin.adv.arrange',4)}}" class="btn">Hoạt động</a>
  <a href="{{route('admin.adv.arrange',3)}}" class="btn">Khóa</a>
  <a href="{{route('admin.adv.arrange',1)}}" class="btn">Slice</a>
  <a href="{{route('admin.adv.arrange',0)}}" class="btn">right-bar</a>
</div>

	<div class="table-responsive">
        <table class="table tab-border table-hover center">
        	<thead>
        		<tr class="active">
            		<th>STT</th>
                    <th width="30%">Tên</th>
                    <th>Hình ảnh</th>
                		<th>link</th>
                    <th>Chức năng</th>
            	</tr>
        	</thead>
            <tbody>
               @foreach($arItems as $arItem)           	
               <?php $id=$arItem->id_adv; ?>
                <tr class="unread checked">
                	<td>{{$id}}</td>
                    <td>
                       <span>{{$arItem->name}}</span>
                    </td>
                    <td><img src="/storage/app/files/{{ $arItem->picture }}" alt="" class="imgComany" width="400px" ></td>
                    <td>
                        <a href="{{$arItem->link}}">link</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.adv.edit',$id) }}"><span class="btn" ><i class="fa fa-pencil" aria-hidden="true" >Sửa</i></span></a>
                       
                        <a href="{{route('admin.adv.del',$id)}}" onclick="return confirm('Bạn có thật sự muốn xóa không?')"><span class="btn text-danger"><i class="fa fa-times" aria-hidden="true">Xóa</i></span></a>
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