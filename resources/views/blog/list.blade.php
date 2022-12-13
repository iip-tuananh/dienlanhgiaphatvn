@extends('layouts.main.master')
@section('title')
{{$title_page}} 
@endsection
@section('description')
{{$title_page}}
@endsection
@section('image')
{{url(''.$banners[0]->image)}}
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
               <li><strong itemprop="title">Tin tức</strong></li>
            </ul>
         </div>
      </div>
   </div>
</section>
<div class="container" itemscope itemtype="http://schema.org/Blog">
   <div class="row">
      <section class="right-content col-md-9 col-md-push-3 list-blog-page">
         <div class="border-bg clearfix">
            <div class="col-md-12">
               <div class="box-heading">
                  <h1 class="title-head">Tin tức</h1>
               </div>
               <section class="list-blogs blog-main">
                  <div class="row">
                     @foreach ($blogs as $blog)
                     <div class="col-md-12 col-sm-12 col-xs-12 clearfix">
                        <article class="blog-item">
                           <div class="blog-item-thumbnail">
                              <a href="{{route('detailBlog', ['slug'=>$blog->slug])}}">
                                 <picture>
                                    <source media="(min-width: 1200px)" srcset="{{$blog->image}}">
                                    <source media="(min-width: 992px)" srcset="{{$blog->image}}">
                                    <source media="(min-width: 767px)" srcset="{{$blog->image}}">
                                    <source media="(min-width: 666px)" srcset="{{$blog->image}}">
                                    <source media="(min-width: 569px)" srcset="{{$blog->image}}">
                                    <source media="(min-width: 480px)" srcset="{{$blog->image}}">
                                    <img src="{{$blog->image}}" alt="{{languageName($blog->title)}}" class="img-responsive center-block" />
                                 </picture>
                              </a>
                           </div>
                           <div class="blog-item-mains">
                              <h3 class="blog-item-name"><a href="{{route('detailBlog', ['slug'=>$blog->slug])}}" title="{{languageName($blog->title)}}">{{languageName($blog->title)}}</a></h3>
                              <div class="post-time">
                                 {{date('d/m/Y', strtotime($blog->created_at))}}
                              </div>
                              <p class="blog-item-summary margin-bottom-5"> 
                                 {{languageName($blog->description)}}
                              </p>
                           </div>
                        </article>
                     </div>
                     @endforeach
                     <div class="col-md-12 col-sm-12 col-xs-12">
                        {{$blogs->links()}}
                     </div>
                  </div>
               </section>
            </div>
         </div>
      </section>
      <aside class="left left-content col-md-3 col-md-pull-9">
         <div class="border-bg">
            <aside class="aside-item collection-category blog-category">
               <div class="heading">
                  <h2 class="title-head"><span>Danh mục sản phẩm</span></h2>
               </div>
               <div class="aside-content">
                  <nav class="nav-category  navbar-toggleable-md" >
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
            <div class="aside-item">
               <div class="heading">
                  <h2 class="title-head">Bài viết nổi bật</h2>
               </div>
               <div class="list-blogs">
                  @foreach ($news as $blog)
                  <article class="blog-item blog-item-list clearfix">
                     <a href="{{route('detailBlog', ['slug'=>$blog->slug])}}" class="panel-box-media"><img src="{{$blog->image}}" width="70" height="70" alt="{{languageName($blog->title)}}" /></a>
                     <div class="blogs-rights">
                        <h3 class="blog-item-name"><a href="{{route('detailBlog', ['slug'=>$blog->slug])}}" title="{{languageName($blog->title)}}">{{languageName($blog->title)}}</a></h3>
                        <div class="post-time">{{date('d/m/Y', strtotime($blog->created_at))}}</div>
                     </div>
                  </article>
                  @endforeach
               </div>
            </div>
         </div>
      </aside>
   </div>
</div>
@endsection