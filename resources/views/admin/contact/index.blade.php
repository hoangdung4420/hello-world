@extends('templates.admin.master')
@section('content')

<div class="container">
    <a href="" class="btn">Tất cả</a>
    <a href="" class="btn">Đã trả lời</a>
    <a href="" class="btn">Chưa trả lời</a>
    <br>
    <br>
	<div class="table-responsive">
        <table class="table tab-border table-hover">
        	<thead>
        		<tr class="active">
            		<th>STT</th>
            		<th>Người gửi</th>
            		<th width="40%">Nội dung</th>
                    <th>Công việc</th>
                    <th>Thời gian đăng</th>
            	</tr>
        	</thead>
            <tbody>
                          	
                <tr class="unread checked">
                	<td>1</td>
                    <td>
                        <img src="{{$PublicUrl}}/img/member.jpg" alt="" class="img-responsive" width="50px">
                        <span>Mai Anh</span>
                        <p>maianh@gmail.com</p>
                    </td>
                    <td>
                        <h5>Mời phỏng vấn</h5>
                        <span>CV của bạn đã được duyệt. Mời bạn đến công ty chúng tôi để phỏng vấn vào ngày 12/03/2017.</span>
                        <p>
                           <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal"><span class="btn" ><i class="fa fa-mail-reply" aria-hidden="true" >Trả lời</i></span></a>
                            <a href="" onclick="return confirm('Bạn có thật sự muốn xóa không?')"><span class="btn text-danger"><i class="fa fa-times" aria-hidden="true">Xóa</i></span></a>
                        </p>
                    </td>
                    <td><a href="">Phó Tổng Giám Đốc Kinh Doanh BĐS Chủ Đầu Tư</a></td>
                    <td>02/03/2017 06:17:23</td>
                </tr>
            </tbody>
        </table>
   </div> 
</div>

@stop