<div class="cat-head">
   <h5 class="col-black"> Services ({{count($data)}}) </h5>
   <div class="action-buttons"> <a href="javascript:void()" class="fa fa-plus addService" data-id="{{base64_encode($cat_id)}}"></a> </div>
</div>
<div class="all-categories">
   @foreach($data as $val)
      <div class="cat-box1 serviceDetail" data-id="{{base64_encode($val->id)}}">
         <h5> {{$val->name}} </h5>
         <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fas fa-ellipsis-v"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
               <li><a href="javascript:void(0)" class="deleteService" data-href="{{URL::to('/practitioner/service/delete/'.base64_encode($val->id))}}">Delete</a></li>
               <li><a href="javascript:void(0)" class="editService" data-id="{{base64_encode($val->id)}}">Edit</a></li>
               <li><a href="javascript:void(0)" class="addAddons" data-id="{{base64_encode($val->id)}}">Cariants/Add-ons</a></li>
               <li><a href="#">Disable</a></li>
            </ul>
         </div>
      </div>
   @endforeach
   @if(count($data) == '0')
      <h5>No Services Available.</h5>
   @endif
</div>
