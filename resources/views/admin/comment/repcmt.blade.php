<td colspan="5" >
    <form action="{{route('admin.comment.rep', $id_comment)}}" method="post">
         {{ csrf_field() }}
          <textarea name="content" class="col-sm-12" required=""></textarea>
          <div class="clearfix"></div>
          <br>
          <div class="pull-right">
          		<input type="submit" name="submit" value="Gửi" class=" btn btn-warning ">
	          <span class="btn btn-default" onclick="dong({{$id_comment}})">Đóng</span>  
          </div>
      </form>  
</td>