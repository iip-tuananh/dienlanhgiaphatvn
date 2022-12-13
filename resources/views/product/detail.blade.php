@extends('layouts.main.master')
@section('title')
{{languageName($product->name)}}
@endsection
@section('description')
@endsection
@section('image')
@php
$imgs = json_decode($product->images);
$discountPrice = $product->price - ($product->price * ($product->discount / 100));
@endphp
{{url(''.$imgs[0])}}
@endsection
@section('css')
@endsection
@section('js')
<script>
   $('.product-image-block .thumb-link').on('click', function(e) {
      e.preventDefault();
      let img = $(this).data('image');
      let imgAlt = $(this).data('image-alt');
      $('.product-image-block .thumb-link').removeClass('active');
      $(this).addClass('active');
      $('.product-image-block .large-image').html('<a href="'+img+'"><img id="zoom_01" src="'+img+'" alt="'+imgAlt+'" class="img-responsive center-block"></a>')
   })
</script>
<script>
	$(document).ready(function ($) {
		jQuery(document).ready(function(e) {
			var WindowHeight = jQuery(window).height();
			var load_element = 0;
			//position of element
			var scroll_position = jQuery('.product-bottom').offset().top + jQuery('.product-bottom').outerHeight(true);;
			var screen_height = jQuery(window).height();
			var activation_offset = 0;
			var max_scroll_height = jQuery('body').height() + screen_height;
			var scroll_activation_point = scroll_position - (screen_height * activation_offset);
			jQuery(window).on('scroll', function(e) {
				var y_scroll_pos = window.pageYOffset;
				var element_in_view = y_scroll_pos > scroll_activation_point;
				var has_reached_bottom_of_page = max_scroll_height <= y_scroll_pos && !element_in_view;
				if (element_in_view || has_reached_bottom_of_page) {
					jQuery('.productAnchor_horizonalNavs').addClass("ins-Drop");
				} else {
					jQuery('.productAnchor_horizonalNavs').removeClass("ins-Drop");
				}
			});
		});
	});
</script>
@endsection
@section('content')
<div id="menu-overlay" class=""></div>
<section class="bread-crumb margin-bottom-10">
   <div class="container">
      <div class="row">
         <div class="col-xs-12">
            <ul class="breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
               <li class="home">
                  <a itemprop="url" href="{{route('home')}}" title="Trang chủ"><span itemprop="title">Trang chủ</span></a>						
                  <span><i class="fa fa-angle-right"></i></span>
               </li>
               <li>
                  <a itemprop="url" href="{{route('allListProCate', ['cate'=>$product->cate_slug])}}" title="{{languageName($product->cate->name)}}"><span itemprop="title">{{languageName($product->cate->name)}}</span></a>						
                  <span><i class="fa fa-angle-right"></i></span>
               </li>
               <li ><strong><span itemprop="title">{{languageName($product->name)}}</span></strong>
               <li>
            </ul>
         </div>
      </div>
   </div>
</section>
<section class="product" itemscope itemtype="http://schema.org/Product">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 details-product">
            <div class="row product-bottom">
               <div class="col-lg-12">
                  <div class="border-bg clearfix padding-bottom-10 padding-top-10">
                     <div class="col-xs-12 col-sm-6 col-lg-5 col-md-6">
                        <div class="relative product-image-block ">
                           <div class="large-image">
                              <a href="{{$imgs[0]}}">
                              <img id="zoom_01" src="{{$imgs[0]}}" alt="{{languageName($product->name)}}" class="img-responsive center-block">
                              </a>
                           </div>
                           <div id="gallery_01" class="owl-carousel owl-theme thumbnail-product margin-top-15" data-md-items="4" data-sm-items="4" data-xs-items="4" data-xss-items="3" data-margin="10" data-nav="true">
                              @foreach ($imgs as $img)
                              <div class="item">
                                 <a class="thumb-link" href="javascript:void(0);" data-image="{{$img}}" data-image-alt="{{languageName($product->name)}}">
                                 <img  src="{{$img}}" alt="{{languageName($product->name)}}">
                                 </a>
                              </div>
                              @endforeach
                           </div>
                        </div>
                        <div class="social-sharing margin-top-20">
                           <!-- Go to www.addthis.com/dashboard to customize your tools -->
                           <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a099baca270babc"></script>
                           <!-- Go to www.addthis.com/dashboard to customize your tools -->
                           <div class="addthis_inline_share_toolbox_uu9r"></div>
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-6 col-lg-7 col-md-6 details-pro">
                        <h1 class="title-head">{{languageName($product->name)}}</h1>
                        <div class="divider-full-1"></div>
                        <div class="inventory_quantity" itemscope itemtype="http://schema.org/ItemAvailability">
                           <span class="stock-brand-title"><strong>Tình trạng:</strong></span>
                           <span class="a-stock" itemprop="supersededBy">Còn hàng</span>
                        </div>
                        <div class="price-box" itemscope itemtype="http://schema.org/Offer">
                           @if ($product->discount > 0 && $product->price > 0)
                              <span class="special-price">
                                 <span class="price product-price" itemprop="price">{{number_format($discountPrice, 0, '', '.')}}₫</span>
                              </span>
                              <!-- Giá Khuyến mại -->
                              <span class="old-price">
                                 <del class="price product-price-old" itemprop="priceSpecification">{{number_format($product->price, 0, '', '.')}}₫</del>
                              </span>
                              <!-- Giás gốc -->
                           @elseif($product->discount == 0 && $product->price > 0)
                              <span class="special-price">
                                 <span class="price product-price" itemprop="price">{{number_format($product->price, 0, '', '.')}}₫</span>
                              </span>
                           @else
                              <span class="special-price">
                                 <span class="price product-price" itemprop="price">Liên hệ</span>
                              </span>
                           @endif
                        </div>
                        <div class="product-summary product_description margin-bottom-15">
                           <div class="rte description">
                              {!!languageName($product->description)!!}
                           </div>
                        </div>
                        <div class="form-product">
                           <form enctype="multipart/form-data" id="add-to-cart-form" action="" method="post" class="form-inline">
                              <div class="box-variant clearfix  hidden ">
                                 <input type="hidden" name="variantId" value="{{$product->id}}" />
                              </div>
                              <div class="form-group ">
                                 <div class="custom custom-btn-number form-control">									
                                    <label>Số lượng</label>
                                    <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN(qty) & qty > 1 ) result.value--;return false;" class="btn-minus btn-cts" type="button">–</button>
                                    <input type="text" class="qty input-text" id="qty" name="quantity" size="4" value="1" />
                                    <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN(qty)) result.value++;return false;" class="btn-plus btn-cts" type="button">+</button>
                                 </div>
                                 <div class="clearfix margin-bottom-20"></div>
                                 <div class="clearfix">
                                    <input type="hidden" name="variantId" value="{{$product->id}}" />
                                    <button type="submit" data-role='addtocart' class="btn btn-lg btn-gray btn-cart add_to_cart btn_buy">
                                    <span class="txt-main">MUA NGAY</span>
                                    <span class="txt-sub">Giao hàng tận nơi</span>
                                    </button>									
                                    <a class="btn btn_traGop btn-tra-gop-click s-flag" href="tel:{{$setting->phone1}}">
                                    <span class="txt-main">
                                    Hãy gọi
                                    </span>
                                    <span class="txt-sub">Liên hệ {{$setting->phone1}}</span>
                                    </a>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row margin-top-20">
               <div class="col-lg-12">
                  <div class="border-bg clearfix">
                     <div class="col-xs-12 col-lg-12">
                        <!-- Nav tabs -->
                        <div class="product-tab e-tabs padding-bottom-10">
                           <ul class="tabs tabs-title clearfix">
                              <li class="tab-link" data-tab="tab-1">
                                 <h3><span>THÔNG SỐ KỸ THUẬT</span></h3>
                              </li>
                           </ul>
                           <div id="tab-1" class="tab-content">
                              <div class="rte">
                                 <div class="product-well">
                                    <div class="ba-text-fpt">
                                       {!!languageName($product->content)!!}
                                    </div>
                                    <div class="show-more">
                                       <a class="btn btn-default btn--view-more">
                                       <span class="more-text">Xem thêm <i class="fa fa-chevron-down"></i></span>
                                       <span class="less-text">Thu gọn <i class="fa fa-chevron-up"></i></span>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @if (count($productlq) > 1)
            <div class="row margin-top-20">
               <div class="col-lg-12">
                  <div class="border-bg clearfix">
                     <div class="col-md-12">
                        <div class="related-product">
                           <div class="heading">
                              <h2 class="title-head"><a href="#">Sản phẩm gợi ý</a></h2>
                           </div>
                           <div class="products  owl-carousel owl-theme products-view-grid" data-md-items="5" data-sm-items="3" data-xs-items="2" data-margin="10">
                              @foreach ($productlq as $pro)
                              @if ($product->id != $pro->id)
                              @include('layouts.product.item', ['product'=>$pro])
                              @endif
                              @endforeach
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endif
         </div>
      </div>
   </div>
</section>
<div id="top-tabs-info" class="">
   <div class="productAnchor_horizonalNavs">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="productAnchor_horizonalNav">
                  <div class="product_info_image hidden-xs">
                     <img class="pict imagelazyload" src="{{$imgs[0]}}" alt="{{languageName($product->name)}}" />
                  </div>
                  <div class="product_info_content hidden-xs">
                     <h2 class="product_info_name" title="{{languageName($product->name)}}">{{languageName($product->name)}}</h2>
                     <div class="product_info_price">
                        <div class="product_info_price_title">
                           Giá bán:
                        </div>
                        <div class="product_info_price_value">
                           <div class="product_info_price_value-final">{{number_format($product->price,0,'','.')}}₫</div>
                        </div>
                     </div>
                  </div>
                  <div class="product_info_buttons">
                     <input type="hidden" name="variantId" value="{{$product->id}}" />
                     <button class="btn btn_buyNow btn-buy-now-click add_to_cart">
                     <span class="txt-main">MUA NGAY</span>
                     <span class="txt-sub">Giao hàng tận nơi</span>
                     </button>
                     <a class="btn btn_traGop btn-tra-gop-click s-flag" href="tel:{{$setting->phone1}}">
                     <span class="txt-main hidden-xs">Hãy gọi</span>
                     <span class="txt-sub hidden-xs">Liên hệ {{$setting->phone1}}</span>
                     <i class="fa fa-phone visible-xs" aria-hidden="true"></i>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<style>
   @media(max-width: 767px){
   footer .back-to-top.show{display:none !important;}
   }
</style>
@endsection