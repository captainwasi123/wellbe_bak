<div class="cat-head">
   <h5 class="col-black"> Services Details </h5>
</div>
<div class="manicure-text">
   <h5 class="col-black"> {{$data->name}} </h5>
   <h6 class="col-blue"> NZ$ {{empty($service->price) ? number_format($data->price, 2) : number_format($service->price, 2)}}
      @if(empty($service->price) || $service->price == $data->price)  
         <label class="badge badge-success">Default</label>
      @else
         <label class="badge badge-warning">Custom</label>
      @endif
   </h6>
   <p> {{$data->description}} </p>
   <hr>
   <h5 class="col-black"> Preparation </h5>
   <p> {{$data->long_description}} </p>
   <hr>
</div>

<div class="manicure-variants">
   <h4> Variants/Add-ons </h4>
   <table>
      <tbody>
        @foreach($data->addons_list as $val)
         <tr>
            <td colspan="2" class="nopadding">
               <div class="cat-box1 {{empty($val->userAdd) || $val->status == '1' ? 'disabledService' : ''}}" data-id="{{base64_encode($val->id)}}">
                  <h5> {{$val->name}} (NZ$ @if(empty($val->userAdd) || $val->userAdd->price == 0) {{number_format($val->addonsDetail[0]->price, 2)}} @else {{number_format($val->userAdd->price, 2)}}@endif)</h5>
                  @if($val->status != '1')
                     <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                           @if(empty($val->userAdd))
                              <li><a href="javascript:void(0)" class="enableAddon" data-id="{{base64_encode($val->id)}}">Enable</a></li>
                           @else
                              <li><a href="javascript:void(0)" class="editAddon" data-id="{{base64_encode($val->id)}}">Edit</a></li>
                              <li><a href="javascript:void(0)" class="disableAddon" data-id="{{base64_encode($val->userAdd->id)}}">Disable</a></li>
                           @endif
                        </ul>
                     </div>
                  @endif
               </div>
            </td>
         </tr>
         @endforeach
         @if(count($data->addons_list) == '0')
          <tr>
              <td colspan="2">
                No Addons Available.
              </td>
          </tr>
         @endif
      </tbody>
   </table>
</div>