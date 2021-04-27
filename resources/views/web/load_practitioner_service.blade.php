@if(count($services) == 0)
   <div>
      <h4 class="col-black"> No Services Found </h4>
   </div>
@endif
@foreach($services as $services)
   <div>
      <h4 class="col-black"> {{$services->name}} </h4>
      <p class="col-grey">  {{$services->description}}
         <br/> Service Time: {{$services->duration}} Minutes 
       </p>
      <h5 class="col-grey"> NZ${{number_format($services->duration,2)}} </h5>
      <span class="service-actions"> <a href="javascript:void(0)"> Add <i class="fa fa-plus"> </i> </a></span>
   </div>
@endforeach   