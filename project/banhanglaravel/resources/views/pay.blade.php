@extends('layouts.layout')
@section('title','Thanh toán')

@section('left')
<link rel="stylesheet" href="{{ asset('public/theme_fontend/css/cart.css') }}">
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
	<div id="xac-nhan">
		<h3>Xác nhận mua hàng</h3>
		<form method="POST" enctype="multipart/form-data" >
			@csrf
			<div class="form-group">
				<label for="email">Email address:</label>
				<input required type="email" class="form-control" id="email" name="email">
			</div>
			<div class="form-group">
				<label for="name">Họ và tên:</label>
				<input required type="text" class="form-control" id="name" name="name">
			</div>
			<div class="form-group">
				<label for="phone">Số điện thoại:</label>
				<input required type="number" class="form-control" id="phone" name="phone">
			</div>
			<div class="form-group">
				<label for="add">Địa chỉ:</label>
				<input required type="text" class="form-control" id="add" name="add">
			</div>
			<div class="form-group text-right">
				<button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
			</div>
		</form>
	</div>  

	
</div>		

@endsection
