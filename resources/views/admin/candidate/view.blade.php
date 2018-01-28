@extends('templates.admin.master')
@section('content')
<div class="container panel">
  <br>
  <div class="col-sm-12">
     <h3 class="text-center text text-success">Hồ sơ</h3>
  </div>
    <div class="form-group">
      <label class="control-label col-sm-3" >Tên:</label>
      <div class="col-sm-9">          
        <label>{{ $oItem->fullname }}</label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" >Ngành nghề:</label>
      <div class="col-sm-9" > 
        <div>
            <ul class="ul_candidate">
              @foreach($listCats as $listCat)
              <li><span class="cat_candidate">{{$listCat->name}}</span></li>
              @endforeach
            </ul>
            <div class="clearfix"></div>
          <br>
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
<hr>
    <div class="form-group">
      <label class="control-label col-sm-3" >Mô tả mục tiêu nghề nghiệp:</label>
      <div class="col-sm-9">
      <textarea class="form-control" rows="4">{{$oItem->preview}}</textarea>          
      </div>
    </div>
<div class="clearfix"></div>
    <div class="form-group">
      <label class="control-label col-sm-3" >Bằng cấp:</label>
      <div class="col-sm-9" > 
       <p>{{ $oItem->education }}</p>
      </div>
    </div>
<div class="clearfix"></div>
    <div class="form-group">
      <label class="control-label col-sm-3" >Kỹ năng:</label>
      <div class="col-sm-9" > 
       <p>{{ $oItem->skill }}</p>
      </div>
    </div>
<div class="clearfix"></div>
    <div class="form-group">
      <label class="control-label col-sm-3" >Kinh nghệm:</label>
      <div class="col-sm-9">          
        <p>{{ $oItem->experience }}</p>
      </div>
    </div>
<div class="clearfix"></div>
    <div class="form-group">
      <label class="control-label col-sm-3" >Tham khảo:</label>
      <div class="col-sm-9">          
        <p>{{ $oItem->reference }}</p>
      </div>
    </div>
 <div class="clearfix"></div>   
    <div class="form-group">
      <label class="control-label col-sm-3" >Cấp bậc:</label>
      <div class="col-sm-9" > 
          @foreach($Positions as $position)
          @if($position->id_joblevel == $oItem->job_level)
           <p>{{$position->name}}</p>
           @endif
           @endforeach
      </div>
    </div>
<div class="clearfix"></div>
    <div class="form-group">
      <label class="control-label col-sm-3" >Loại công việc:</label>
      <div class="col-sm-9" > 
            @foreach($Times as $time)
               @if($time->id_time == $oItem->times_id)
               <p>{{$time->detail}}</p>
               @endif
             @endforeach
      </div>
    </div>
 <div class="clearfix"></div> 
    <div class="form-group">
      <label class="control-label col-sm-3" >Mức lương mong muốn:</label>
      <div class="col-sm-9" > 
         <p>{{ $oItem->salary }}</p>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3" >Phúc lợi:</label>
      <div class="col-sm-9">          
        <p>{{ $oItem->benifit }}</p>
      </div>
    </div>
<div class="clearfix"></div>   
<div class="form-group">
        <label class="control-label col-sm-3" >CV: </label>
         @if($oItem->cv_file != '')
       <iframe  src="/storage/app/cv/{{ $oItem->cv_file }}" class="col-sm-9" style="height: 600px"></iframe> 
      @endif
      <div class="clearfix"></div>
      <br>
<br>
    </div>

</div>

@stop