@extends('templates.admin.master')
@section('content')
<form action="{{route('admin.job.sendmanymail',$id_job)}}" method="post" id="xoa" >
{{csrf_field()}}
<div class="container">
<div class="col-sm-12">
 @if(Session::get('msgS') != null)
   <div class="alert alert-success">{{ Session::get('msgS') }}</div>
@elseif(Session::get('msgW') != null)
  <div class="alert alert-warning">{{ Session::get('msgW') }}</div>
@endif
</div>
</div>
<div class="container panel">
<a href="{{route('admin.job.selectcv', ['id' =>$id_job, 'status' => 0])}}" class="btn text-{{ Request::is('*/0')?'warning':'default'}}">Mới</a>
<a href="{{route('admin.job.selectcv', ['id' =>$id_job, 'status' => 1])}}" class="btn text-{{ Request::is('*/1')?'warning':'default'}}">Fail</a>
<a href="{{route('admin.job.selectcv', ['id' =>$id_job, 'status' => 2])}}" class="btn text-{{ Request::is('*/2')?'warning':'default'}}">Pass</a>
<br>
<div class="col-sm-2 col-xs-2">
  <a href="javascript:void(0)" class="btn btn-success" id="sendemail"><i class="fa fa-reply"></i>Trả lời</a>
  <div class="modal fade" id="formsendemail" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
      <div class="modal-content" style="padding:40px 50px;">
          <div class="rows">
            <h4>Thư trả lời ứng tuyển công việc: {{$nameJob}} ({{ (Auth::user()->level_id == 3)?Auth::user()->fullname:''}})</h4>
            <div class="form-group">
              <input type="hidden" name="subject" value="Thư trả lời ứng tuyển công việc: {{$nameJob}} ({{ (Auth::user()->level_id == 3)?Auth::user()->fullname:''}})">
              <p>Xin chào, [Họ Tên người nhận]</p>
              <textarea name="content" class="col-sm-12" rows="10" required="" placeholder="Cảm ơn bạn đã ứng tuyển..."></textarea>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="form-group">
              <input class="form-control btn btn-danger" type="submit" value="Gửi">
            </div>
          </div>
      </div>
    </div>
  </div> 
<script>
$(document).ready(function(){
  $("#sendemail").click(function(){
      $("#formsendemail").modal();
  });
});
</script>
</div>
<div class="clearfix"></div>
<p>
<br>
<label><input type="checkbox" id="checkAll"/> Chọn hết / Bỏ chọn hết</label>
</p>
<div class="table-responsive">
<table class="table tab-border table-hover center">
    <thead>
        <tr class="active">
            <th>STT</th><!--sắp xếp theo thứ tự từ thấp tới cao, gửi trước, xếp trước-->
            <th width="40%">Họ Tên</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
      @foreach($arItems as $arItem)
        <tr>
            <td>
              <input type="checkbox" value="{{$arItem->user_id}}" name="xoa[]"/>
              @if($arItem->sendmail)
                <span class="glyphicon glyphicon-envelope"></span>
              @endif
              {{ $arItem->id_listjob }}
            </td>
            <td>
               <img src="{{$PublicUrl}}/img/member.jpg" alt="" class="imgComany" width="50px" >
                <p>{{ $arItem->fullname }}</p>
                <a href="/storage/app/cv/{{ $arItem->cv_file }}" target="blanck"><span class="btn" ><i class="fa fa-download" aria-hidden="true" >download CV</i></span></a>
                <div class="clearfix"></div>
            </td>
            <td>
              <a href="{{route('admin.candidate.view',$arItem->file_id)}}" ><span class="btn btn-success"><i class="fa fa-eye" aria-hidden="true">Xem CV</i></span></a>
              
              <a href="javascript:void(0)" onclick="return assessCV({{ $arItem->id_listjob }})"><span class="btn btn-success" ><i class="fa fa-pencil" aria-hidden="true" >Chú thích</i></span></a>
              
              <!-- <a href="" onclick="return confirm('Bạn có thật sự muốn xóa không?')"><span class="btn btn-danger"><i class="fa fa-times" aria-hidden="true">Xóa</i></span></a> -->
            </td>
        </tr>
        <tr class="assesscv{{ $arItem->id_listjob }}">
          
        </tr>
      @endforeach
    </tbody>
</table>

</div> 
<div class="pull-right">
{{ $arItems->links() }}
</div>
</div>
</form>
<script type="text/javascript">
    $("#checkAll").change(function () {
            $("input:checkbox").prop('checked', $(this).prop("checked"));
        });
</script>
<script type="text/javascript">
  function assessCV(id){
    <?php 
    $url = Request::url();
    $ar =  explode('/', $url);
    $key = $ar[3];
    ?>

    $.ajax({
        url: '/{{$key}}/job/assess/'+id, 
        type: 'GET',
        dataType: 'html',
        data: {
        },
        success: function(data){
            var a ='.assesscv'+id;
            $(a).html(data);
        },
        error: function(){
          alert('Sai');
        }
      });
    }
    function dong(id){
      var a ='.assesscv'+id;
      $(a).html('');
    }
</script>
@stop