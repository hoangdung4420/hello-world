@extends('templates.admin.master')
@section('content')

<div class="container panel">
<br>
@if(Session::get('msgS') != null)
<div class="alert alert-success">{{ Session::get('msgS') }}</div>
@elseif(Session::get('msgW') != null)
<div class="alert alert-warning">{{ Session::get('msgW') }}</div>
@endif
@if(Auth::user()->id <= 2)
<form action="{{route('admin.comment.delmany')}}" method="post" id="xoa" >
{{csrf_field()}}
<div class="rows">
  <div class="col-sm-2 col-xs-2">
    <button type="submit" class="btn btn-warning" onclick="return confirm('Bạn có thật sự muốn xóa không?')"><i class="fa fa-times"></i>Xóa</button>
  </div>
  <div class="clearfix"></div>
  <p>
    <label><input type="checkbox" id="checkAll"/> Chọn hết / Bỏ chọn hết</label>
    </p>
</div>
@endif
<br>
<?php if (isset($arNotDel)){die();dd($arNotDel);} ?>
<div class="table-responsive">
<table class="table tab-border table-hover">
	<thead>
		<tr class="active">
    		<th>STT</th>
    		<th>Người gửi</th>
    		<th width="40%">Nội dung</th>
            <th>Bình luận cho</th>
            <th>Thời gian gửi</th>
    	</tr>
	</thead>
    <tbody>
         @foreach($arItems as $arItem)         	
        <tr >
        	<td>
                <input type="checkbox" value="{{$arItem->id_comment}}" name="xoa[]"/>
                {{ $arItem->id_comment }}
            </td>
            <td>
                @if($arItem->fullname != Auth::user()->fullname)
                    <span>{{ $arItem->fullname }}</span>
                  @else 
                    <span>Tôi</span>
                  @endif
            </td>
            <td>
                @if($arItem->parent_id != 0)
                <p class="rep-comment">Trả lời {{ $arItem->commentparent }}</p>
                @endif
                <span>{{ $arItem->content }}</span>
                <p>
                   <a href="javascript:void(0)"  onclick="repCmt({{ $arItem->id_comment }})" ><span class="btn" ><i class="fa fa-mail-reply" aria-hidden="true" >Trả lời</i></span></a>
                </p>
            </td>
            <td><a href="{{ route('jobs.detail_job',['name'=>str_slug($arItem->job_name),'id'=>$arItem->job_id])}}">{{ $arItem->job_name }}</a></td>
            <td>{{ date('d-m-Y H:i:s', strtotime($arItem->created_at)) }}</td>
        </tr>
        <tr class="form_repCmt{{ $arItem->id_comment }}">
            
        </tr>
        @endforeach
    </tbody>
</table>
<div class="pull-right">
    {{ $arItems->links() }}
</div>
</div> 
@if(Auth::user()->id <= 2)
</form>
<script type="text/javascript">
    $("#checkAll").change(function () {
            $("input:checkbox").prop('checked', $(this).prop("checked"));
        });
</script>
@endif
</div>
<script type="text/javascript">
  function repCmt(id){
    $.ajax({
        url: 'comment/rep/'+id, 
        type: 'GET',
        dataType: 'html',
        data: {
        },
        success: function(data){
            var a ='.form_repCmt'+id;
            $(a).html(data);
        },
        error: function(){
          alert('Sai');
        }
      });
    }
    function dong(id){
      var a ='.form_repCmt'+id;
      $(a).html('');
    }
</script>
@stop