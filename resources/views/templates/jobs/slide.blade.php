
<div id="myCarousel" class="carousel slide" data-ride="carousel"  >
  
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
   @include('templates.jobs.imgslice')

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
   <div class="carousel-caption "  style="background: #eef;padding: 20px">
	<form action="{{route('jobs.searchjob')}}" id="formSearch" method="GET">
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
	    <div class="col-sm-3 col-xs-3">
	      <input class="form-control"  type="text" id ="name" name="name" placeholder ="Công việc muốn tìm">
	    </div>
	    <div class="col-sm-4 col-xs-4 ui-widget">
		  <input class="form-control"  type="text" id="category" name="category" placeholder ="Tất cả ngành nghề">
	    </div>
	   <div class="col-sm-2 col-xs-2 ui-widget">
           <input class="form-control"  type="text" id="cities" name="cities" placeholder ="Tỉnh/Thành phố">
     </div>

      <div class="col-sm-1 col-xs-1">
        <input class="form-control btn btn-default" type="reset" value="X">
      </div>
	    <div class="col-sm-2 col-xs-2">
        <input class="form-control btn btn-danger" type="submit" value="Tìm kiếm">
      </div>
</div>
</div>
<script>
$(function() {
    $( "#cities" ).autocomplete({ 
      source: "{{route('plus.autocompleteprovince')}}",
      select: function(e, ui) {
      $("#cities").autocomplete("search", ui.item.label);
      
       },
    });
});
</script>
<script>
$(function() {
    $( "#category" ).autocomplete({ 
      source: "{{route('plus.autocompletecategory')}}",
    });
});
</script>


