@extends('templates.admin.master')
@section('ckeditor')
    <script src="/public/ckeditor/ckeditor.js" type="text/javascript"></script>   
    <script src="/public/ckfinder/ckfinder.js" type="text/javascript"></script>
@stop
@section('content')
<div class="container panel">
  <br>
  
   @if(Session::get('msgS') != null)
       <div class="alert alert-success">{{ Session::get('msgS') }}</div>
   @elseif(Session::get('msgW') != null)
      <div class="alert alert-warning">{{ Session::get('msgW') }}</div>
    @endif
  <div class="col-sm-12">
     <h3 class="text-center text text-success">Sửa công việc</h3>
  </div>
  <div class="clearfix"></div>
  <form class="form-horizontal" action="{{route('admin.job.edit', $oItem->id_job)}}" method="POST">
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
      <label class="control-label col-sm-2" >Tên công việc:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="title" placeholder="php developer" name="title" value="{{$oItem->title}}">
      </div>
    </div>
@if(Auth::user()->level_id == 1)
    <div class="form-group">
      <label class="control-label col-sm-2" >Tên công ty:</label>
      <div class="col-sm-10">
        <select  class="form-control" name="user_id">
          @foreach($Companies as $company)
          <?php $selected = ($oItem->user_id == $company->id)?"selected":"";?>
           <option value="{{$company->id}}" {{ $selected }}>{{$company->fullname}}</option>
           @endforeach
         </select>
      </div>
    </div>
@endif
    <div class="form-group">
      <label class="control-label col-sm-2" >Cấp bậc:</label>
      <div class="col-sm-10" > 
        <select  class="form-control" name="job_level">
          @foreach($Positions as $position)
          <?php $selected = ($oItem->job_level == $position->id_joblevel)?"selected":"";?>
           <option value="{{$position->id_joblevel}}" {{ $selected }} >{{$position->name}}</option>
           @endforeach
         </select>         
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Ngành nghề:</label>
      <div class="col-sm-10" > 
        <select class="form-control" name="job_categories">
            @foreach($CategoryChilds as $CategoryChild)
            <?php $selected = ($oItem->job_categories == $CategoryChild->id_jobcat)?"selected":"";?>
              <option value="{{$CategoryChild->id_jobcat}}" class="col-sm-3" {{ $selected }} >{{$CategoryChild->name}}</option>
            @endforeach
         </select>         
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Nơi làm việc:</label>
      <div class="col-sm-10" > 
        <input type="text" class="form-control" required="" placeholder="Huế" name="address" value="{{$oItem->address}}">
      </div>
    </div>
    
     <div class="form-group">
      <label class="control-label col-sm-2" >Loại công việc:</label>
      <div class="col-sm-10" > 
        <select  class="form-control" name="time_id">
            @foreach($Times as $time)
            <?php $selected = ($oItem->time_id == $time->id_time)?"selected":"";?>
           <option value="{{$time->id_time}}" {{ $selected }}>{{$time->detail}}</option>
           @endforeach
         </select>         
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Mức lương:</label>
      <div class="col-sm-10" > 
         <input type="text" class="form-control" required="" placeholder="5000000" name="salary" value="{{$oItem->salary}}">        
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Hạn nộp hồ sơ:</label>
      <div class="col-sm-4">          
        <input type="date" class="form-control" required="" placeholder="02/03/2018" name="expired" value="{{$oItem->expired}}">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Liên hệ:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control" required="" placeholder="Nguyễn Thị Anh" name="agency" value="{{$oItem->agency}}">
      </div>
      <div class="col-sm-3">          
        <input type="email" class="form-control" required="" placeholder="anh@gmail.com" name="email" value="{{$oItem->email}}">
      </div>
      <div class="col-sm-3">          
        <input type="text" class="form-control" required="" placeholder="0987464567" name="phone" value="{{$oItem->phone}}">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Mô tả:</label>
      <div class="col-sm-10">          
        <textarea name="preview" id="preview" required="" class="form-control ckeditor" rows="5">{{$oItem->preview}}</textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Yêu cầu:</label>
      <div class="col-sm-10">          
        <textarea name="required" id="required" required="" class="form-control ckeditor" rows="5">{{$oItem->required}}</textarea>
      </div>
    </div>
@if(Auth::user()->level_id == 1)
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-2">
        <div class="checkbox">
          <?php $checked = ($oItem->feature == 1)?"checked":"";?>
          <label><input type="checkbox" name="feature" {{$checked}}>Nổi bật</label>
        </div>
      </div>
      <label class="control-label col-sm-1" >Lượt đọc:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" value="{{$oItem->reader}}" name="reader" >
      </div>
    </div>
@else 
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-2">
        <div class="checkbox">
          
          <label><?php echo ($oItem->feature == 1)?"Nổi bật":"";?></label>
        </div>
      </div>
      <label class="control-label col-sm-1" >Lượt đọc:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" value="{{$oItem->reader}}" name="reader" >
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