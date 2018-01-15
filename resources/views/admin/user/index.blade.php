@extends('templates.admin.master')
@section('content')

<div class="container panel">
  <br>
    <div class="rows">
      <div class="col-sm-2">
        <a href="{{ route('admin.user.add') }}" class="h3 btn btn-success btn-lg" style="margin-top: 4px"><i class="fa fa-plus" aria-hidden="true"></i>Thêm</a>
    </div>
    <div class="col-sm-10">
         @if(Session::get('msgS') != null)
             <div class="alert alert-success">{{ Session::get('msgS') }}</div>
         @elseif(Session::get('msgW') != null)
            <div class="alert alert-warning">{{ Session::get('msgW') }}</div>
          @endif
    </div>
   <div class="clearfix"></div>
    </div>
    <br>
	<div class="table-responsive">
        <table class="table tab-border table-hover center">
        	<thead>
        		<tr class="active">
            		<th>STT</th>
                    <th>Tên</th>
                    <th>Cấp bậc</th>
                    <th>Chức năng</th>
            	</tr>
        	</thead>
            <tbody>
               @foreach($arItems as $arItem)
               <?php 
                  $id = $arItem->id;
                ?>           	
                <tr >
                	<td>{{ $id }}</td>
                    <td>
                      <?php 
                      $picture = ($arItem->picture != '')?$arItem->picture:'vodanh.jpeg';
                       ?>
                        <img src="/storage/app/files/{{ $picture }}" alt="" class="imgComany" width="100px" >
                       <span>{{ $arItem->fullname }}
                      </span>
                       <div class="clearfix"></div>
                    </td>
                    <td>{{ $arItem->name }}</td>
                    <td>
                        <a href="{{ route('admin.user.edit',$id) }}" ><span class="btn" ><i class="fa fa-pencil" aria-hidden="true" >Sửa</i></span></a>
                         <br />
                         @if( $arItem->level_id == 4 )
                         <a href="{{route('admin.candidate.edit',$arItem->phone)}}" ><span class="btn" ><i class="fa fa-plus" aria-hidden="true" >Hồ sơ</i></span></a>
                         <br />
                         @elseif($arItem->level_id == 3 )
                         <a href="{{route('admin.company.edit',$arItem->phone)}}" ><span class="btn" ><i class="fa fa-plus" aria-hidden="true" >Hồ sơ</i></span></a>
                         <br />
                         @endif 

                        @if($arItem->active == 1)
                        <span class="btn text-success"><i class="fa fa-eye" aria-hidden="true">Hoạt động</i></span>
                        <br />
                        @else 
                        <span class="btn text-success"><i class="fa fa-eye-slash" aria-hidden="true">khóa</i></span>
                        <br />
                        @endif
                       @if($arItem->level_id != 1)
                        <a href="{{ route('admin.user.del',$id) }}" onclick="return confirm('Bạn có thật sự muốn xóa không?')"><span class="btn text-danger"><i class="fa fa-times" aria-hidden="true">Xóa</i></span></a>
                      @endif
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