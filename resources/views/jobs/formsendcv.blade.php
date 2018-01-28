<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        @if(Auth::check())
          @if(Auth::user()->level_id == 4)
        <div class="modal-header" style="padding:35px 50px;">
          @if(Session::get('msgR') != null)
           <div class="alert alert-warning">{{ Session::get('msgR') }}</div>
           @elseif(Session::get('msgS') != null)
           <div class="alert alert-success">{{ Session::get('msgS') }}</div>
           @endif
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4> Bạn đang ứng tuyển cho vị trí {{ $titleJob }} ({{ $companyName }}) </h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="{{ route('jobs.sendcv',$id_job)}}" method="Post" enctype="multipart/form-data">
            {{ csrf_field() }}
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <?php 
              $img ='';
              if(Auth::check()){
                $img = Auth::user()->picture;
                $email = Auth::user()->email;
                $fullname = Auth::user()->fullname;
                $phone = Auth::user()->phone;
              }
             ?>
            <div class="jumbotron" style="">
              <label for="usrname">
                <?php $img = ($img != '')?$img:'vodanh.jpeg'; ?>
                 <a href=""><img src="/storage/app/files/{{ $img }}" alt="" style="width: 60px"></a>
                {{ $fullname or ''}}
              </label>
            </div>
            <div class="form-group">
              <label for="usrname"  class="col-sm-3" style="text-align: right"><span class="glyphicon glyphicon-envelope"></span> Email: </label>
              <span class="col-sm-9"> {{ $email or ''}}</span>
              <div class="clearfix"></div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: right"><span class="glyphicon glyphicon-earphone"></span> Số điện thoại</label>
              <div class="col-sm-9">
                <input type="text" name="phone" class="form-control" id="inputEmail3" placeholder="Số điện thoại" value="{{ $phone or ''}}">
              </div>
              <div class="clearfix"></div>
            </div>
            
            <div class="form-group" >
              <label  class="col-sm-3" style="text-align: right">Hồ sơ </label>
              <label class="col-sm-1"><input type="radio" name="cv" checked="" value="0"></label>
              <label class="col-sm-8">Chọn hồ sơ mới <input type="radio" name="cv" value="1" onclick="clickFile()">
              <input type="file" class="btn btn-default" id="exampleInputFile1" name="cv_file" style="display:none">
              <span class="help-block"><em>Định dạng: pdf, dưới 250kb</em></span></label>
              <div class="clearfix"></div>
            </div>
           <div class="modal-footer">
              <div class="pull-right">
                <button class="btn btn-default btn-default" data-dismiss="modal"> Trở về</button>
                <button type="submit" class="btn btn-success"> Nộp đơn</button>
              </div>
            </div>
          </form>
        </div>
         @else 
           <h4>Chức năng này chỉ dành cho ứng viên</h4>
          @endif
          @endif
      </div>
    </div> 
  </div> 
<script >
$(document).ready(function(){
    $("#myBtnCV").click(function(){
      @if(Auth::check())
        $("#myModal").modal();
      @else 
         $("#myModalLg").modal();
         <?php Session::put('ungtuyen',1) ?>
      @endif
    });
});
function clickFile() {
    document.getElementById("exampleInputFile1").click();
}

  @if(Session::get('ungtuyens') == 2 || Session::get('msgR') != null)
  window.onload = function()
{
    $("#myModal").modal();
};
  @endif
</script>
