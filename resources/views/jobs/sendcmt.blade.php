 <li id="cmt-{{$cmt->id_comment}}">
  <div class="media">
   <!-- <p class="pull-right"><small>5 days ago</small></p> -->
   <div class="col-sm-2">
     
      <img src="/storage/app/files/vodanh.jpeg" width="100px">
   </div>
    <div class="media-body" class="col-sm-10">
        
      <h4 class="media-heading user_name">{{$cmt->fullname}}</h4>
      <p> Lúc:  {{ date("d-m-Y H:i:s", strtotime($cmt->created_at)) }}</p>
      {{ $cmt->content }}
      
      <p><small><a href="javascript:void(0)" class="btn btn-default rep-a" data-a="{{$cmt->id_comment}}" onclick="return repa({{$cmt->id_comment}})"><i class="fa fa-reply"></i>Trả lời</a> </small></p>
      
    </div>
  </div>

 <ul class="replay" id="replay{{$cmt->id_comment}}"> 
</ul>
<!--form trả lời-->
<?php 
    $email =''; 
    $hoten ='';
    if(Auth::check()){
      $email = Auth::user()->email;
      $hoten = Auth::user()->fullname;
      $readonly = 'readonly';
    }

   ?>
 <div class="rep-form{{$cmt->id_comment}} col-sm-offset-2" style="display:none;" >
    <form action="javascript:void(0)" class="contact_form" method="post" id="comment" form="comment" >
      <!--<input type="hidden" name="_token" value="NDeKFrO7voAWxNc6IGr3LIsOGY57ASxCxtW4gM6O">-->
      <div class="col-sm-6">
        <div class="form-group">
          <input type="text" name="hoten" {{$readonly or ''}} class="form-control hoten{{$cmt->id_comment}}"  required="" placeholder="Nhập họ tên" value="{{$hoten}}">
        </div>

      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <input type="email" name="email" class="form-control email{{$cmt->id_comment}} " {{$readonly or ''}}  required="" placeholder="Nhập email" value="{{$email}}">
         </div>
      </div>  
      <div class="col-sm-12">
        <div class="form-group">
          <textarea name="content" placeholder="Nội dung bình luận"  required="" class="form-control content{{$cmt->id_comment}}" rows="7"></textarea>
         </div>
      </div>  
      <div class="thong-bao"></div>
      <div class="smt1">
        <div class="col-sm-8">
          <div class="form-group">
            <input type="submit"  name="submit" id="submitReplay" data-idnew="{{$cmt->job_id}}" value="Gửi" class="btn btn-primary" onclick = "XuLiREPCMT({{$cmt->id_comment}})" />
          </div>
        </div>
        </div>
    </form>   
 </div>
 <div class="clearfix"></div>
 </li>