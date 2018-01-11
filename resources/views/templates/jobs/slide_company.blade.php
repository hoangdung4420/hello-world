<div id="myCarousel" class="carousel slide" data-ride="carousel"  >
  
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" >
    <div class="item active">
      <img src="{{$PublicUrl}}/img/slide2.jpg" alt="Los Angeles" class="img-responsive">
    </div>

    <div class="item">
      <img src="{{$PublicUrl}}/img/slide2.jpg" alt="Chicago" class="img-responsive">
    </div>

    <div class="item">
      <img src="{{$PublicUrl}}/img/slide2.jpg" alt="New York" class="img-responsive">
    </div>

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
   <div class="carousel-caption " >
	<form action="" id="formSearch">
	    <div class="col-sm-3 col-xs-3">
	      <input class="form-control" id="focusedInput" type="text" placeholder ="Tên công ty">
	    </div>
	    <div class="col-sm-3 col-xs-3">
		  <input class="form-control" id="focusedInput" type="text" placeholder ="Tất cả ngành nghề">
	    </div>
	    <div class="col-sm-3 col-xs-3">
		  <input class="form-control" id="focusedInput" type="text" placeholder ="Tất cả địa điểm">
	    </div>
	    <div class="col-sm-3 col-xs-3">
	      <input class="form-control btn btn-danger" type="submit" value="Tìm kiếm">
	    </div>
	</form>
</div>
</div>