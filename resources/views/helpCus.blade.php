@extends('layouts.main.master')
@section('title')
{{$helpCus->title}}
@endsection
@section('description')
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
<section class="bread-crumb">
<div class="container row">
    <ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
        <li class="home" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" >
            <a itemprop="item" href="{{route('home')}}" title="Trang chủ" style="margin-right: 6px;">
            <span itemprop="name">Trang chủ</span>
            <meta itemprop="position" content="1" />
            </a>
            <i class="fa-solid fa-caret-right"></i>
        </li>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" style="margin-left: 6px;">
            <strong itemprop="name">{{$helpCus->title}}</strong>
            <meta itemprop="position" content="2" />
        </li>
    </ul>
</div>
</section>
<section class="page margin-top-30 margin-bottom-30">
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="content-page rte">
            {!!$helpCus->content!!}
            </div>
        </div>
    </div>
</div>
</section>
@endsection