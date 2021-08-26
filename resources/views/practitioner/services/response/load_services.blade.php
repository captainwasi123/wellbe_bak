<div class="cat-head">
   <h5 class="col-black"> Services ({{count($data)}}) </h5>
</div>
<div class="all-categories">
   @foreach($data as $val)
      <div class="cat-box1 serviceDetail {{empty($val->userSer->id) ? 'disabledService' : ''}}" data-id="{{base64_encode($val->id)}}">
         <h5> {{$val->name}} </h5>
         @if($val->status != 1)
         <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fas fa-ellipsis-v"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
               <li><a href="javascript:void(0)" class="editService" data-id="{{base64_encode($val->id)}}">Edit</a></li>
               @if(empty($val->userSer->id))
                  <li><a href="javascript:void(0)" class="enableService" data-id="{{base64_encode($val->id)}}">Enable</a></li>
               @else
                  <li><a href="javascript:void(0)" class="disableService" data-id="{{base64_encode($val->userSer->id)}}">Disable</a></li>
               @endif
            </ul>
         </div>
         @endif
      </div>
   @endforeach
   @if(count($data) == '0')
      <h5>No Services Available.</h5>
   @endif
</div>
