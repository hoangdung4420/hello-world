@extends('templates.admin.master')
@section('content')
<div class="container">
    <div class="col-sm-12">
         <div class="status alert alert-success">Lưu thành công</div>
       <!--  <div class="status alert alert-danger">Có lỗi khi thêm</div> -->
    </div>
        
</div>

<div class="container">
   <a href="" class="btn">Mới</a>
    <a href="" class="btn">Fail</a>
    <a href="" class="btn">Pass</a>
    <br>
    <br>
    <div class="table-responsive">
        <table class="table tab-border table-hover center">
            <thead>
                <tr class="active">
                    <th>STT</th><!--sắp xếp theo thứ tự từ thấp tới cao, gửi trước, xếp trước-->
                    <th width="40%">Họ Tên</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <tr class="unread checked">
                    <td>1</td>
                    <td>
                       <img src="{{$PublicUrl}}/img/member.jpg" alt="" class="imgComany" width="50px" >
                        <p>Nguyễn Thị Anh</p>
                        <a href="javascript:void(0)"><span class="btn" ><i class="fa fa-download" aria-hidden="true" >download CV</i></span></a>
                        <a href="javascript:void(0)"><span class="btn" ><i class="fa fa-reply" aria-hidden="true" >Trả lời</i></span></a>
                        <div class="clearfix"></div>
                    </td>
                    <td>
                      <a href="" ><span class="btn btn-success"><i class="fa fa-eye" aria-hidden="true">Xem CV</i></span></a>
                      
                      <a href="javascript:void(0)"><span class="btn btn-success" ><i class="fa fa-pencil" aria-hidden="true" >Chú thích</i></span></a>
                        
                      <a href="" onclick="return confirm('Bạn có thật sự muốn xóa không?')"><span class="btn btn-danger"><i class="fa fa-times" aria-hidden="true">Xóa</i></span></a>
                    </td>
                </tr>
                <tr>
                  <td colspan="3">
                    <form action="" id="">
                    <div class="col-sm-7">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Đánh giá cv này" name="name" required="">
                        </div>
                      </div> 
                      <div class="col-sm-3">
                        <div class="form-group">
                          <select class="form-control" name="parent_id">
                             <option value="0"> Mới</option>
                             <option value=""> Fail</option>
                             <option value=""> Pass</option>
                          </select>
                        </div>
                      </div>
                    <div class="col-sm-1">
                      <input class="form-control btn btn-default" type="submit" value="Lưu">
                    </div>
                    <div class="col-sm-1">
                      <input class="form-control btn btn-default" type="btn" value="hủy">
                    </div>
                </form>
                  </td>
                </tr>
            </tbody>
        </table>

   </div> 
   <div class="pull-right">
       <ul class="pagination">
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
        </ul>
   </div>
</div>

@stop