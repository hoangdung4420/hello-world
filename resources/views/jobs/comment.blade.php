<div class="col-sm-12"> 
  <hr />
  <p class="title-date"><b>Chúng tôi rất vui nếu bạn để lại comment...</b></p>
</div>
<div class"row">
  <?php 
    $email ='';
    $hoten ='';
    if(Auth::check()){
      $email = Auth::user()->email;
      $hoten = Auth::user()->fullname;
      $readonly = 'readonly';
    }

   ?>
  <form action="javascript:void(0)" class="contact_form" method="post"  form="comment" >
    <div class="col-sm-6">
      <div class="form-group">
        <input type="text" name="hoten" class="form-control hoten" {{$readonly or ''}} required="" placeholder="Nhập họ tên" value="{{$hoten}}">
      </div>

    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <input type="email" name="email" class="form-control email " {{$readonly or ''}} required="" placeholder="Nhập email" value="{{$email}}">
       </div>
    </div>  
    <div class="col-sm-12">
      <div class="form-group">
        <textarea name="content" placeholder="Nội dung bình luận"  required="" class="form-control content" rows="7"></textarea>
       </div>
    </div>  
    <div class="thong-bao"></div>
    <div class="smt1">
      <div class="col-sm-4">
        <div class="form-group">
          <input type="submit"  name="submit" id="submit" data-idnew="{{$oItem->id_job}}" value="Gửi" class="btn btn-block btn-primary" onclick = "XuLiCMT()" />
        </div>
      </div>
      </div>
  </form>   
</div>
<hr>


<!--hiển thị tin nhắn-->
<div class="container" id="comment">
  <div class="row">
      <div class="col-md-12">
        <div class="page-header">

          <?php $tongCmt = count($arCmtParent) + count($arCmtChild); ?>
          <h1>{{ $tongCmt}} Bình luận </h1>
        </div>  
        <ul class="comment-list">

          @foreach($arCmtParent as $parent)
          <li id="cmt-{{$parent->id_comment}}">
              <div class="media">
               <!-- <p class="pull-right"><small>5 days ago</small></p> -->
               <div class="col-sm-2">
                 
                  <img src="/storage/app/files/vodanh.jpeg" width="100px">
               </div>
                <div class="media-body col-sm-10">
                    
                  <h4 class="media-heading user_name">{{$parent->fullname}} </h4>
                  <p> Lúc:  {{ date("d-m-Y H:i:s", strtotime($parent->created_at)) }}</p>
                  {{ $parent->content }}
                  
                  <p><small><a href="javascript:void(0)" class="btn btn-default rep-a" data-a="{{$parent->id_comment}}" onclick="return repa({{$parent->id_comment}})"><i class="fa fa-reply"></i>Trả lời</a> </small></p>
                </div>

              </div>

             <ul class="replay" id="replay{{$parent->id_comment}}"> 
             @foreach($arCmtChild as $child)

                @if($child->parent_id == $parent->id_comment)
               <li id="cmt-{{$child->id_comment}}">
                  <div class="col-md-2"></div> 
                   <div class="col-md-8">
                    <div class="media">
                     <div class="col-sm-2">
                        <img src="/storage/app/files/vodanh.jpeg" width="100px">
                     </div>
                      <div class="media-body col-sm-10">
                        <h4 class="media-heading user_name">{{$child->fullname}}</h4>
                        <p> Lúc:  {{ date("d-m-Y H:i:s", strtotime($child->created_at)) }}</p>
                        {{$child->content}}
                        <p><small><a href="javascript:void(0)" class="btn btn-default rep-a" data-a="{{$parent->id_comment}}" onclick="return repa({{$parent->id_comment}})"><i class="fa fa-reply"></i>Trả lời</a> </small></p>
                      </div>
                    </div>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                  </li>
                @endif 
             @endforeach
           </ul>
           <!--form trả lời-->
             <div class="rep-form{{$parent->id_comment}} col-sm-offset-2" style="display:none; padding-bottom: 10px" >

                <form action="javascript:void(0)" class="contact_form" method="post"  form="comment" >
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="hoten" class="form-control hoten{{$parent->id_comment}}"  required="" {{$readonly or ''}} placeholder="Nhập họ tên" value="{{$hoten}}">
                    </div>

                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control email{{$parent->id_comment}} " required="" {{$readonly or ''}} placeholder="Nhập email" value="{{$email}}">
                     </div>
                  </div>  
                  <div class="col-sm-12">
                    <div class="form-group">
                      <textarea name="content" placeholder="Nội dung bình luận"  required="" class="form-control content{{$parent->id_comment}}" rows="7"></textarea>
                     </div>
                  </div>  
                    <div class="col-sm-8">
                      <div class="form-group">
                        <input type="submit"  name="submit" id="submitReplay" data-idnew="{{$oItem->id_job}}" value="Gửi" class="btn btn-primary" onclick = "XuLiREPCMT({{$parent->id_comment}})" />
                      </div>
                    </div>

                </form> 
             </div>
              <div class="clearfix"></div>
             </li>
          @endforeach
       
       </ul>
      </div>
  </div>
</div>

<script type="text/javascript">
  function repa(id){
    $(".rep-form"+id).slideToggle();
    return false;
  }

  function XuLiCMT(){ 
    hoten = $(".hoten").val();
    email = $(".email").val();
    content = $(".content").val();
    id_job = $("#submit").attr("data-idnew");
    
    $.ajax({
      url: "{{ route('jobs.sendcmt') }}",
      type: 'POST',
      data: { 
         _token: '{{ csrf_token() }}',
        ahoten:hoten,
        aemail:email,
        acontent:content,
        aid_job:id_job,
      },
      success: function(data){
        if($(".comment-list li").length == 0){
          $(".comment-list").html(data);
        }else{
          $("ul.comment-list li:eq(0)").before(data);
        } 
        @if(!Auth::check())
        $(".hoten").val("");
        $(".email").val("");
         @endif
        $(".content").val("");
      },
      error: function (){ 
         alert('có lỗi');
      }
    });
  }
  </script>
  <script type="text/javascript">
  function XuLiREPCMT(id){
    hoten = $(".hoten"+id).val();   
    email = $(".email"+id).val();
    content = $(".content"+id).val();
    idjob = $("#submitReplay").attr("data-idnew");
    $.ajax({
      url: "{{route('jobs.repcmt')}}",
      type: 'POST',
      data: { 
         _token: '{{ csrf_token() }}',
        aidReCmt:id,
        ahoten:hoten,
        aemail:email,
        acontent:content,
        aid_job:idjob,
      },
      success: function(data){
        $("#replay"+id).append(data);
        @if(!Auth::check())
        $(".hoten"+id).val("");
        $(".email"+id).val("");
        @endif
        $(".content"+id).val("");
      },
      error: function (){
        alert('có lỗi');
      }
    });
  }
</script>