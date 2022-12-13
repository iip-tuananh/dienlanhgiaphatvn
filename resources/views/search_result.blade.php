@extends('layouts.main.master')
@section('title')
Kết quả tìm kiếm
@endsection
@section('description')
Đã tìm thấy {{$countproduct}} kết quả phù hợp cho từ khóa "{{$keyword}}"
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('css')
@endsection
@section('js')
<link rel="preload" as="style" type="text/css" href="{{asset('frontend/css/collections.scss.css')}}" />
<link href="{{asset('frontend/css/collections.scss.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('frontend/css/jquery-ui-min.css')}}" rel="stylesheet" type="text/css" />
<script>
var swiper = new Swiper('.swiper-cate-col', {
	slidesPerView: 5,
	spaceBetween: 10,
	grabCursor: false,
	scrollbar: {
		el: ".swiper-cate-col .swiper-scrollbar",
		hide: true,
	},
	breakpoints: {
		1199: {
			slidesPerView: 5,
			spaceBetween: 10,
			touchRatio: 1,
			loop: false,
		},
		991: {
			slidesPerView: 5,
			spaceBetween: 10,
			touchRatio: 1,
			loop: false,
		},
		767: {
			slidesPerView: 4,
			slidesPerGroup: 2,
			spaceBetween: 20,
			touchRatio: 1,
			loop: false,
		},
		480: {
			slidesPerGroup: 3,
			slidesPerView: 2,
			spaceBetween: 20,
			touchRatio: 1,
			loop: false,
		},
		320: {
			slidesPerView: 2,
			slidesPerGroup: 2,
			spaceBetween: 10,
			touchRatio: 1,
			loop: false,
		}
	}
});
</script>
@endsection
@section('content')
<section class="bread-crumb">
	<div class="container">
	<div class="row">
		<div class="col-12 a-left">
			<ul class="breadcrumb" >
				<li class="home">
				<a  href="{{route('home')}}" ><span >Trang chủ</span></a>						
				<span class="mr_lr">&nbsp;/&nbsp;</span>
				</li>
				<li><strong ><span> Đã tìm thấy {{$countproduct}} kết quả phù hợp</span></strong></li>
			</ul>
		</div>
	</div>
	</div>
</section>
<div class="container cate-content">
	<h1 class="title-collection">
	<span>
		Đã tìm thấy {{$countproduct}} kết quả phù hợp
	</span>
	</h1>
	<div class="row">
	<aside class="sidebar col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="aside-category-sort">
			<aside class="aside-item aside-category">
				<div class="aside-content">
				<div class="swiper-cate-col swiper-container">
					<div class="swiper-wrapper">
						@foreach ($categoryhome as $cate)
							<div class="swiper-slide thumb_s">
							<a class="image" href="{{route('allListProCate',['cate'=>$cate->slug])}}" title="{{languageName($cate->name)}}">
							<span>{{languageName($cate->name)}}</span>
							</a>
							</div>
						@endforeach
					</div>
					<div class="swiper-scrollbar"></div>
				</div>
				</div>
			</aside>
		</div>		
	</aside>
	<section class="main_container collection col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
		<div class="category-products products category-products-grids clearfix">
			<section class="products-view products-view-grid row">
				@foreach ($resultPro as $product)
				<div class="col-lg-4 col-md-4 col-sm-6 col-6">
					@include('layouts.product.item', ['product'=>$product])
				</div>
				@endforeach
			</section>
			{{-- <div class="row">
				<div class="col-lg-12 col-sm-12 col-12 margin-top-20 fix-pag">
				<div class="paginate">
					{{$list->links()}}
				</div>
				</div>
			</div> --}}
		</div>
	</section>
	<aside class="left-content col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
		<aside class="aside-item sidebar-category collection-category margin-bottom-0">
			<div class="aside-content aside-content-menu">
				<nav class="nav-category navbar-toggleable-md">
				<ul class="nav navbar-pills">
					<li class="nav-item">
						<a class="nav-link" href="{{route('home')}}">Trang chủ</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="">Sale</a>
					</li>
					<li class="nav-item">
						<a href="{{route('allProduct')}}" class="nav-link">Sản phẩm</a>
						<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="fa-plus svg-down svg-inline--fa fa-chevron-down fa-w-14">
							<path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z" class=""></path>
						</svg>
						<ul class="dropdown-menu ul_1">
							@foreach ($categoryhome as $cate)
							<li class="dropdown-submenu nav-item">
								<a class="nav-link" href="{{route('allListProCate', ['cate'=>$cate->slug])}}">{{languageName($cate->name)}}
								</a>
								@if (count($cate->typeCate) > 0)
									<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="fa-plus svg-down svg-inline--fa fa-chevron-down fa-w-14">
										<path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z" class=""></path>
									</svg>
									<ul class="dropdown-menu ul_2">
										@foreach ($cate->typeCate as $type)
										<li class="nav-item lv3">
											<a class="nav-link" href="{{route('allListProType', ['cate'=>$type->cate_slug, 'type'=>$type->slug])}}">{{languageName($type->name)}}
											</a>
										</li>
										@endforeach
									</ul>
								@endif
							</li>
							@endforeach
						</ul>
					</li>
					<li class="nav-item">
						<a href="{{route('allListBlog')}}" class="nav-link">Tin tức</a>
						<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="fa-plus svg-down svg-inline--fa fa-chevron-down fa-w-14">
							<path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z" class=""></path>
						</svg>
						<ul class="dropdown-menu ul_1">
							@foreach ($blogCate as $cate)
							<li class="dropdown-submenu nav-item">
								<a class="nav-link" href="{{route('listCateBlog', ['slug'=>$cate->slug])}}">{{languageName($cate->name)}}
								</a>
								@if (count($cate->typeCate) > 0)
									<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="fa-plus svg-down svg-inline--fa fa-chevron-down fa-w-14">
										<path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z" class=""></path>
									</svg>
									<ul class="dropdown-menu ul_2">
										@foreach ($cate->typeCate as $type)
										<li class="nav-item lv3">
											<a class="nav-link" href="{{route('listTypeBlog', ['slug'=>$type->slug])}}">{{languageName($type->name)}}
											</a>
										</li>
										@endforeach
									</ul>
								@endif
							</li>
							@endforeach
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{route('lienHe')}}">Liên hệ</a>
					</li>
				</ul>
				</nav>
			</div>
		</aside>
		<div class="aside-filter clearfix">
			<div class="aside-hidden-mobile">
				<div class="filter-containers">
				<div class="filter-container__selected-filter" style="display: none;">
					<div class="filter-container__selected-filter-list clearfix">
						<div class="filter-container__selected-filter-header">
							<span class="filter-container__selected-filter-header-title">Bạn chọn</span>
						</div>
						<ul>
						</ul>
						<div class="filter-container__selected-filter-footer d-none">
							<a href="javascript:void(0)" onclick="clearAllFiltered()" class="filter-container__clear-all" title="Bỏ hết">Bỏ hết</a>
						</div>
					</div>
				</div>
				</div>
				<div class="clearfix"></div>
				<div class="filter-container">
				<aside class="aside-item filter-vendor">
					<div class="aside-title">Thương hiệu 
					</div>
					<div class="aside-content filter-group">
						<div class="search-collection">
							<input type="text" placeholder="Tìm kiếm" class="form-control filter-vendor-list" onkeyup="filterItemInList(jQuery('.filter-vendor-list'))">
							<div class="button_search">
							<button type="submit" class="btn btn-default">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M14.4057 12.4769C16.0756 10.1337 15.8595 6.85958 13.7572 4.75736C11.4141 2.41421 7.61509 2.41421 5.27195 4.75736C2.9288 7.1005 2.9288 10.8995 5.27195 13.2426C7.37417 15.3449 10.6483 15.561 12.9915 13.8911L18.707 19.6066L20.1212 18.1924L14.4057 12.4769ZM12.343 6.17157C13.9051 7.73367 13.9051 10.2663 12.343 11.8284C10.7809 13.3905 8.24826 13.3905 6.68616 11.8284C5.12406 10.2663 5.12406 7.73367 6.68616 6.17157C8.24826 4.60948 10.7809 4.60948 12.343 6.17157Z" fill="#333333"/>
								</svg>
							</button>
							</div>
						</div>
						<ul class="filter-vendor">
							@foreach ($productBrands as $brand)
							<li class="filter-item filter-item--check-box filter-item--green ">
								<label data-filter="chanel" for="filter-chanel" class="chanel">
								<input type="checkbox" id="filter-chanel" onchange="toggleFilter(this)"  data-group="Hãng" data-field="vendor.filter_key" data-text="Chanel" value="(&#34;Chanel&#34;)" data-operator="OR">
								<i class="fa"></i>
								<span>{{$brand->name}}</span>
								</label>
							</li>
							@endforeach
						</ul>
					</div>
				</aside>
				<aside class="aside-item filter-price">
					<div class="aside-title">Giá 
					</div>
					<div class="aside-content filter-groupi filter-ui-slider">
						<div id='start'><input value="0"></div>
						<div id='stop'><input value="10.000.000₫"></div>
						<div id='slider'></div>
						<span class="price_val"></span>
						<a id="old-value" href="javascript:;"></a>
						<a id="filter-value" class="btn btn-primary" href="javascript:;" onclick="_toggleFilterdqdt(this);"  data-value="(>-1 AND <10000001)" >Lọc giá</a>
					</div>
				</aside>
				</div>
			</div>
		</div>
	</aside>
	</div>
</div>
<div id="open-filters" class="open-filters d-lg-none d-block">
	<span class="fter">
	</span>
</div>
@endsection