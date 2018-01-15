@extends('templates.admin.master')
@section('ckeditor')
    <script src="/public/ckeditor/ckeditor.js" type="text/javascript"></script>   
    <script src="/public/ckfinder/ckfinder.js" type="text/javascript"></script>
@stop
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
  <form class="form-horizontal" action="{{route('admin.about.edit',$oItem->id_about)}}" method="POST">
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
      <label class="control-label col-sm-2" >Tiêu đề:</label>
      <div class="col-sm-10">          
        <label>{{ $oItem->title }}</label>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Chi tiết:</label>
      <div class="col-sm-10">          
        <textarea name="detail" class="form-control ckeditor" required="" rows="5">{{ $oItem->detail }} </textarea>
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