@extends('templates.jobs.master')

@section('content')

@include('templates.jobs.slide')

@include('templates.jobs.sumary')

<div class="content-page">
	<br>
  	<div class="col-sm-8 col-sx-8">
  		<div class="panel panel-default">
		  <div class="panel-body">
		    <h4>Việc làm theo ngành nghề</h4>
		  </div>
		  <div class="panel-footer list-cate">
		  	<div class="col-sm-4">
		  		<ul>
		  			<?php 
		  				$break = round(count($CategoryParents) /3);
		  				$i=0;
		  			 ?>
		  			@foreach($CategoryParents as $CategoryParent)
		  			<?php $i++ ?>
		  			<li>
		  				<h4>{{ $CategoryParent->name }}</h4>
		  				<ul>
		  				@foreach($CategoryChilds as $CategoryChild)	
		  					@if($CategoryChild->parent_id == $CategoryParent->id_jobcat)
		  					<?php 
		  					$name_slug = str_slug($CategoryChild->name);
		  					$url = route('jobs.jobcat',['name'=>$name_slug, 'id'=>$CategoryChild->id_jobcat]);
		  					 ?>
							<li><a href="{{$url}}">{{ $CategoryChild->name }}</a></li>
							@endif
						@endforeach
						</ul>
		  			</li>
		  		@if($i == $break || $i == $break*2)
					</ul>
			  	</div>
				<div class="col-sm-4">
			  		<ul>
		  		@endif
		  			@endforeach
		  		</ul>
		  	</div>
		  	<div class="clearfix"></div>
		  </div>
		</div>
		<div class="panel panel-default">
		  <div class="panel-body">
		  		<h4>Gợi ý việc làm</h4>
		  	</div>
		  <div class="panel-footer ">
		  	@foreach($arJobs as $arJob)
		    <div class="col-sm-6">
				<div class="panel panel-default">
					<div class="col-sm-3">
						<?php 
                      $picture = ($arJob->picture != '')?$arJob->picture:'vodanh.jpeg';
                       ?>
						<img src="/storage/app/files/{{ $arJob->picture }}" alt="" class="thumbnail img-responsive">
					</div>
					<div class="col-sm-9">
						<?php 
		  					$name_slug = str_slug($arJob->title);
		  					$url = route('jobs.detail_job',['name'=>$name_slug, 'id'=>$arJob->id_job]);
	  					 ?>
						<h4><a href="{{ $url }}">{{ $arJob->title }}</a></h4>
						<span>{{ $arJob->fullname }}</span>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			@endforeach

			<div class="clearfix"></div>
			<br>
		  </div>
		</div>	

  	</div>

	<div class="col-sm-4 col-sx-4">
		<div class="panel panel-default">
		  <div class="panel-body">
		  		<h4><a href="">Công ty tuyển dụng hàng đầu</a>  <span>Xem thêm>></span></h4>
		  	</div>
		  <div class="panel-footer ">
		  	@foreach($arCompanies as $arCompany)
		    <div class="col-sm-6">
				<?php 
		            $picture = ($arJob->picture != '')?$arJob->picture:'vodanh.jpeg';
		            $name_slug = str_slug($arCompany->fullname);
					$url = route('jobs.detail_company',['name'=>$name_slug, 'id'=>$arCompany->id]);
               ?>
				<a href="{{ $url }}"><img src="/storage/app/files/{{ $arCompany->picture }}" alt="" class="thumbnail img-responsive"></a>
			</div>
			@endforeach
			<div class="clearfix"></div>
		  </div>
		</div>	
	</div>
  	<div class="clearfix"></div>
</div>
@stop
