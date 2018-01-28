<?php $i = 1; ?>
     <div class="carousel-inner" >
     	@foreach($AdvSlices as $val)
    	<div class="item {{($i == 1)?'active':''}}">
      		<center><a href="{{ $val->link }}"><img src="/storage/app/files/{{$val->picture}}" alt="Los Angeles" class="img-responsive"></a></center>
    	</div>
    	 <?php $i++ ?>
    	@endforeach
    </div>
   
 