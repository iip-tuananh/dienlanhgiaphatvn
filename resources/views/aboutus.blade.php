@extends('layouts.main.master')
@section('title')
Giới thiệu
@endsection
@section('description')
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
               <li><strong itemprop="title">Giới thiệu</strong></li>
            </ul>
         </div>
      </div>
   </div>
</section>
<section class="page">
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="border-bg clearfix padding-bottom-20">
               <div class="col-md-12">
                  <div class="page-title category-title">
                     <h1 class="title-head"><a href="#">Giới thiệu</a></h1>
                  </div>
                  <div class="content-page rte">
                     {!!$pageContent->content!!}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection