<div class="detail-combo-product">
    <div class="combo-image">
        <img src="{{$combo->image}}" alt="{{$combo->name}}" loading="lazy">
    </div>
    <div class="list-product-combo">
        @foreach ($combo->products as $product)
        @php
            $img = json_decode($product->images);
            $discountPrice = $product['price'] - $product['price'] * ($product['discount'] / 100);
        @endphp
            <div class="item-product-combo">
                <img src="{{$img[0]}}" alt="{{languageName($product->name)}}" loading="lazy">
                <div class="item-info">
                    <h6>{{languageName($product->name)}}</h6>
                    <p>
                        <span class="price-discount">{{number_format($discountPrice)}}₫</span>
                        @if ($product->discount > 0)
                        <span class="price-old">{{number_format($product->price)}}₫</span>
                        @endif
                    </p>
                    <a href="{{route('detailProduct', ['cate'=>$product->cate_slug, 'slug'=>$product->slug])}}">Xem chi tiết</a>
                </div>
            </div>
        @endforeach
    </div>
</div>