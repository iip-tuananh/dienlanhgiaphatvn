<header class="header">
   <div class="topbar">
   </div>
   <div class="top-header">
         <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-100-h">
               <button type="button" class="navbar-toggle collapsed visible-sm visible-xs" id="trigger-mobile">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a href="{{route('home')}}" class="logo-wrapper">					
               <img src="{{$setting->logo}}" alt="{{$setting->company}}" />					
               </a>
               <div class="mobile-cart visible-sm visible-xs">
                     <a href="javascript:void(0)" title="Giỏ hàng">
                     <i class="fa fa-shopping-bag"></i>
                     <div class="cart-right">
                        @if (isset($cartcontent))
                        <span class="count_item_pr">{{count($cartcontent)}}</span>
                        @else
                        <span class="count_item_pr">0</span>
                        @endif
                     </div>
                     </a>
               </div>
            </div>
            <div class="col-lg-12 col-100-h col-sm-12 col-xs-7 hidden-lg hidden-md hidden-sm hidden-xs">
               <div class="hotline">
                     <a href="tel:{{$setting->phone1}}">{{$setting->phone1}}</a>
                     <span>Tổng đài miễn phí</span>
               </div>
            </div>
            <div class="col-lg-5 col-md-4">
               <div class="search-auto clearfix">
                     <form class="input-group search-bar search_form" action="{{route('search_result')}}" method="post" role="search">		
                        @csrf
                     <input type="search" name="keyword" value="" placeholder="Bạn cần tìm gì hôm nay?" class="input-group-field st-default-search-input search-text auto-search-ant" autocomplete="off">
                     <span class="input-group-btn">
                     <button class="btn icon-fallback-text">
                     <i class="fa fa-search"></i>
                     </button>
                     </span>
                     </form>
               </div>
            </div>
            <div class="col-lg-4 col-md-5 hidden-sm hidden-xs" style="display:flex; align-items:center;justify-content: space-between;">
               <div class="hotline">
                     <div class="hotline-icon">
                     <i class="fa fa-phone"></i>
                     </div>
                     <div class="hotline-content">
                     <a href="tel:{{$setting->phone1}}">{{$setting->phone1}}</a>
                     <span>Tổng đài miễn phí</span>
                     </div>
               </div>
               <a href="tel:{{$setting->phone2}}" class="baogia-lapdat">
                  <i>Báo giá lắp đặt</i>
               </a>
               <div class="index-cart">
                     <a href="javascript:void(0)"><i class="fa fa-shopping-bag"></i></a>
                     @if (isset($cartcontent))
                     <span class="cnt crl-bg count_item_pr">{{count($cartcontent)}}</span>
                     @else
                     <span class="cnt crl-bg count_item_pr">0</span>
                     @endif
               </div>
            </div>
         </div>
         </div>
   </div>
   <div class="main-navigation">
         <div class="container">
         <nav class="hidden-sm hidden-xs">
            <div class="col-md-3 no-padding">
               <div class="mainmenu {{ Route::currentRouteName() != 'home' ? 'mainmenu-other' : '' }}">
                     <div class="line"><i></i><i></i><i></i></div>
                     <span class="edit-span">Danh mục sản phẩm</span>
                     <div class="nav-cate">
                     <ul id="menu2017">
                        @foreach ($categoryhome as $cate)
                        <li class="dropdown menu-item-count">
                           <h3>
                                 <img src="{{$cate->avatar}}" alt="{{languageName($cate->name)}}" />
                                 <a href="{{route('allListProCate', ['cate'=>$cate->slug])}}">{{languageName($cate->name)}}</a>
                           </h3>
                           @if (count($cate->typeCate) > 0)
                           <div class="subcate gd-menu">
                                 <div class="subcate-flex">
                                    @foreach ($cate->typeCate as $type)
                                    <aside>
                                       <a href="{{route('allListProType', ['cate'=>$type->cate_slug, 'type'=>$type->slug])}}" class="">{{languageName($type->name)}}</a>
                                    </aside>
                                    @endforeach
                                 </div>
                           </div>
                           @endif
                        </li>
                        @endforeach
                     </ul>
                     </div>
               </div>
            </div>
            <div class="col-md-9 no-padding">
               <ul id="nav" class="nav">
                     <li class="nav-item active"><a class="nav-link" href="{{route('home')}}">Trang chủ</a></li>
                     <li class="nav-item "><a class="nav-link" href="{{route('aboutUs')}}">Giới thiệu</a></li>
                     <li class="nav-item "><a class="nav-link" href="{{route('allListBlog')}}">Kinh nghiệm hay</a></li>
                     <li class="nav-item "><a class="nav-link" href="{{route('lienHe')}}">Liên hệ</a></li>
               </ul>
            </div>
         </nav>
         </div>
   </div>
</header>
<div id="menu-overlay" class=""></div>
<div class="c-menu--slide-left">
   <div class="la-scroll-fix-infor-user">
         <!--CATEGORY-->
         <div class="la-nav-menu-items">
         <div class="la-title-nav-items">Điện lạnh gia phát</div>
         <ul class="la-nav-list-items">
            <li class="ng-scope">
               <a href="{{route('home')}}">Trang chủ</a>
            </li>
            @foreach ($categoryhome as $cate)
            <li class="ng-scope ng-has-child1">
               <a href="{{route('allListProCate', ['cate'=>$cate->slug])}}">{{languageName($cate->name)}}
                  @if (count($cate->typeCate) > 0)
                  <i class="fa fa-plus fa1" aria-hidden="true"></i>
                  @endif 
               </a>
               @if (count($cate->typeCate) > 0)
               <ul class="ul-has-child1">
                  @foreach ($cate->typeCate as $type)
                  <li class="ng-scope">
                  <a href="{{route('allListProType', ['cate'=>$type->cate_slug, 'type'=>$type->slug])}}">{{languageName($type->name)}}</a>
                  </li>
                  @endforeach
               </ul>
               @endif
            </li>
            @endforeach
            <li class="ng-scope">
               <a href="{{route('aboutUs')}}">Giới thiệu</a>
            </li>
            <li class="ng-scope">
               <a href="{{route('allListBlog')}}">Kinh nghiệm hay</a>
            </li>
            <li class="ng-scope">
               <a href="{{route('lienHe')}}">Liên hệ</a>
            </li>
         </ul>
         </div>
   </div>
</div>