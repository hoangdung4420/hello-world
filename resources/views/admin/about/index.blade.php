@extends('templates.admin.master')
@section('content')
<div class="container">
  	<div class="col-sm-12">
      <div class="table-responsive">
          <table class="table tab-border table-hover center">
              <tbody>
                <thead>
                    <tr class="active">
                        <th>Tên</th>
                        <th>Nội dung</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                 @foreach($arItems as $arItem)            
                  <tr>
                      <td>
                         <span>{{ $arItem->title }}</span>
                      </td>
                      <td> 
                        @if($arItem->social == 1)
                        <textarea class="form-control" name="" placeholder="Mạng xã hội" id="detail_{{ $arItem->id_about }}" rows="2">{{ $arItem->detail }}</textarea>
                        @else
                        <textarea class="form-control" name="" placeholder="Nội dung" id="detail_{{ $arItem->id_about }}" rows="6">{{ $arItem->detail }}</textarea>
                        @endif
                      </td>
                      <td>
                          <a href="javascript:void(0)" onclick="editAbout({{ $arItem->id_about }})"><span class="btn" ><i class="fa fa-mail-reply" aria-hidden="true" >Sửa</i></span></a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
     </div>
    </div> 
   <div class="clearfix"></div>
</div>

<script type="text/javascript">
  function editAbout(id){
    var detail = $("#detail_"+id).val();
    $.ajax({
        url: "{{ route('admin.about.edit') }}", 
        type: 'POST',
        dataType: 'html',
        data: {
            _token: '{{ csrf_token() }}',
            aid:id, 
            adetail:detail, 
        },
        success: function(data){
            var a ='#detail_'+id;
            $(a).html(data);
        },
        error: function(){
          alert('Sai');
        }
      });
    }
</script>
@stop