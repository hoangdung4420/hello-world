@extends('templates.admin.master')
@section('content')

<div class="container panel">
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
                    <th>Thời gian gửi</th>
            	</tr>
        	</thead>
            <tbody>
                @foreach($arItems as $arItem)
                <tr >
                	<td>1</td>
                    <td>
                     <?php $picture = ($arItem->picture != '')?$arItem->picture:'vodanh.jpeg'; ?>
                        <img src="/storage/app/files/{{ $picture }}" alt="" class="img-responsive" width="50px">
                        <span>{{ $arItem->fullname }}</span>
                        <div class="clearfix"></div>
                    </td>
                    <td>
                        <h5>{{ $arItem->subject }}</h5>
                        <span>{{ $arItem->content }}</span>
                        <p>
                           <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal"><span class="btn" ><i class="fa fa-mail-reply" aria-hidden="true" >Trả lời</i></span></a>
                            <a href="" onclick="return confirm('Bạn có thật sự muốn xóa không?')"><span class="btn text-danger"><i class="fa fa-times" aria-hidden="true">Xóa</i></span></a>
                        </p>
                    </td>
                    <td>{{ date('d-m-Y H:i:s', strtotime($arItem->created_at)) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $arItems->links() }}
   </div> 
</div>

@stop