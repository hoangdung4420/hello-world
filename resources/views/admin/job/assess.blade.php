<td colspan="3" >
          <form action="{{route('admin.job.assesscv',$arItem->id_listjob)}}" method="post">
            {{ csrf_field() }}
            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif
          <div class="col-sm-7">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Đánh giá cv này" name="note" value="{{ $arItem->note }}">
              </div>
            </div> 
            <div class="col-sm-3">
              <div class="form-group">
                <select class="form-control" name="status">
                   <option value="0" {{ ($arItem->status == 0)?'selected':'' }}> Mới</option>
                   <option value="1" {{ ($arItem->status == 1)?'selected':'' }}> Fail</option>
                   <option value="2" {{ ($arItem->status == 2)?'selected':'' }}> Pass</option>
                </select>
              </div>
            </div>
          <div class="col-sm-1">
            <input class="form-control btn btn-warning" type="submit" value="Lưu">
          </div>
          <div class="col-sm-1">
           <span class="btn btn-default" onclick="dong({{$arItem->id_listjob}})">Đóng</span>
          </div>
      </form>
        </td>