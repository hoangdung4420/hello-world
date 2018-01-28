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
                         @if(Auth::user()->level_id == 1)
                        <th>Chức năng</th>
                        @endif
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
                       @if(Auth::user()->level_id == 1)
                      <td>
                          <a href="{{route('admin.about.edit',$arItem->id_about)}}" ><span class="btn" ><i class="fa fa-mail-reply" aria-hidden="true" >Sửa</i></span></a>
                      </td>
                      @endif
                  </tr>
                  @endforeach
              </tbody>
          </table>
     </div>
    </div> 
   <div class="clearfix"></div>
</div>
@stop