
@php
$img = json_decode($product->images);
$discountPrice = $product->price - ($product->price * ($product->discount / 100));
@endphp
<div class="product-box">
   <div class="product-thumbnail">
         <a href="{{route('detailProduct', ['cate'=>$product->cate_slug, 'slug'=>$product->slug])}}" title="{{languageName($product->name)}}">
         <img src="{{$img[0]}}" alt="{{languageName($product->name)}}">
         </a>
         <div class="button-link">
         <div class="btn-button add-to-cart action ">
            <form class="variants form-nut-grid" data-id="product-actions-26749924" enctype="multipart/form-data">
               <input type="hidden" name="variantId" value="{{$product->id}}" />
               <a class="btn-addToCart grl btn_df add_to_cart">
               <i class="fa fa-shopping-basket" aria-hidden="true"></i>
               <span class="hidden-xs hidden-sm hidden-md">Mua ngay</span>
               </a>
            </form>
         </div>
         </div>
   </div>
   <div class="product-info a-left">
         <h3 class="product-name"><a class="line-clamp" href="{{route('detailProduct', ['cate'=>$product->cate_slug, 'slug'=>$product->slug])}}" title="{{languageName($product->name)}}">{{languageName($product->name)}}</a></h3>
         @if ($product->discount > 0 && $product->price > 0)
         <div class="price-box clearfix">
         <div class="old-price">															 
            <span class="price product-price-old">
               {{number_format($product->price, 0, '', '.')}}₫			
            </span>
         </div>
         <div class="sale-off">- 
            {{$product->discount}}% 
         </div>
         <div class="special-price f-left">
            <span class="price product-price">{{number_format($discountPrice, 0, '', '.')}}₫</span>
         </div>
         </div>
         @elseif($product->discount == 0 && $product->price > 0)
         <div class="price-box clearfix">
            <div class="special-price f-left">
               <span class="price product-price">{{number_format($product->price, 0, '', '.')}}₫</span>
            </div>
         </div>
         @else
         <div class="price-box clearfix">
            <div class="special-price f-left">
               <span class="price product-price">Liên hệ</span>
            </div>
         </div>
         @endif
   </div>
</div>
