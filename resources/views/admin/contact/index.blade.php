@extends('templates.admin.master')
@section('content')

<div class="container panel">
  <br>
<a href="{{route('admin.contact.index')}}" class="btn btn-{{ Request::is('*contact')?'success':'default'}}">Thư đã nhận</a>
<a href="{{route('admin.contact.send')}}" class="btn btn-{{ Request::is('*send*')?'success':'default'}}">Thư đã gửi</a> 
@if(Auth::user()->level_id < 3)
 <a href="{{route('admin.contact.indexother')}}" class="btn btn-{{ Request::is('*other')?'success':'default'}}">Thư khác</a>
@endif
  <br>
    <div class="row">
     @if(Session::get('msgS') != null)
     <div class="alert alert-success">{{ Session::get('msgS') }}</div>
     @elseif(Session::get('msgW') != null)
        <div class="alert alert-warning">{{ Session::get('msgW') }}</div>
      @endif
    </div>  
<br>
<div class="table-responsive">
    <table class="table tab-border table-hover">
    	<thead>
    		<tr class="active">
        		<th>STT</th>
        		<th>Người gửi</th>
        		<th width="40%">Nội dung</th>
                <th>Thời gian gửi</th>
        	</tr>
    	</thead>
        <tbody>
            @foreach($arItems as $arItem)
            <tr >
            	<td>{{$arItem->id_contact}}</td>
                <td>
                  @if($arItem->fullname != Auth::user()->fullname)
                    <span>{{ $arItem->fullname }}</span>
                  @else 
                    <span>Tôi</span>
                  @endif
                    <div class="clearfix"></div>
                </td>
                <td>
                    <h5>{{ $arItem->subject }}</h5>
                    <span>{!! nl2br($arItem->content) !!}</span>
                    <p>
                        @if(Auth::user()->email != $arItem->email)
                       <a href="javascript:void(0)" onclick="repcontact({{ $arItem->id_contact }})"><span class="btn" ><i class="fa fa-mail-reply" aria-hidden="true" >Trả lời</i></span></a>
                       @endif
                       @if(Auth::user()->level_id <3)
                        <a href="{{route('admin.contact.del',$arItem->id_contact)}}" onclick="return confirm('Bạn có thật sự muốn xóa không?')"><span class="btn text-danger"><i class="fa fa-times" aria-hidden="true">Xóa</i></span></a>
                        @endif
                    </p>
                </td>
                <td>{{ date('d-m-Y H:i:s', strtotime($arItem->created_at)) }}</td>
                </tr> 
                <tr class="repcontact{{ $arItem->id_contact }}"  style="display:none; padding-bottom: 10px">
                <td colspan="5" >
                    <form action="{{route('admin.contact.repcontact', $arItem->id_contact)}}" method="post">
                         {{ csrf_field() }}
                          <textarea name="content" class="col-sm-12" required=""></textarea>
                          <div class="clearfix"></div>
                          <br>
                          <input type="submit" name="submit" value="Gửi" class=" btn btn-warning pull-right col-sm-2">
                      </form>  
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $arItems->links() }}
</div> 
</div>
<script>
 function repcontact(id){
    $(".repcontact"+id).slideToggle();
    return false;
  }
</script>
@stop