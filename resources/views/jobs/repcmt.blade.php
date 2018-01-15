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
        <p><small><a href="javascript:void(0)" class="btn btn-default rep-a" data-a="{{$child->parent_id}}" onclick="return repa({{$child->parent_id}})"><i class="fa fa-reply"></i>Trả lời</a> </small></p>
      </div>
    </div>
    </div> 
    <div class="clearfix"></div>
    <br>
  </li>