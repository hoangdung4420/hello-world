@extends('templates.admin.master')
@section('content')
  <div class="container">
    <div class="col-sm-12">
       <h3 class="text-center text text-success">Thêm người dùng </h3>
    </div>
    <div class="clearfix"></div>
    <form class="form-horizontal" action="{{ route('admin.user.add') }}" enctype="multipart/form-data" method="POST">
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
        <label class="control-label col-sm-2" >Tên(*):</label>
        <div class="col-sm-10">          
          <input type="text" class="form-control"  placeholder="Mai Anh,FPT" name="fullname" >
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" >Email(*):</label>
        <div class="col-sm-10">          
          <input type="email" class="form-control"  placeholder="anh@gmail.com" name="email" >
        </div>
      </div>
      
      <div class="form-group">
        <label class="control-label col-sm-2" >Mật khẩu(*):</label>
        <div class="col-sm-10">          
          <input type="password" class="form-control"  placeholder="Mai Anh,FPT" name="password">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" >SĐT(*):</label>
        <div class="col-sm-10">          
          <input type="text" class="form-control"  placeholder="FPT" name="phone">
        </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-2" >Cấp bậc(*):</label>
      <div class="col-sm-10" > 
        <select class="form-control" name="level_id">
          @foreach($levels as $level)
           <option value="{{ $level->id_level }}">{{ $level->name }}</option>
           @endforeach
         </select>         
      </div>
    </div>

      <!-- <div class="form-group">
        <label class="control-label col-sm-2" >Ngày thành lập</label>
        <div class="col-sm-10">          
          <input type="date" class="form-control" name="birthday">
        </div>
      </div> -->

    <div class="form-group">
        <label class="control-label col-sm-2" >Giới tính:</label>
        <div class="col-sm-2">          
          <input type="radio"  name="gender" value="0"> Nam
          <input type="radio"  name="gender" value="1" checked> Nữ
        </div>
        <label class="control-label col-sm-2" >Ngày sinh: </label>
        <div class="col-sm-6">          
          <input type="date" class="form-control" name="birthday">
        </div>
      </div>

      <div class="form-group">
      <label class="control-label col-sm-2" > Địa chỉ:</label>
      <div class="col-sm-3" > 
        <select  class="form-control" name="province_id" onmouseout="changeDistrict()" id="province">
          <option value="0">Tỉnh/Thành phố</option>
           @foreach($Provinces as $province)
           <option value="{{ $province->id_province }}" >{{ $province->type }} {{ $province->name }}</option>
           @endforeach
         </select>         
      </div>
      <div class="col-sm-3" id="district"> 
        <select class="form-control" name="district_id" >
          <option value="0">Quận/Huyện</option>
           @foreach($Districts as $district)
           <option value="{{ $district->id_district }}">{{ $district->type }} {{ $district->name }}</option>
           @endforeach
         </select>         
      </div>
      <div class="col-sm-4" > 
        <input type="text" class="form-control"  placeholder="34 Lê Duẩn" name="address" >         
      </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" >Ảnh đại diện:</label>
        <div class="col-sm-5">          
           <input type="file" class="btn btn-default" id="exampleInputFile1" name="picture">
            <p class="help-block"><em>Định dạng: jpg, png, jpeg,...</em></p>
        </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="active">Khóa tài khoản</label>
        </div>
      </div>
    </div>
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