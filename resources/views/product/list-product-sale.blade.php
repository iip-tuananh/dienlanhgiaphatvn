@extends('layouts.main.master')
@section('title')
Sản phẩm khuyến mãi
@endsection
@section('description')
Danh sách sản phẩm khuyến mãi
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('js')
@endsection
@section('css')
<link rel="preload" as="style" type="text/css" href="{{asset('frontend/css/page-sale.scss.css')}}" />
<link href="{{asset('frontend/css/page-sale.scss.css')}}" rel="stylesheet" type="text/css" />
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
                <li><strong ><span>Sản phẩm khuyến mãi</span></strong></li>
            </ul>
        </div>
    </div>
    </div>
</section>
<section class="page page_sale">
    <div class="container">
    <h1 class="title-head">
        Sản phẩm khuyến mãi
    </h1>
    <div class="banner_page_sale">
        @foreach ($bannerAdsSale as $item)
            <a class="image" href="{{$item->name}}" title="Banner sale">
            <img class="lazy" width="1170" height="420" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"  data-src="{{$item->image}}" alt="Banner sale" loading="lazy" />
            </a>
        @endforeach
    </div>
    <section class="main_container collection col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="category-products products category-products-grids clearfix">
        <section class="products-view products-view-grid row">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    @include('layouts.product.item', ['product'=>$product])
                </div>
            @endforeach
        </section>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12 margin-top-20 fix-pag">
                <div class="paginate">
                    {{$products->links()}}
                </div>
            </div>
        </div>
        </div>
    </section>
    </div>
</section>
@endsection