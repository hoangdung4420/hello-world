<div class="modal-header" style="padding:35px 50px;">
   @if(Session::get('msgS') != null)
   <div class="alert alert-success">{{ Session::get('msgS') }}</div>
   @elseif(Session::get('msgW') != null)
   <div class="alert alert-warning">{{ Session::get('msgW') }}</div>
   @endif
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h3 class="panel-title text-center">Đăng nhập</h3>
</div>
<div class="modal-body" style="padding:40px 50px;" id="formlogin">
  <form action="{{ route('logincandiate') }}" method="POST" >
    {{ csrf_field() }}
     
      <div class="form-group"> 
      <input class="form-control"  type="text" name="email" placeholder ="Email">
      </div>
      <div class="form-group">
      <input class="form-control"  type="password" name="password" placeholder ="Mật khẩu">
      </div>
      <div class="">
        <input class="form-control btn btn-danger" type="submit" value="Gửi">
      </div>
  </form>
</div>
<div class="modal-footer">
  <p>Chưa có tài khoản? <a href="javascript:void(0)" onclick="signupa()">Đăng ký</a></p>
  <!-- <p>Forgot <a href="#">Password?</a></p> -->
</div>

 