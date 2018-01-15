@extends('templates.admin.master')
@section('content')
  <div class="container panel">
    <br>
    <div class="col-sm-12">
       <h3 class="text-center text text-success">Sửa người dùng</h3>
    </div>
    <form class="form-horizontal" action="{{route('admin.adv.edit',$oItem->id_adv)}}" enctype="multipart/form-data" method="POST">
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
          <input type="text" class="form-control"  placeholder="Mai Anh,FPT" name="name" value="{{$oItem->name}}">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" >link:</label>
        <div class="col-sm-10">          
          <input type="url" class="form-control"  placeholder="http://getbootstrap.com.vn/css/" name="link" value="{{ $oItem->link }}">
        </div>
      </div>
      <div class="form-group">
      <label class="control-label col-sm-2" >phân loại:</label>
      <div class="col-sm-10" > 
        <select class="form-control" name="slice">
          @if($oItem->slice == 1)
           <option value="1" selected>slice</option>
           <option value="0" >right-bar</option>
           @else 
            <option value="1">slice</option>
           <option value="0"  selected>right-bar</option>
           @endif
         </select>         
      </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" >Hình ảnh:</label>
        <div class="col-sm-5">          
           <input type="file" class="btn btn-default" id="exampleInputFile1" name="picture">
            <p class="help-block"><em>Định dạng: jpg, png, jpeg,...</em></p>
        </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Ảnh cũ:</label>
        <div class="col-sm-10">          
           <img src="/storage/app/files/{{ $oItem->picture }}" width="200px" alt="" />
        </div>
    </div>
    
@if(Auth::user()->level_id == 1)
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="active" {{ ($oItem->active == 1)?'checked':'' }}>Kích hoạt</label>
        </div>
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