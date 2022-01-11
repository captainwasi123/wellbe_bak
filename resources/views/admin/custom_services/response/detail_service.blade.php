<div class="cat-head">
   <h5 class="col-black"> Services Details </h5>
</div>
<div class="manicure-text">
   <h5 class="col-black"> {{$data->name}} </h5>
   <h6 class="col-blue"> NZ$ {{number_format($data->price, 2)}} </h6>
   <p> {{$data->description}} </p>
   <hr>
   <h5 class="col-black"> Preparation </h5>
   <p> {{$data->long_description}} </p>
</div>

<div class="manicure-variants">
   <h4> Variants/Add-ons <a href="javascript:void(0)" class="col-blue addAddons" data-id="{{base64_encode($data->id)}}"> Add </a> </h4>
   <table>
      <tbody>
        @foreach($data->addons_list as $val)
         <tr>
            <td class="nopadding">
            <div class="cat-box1 addonsDetail {{$val->status == '1' ? 'disabled' : ''}}">
                  <h5> {{$val->name}}  <small>(NZ ${{number_format($val->addonsDetail[0]->price, 2)}})</small></h5>
                  <div class="dropdown">
                     <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="fas fa-ellipsis-v"></i>
                     </button>
                     <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="javascript:void(0)" class="deleteServiceAddon" data-id="{{base64_encode($val->id)}}">Delete</a></li>
                        <li><a href="javascript:void(0)" class="editServiceAddon" data-id="{{base64_encode($val->id)}}">Edit</a></li>
                        @if($val->status == '2')
                           <li><a href="javascript:void(0)" data-id="{{base64_encode($val->id)}}" class="disableServiceAddon">Disable</a></li>
                        @else
                           <li><a href="javascript:void(0)" data-id="{{base64_encode($val->id)}}" class="enableServiceAddon">Enable</a></li>
                        @endif
                     </ul>
                  </div>
               </div>
            </td>
         </tr>
         @endforeach
         @if(count($data->addons_list) == '0')
          <tr>
              <td>
                No Addons Available.
              </td>
          </tr>
         @endif
      </tbody>
   </table>
</div>