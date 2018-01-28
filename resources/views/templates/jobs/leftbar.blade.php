<div class="col-sm-2 col-sx-2">
  		<div class="bs-docs-sidebar hidden-print" role="complementary">
            <ul class="nav bs-docs-sidenav" style="padding: 10px;border:1px solid #eee;margin-top: 15px ">
      				<?php $i = 0; ?>
      		@if(isset($arDistrict) && $arDistrict != null)
				<li>
				  <a href="#dropdowns" class="alert alert-success">Địa điểm</a>
				  <ul class="nav">
				  	<li>
				    	<input type="radio" id="districtAll" name="district" checked value=""> Tất cả
				    </li>
				  	@foreach($arDistrict as $val)
				  	<li>
				    	@if($i>6)
				    	<div style="display:none" class="readmore">
				    		<label class="form-check-label"><input type="radio" id="{{str_slug($val->name) }}" name="district" value="{{$val->name}}"  > {{$val->name }}</label>
				    	</div>
						@else 
						<div>
							<label class="form-check-label"><input type="radio" id="{{str_slug($val->name) }}" name="district" value="{{$val->name}}" > {{$val->name }}</label>
						</div>
				    	@endif
				    </li>
				    <?php $i++ ?>
				    @endforeach
				    <li onclick="readmore()"><p class="text-danger">Xem thêm</p></li>
				  </ul>
				</li>
				<script>
				 function readmore(){
				    $(".readmore").slideToggle();
				    return false;
				  }
				</script>
				@endif
				<li>
					<br>
				  <a href="#dropdowns" class="alert alert-success">Vị trí</a>
				  <ul class="nav">
				  	<li>
				    	<label class="form-check-label"><input type="radio" id="positionAll" name="position" checked value=""> Không yêu cầu</label>
				    </li>
				  	@foreach($Positions as $val)
				  	<li>
				    	<label class="form-check-label"><input type="radio" id="{{$val->id_joblevel }}" name="position" value="{{$val->id_joblevel}}"> {{$val->name }}</label>
				    </li>
				    @endforeach
				  </ul>
				</li>
				<li>
					<br>
				  <a href="#dropdowns" class="alert alert-success">Loại công việc</a>
				  <ul class="nav">
				  	<li>
				    	<label class="form-check-label"><input type="radio" id="All" name="time" checked value=""> Không yêu cầu</label>
				    </li>
				  	@foreach($Times as $val)
				  	<li>
				    	<label class="form-check-label"><input type="radio" id="time{{$val->id_time }}" name="time" value="{{$val->id_time}}"> {{$val->detail }}</label>
				    </li>
				    @endforeach
				  </ul>
				</li>
			<!-- 	<li>
				<br>
			  <a href="#dropdowns" class="alert alert-success">Giới tính</a>
			  <ul class="nav">
			  	<li>
			    	<input type="checkbox" name="gender[]" id="genderAll" value="3"> Không yêu cầu
			    </li>
			    <li>
			    	<input type="checkbox" name="gender[]" value="1"> Nam
			    </li>
			    <li>
			    	<input type="checkbox" name="gender[]" value="0"> Nữ
			    </li>
			  </ul>
			</li> -->
				<li>
					<br>
				  <a href="#dropdowns" class="alert alert-success">Mức lương</a>
				  <ul class="nav">
				  	<li>
				    	<label class="form-check-label"><input type="radio" id="salaryAll" name="salary" checked value="salaryAll"> Không yêu cầu</label>
				    </li>
				    <li>
				    	<label class="form-check-label"><input type="radio" id="0" name="salary" value="agree"> Thỏa thuận</label>
				    </li>
				  	<li>
				    	<label class="form-check-label"><input type="radio" id ="0-5000000" name="salary" value="0-5000000"> dưới 5 triệu</label>
				    </li>
				    <li>
				    	<label class="form-check-label"><input type="radio" id ="5000000-10000000"  name="salary" value="5000000-10000000"> 5-10 triệu</label>
				    </li>
				    <li>
				    	<label class="form-check-label"><input type="radio" id ="10000000-15000000" name="salary" value="10000000-15000000"> 10-15 triệu</label>
				    </li>
				    <li>
				    	<label class="form-check-label"><input type="radio" id ="15000000-20000000" name="salary" value="15000000-20000000"> 15-20 triệu</label>
				    </li>
				    <li>
				    	<label class="form-check-label"><input type="radio" id ="than20000000" name="salary" value="than20000000"> >=20 triệu</label>
				    </li>
				  </ul>
				</li>
            </ul>
      	</div>
  	</div>
<script>
	$(function(){
        // lương
        var el=$('input:radio[name="salary"]');
        el.on('change', function(e){
            if($(this).attr('id')!= 'salaryAll')
            {
                if($(this).is(':checked')){
                    el.not($(this)).prop('checked', false);
                } else {
                    el.not($(this)).prop('checked', false);
                    $(this).prop('checked', true);
                    
                }
            }
            $('#formSearch').submit();
        });
        // vị trí
        var el2=$('input:radio[name="position"]');
        el2.on('change', function(e){
            if($(this).attr('id')!= 'positionAll')
            {
                if($(this).is(':checked')){
                    el.not($(this)).prop('checked', false);
                } else {
                    el.not($(this)).prop('checked', false);
                    $(this).prop('checked', true);
                }
            }
            $('#formSearch').submit();
        });
        // thoi gian
        var el3=$('input:radio[name="time"]');
        el3.on('change', function(e){
            if($(this).attr('id')!= 'All')
            {
                if($(this).is(':checked')){
                    el.not($(this)).prop('checked', false);
                } else {
                    el.not($(this)).prop('checked', false);
                    $(this).prop('checked', true);
                }
            }
            $('#formSearch').submit();
        });
        @if(isset($arDistrict) && $arDistrict != null)
        // quận
        var el3=$('input:radio[name="district"]');
        el3.on('change', function(e){
            if($(this).attr('id')!= 'districtAll')
            {
                if($(this).is(':checked')){
                    el.not($(this)).prop('checked', false);
                } else {
                    el.not($(this)).prop('checked', false);
                    $(this).prop('checked', true);
                }
            }
            $('#formSearch').submit();
        });
        @endif
});
</script>
@if(isset($key))
<script>
  window.onload = function()
{
    $("#name").val("{{$key['name']}}");
    $("#category").val("{{$key['category']}}");
    $("#cities").val("{{$key['cities']}}");
    @if(isset($key['position']))
    $("#{{$key['position']}}").prop("checked", true);
    @endif
    @if(isset($key['salary']))
    $("#{{$key['salary']}}").prop("checked", true);
    @endif
    @if(isset($key['time']))
    $("#time{{$key['time']}}").prop("checked", true);
    @endif
    @if(isset($key['district']))
    $("#{{str_slug($key['district'])}}").prop("checked", true);
    @endif
};
</script>
@endif