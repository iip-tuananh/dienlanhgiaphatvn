@php
$totalPrice = 0;
@endphp
@foreach ($cart as $item)
@php
$discountPrice = $item['price'] - ($item['price'] * ($item['discount'] / 100));
$totalPrice += $discountPrice * $item['quantity'];
@endphp
@endforeach
<span class="total-price">{{number_format($totalPrice, 0, '', '.')}}₫</span>