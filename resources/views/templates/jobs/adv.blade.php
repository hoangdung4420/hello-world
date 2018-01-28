	<div class="adv">
		@foreach($RightbarSlices as $val)
			<a href="{{ $val->link }}"><img src="/storage/app/files/{{$val->picture}}" alt="Los Angeles" class="img-responsive"></a>
		@endforeach
	</div>
