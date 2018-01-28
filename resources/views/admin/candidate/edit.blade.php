@extends('templates.admin.master')
@section('content')
<div class="container panel">
  <br>
  <div class="col-sm-12">
     <h3 class="text-center text text-success">Hồ sơ</h3>
     @if(Session::get('msgS') != null)
       <div class="alert alert-success">{{ Session::get('msgS') }}</div>
   @elseif(Session::get('msgW') != null)
      <div class="alert alert-warning">{{ Session::get('msgW') }}</div>
    @endif
  </div>
  <form class="form-horizontal" action="{{route('admin.candidate.edit',$oItem->id_file)}}" method="POST" enctype="multipart/form-data">
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
        <label>{{ $oItem->fullname }}</label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Ngành nghề:</label>
      <div class="col-sm-10" > 
        <div>
            <ul class="ul_candidate">
              @foreach($listCats as $listCat)
              <li><span class="cat_candidate">{{$listCat->name}}<a href="javascript:void(0)" title="xóa" onclick="delCat({{$listCat->id_listcat}})">X</a></span></li>
              @endforeach
            </ul>
            @if(count($listCats) < 10 )
            <span class="cat_candidate" class="btn dropdown-toggle" data-toggle="dropdown" id="plus">+</span>
            @endif
            <div class="clearfix"></div>
          <br>
          <p>(Chọn tối đa 5 ngành nghề)</p>
          <ul class="dropdown-menu block" role="menu" >
            <?php $i= 1; $a= count($CategoryParents) /3 ; ?>
            @foreach($CategoryParents as $CategoryParent)
              <ul class="col-sm-2">{{$CategoryParent->name}}
                @foreach($CategoryChilds as $CategoryChild)
                @if($CategoryChild->parent_id == $CategoryParent->id_jobcat)
                <li><a href="javascript:void(0)" onclick="addCat({{$CategoryChild->id_jobcat}})" >{{$CategoryChild->name}}</a></li>
                @endif
                @endforeach
              </ul>
              @if($i % 6 == 0)
                <div class="clearfix"></div>
                <hr>
              @endif
              <?php $i++; ?>
            @endforeach
          </ul>
        </div>
      </div>
    </div> 
<script type="text/javascript">
 function addCat(idCat){
    var userId = {{$oItem->user_id}};
   // alert(idCat)
    $.ajax({
        url: "{{ route('admin.listcategory.addcat') }}", 
        type: 'POST',
        dataType: 'html',
        data: {
            _token: '{{ csrf_token() }}',
            idCat : idCat, 
            userId : userId
        },
        success: function(data){
            var a ='.ul_candidate';
            $(a).html(data);
        },
        error: function(){
          alert('Sai');
        }
      });
    }

  function delCat(idListCat){
    var userId = {{$oItem->user_id}};
    $.ajax({
        url: "{{ route('admin.listcategory.delcat') }}", 
        type: 'POST',
        dataType: 'html',
        data: {
            _token: '{{ csrf_token() }}',
            idListCat : idListCat, 
            userId : userId
        },
        success: function(data){
            var a ='.ul_candidate';
            $(a).html(data);
        },
        error: function(){
          alert('Sai');
        }
      });
    }
</script>
<hr>
    <div class="form-group">
      <label class="control-label col-sm-2" >Mô tả mục tiêu nghề nghiệp:</label>
      <div class="col-sm-10">          
        <textarea name="preview" class="form-control" rows="5">{{ $oItem->preview }} </textarea>
        
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Bằng cấp:</label>
      <div class="col-sm-10" > 
       <input type="text" class="form-control"  placeholder="Trung cấp" name="education" value="{{ $oItem->education }}">         
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Kỹ năng:</label>
      <div class="col-sm-10" > 
       <input type="text" class="form-control"  placeholder="Tiếng anh, PPT" name="skill" value="{{ $oItem->skill }}">         
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Kinh nghệm:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control"  placeholder="2 năm ở vị trí makerting" name="experience" value="{{ $oItem->experience }}">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Tham khảo:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control"  placeholder="Mai Vi, giám đốc công ty ABC" name="reference" value="{{ $oItem->reference }}">
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-2" >Cấp bậc:</label>
      <div class="col-sm-10" > 
        <select  class="form-control" name="job_level">
          @foreach($Positions as $position)
          <?php $selected = ($position->id_joblevel == $oItem->job_level)?'selected':'' ?>
           <option value="{{$position->id_joblevel}}" {{$selected}}>{{$position->name}}</option>
           @endforeach
         </select>         
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Loại công việc:</label>
      <div class="col-sm-10" > 
        <select  class="form-control" name="times_id">
            @foreach($Times as $time)
            <?php $selected = ($time->id_time == $oItem->times_id)?'selected':'' ?>
           <option value="{{$time->id_time}}"{{$selected}}>{{$time->detail}}</option>
           @endforeach
         </select>         
      </div>
    </div>
  
    <div class="form-group">
      <label class="control-label col-sm-2" >Mức lương mong muốn:</label>
      <div class="col-sm-10" > 
         <input type="text" class="form-control"  placeholder="5000000" name="salary" value="{{ $oItem->salary }}">        
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Phúc lợi:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control"  placeholder="Lương tháng 13,du lịch hàng năm" name="benifit" value="{{ $oItem->benifit }}">
      </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-sm-2" >CV:</label>
        <div class="col-sm-5">          
           <input type="file" class="btn btn-default" id="exampleInputFile1" name="cv_file">
            <p class="help-block"><em>Định dạng: pdf, dưới 250kb</em></p>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" ></label>
       @if($oItem->cv_file != '')
       <iframe  src="/storage/app/cv/{{ $oItem->cv_file }}" class="col-sm-8" style="height: 600px"></iframe> 
      @endif
     </div> 
      
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-4">
        <div class="checkbox">
          <?php $checked = ($oItem->active == 1)?"checked":'' ?>
          <label><input type="checkbox" {{ $checked }} name="active" value="1">Cho nhà tuyển dụng xem</label>
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

@stop