@extends('templates.admin.master')
@section('content')
@section('ckeditor')
    <script src="/public/ckeditor/ckeditor.js" type="text/javascript"></script>   
    <script src="/public/ckfinder/ckfinder.js" type="text/javascript"></script>
@stop
<div class="container">
  <div class="col-sm-12">
     <h3 class="text-center text text-success">Chi tiết công ty</h3>
  </div>
  <div class="clearfix"></div>
  @if(Session::get('msgS') != null)
       <div class="alert alert-success">{{ Session::get('msgS') }}</div>
   @elseif(Session::get('msgW') != null)
      <div class="alert alert-warning">{{ Session::get('msgW') }}</div>
    @endif
  <form class="form-horizontal" action="{{route('admin.company.edit',$oItem->id_company)}}" method="POST">
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
      <label class="control-label col-sm-2" >Tên công ty:</label> 
      <div class="col-sm-10">          
         <label>{{$oItem->fullname}}</label>
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
            @if(count($listCats) < 5 )
            <span class="cat_candidate" class="btn dropdown-toggle" data-toggle="dropdown">+</span>
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
    //alert(idCat)
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
<hr />
    <div class="form-group">
      <label class="control-label col-sm-2" >Quy mô(người):</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" required="" placeholder="560" name="size" value="{{$oItem->size}}">
      </div>
    </div>
  
    <div class="form-group">
      <label class="control-label col-sm-2" >Phúc lợi:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" required="" placeholder="Lương tháng 13,du lịch hàng năm" name="benifit" value="{{$oItem->benifit}}">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Giới thiệu:</label>
      <div class="col-sm-10">          
        <textarea name="preview" class="form-control ckeditor" required="" rows="5">{{$oItem->preview}}</textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Mô tả:</label>
      <div class="col-sm-10">          
        <textarea name="detail" class="form-control ckeditor" required="" rows="5">{{$oItem->detail}}</textarea>
      </div>
    </div>
<?php $checked = ($oItem->feature == 1)?'checked':''; ?>
@if(Auth::user()->level_id == 1)
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-2">
        <div class="checkbox">
          <label><input type="checkbox" name="feature" {{$checked}}>Nổi bật</label>
        </div>
      </div>
      <label class="control-label col-sm-1" >Lượt đọc:</label>
      <div class="col-sm-1">
        <input type="number" class="form-control" value="{{$oItem->reader}}" name="reader" >
      </div>
      <label class="control-label col-sm-1" >Lượt like:</label>
      <div class="col-sm-1">
        <input type="number" class="form-control" value="chưa làm" name="liked" >
      </div>
      <label class="control-label col-sm-2" >Lượt dislike:</label>
      <div class="col-sm-1">
        <input type="number" class="form-control" value="chưa làm" name="disliked" >
      </div>
    </div>
@else 
   <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-2">
        <div class="checkbox">
          <label> <?php echo ($checked != '')?'Nổi bật':''; ?></label>
        </div>
      </div>
      <label class="col-sm-1" >Lượt đọc:</label>
      <div class="col-sm-1">
        <label>{{$oItem->reader}}</label>
      </div>
      <label class=" col-sm-1" >Lượt like:</label>
      <div class="col-sm-1">
        <label>chưa làm</label>
      </div>
      <label class=" col-sm-2" >Lượt dislike:</label>
      <div class="col-sm-1">
        <label>chưa làm</label>
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