@extends('templates.admin.master')
@section('content')
<div class="container">

   @if(Session::get('msgS') != null)
       <div class="alert alert-success">{{ Session::get('msgS') }}</div>
   @elseif(Session::get('msgW') != null)
      <div class="alert alert-warning">{{ Session::get('msgW') }}</div>
    @endif
</div>
<div class="container panel">
    <br>
<div class="col-sm-3">
  <div class="panel-default">
    <div class="panel-body" id="form_cat">
      <form action="{{ route('admin.category.add') }}" method="POST">
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
          <div class="col-sm-12">
            <h4 class="class="text-success" style="margin-top: 4px"><i class="fa fa-plus" aria-hidden="true"></i>Thêm danh mục:</h4>
          </div>
          <div class="col-sm-12">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Nhập tên danh mục" name="name" required="">
              </div>
            </div> 
            <div class="col-sm-12">
              <div class="form-group">
                <select class="form-control" name="parent_id">
                   <option value="0"> Danh mục cha</option>
                    @foreach($CategoryParents as $CategoryParent)
                      <option value="{{$CategoryParent->id_jobcat}}">{{$CategoryParent->name}}</option>
                    @endforeach
                </select>
              </div>
            </div>
          <div class="col-sm-12">
            <input class="form-control btn btn-success" type="submit" value="Thêm">
          </div>
      </form>
    </div>
  </div>
<div class="panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Danh mục cha</h3>
    </div>
    <div class="panel-body">
      <ul style="padding-left: 0px">
          @foreach($CategoryParents as $CategoryParent)
            <li><a href="#cat_{{$CategoryParent->id_jobcat}}">{{$CategoryParent->name}}</a></li>
          @endforeach
      </ul>
    </div>
  </div>
  
</div>
<div class="col-sm-9">
	<div class="table-responsive">
    <table class="table tab-border table-hover">
    	<thead>
    		<tr class="active">
        		<th>STT</th>
        		<th>Tên danh mục
            </th>
        		<th>Chức năng</th>
        	</tr>
    	</thead>
        <tbody>
          @foreach($CategoryParents as $CategoryParent)
          <?php 
              $id = $CategoryParent->id_jobcat;
           ?>       	
            <tr id="cat_{{$id}}">
            	<td>{{$id}}</td>
                <td>
                    {{$CategoryParent->name}}
                    <br>
                    <table class="table table-hover">
                        
                   		@foreach($CategoryChilds as $CategoryChild)
                        @if($CategoryParent->id_jobcat == $CategoryChild->parent_id)
                        <?php 
                            $idC = $CategoryChild->id_jobcat;
                         ?> 
                        <tr>
                            <td>*</td>
                            <td width="50%">{{$CategoryChild->name}}</td>
                            <td width="40%">
                             
                              <a href="javascript:void(0)" onclick="editCat({{$idC}})"><span class="btn"><i class="fa fa-eye" aria-hidden="true">Sửa</i></span></a>
                              <a href="{{ route('admin.category.del',$idC) }}" onclick="return confirm('Bạn có thật sự muốn xóa không?')"><span class="btn text-danger"><i class="fa fa-times" aria-hidden="true">Xóa</i></span></a>

                         	</td>
                        </tr>
                       @endif
                       @endforeach

                    </table>
                </td>
                
                <td>
                	<a href="javascript:void(0)" onclick="editCat({{$id}})"><span class="btn btn-success"><i class="fa fa-eye" aria-hidden="true">Sửa</i></span></a>
                    <a href="{{ route('admin.category.del',$id) }}" onclick="return confirm('Tất cả danh mục con cũng sẽ bị xóa. Bạn có thật sự muốn xóa danh mục này không?')"><span class="btn btn-danger"><i class="fa fa-times" aria-hidden="true">Xóa</i></span></a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>      
 </div> 
</div>
<div class="clearfix"></div>
</div>

<script type="text/javascript">
  function editCat(id){
    $.ajax({
        url: 'category/add/'+id, 
        type: 'GET',
        dataType: 'html',
        data: {
        },
        success: function(data){
            var a ='#form_cat';
            $(a).html(data);
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        },
        error: function(){
          alert('Sai');
        }
      });
    }
</script>
@stop