@extends('layouts.main.master')
@section('title')
{{$title}}
@endsection
@section('description')
Danh sách {{$title}}
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('css')
@endsection
@section('js')
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
               <li><strong><span itemprop="title">{{$title}}</span></strong></li>
            </ul>
         </div>
      </div>
   </div>
</section>
<div class="container margin-bottom-20">
   <div class="row">
      <aside class="sidebar left left-content col-md-3 col-sm-12 col-xs-12">
         <div class="border-bg left-filters">
            <div class="aside-filter">
               <div class="aside-hidden-mobile">
                  <div class="filter-container">
                     <aside class="aside-item filter-price">
                        <div class="aside-title">
                           <h2 class="title-head margin-top-0"><span>Giá bán</span></h2>
                        </div>
                        <div class="aside-content filter-group">
                           <ul>
                              <li class="filter-item filter-item--check-box filter-item--green">
                                 <span>
                                 <label for="filter-duoi-10-000-000d">
                                 <input type="checkbox" id="filter-duoi-10-000-000d" onchange="toggleFilter(this);" data-group="Khoảng giá" data-field="price_min" data-text="Dưới 10.000.000đ" value="(<10000000)" data-operator="OR">
                                 <i class="fa"></i>
                                 Giá dưới 10.000.000đ
                                 </label>
                                 </span>
                              </li>
                              <li class="filter-item filter-item--check-box filter-item--green">
                                 <span>
                                 <label for="filter-10-000-000d-20-000-000d">
                                 <input type="checkbox" id="filter-10-000-000d-20-000-000d" onchange="toggleFilter(this)" data-group="Khoảng giá" data-field="price_min" data-text="10.000.000đ - 20.000.000đ" value="(>10000000 AND <20000000)" data-operator="OR">
                                 <i class="fa"></i>
                                 10.000.000đ - 20.000.000đ							
                                 </label>
                                 </span>
                              </li>
                              <li class="filter-item filter-item--check-box filter-item--green">
                                 <span>
                                 <label for="filter-20-000-000d-30-000-000d">
                                 <input type="checkbox" id="filter-20-000-000d-30-000-000d" onchange="toggleFilter(this)" data-group="Khoảng giá" data-field="price_min" data-text="20.000.000đ - 30.000.000đ" value="(>20000000 AND <30000000)" data-operator="OR">
                                 <i class="fa"></i>
                                 20.000.000đ - 30.000.000đ							
                                 </label>
                                 </span>
                              </li>
                              <li class="filter-item filter-item--check-box filter-item--green">
                                 <span>
                                 <label for="filter-30-000-000d-50-000-000d">
                                 <input type="checkbox" id="filter-30-000-000d-50-000-000d" onchange="toggleFilter(this)" data-group="Khoảng giá" data-field="price_min" data-text="30.000.000đ - 50.000.000đ" value="(>30000000 AND <50000000)" data-operator="OR">
                                 <i class="fa"></i>
                                 30.000.000đ - 50.000.000đ							
                                 </label>
                                 </span>
                              </li>
                              <li class="filter-item filter-item--check-box filter-item--green">
                                 <span>
                                 <label for="filter-tren50-000-000d">
                                 <input type="checkbox" id="filter-tren50-000-000d" onchange="toggleFilter(this)" data-group="Khoảng giá" data-field="price_min" data-text="Trên 50.000.000đ" value="(>50000000)" data-operator="OR">
                                 <i class="fa"></i>
                                 Giá trên 50.000.000đ
                                 </label>
                                 </span>
                              </li>
                           </ul>
                        </div>
                     </aside>
                     <aside class="aside-item filter-tag-style-1 tag-filtster">
                        <div class="aside-title">
                           <h2 class="title-head margin-top-0"><span>Loại Tivi</span></h2>
                        </div>
                        <div class="aside-content filter-group">
                           <ul>
                              <li class="filter-item filter-item--check-box filter-item--green">
                                 <span>
                                 <label for="filter-smart-tv">
                                 <input type="checkbox" id="filter-smart-tv" onchange="toggleFilter(this)" data-group="tag3" data-field="tags" data-text="Smart TV" value="(Smart TV)" data-operator="OR">
                                 <i class="fa"></i>
                                 Smart TV
                                 </label>
                                 </span>
                              </li>
                              <li class="filter-item filter-item--check-box filter-item--green">
                                 <span>
                                 <label for="filter-internet-tv">
                                 <input type="checkbox" id="filter-internet-tv" onchange="toggleFilter(this)" data-group="tag3" data-field="tags" data-text="Internet TV" value="(Internet TV)" data-operator="OR">
                                 <i class="fa"></i>
                                 Internet TV
                                 </label>
                                 </span>
                              </li>
                              <li class="filter-item filter-item--check-box filter-item--green">
                                 <span>
                                 <label for="filter-android-tv">
                                 <input type="checkbox" id="filter-android-tv" onchange="toggleFilter(this)" data-group="tag3" data-field="tags" data-text="Android TV" value="(Android TV)" data-operator="OR">
                                 <i class="fa"></i>
                                 Android TV
                                 </label>
                                 </span>
                              </li>
                              <li class="filter-item filter-item--check-box filter-item--green">
                                 <span>
                                 <label for="filter-tivi-led-thuong">
                                 <input type="checkbox" id="filter-tivi-led-thuong" onchange="toggleFilter(this)" data-group="tag3" data-field="tags" data-text="Tivi Led thường" value="(Tivi Led thường)" data-operator="OR">
                                 <i class="fa"></i>
                                 Tivi Led thường
                                 </label>
                                 </span>
                              </li>
                           </ul>
                        </div>
                     </aside>
                  </div>
               </div>
            </div>	
         </div>
         <div class="border-bg left-filters margin-top-10 hidden-xs hidden-sm">
            <aside class="aside-item collection-category">
               <div class="heading">
                  <h2 class="title-head margin-top-0"><span>Danh mục sản phẩm</span></h2>
               </div>
               <div class="aside-content">
                  <nav class="nav-category navbar-toggleable-md">
                     <ul class="nav navbar-pills">
                        @foreach ($categoryhome as $cate)
                        <li class="nav-item ">
                           <a href="{{route('allListProCate', ['cate'=>$cate->slug])}}" class="nav-link">{{languageName($cate->name)}}</a>
                           @if (count($cate->typeCate) > 0)
                           <i class="fa fa-angle-down" ></i>
                           <ul class="dropdown-menu">
                              @foreach ($cate->typeCate as $type)
                              <li class="nav-item">
                                 <a class="nav-link" href="{{route('allListProType', ['cate'=>$type->cate_slug, 'type'=>$type->slug])}}">{{languageName($type->name)}}</a>
                              </li>
                              @endforeach
                           </ul>
                           @endif
                        </li>
                        @endforeach
                     </ul>
                  </nav>
               </div>
            </aside>
         </div>
      </aside>
      <section class="main_container collection col-md-9 col-sm-12 col-xs-12">
         <div class="border-bg clearfix">
            <div class="col-md-12">
               <div class="pottion">
                  <h1 class="title-head margin-top-0">Tivi</h1>
                  <div class="category-products products clearfix">
                     <div class="sort-cate clearfix">
                        <div class="sort-cate-left hidden-xs">
                           <h3>Xếp theo:</h3>
                           <ul>
                              <li class="btn-quick-sort position-desc">
                                 <a href="javascript:;" onclick="sortby('created-desc')"><i></i>Hàng mới</a>
                              </li>
                              <li class="btn-quick-sort price-asc">
                                 <a href="javascript:;" onclick="sortby('price-asc')"><i></i>Giá thấp đến cao</a>
                              </li>
                              <li class="btn-quick-sort price-desc">
                                 <a href="javascript:;" onclick="sortby('price-desc')"><i></i>Giá cao xuống thấp</a>
                              </li>
                           </ul>
                        </div>
                        <div class="sort-cate-right-mobile hidden-lg hidden-md hidden-sm">
                           <div id="sort-by">
                              <label class="left">Sắp xếp: </label>
                              <ul>
                                 <li>
                                    <span>Thứ tự</span>
                                    <ul>
                                       <li><a href="javascript:;" onclick="sortby('price-asc')">Giá tăng dần</a></li>
                                       <li><a href="javascript:;" onclick="sortby('price-desc')">Giá giảm dần</a></li>
                                       <li><a href="javascript:;" onclick="sortby('created-desc')">Hàng mới</a></li>
                                    </ul>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <section class="products-view products-view-grid margin-top-15">
                        <div class="row">
                           @foreach ($list as $product)
                           <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                              @include('layouts.product.item', ['product'=>$product])
                           </div>
                           @endforeach
                        </div>
                        <div class="text-xs-right">
                           {{$list->links()}}
                        </div>
                     </section>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</div>
@endsection