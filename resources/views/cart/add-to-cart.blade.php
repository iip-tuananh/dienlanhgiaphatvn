
@if (count($cart) > 0)
@foreach ($cart as $item)
@php
$discountPrice = $item['price'] - ($item['price'] * ($item['discount'] / 100));
@endphp
<div class="clearfix cart_product">
<a class="cart_image" href="#" title="{{languageName($item['name'])}}"><img src="{{$item['image']}}" alt="{{languageName($item['name'])}}"></a>
<div class="cart_info">
    <div class="cart_name"><a href="#" title="{{languageName($item['name'])}}">{{languageName($item['name'])}}</a></div>
    <div class="row-cart-left">
        <div class="cart_item_name">
            <div>
            <label class="cart_quantity">Số lượng</label>
            <div class="cart_select">
                <div class="input-group-btn">
                    <input class="variantID" type="hidden" name="variantId" value="{{$item['id']}}" data-url="{{route('updateCart')}}">
                    <button onclick="btnMinus(this)" class="reduced items-count btn-minus btn btn-default" type="button">–</button>
                    <input type="text" maxlength="12" min="0" class="input-text number-sidebar qtyItem{{$item['id']}}" id="qtyItem{{$item['id']}}" name="Lines" size="4" value="{{$item['quantity']}}">
                    <button onclick="btnPlus(this)" class="increase items-count btn-plus btn btn-default" type="button">+</button>
                </div>
            </div>
            </div>
        </div>
        <div class="text-right cart_prices">
            <div class="cart__price"><span class="cart__sale-price">{{number_format($discountPrice, 0, '', '.')}}₫</span></div>
            <a class="cart__btn-remove remove-item-cart" onclick="removeItem(this)" href="javascript:void(0)" data-id="{{$item['id']}}" data-url="{{route('removeCart')}}">Bỏ sản phẩm</a>
        </div>
    </div>
</div>
</div>
@endforeach
@else
    
@endif