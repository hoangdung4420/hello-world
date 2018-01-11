@extends('templates.admin.master')
@section('ckeditor')
    <script src="/public/ckeditor/ckeditor.js" type="text/javascript"></script>   
    <script src="/public/ckfinder/ckfinder.js" type="text/javascript"></script>
@stop
@section('content')
<div class="container">
  <div class="col-sm-12">
     <h3 class="text-center text text-success">Thêm công việc</h3>
  </div>
  <div class="clearfix"></div>
  <form class="form-horizontal" action="{{route('admin.job.add')}}" method="POST">
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
      <label class="control-label col-sm-2" for="email">Tên công việc:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="title" placeholder="php developer" name="title">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Cấp bậc:</label>
      <div class="col-sm-10" > 
        <select  class="form-control" name="job_level">
          @foreach($Positions as $position)
           <option value="{{$position->id_joblevel}}" >{{$position->name}}</option>
           @endforeach
         </select>         
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Ngành nghề:</label>
      <div class="col-sm-10" > 
        <select class="form-control" name="job_categories">
            @foreach($CategoryChilds as $CategoryChild)
              <option value="{{$CategoryChild->id_jobcat}}" class="col-sm-3">{{$CategoryChild->name}}</option>
            @endforeach
         </select>         
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Nơi làm việc:</label>
      <div class="col-sm-10" > 
        <input type="text" class="form-control"  placeholder="Huế" name="address">
      </div>
    </div>
    
     <div class="form-group">
      <label class="control-label col-sm-2" >Loại công việc:</label>
      <div class="col-sm-10" > 
        <select  class="form-control" name="times_id">
            @foreach($Times as $time)
           <option value="{{$time->id_time}}">{{$time->detail}}</option>
           @endforeach
         </select>         
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Mức lương:</label>
      <div class="col-sm-10" > 
         <input type="text" class="form-control"  placeholder="5000000" name="salary">        
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Hạn nộp hồ sơ:</label>
      <div class="col-sm-4">          
        <input type="date" class="form-control"  placeholder="Enter password" name="expired">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Liên hệ:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control"  placeholder="Nguyễn Thị Anh" name="agency">
      </div>
      <div class="col-sm-3">          
        <input type="email" class="form-control"  placeholder="anh@gmail.com" name="email">
      </div>
      <div class="col-sm-3">          
        <input type="text" class="form-control"  placeholder="0987464567" name="phone">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Mô tả:</label>
      <div class="col-sm-10">          
        <textarea name="preview" id="preview" class="form-control ckeditor" rows="5"></textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Yêu cầu:</label>
      <div class="col-sm-10">          
        <textarea name="required" id="required" class="form-control ckeditor" rows="5"></textarea>
      </div>
    </div>
@if(Auth::user()->level_id == 1)
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-2">
        <div class="checkbox">
          <label><input type="checkbox" name="feature">Nổi bật</label>
        </div>
      </div>
      <label class="control-label col-sm-1" >Lượt đọc:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" value="{{rand(1,10)}}" name="reader" >
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
@stop