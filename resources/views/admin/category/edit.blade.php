<form action="{{ route('admin.category.edit',$oItem->id_jobcat) }}" method="POST">
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
        <h4 class="text-success" style="margin-top: 4px"><i class="fa fa-plus" aria-hidden="true"></i>Sửa danh mục:</h4>
      </div>
      <div class="col-sm-12">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Nhập tên danh mục" name="name" value="{{$oItem->name}}" >
          </div>
        </div> 
        <div class="col-sm-12">
          <div class="form-group">
            <select class="form-control" name="parent_id">
               <option value="0"> Danh mục cha</option >
                @foreach($CategoryParents as $CategoryParent)
                	<?php 
                    if($oItem->id_jobcat == $CategoryParent->id_jobcat) { continue;}
                    $selected = ($oItem->parent_id == $CategoryParent->id_jobcat)?'selected':'' 
                  ?>
                  <option value="{{$CategoryParent->id_jobcat}}" {{$selected}}>{{$CategoryParent->name}}</option>
                @endforeach
            </select>
          </div>
        </div>
      <div class="col-sm-12">
        <input class="form-control btn btn-success" type="submit" value="Sửa">
      </div>
  </form>