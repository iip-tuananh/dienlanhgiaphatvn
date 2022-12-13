@extends('layouts.main.master')
@section('title')
{{languageName($blog_detail->title)}}
@endsection
@section('description')
{{languageName($blog_detail->description)}}
@endsection
@section('image')
{{url(''.$blog_detail->image)}}
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
			<li>
				<a itemprop="url" href="{{route('allListBlog')}}" title="Tin tức"><span itemprop="title">Tin tức</span></a>	
				<span><i class="fa fa-angle-right"></i></span>
			</li>
			<li><strong itemprop="title">{{languageName($blog_detail->title)}}</strong></li>
			</ul>
		</div>
	</div>
</div>
</section>
<div class="container article-wraper">
<div class="row">
	<section class="right-content col-md-9 col-md-push-3">
		<article class="article-main" itemscope itemtype="http://schema.org/Article">
			<div class="col-md-12">
			<div class="row">
				<div class="border-bg clearfix">
					<div class="col-md-12">
						<h1 class="title-head">{{languageName($blog_detail->title)}}</h1>
						<div class="article-details">
						<div class="article-content">
							<div class="rte">
								{!!languageName($blog_detail->content)!!}
							</div>
						</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="social-media" data-permalink="{{url()->current()}}">
						<label>Chia sẻ: </label>
						<a target="_blank" href="//www.facebook.com/sharer.php?u={{url()->current()}}" class="share-facebook" title="Chia sẻ lên Facebook">
						<i class="fa fa-facebook-official"></i>
						</a>
						<a target="_blank" href="//twitter.com/share?text={{languageName($blog_detail->content)}}&amp;url={{url()->current()}}" class="share-twitter" class="share-twitter" title="Chia sẻ lên Twitter">
						<i class="fa fa-twitter"></i>
						</a>
						<a target="_blank" href="//pinterest.com/pin/create/button/?url={{url()->current()}}&amp;media={{$blog_detail->image}}&amp;description={{languageName($blog_detail->content)}}" class="share-pinterest" title="Chia sẻ lên pinterest">
						<i class="fa fa-pinterest"></i>
						</a>
						<a target="_blank" href="//plus.google.com/share?url={{url()->current()}}" class="share-google" title="+1">
						<i class="fa fa-google-plus"></i>
						</a>
						</div>
					</div>
					<div class="col-md-12">
						<div class="blog_related">
						<h2>Bài viết liên quan</h2>
						@foreach ($blogs as $item)
						@if ($item->id != $blog_detail->id)
							<article class="blog_entry clearfix" >
								<h3 class="blog_entry-title"><a rel="bookmark" href="{{route('detailBlog', ['slug'=>$item->slug])}}" title="{{languageName($item->title)}}"><i class="fa fa-angle-right" aria-hidden="true"></i> {{languageName($item->title)}}</a></h3>
							</article>
						@endif
						@endforeach
						</div>
					</div>
				</div>
			</div>
			</div>
		</article>
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