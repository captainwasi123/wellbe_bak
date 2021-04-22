<div class="cat-head">
   <h5 class="col-black"> Services Details </h5>
</div>
<div class="manicure-text">
   <h5 class="col-black"> {{$data->name}} </h5>
   <h6 class="col-blue"> NZ$ {{number_format($data->price, 2)}} </h6>
   <p> {{$data->description}} </p>
   <hr>
   <h5 class="col-black"> Long Description </h5>
   <p> {{$data->long_description}} </p>
</div>

<div class="manicure-variants">
   <h4> Variants/Add-ons <a href="javascript:void(0)" class="col-blue addAddons" data-id="{{base64_encode($data->id)}}"> Add </a> </h4>
   <table>
      <tbody>
        @foreach($data->addons_list as $val)
         <tr>
            <td> {{$val->name}} </td>
            <td> NZ$ {{number_format($val->addonsDetail[0]->price, 2)}} </td>
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