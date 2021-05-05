<div class="booking-cart-items">
   @foreach($cart_data as $row)
   <div class="booking-cart-item1">
      <h5> {{$row->name}} </h5>
      <input type="hidden" name="serviceid" value="{{$row->id}}">
      <div class="quantity">
         <button type="button" class="qtyCounter" data-type="minus">-</button>
         <input data-value type="number" value="{{$row->qty}}" disabled />
         <button type="button" class="qtyCounter" data-type="plus">+</button>
         <b class="price-cart"> $ {{number_format($row->price,2)}} </b>
      </div>
   </div>
   @endforeach
</div>