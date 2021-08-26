<img class="m-b-10" src="{{URL::to('/')}}/{{$data->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/public/assets/images/user-placeholder.png';" width="120px">
<h3 class="m-b-20"> {{$data->first_name.' '.$data->last_name}} </h3>
<p> 
    {{$data->bio_description}}
</p>