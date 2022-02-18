<img class="m-b-10" src="{{URL::to('/')}}/{{$data->profile_img}}" onerror="this.onerror=null;this.src='{{URL::to('/')}}/public/assets/images/user-placeholder.png';" width="120px">
<h3 class="m-b-5"> {{$data->first_name.' '.$data->last_name}} </h3>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a href="#about" class="nav-link active" data-bs-toggle="tab">About</a>
    </li>
    <li class="nav-item">
        <a href="#reviews" class="nav-link" data-bs-toggle="tab">Reviews</a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade show active" id="about">
        <p> 
            {{$data->bio_description}}
        </p>
    </div>
    <div class="tab-pane fade" id="reviews">
        @php $r = 0; @endphp
        @foreach($data->reviews as $val)
            @if($r <= 10)
                <div class="reviews_item">
                    <h4>{{$val->booker->first_name.' '.$val->booker->last_name[0]}}.</h4>
                    <span>{{date('d M Y', strtotime($val->created_at))}}</span>
                    <p>{{$val->review}}</p>
                    @for($i=1; $i<=5; $i++)
                        <i class="fa fa-star {{$i <= $val->rating ? 'checked' : ''}}"></i>
                    @endfor
                    &nbsp;&nbsp;&nbsp;
                    <label><i class="fa fa-check-circle"></i> Verified review</label>
                </div>
                @php $r++; @endphp
            @endif
        @endforeach
    </div>
</div>