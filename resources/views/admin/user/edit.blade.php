@extends('templates.admin.master')
@section('content')
  <div class="container panel">
    <br>
    <div class="col-sm-12">
       <h3 class="text-center text text-success">Sửa thông tin người dùng </h3>
    </div>
    <div class="clearfix"></div>
    @if(Session::get('msgS') != null)
         <div class="alert alert-success">{{ Session::get('msgS') }}</div>
     @elseif(Session::get('msgW') != null)
        <div class="alert alert-warning">{{ Session::get('msgW') }}</div>
      @endif
    <form class="form-horizontal" action="{{ route('admin.user.edit',$oItem->id) }}" enctype="multipart/form-data" method="POST">
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
      <div class="form-group">
        <label class="control-label col-sm-2" >Tên:</label>
        <div class="col-sm-10">          
          <input type="text" class="form-control" required=""  placeholder="Mai Anh,FPT" name="fullname" value="{{ $oItem->fullname }}">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" >Email:</label>
        <div class="col-sm-10">          
          <input type="email" class="form-control" required="" placeholder="anh@gmail.com" name="email" value="{{ $oItem->email }}">
        </div>
      </div>
      
      <div class="form-group">
        <label class="control-label col-sm-2" >Mật khẩu cũ:</label>
        <div class="col-sm-10">          
          <input type="password" class="form-control"  placeholder="Mai Anh,FPT" name="oldpassword">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" >Mật khẩu mới:</label>
        <div class="col-sm-10">          
          <input type="password" class="form-control"  placeholder="Mai Anh,FPT" name="newpassword">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" >SĐT:</label>
        <div class="col-sm-10">          
          <input type="text" class="form-control" required=""  placeholder="FPT" name="phone" value="{{ $oItem->phone }}">
        </div>
      </div>
@if(Auth::user()->level_id == 1)
      <div class="form-group">
      <label class="control-label col-sm-2" >Cấp bậc:</label>
      <div class="col-sm-10" > 
        <select class="form-control" name="level_id">
          @foreach($Levels as $level)
          <?php $selected = ($oItem->level_id == $level->id_level)?'selected':'' ?>
           <option value="{{ $level->id_level }}" {{$selected}}>{{ $level->name }}</option>
           @endforeach
         </select>         
      </div>
    </div>
@else 
 <div class="form-group">
      <label class="control-label col-sm-2" >Cấp bậc:</label>
      <div class="col-sm-10" >
      <select class="form-control" name="level_id"> 
         @foreach($Levels as $level)
            @if($oItem->level_id == $level->id_level)
              <option value="{{ $level->id_level }}">{{ $level->name }}</option>
            @endif
          @endforeach
       </select>
      </div>
    </div>
@endif
 @if($oItem->level_id == 3)
      <div class="form-group">
        <label class="control-label col-sm-2" >Ngày thành lập</label>
        <div class="col-sm-10">          
          <input type="date" class="form-control" name="birthday" value="{{ $oItem->birthday }}">
        </div>
      </div>
@else
    <div class="form-group">
        <label class="control-label col-sm-2" >Giới tính:</label>
        <div class="col-sm-2">          
          <input type="radio" name="gender" value="0" {{($oItem->gender==0)?'checked':''}}> Nam
          <input type="radio" name="gender" value="1" {{($oItem->gender==1)?'checked':''}}> Nữ
        </div>
        <label class="control-label col-sm-2" >Ngày sinh: </label>
        <div class="col-sm-6">          
          <input type="date" class="form-control" name="birthday" value="{{ $oItem->birthday }}">
        </div>
      </div>
@endif
      <div class="form-group">
        <label class="control-label col-sm-2" > Địa chỉ:</label>
        <div class="col-sm-10" > 
          <input type="text" class="form-control" required=""  placeholder="34 Lê Duẩn" name="address" value="{{ $oItem->address }}">
        </div>
      </div>

    <div class="form-group">
        <label class="control-label col-sm-2" >Ảnh đại diện:</label>
        <div class="col-sm-5">          
           <input type="file" class="btn btn-default" id="exampleInputFile1" name="picture">
            <p class="help-block"><em>Định dạng: jpg, png, jpeg,...</em></p>
        </div>
    </div>
@if($oItem->picture != '')
    <div class="form-group">
      <label class="control-label col-sm-2" >Ảnh cũ:</label>
        <div class="col-sm-10">          
           <img src="/storage/app/files/{{ $oItem->picture }}" width="200px" alt="" /> Xóa <input type="checkbox" name="delete_picture" value="1" />
        </div>
    </div>
@endif
@if(Auth::user()->level_id == 1 )
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <?php $check = ($oItem->active == 0)?"checked":''; ?>
          <label><input type="checkbox" name="active" {{$check}}>Khóa tài khoản</label>
        </div>
         @if($oItem->level_id != 1)
          <a href="{{ route('admin.user.del',$oItem->id) }}" onclick="return confirm('Bạn có thật sự muốn xóa không?')"><span class="btn text-danger"><i class="fa fa-times" aria-hidden="true">Xóa tài khoản</i></span></a>
          @endif
      </div>
    </div>
    
@endif   
      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </div>
    </form>
  </div>

<script type="text/javascript">
  function changeDistrict(){
    var id = $("#province").val();
    $.ajax({
        url: "{{ route('plus.ajaxdistric') }}", 
        type: 'POST',
        dataType: 'html',
        data: {
            _token: '{{ csrf_token() }}',
            aid:id, 
        },
        success: function(data){
            var a ='#district';
            $(a).html(data);
        },
        error: function(){
          alert('Sai');
        }
      });
    }
</script>
@stop