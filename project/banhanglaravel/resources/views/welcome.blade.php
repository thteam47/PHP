@extends('layouts.layout')
@section('title','Trang chủ')

@section('left')
<nav id="menu">
	<ul>
		<li class="menu-item">danh mục sản phẩm</li>
		@foreach($category as $item)
		<li class="menu-item"><a href="{{ route('getCategory',['id'=>$item->c_id,'slug'=>$item->c_slug]) }}" title="">{{ $item->c_name }}</a></li>
		@endforeach

	</ul>
</nav>
@endsection

@section('slide')
<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
<div id="slider">
	<div id="demo" class="carousel slide" data-ride="carousel">

		<!-- Indicators -->
		<ul class="carousel-indicators">
			<li data-target="#demo" data-slide-to="0" class="active"></li>
			<li data-target="#demo" data-slide-to="1"></li>
			<li data-target="#demo" data-slide-to="2"></li>
		</ul>

		<!-- The slideshow -->
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="{{asset('public/theme_fontend/img/home/slide-1.png')}}" alt="Los Angeles" >
			</div>
			<div class="carousel-item">
				<img src="{{asset('public/theme_fontend/img/home/slide-2.png')}}" alt="Chicago">
			</div>
			<div class="carousel-item">
				<img src="{{asset('public/theme_fontend/img/home/slide-3.png')}}" alt="New York" >
			</div>
		</div>

		<!-- Left and right controls -->
		<a class="carousel-control-prev" href="#demo" data-slide="prev">
			<span class="carousel-control-prev-icon"></span>
		</a>
		<a class="carousel-control-next" href="#demo" data-slide="next">
			<span class="carousel-control-next-icon"></span>
		</a>
	</div>
</div>
@endsection

@section('main')
<div id="wrap-inner">
	<div class="products">
		<h3>sản phẩm nổi bật</h3>
		<div class="product-list row">
			@foreach($hot as $item)

			<div class="product-item col-md-4 col-sm-6 col-xs-12">
				<a href="#"><img src="{{asset('/storage/app/avatar/'.$item->p_image)}}" class="img-thumbnail"></a>
				<p><a href="#">{{$item->p_name}}</a></p>
				<p class="price">{{number_format($item->p_price,0,',','.')}}</p>	  
				<div class="marsk">
					<a href="{{ route('getDetails',['id'=>$item->p_id,'slug'=>$item->p_slug]) }}">Xem chi tiết </a>
				</div>                                    
			</div>

			@endforeach    
		</div>   

	</div>

	<div class="products">
		<h3>sản phẩm mới</h3>
		<div class="product-list row">
			@foreach($news as $item)

			<div class="product-item col-md-4 col-sm-6 col-xs-12">
				<a href="#"><img src="{{asset('/storage/app/avatar/'.$item->p_image)}}" class="img-thumbnail"></a>
				<p><a href="#">{{$item->p_name}}</a></p>
				<p class="price">{{number_format($item->p_price,0,',','.')}}</p>	  
				<div class="marsk">
					<a href="{{ route('getDetails',['id'=>$item->p_id,'slug'=>$item->p_slug]) }}">Xem chi tiết </a>
				</div>                                    
			</div>

			@endforeach    

		</div>    
	</div>
</div>
@endsection
