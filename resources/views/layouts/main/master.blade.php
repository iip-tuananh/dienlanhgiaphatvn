<!DOCTYPE html>
<html lang="vi">
<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
   <title>@yield('title')</title>
   <meta name="description" content="">
   <meta name="keywords" content="@yield('title')"/>
   <meta name="robots" content="noodp,index,follow" />
   <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
   <meta name="csrf-token" content="{{ csrf_token() }}" />
   <meta name="description" content="@yield('description')" />
   <link rel="canonical" href="{{url()->current()}}" />
   <meta property="og:locale" content="vi_VN" />
   <meta property="og:type" content="article" />
   <meta property="og:title" content="@yield('title')" />
   <meta property="og:description" content="@yield('description')" />
   <meta property="og:url" content="{{url()->current()}}" />
   <meta property="og:site_name" content="{{url()->current()}}" />
   <meta property="og:updated_time" content="2021-08-28T22:06:30+07:00" />
   <meta property="og:image" content="@yield('image')" />
   <meta property="og:image:secure_url" content="@yield('image')" />
   <meta property="og:image:width" content="598" />
   <meta property="og:image:height" content="333" />
   <meta property="og:image:alt" content="" />
   <meta property="og:image:type" content="image/jpeg" />
   <meta name="twitter:card" content="summary_large_image" />
   <meta name="twitter:title" content="@yield('title')" />
   <meta name="twitter:description" content="@yield('description')" />
   <meta name="twitter:image" content="@yield('image')" />
   <!-- Fav Icon -->
   <link rel="icon" href="{{url(''.$setting->favicon)}}" type="image/x-icon">
   <!-- Plugin CSS -->			
   <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}" type="text/css">
   <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}" type="text/css">
   <!-- Build Main CSS -->								
   <link href="{{asset('frontend/css/base.scss.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{asset('frontend/css/style.scss.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{asset('frontend/css/ant-dien-may.scss.css')}}" rel="stylesheet" type="text/css" />
   <!-- Header JS -->	
   <script src="{{asset('frontend/js/jquery-2.2.3.min.js')}}" type="text/javascript"></script> 
   <link href="{{asset('frontend/css/iwish.css')}}" rel="stylesheet" type="text/css" />
   @yield('css')
</head>
<body>
   <!-- Main content -->
   @include('layouts.header.index')
   @yield('content')
   @include('layouts.footer.index')
   <style>
      .suntory-alo-phone {
      background-color: transparent;
      cursor: pointer;
      height: 120px;
      position: fixed;
      transition: visibility 0.5s ease 0s;
      width: 120px;
      z-index: 200000 !important;
      }
      .suntory-alo-ph-circle {
         animation: 1.2s ease-in-out 0s normal none infinite running suntory-alo-circle-anim;
         background-color: transparent;
         border: 2px solid rgba(30, 30, 30, 0.4);
         border-radius: 100%;
         height: 120px;
         left: 0px;
         opacity: 0.1;
         position: absolute;
         top: 0px;
         transform-origin: 50% 50% 0;
         transition: all 0.5s ease 0s;
         width: 120px;
      }
      .suntory-alo-ph-circle-fill {
         animation: 2.3s ease-in-out 0s normal none infinite running suntory-alo-circle-fill-anim;
         border: 2px solid transparent;
         border-radius: 100%;
         height: 90px;
         left: 14px;
         position: absolute;
         top: 15px;
         transform-origin: 50% 50% 0;
         transition: all 0.5s ease 0s;
         width: 90px;
      }
      .suntory-alo-ph-img-circle {
      /* animation: 1s ease-in-out 0s normal none infinite running suntory-alo-circle-img-anim; */
         border: 2px solid transparent;
         border-radius: 100%;
         height: 70px;
         left: 25px;
         position: absolute;
         top: 25px;
         transform-origin: 50% 50% 0;
         width: 70px;
      }
      #suntory-alo-phoneIcon .hotline-number {
         left: 77px;
         position: absolute;
         top: 29px;
         background-color: #00aff2;
         font-size: 16px;
         color: #fff;
         padding: 4px 20px;
         border-top-right-radius: 20px;
         border-bottom-right-radius: 20px;
      }
      #suntory-alo-phoneIcon:hover .hotline-number {
         background-color: #c9151c;
      }
      @media only screen and (max-width: 768px) {
         #suntory-alo-phoneIcon .hotline-number {
         display: none;
      }
      }
      .suntory-alo-phone.suntory-alo-hover, .suntory-alo-phone:hover {
      opacity: 1;
      }
      .suntory-alo-phone.suntory-alo-active .suntory-alo-ph-circle {
      animation: 1.1s ease-in-out 0s normal none infinite running suntory-alo-circle-anim !important;
      }
      .suntory-alo-phone.suntory-alo-static .suntory-alo-ph-circle {
      animation: 2.2s ease-in-out 0s normal none infinite running suntory-alo-circle-anim !important;
      }
      .suntory-alo-phone.suntory-alo-hover .suntory-alo-ph-circle, .suntory-alo-phone:hover .suntory-alo-ph-circle {
      border-color: #00aff2;
      opacity: 0.5;
      }
      .suntory-alo-phone.suntory-alo-green.suntory-alo-hover .suntory-alo-ph-circle, .suntory-alo-phone.suntory-alo-green:hover .suntory-alo-ph-circle {
      border-color: #c9151c;
      opacity: 1;
      }
      .suntory-alo-phone.suntory-alo-green .suntory-alo-ph-circle {
      border-color: #bfebfc;
      opacity: 1;
      }
      .suntory-alo-phone.suntory-alo-hover .suntory-alo-ph-circle-fill, .suntory-alo-phone:hover .suntory-alo-ph-circle-fill {
      background-color: rgba(0, 175, 242, 0.9);
      }
      .suntory-alo-phone.suntory-alo-green.suntory-alo-hover .suntory-alo-ph-circle-fill, .suntory-alo-phone.suntory-alo-green:hover .suntory-alo-ph-circle-fill {
      background-color: #c9151c;
      }
      .suntory-alo-phone.suntory-alo-green .suntory-alo-ph-circle-fill {
      background-color: rgba(0, 175, 242, 0.9);
      }
      .suntory-alo-phone.suntory-alo-hover .suntory-alo-ph-img-circle, .suntory-alo-phone:hover .suntory-alo-ph-img-circle {
      background-color: #00aff2;
      }
      .suntory-alo-phone.suntory-alo-green.suntory-alo-hover .suntory-alo-ph-img-circle, .suntory-alo-phone.suntory-alo-green:hover .suntory-alo-ph-img-circle {
      background-color: #c9151c;
      }
      .suntory-alo-phone.suntory-alo-green .suntory-alo-ph-img-circle {
      background-color: #00aff2;
      }
      @keyframes suntory-alo-circle-anim {
      0% {
      opacity: 0.1;
      transform: rotate(0deg) scale(0.5) skew(1deg);
      }
      30% {
      opacity: 0.5;
      transform: rotate(0deg) scale(0.7) skew(1deg);
      }
      100% {
      opacity: 0.6;
      transform: rotate(0deg) scale(1) skew(1deg);
      }
      }
      @keyframes suntory-alo-circle-img-anim {
      0% {
      transform: rotate(0deg) scale(1) skew(1deg);
      }
      10% {
      transform: rotate(-25deg) scale(1) skew(1deg);
      }
      20% {
      transform: rotate(25deg) scale(1) skew(1deg);
      }
      30% {
      transform: rotate(-25deg) scale(1) skew(1deg);
      }
      40% {
      transform: rotate(25deg) scale(1) skew(1deg);
      }
      50% {
      transform: rotate(0deg) scale(1) skew(1deg);
      }
      100% {
      transform: rotate(0deg) scale(1) skew(1deg);
      }
      }
      @keyframes suntory-alo-circle-fill-anim {
      0% {
      opacity: 0.2;
      transform: rotate(0deg) scale(0.7) skew(1deg);
      }
      50% {
      opacity: 0.2;
      transform: rotate(0deg) scale(1) skew(1deg);
      }
      100% {
      opacity: 0.2;
      transform: rotate(0deg) scale(0.7) skew(1deg);
      }
      }
      .suntory-alo-ph-img-circle i {
         animation: 1s ease-in-out 0s normal none infinite running suntory-alo-circle-img-anim;
         font-size: 30px;
         line-height: 50px;
         padding-left: 20px;
         color: #fff;
         padding-top: 10px;
      }
      /*=================== End phone ring ===============*/
      @keyframes suntory-alo-ring-ring {
      0% {
      transform: rotate(0deg) scale(1) skew(1deg);
      }
      10% {
      transform: rotate(-25deg) scale(1) skew(1deg);
      }
      20% {
      transform: rotate(25deg) scale(1) skew(1deg);
      }
      30% {
      transform: rotate(-25deg) scale(1) skew(1deg);
      }
      40% {
      transform: rotate(25deg) scale(1) skew(1deg);
      }
      50% {
      transform: rotate(0deg) scale(1) skew(1deg);
      }
      100% {
      transform: rotate(0deg) scale(1) skew(1deg);
      }
      }
      .zalo-btn{
         position: fixed;
         width: 110px;
         z-index: 998 !important;
         cursor: pointer;
         height: 120px;
      }
   </style>
   <a href="tel:{{$setting->phone1}}" class="suntory-alo-phone suntory-alo-green" id="suntory-alo-phoneIcon" style="left: 0px; bottom: 0px;">
      <div class="suntory-alo-ph-circle"></div>
      <div class="suntory-alo-ph-circle-fill"></div>
      <div class="suntory-alo-ph-img-circle"><i class="fa fa-phone"></i></div>
      <div class="hotline-number">
      <span>{{$setting->phone1}}</span><br>
      <span>{{$setting->phone2}}</span>
      </div>
   </a>
   <a href="https://zalo.me/{{$setting->phone1}}" target="_blank" class="zalo-btn" style="right: 0px; bottom: 0px;">
      <img src="{{url('frontend/images/zalo.png')}}" alt="chat zalo">
   </a>
   
   <script src="{{asset('frontend/js/rx.all.min.js')}}" type="text/javascript"></script>
   <!-- Bizweb javascript -->
   <script src="{{asset('frontend/js/option-selectors.js')}}" type="text/javascript"></script>
   <!-- Plugin JS -->			
   <script src="{{asset('frontend/js/bootstrap.min.js')}}" type="text/javascript"></script>
   <!-- Add to cart -->	
   <div class="ajax-load">
      <span class="loading-icon">
            <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">
            <rect x="0" y="10" width="4" height="10" fill="#333" opacity="0.2">
               <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.6s" repeatCount="indefinite" />
               <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
               <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
            </rect>
            <rect x="8" y="10" width="4" height="10" fill="#333"  opacity="0.2">
               <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
               <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
               <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
            </rect>
            <rect x="16" y="10" width="4" height="10" fill="#333"  opacity="0.2">
               <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
               <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
               <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
            </rect>
            </svg>
      </span>
   </div>
   <div class="loading awe-popup">
      <div class="overlay"></div>
      <div class="loader" title="2">
            <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">
            <rect x="0" y="10" width="4" height="10" fill="#333" opacity="0.2">
               <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.6s" repeatCount="indefinite" />
               <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
               <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
            </rect>
            <rect x="8" y="10" width="4" height="10" fill="#333"  opacity="0.2">
               <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
               <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
               <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
            </rect>
            <rect x="16" y="10" width="4" height="10" fill="#333"  opacity="0.2">
               <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
               <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
               <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
            </rect>
            </svg>
      </div>
   </div>	
   <div id="myModal" class="modal fade" role="dialog"></div>
   <div class="cart_sidebar" id="cart-sidebars">
      <div class="clearfix cart_heading">
            <h4 class="cart_title">Giỏ hàng<span class="abcb">(<span class="cart-popup-count"></span> Sản phẩm)</span></h4>
            <div class="cart_btn-close" title="Tiếp tục mua sắm!"><i class="fa fa-close"></i></div>
      </div>
      <div class="cart_body">
         @if (count($cartcontent) > 0)
         @php
            $totalPrice = 0;
         @endphp
         @foreach ($cartcontent as $cart)
         @php
            $discountPrice = $cart['price'] - ($cart['price'] * ($cart['discount'] / 100));
            $totalPrice += $discountPrice * $cart['quantity'];
         @endphp
         <div class="clearfix cart_product">
            <a class="cart_image" href="#" title="{{languageName($cart['name'])}}"><img src="{{$cart['image']}}" alt="{{languageName($cart['name'])}}"></a>
            <div class="cart_info">
               <div class="cart_name"><a href="#" title="{{languageName($cart['name'])}}">{{languageName($cart['name'])}}</a></div>
               <div class="row-cart-left">
                  <div class="cart_item_name">
                     <div>
                        <label class="cart_quantity">Số lượng</label>
                        <div class="cart_select">
                           <div class="input-group-btn">
                              <input class="variantID" type="hidden" name="variantId" value="{{$cart['id']}}" data-url="{{route('updateCart')}}">
                              <button onclick="btnMinus(this)" class="reduced items-count btn-minus btn btn-default" type="button">–</button>
                              <input type="text" maxlength="12" min="0" class="input-text number-sidebar qtyItem{{$cart['id']}}" id="qtyItem{{$cart['id']}}" name="Lines" size="4" value="{{$cart['quantity']}}">
                              <button onclick="btnPlus(this)" class="increase items-count btn-plus btn btn-default" type="button">+</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="text-right cart_prices">
                     <div class="cart__price"><span class="cart__sale-price">{{number_format($discountPrice, 0, '', '.')}}₫</span></div>
                     <a class="cart__btn-remove remove-item-cart" onclick="removeItem(this)" href="javascript:void(0)" data-id="{{$cart['id']}}" data-url="{{route('removeCart')}}">Bỏ sản phẩm</a>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
         @endif
      </div>
      <div class="cart-footer">
            <hr>
            <div class="clearfix">
            <div class="cart__subtotal">
               <div class="cart__col-6">
                  Thành tiền:
               </div>
               <div class="text-right cart__totle">
                  @if (count($cartcontent)>0)
                  <span class="total-price">{{number_format($totalPrice, 0, '', '.')}}₫</span>
                  @else
                  <span class="total-price"></span>
                  @endif
               </div>
            </div>
            </div>
            <div class="cart__btn-proceed-checkout-dt">
            <button onclick="location.href='{{route('checkout')}}'" type="button" class="button btn btn-default cart__btn-proceed-checkout" id="btn-proceed-checkout">Tiến Hành Đặt Hàng</button>
            </div>
      </div>
   </div>
   <!-- Main JS -->	
   <script src="{{asset('frontend/js/main.js')}}" type="text/javascript"></script>
   @yield('js')				
   <!-- Product detail JS,CSS --> 
   <div class="backdrop__body-backdrop___1rvky"></div>
   <div id="fb-root"></div>
   <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0';
      fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
   </script>
   <!-- Google Tag Manager (noscript) -->
   <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N5J7K3J"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
   <!-- End Google Tag Manager (noscript) -->
</body>
</html>