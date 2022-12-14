@extends('layouts.main.master')
@section('title')
{{$setting->company}}
@endsection
@section('description')
{{$setting->webname}}
@endsection
@section('image')
{{url(''.$banners[0]->image)}}
@endsection
@section('css')
@endsection
@section('js')
@if (session()->has('success'))
   <script>
      $.notify("Gửi đơn hàng thành công!", "success");
   </script>
@endif
@endsection
@section('content')
   <section class="awe-section-1">
      <div class="container">
            <div class="col-md-3 no-padding"></div>
            <div class="col-md-9 no-padding">
            <div class="home-slider owl-carousel not-dqowl">
               @foreach ($banners as $banner)
               <a href="#" class="clearfix">
                  <picture>
                        <source media="(min-width: 1200px)" srcset="{{$banner->image}}">
                        <source media="(min-width: 992px)" srcset="{{$banner->image}}">
                        <source media="(min-width: 567px)" srcset="{{$banner->image}}">
                        <source media="(min-width: 480px)" srcset="{{$banner->image}}">
                        <img src="{{$banner->image}}" alt="banner" class="img-responsive center-block" />
                  </picture>
               </a>
               @endforeach
            </div>
            </div>
      </div>
   </section>
   <section class="awe-section-2">
      <div class="section_feature_promotion">
            <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="border-bg clearfix">
                        <div class="col-md-12">
                        <div class="text-centers clearfix">
                           <h2 class="section_feature_promotion-title"><a href="#">Sản phẩm nổi bật</a></h2>
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="deal-owl owl-carousel not-dqowl">
                           @foreach ($homeProduct as $product)
                           @php
                              $img = json_decode($product->images);
                              $discountPrice = $product->price - ($product->price * ($product->discount / 100));
                           @endphp
                              <div class="product-item">
                                 <div class="product-item-container">
                                       <div class="row">
                                       <div class="left-block col-lg-6 col-md-5 col-sm-12 col-xs-12">
                                          <div class="product-image-container product-image">
                                             <a class="grid-view-item__link image-ajax" href="{{route('detailProduct', ['cate'=>$product->cate_slug, 'slug'=>$product->slug])}}" title="{{languageName($product->name)}}">
                                             <img class="img-responsive center-block" src="{{$img[0]}}" alt="{{languageName($product->name)}}" />
                                             </a>
                                             @if ($product->discount > 0)
                                                <span class="label-product label-sale">- 
                                                {{$product->discount}}% 
                                                </span>
                                             @endif
                                             <div class="button-link">
                                                   <div class="btn-button add-to-cart action ">
                                                   <form class="variants form-nut-grid" data-id="product-actions-26580141" enctype="multipart/form-data">
                                                      <input type="hidden" name="variantId" value="{{$product->id}}" data-url="{{route('addToCart')}}"/>
                                                      <a class="btn-addToCart grl btn_df add_to_cart">
                                                         <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                                         <span class="hidden-xs hidden-sm hidden-md">Mua ngay</span>
                                                      </a>
                                                   </form>
                                                   </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="right-block col-lg-6 col-md-7 col-sm-12 col-xs-12">
                                          <div class="caption">
                                             <h4 class="title-product">
                                                   <a class="product-name line-clamp" href="{{route('detailProduct', ['cate'=>$product->cate_slug, 'slug'=>$product->slug])}}" title="{{languageName($product->name)}}">{{languageName($product->name)}}</a>
                                             </h4>
                                             <div class="bizweb-product-reviews-badge" data-id="26580141"></div>
                                             @if ($product->discount > 0 && $product->price > 0)
                                                <div class="price">
                                                      <span class="price-new">
                                                      <span class="money">{{number_format($discountPrice, 0, '', '.')}}₫</span>
                                                      </span>
                                                      <span class="price-old">
                                                      <span class="money">{{number_format($product->price, 0, '', '.')}}₫	</span>
                                                      </span>
                                                </div>
                                             @elseif($product->discount == 0 && $product->price > 0)
                                                <div class="price">
                                                   <span class="price-new">
                                                   <span class="money">{{number_format($product->price, 0, '', '.')}}₫</span>
                                                   </span>
                                                </div>
                                             @else
                                                <div class="price">
                                                   <span class="price-new">
                                                   <span class="money">Liên hệ</span>
                                                   </span>
                                                </div>
                                             @endif
                                          </div>
                                          <div class="description">
                                             {!!languageName($product->description)!!}
                                          </div>
                                          <div class="qt">
                                             Còn hàng
                                          </div>
                                       </div>
                                       </div>
                                 </div>
                              </div>
                           @endforeach
                        </div>
                        </div>
                  </div>
               </div>
            </div>
            </div>
      </div>
   </section>
   @foreach ($categoryhome as $cate)
   @if (count($cate->product) > 0)
   <section class="awe-section-4">
      <div class="section_product">
            <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="border-bg clearfix">
                        <div class="col-md-12">
                        <div class="pblock-head">
                           <h3 class="color5" style="border-top-color:#c9151c"><a href="{{route('allListProCate', ['cate'=>$cate->slug])}}">{{languageName($cate->name)}}</a></h3>
                           <div class="menu-button-edit">
                              <i class="fa fa-navicon" aria-hidden="true"></i>
                           </div>
                           @if (count($cate->typeCate) > 0)
                           <ul class="clearfix">
                              @foreach ($cate->typeCate as $type)
                              <li><a href="{{route('allListProType', ['cate'=>$type->cate_slug, 'type'=>$type->slug])}}" title="{{languageName($type->name)}}">{{languageName($type->name)}}</a></li>
                              @endforeach
                           </ul>
                           @endif
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="antblock-content padding-bottom-10 clearfix">
                           <div class="col-md-12">
                              <div class="antblock-product">
                                 <div class="products owl-carousel owl-theme products-view-grid" data-md-items="5" data-sm-items="3" data-xs-items="2" data-margin="10">
                                    @foreach ($cate->product as $product)
                                    <div class="item">
                                       @include('layouts.product.item', ['product'=>$product])
                                    </div>
                                    @endforeach
                                 </div>
                              </div>
                           </div>
                        </div>
                        </div>
                  </div>
               </div>
            </div>
            </div>
      </div>
   </section>
   @endif
   @endforeach
   <section class="awe-section-14">
      <section class="section-news">
            <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="border-bg clearfix">
                        <div class="col-md-12">
                        <div class="blogs-content">
                           <div class="heading">
                              <h2 class="title-head">					
                                    <a href="{{route('allListBlog')}}">Kinh nghiệm hay</a>					
                              </h2>
                           </div>
                           <div class="list-blogs-link">
                              <div class="row">
                                    <div class="col-md-7 big-blogs">
                                    <article class="blog-item">
                                       <div class="blog-item-thumbnail">								
                                          <a href="{{route('detailBlog', ['slug'=>$homeBlog[0]->slug])}}">
                                          <img src="{{$homeBlog[0]->image}}" alt="{{languageName($homeBlog[0]->title)}}" class="img-responsive center-block" />						
                                          </a>
                                       </div>
                                       <div class="index-blog-con">
                                          <h3 class="blog-item-name"><a href="{{route('detailBlog', ['slug'=>$homeBlog[0]->slug])}}" title="{{languageName($homeBlog[0]->title)}}">{{languageName($homeBlog[0]->title)}}</a></h3>
                                          <div class="post-time">
                                             {{date($homeBlog[0]->created_at, strtotime('d/m/Y'))}}
                                          </div>
                                          <p class="blog-item-summary margin-bottom-5"> {{languageName($homeBlog[0]->description)}}</p>
                                       </div>
                                    </article>
                                    </div>
                                    <div class="col-md-5 small-blogs">
                                    <ul>
                                       @foreach ($homeBlog as $blog)
                                       <li><a href="{{route('detailBlog', ['slug'=>$blog->slug])}}" title="{{languageName($blog->title)}}"><i class="fa fa-angle-right" aria-hidden="true"></i> {{languageName($blog->title)}}</a></li>
                                       @endforeach
                                    </ul>
                                    </div>
                              </div>
                           </div>
                        </div>
                        </div>
                  </div>
               </div>
            </div>
            </div>
      </section>
   </section>
@endsection