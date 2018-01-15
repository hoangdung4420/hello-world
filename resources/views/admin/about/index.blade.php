@extends('templates.admin.master')
@section('content')
<div class="container panel">
  <br>
  	<div class="col-sm-12">
      <div class="table-responsive">
          <table class="table tab-border table-hover center">
              <tbody>
                <thead>
                    <tr class="active">
                        <th>Tên</th>
                        <th>Nội dung</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                 @foreach($arItems as $arItem)            
                  <tr>
                      <td>
                         <span>{{ $arItem->title }}</span>
                      </td>
                      <td> 
                        {!! $arItem->detail !!}
                      </td>
                      <td>
                          <a href="{{route('admin.about.edit',$arItem->id_about)}}" ><span class="btn" ><i class="fa fa-mail-reply" aria-hidden="true" >Sửa</i></span></a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
     </div>
    </div> 
   <div class="clearfix"></div>
</div>
@stop