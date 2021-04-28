<div class="booking-cart-items">
   @foreach($cart_data as $row)
   <div class="booking-cart-item1">
      <h5> {{$row->name}} </h5>
      <div class="quantity">
         <button data-decrease>-</button>
         <input data-value type="text" value="{{$row->qty}}" disabled />
         <button data-increase>+</button>
         <b class="price-cart"> {{number_format($row->price,2)}} </b>
      </div>
   </div>
   @endforeach
</div>