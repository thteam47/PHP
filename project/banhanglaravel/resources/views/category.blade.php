@extends('layouts.layout')
@section('title','Danh mục sản phẩm')

@section('left')
<link rel="stylesheet" href="{{ asset('public/theme_fontend/css/categorys.css') }}">
<nav id="menu">
	<ul>
		<li class="menu-item">danh mục sản phẩm</li>
		@foreach($category as $item)
		<li class="menu-item"><a href="{{ route('getCategory',['id'=>$item->c_id,'slug'=>$item->c_slug]) }}" title="">{{ $item->c_name }}</a></li>
		@endforeach

	</ul>
</nav>
@endsection

@section('main')

<div id="wrap-inner">
	<div class="products">
		<h3>{{ $cateName->c_name }}</h3>
		<div class="product-list row">
			@foreach($prodcate as $item)

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

	<div id="pagination">
		<ul class="pagination pagination-lg justify-content-center">
			{{ $prodcate->links('vendor/pagination/bootstrap-4') }};
		</ul>
	</div>
</div>

@endsection
