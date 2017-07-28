@extends('layouts.master')

@section('content')

	<div class="container contents-margin">
		<div class="row">
			<div class="hidden-xs hidden-sm col-md-6 col-lg-6">
				<div class="row" style="margin:0;">
					<img src="{{asset('images/products/' . $product->prva_slika)}}" id="otvorena_slika" alt="" class="golema_slika">
				</div>
				<div class="row thumb-row">
					@if($product->slika1)
						{{-- <div class="start-margin"></div> --}}
						{{-- <div class="thumb-produkt-div"> --}}
							<img src="{{asset('images/products/' . $product->id . '/' . $product->slika1)}}" alt="" id="thumbnail-slika1" class="thumb_slika">
						{{-- </div> --}}
					@endif
					@if($product->slika2)
	{{-- 					<div class="hidden-xs hidden-sm col-md-1 col-lg-1"></div>
						<div class="hidden-xs hidden-sm col-md-2 col-lg-2"> --}}
						{{-- @if(!$product->slika1) div.start-margin --}}
						{{-- <div class="thumb-produkt-div"> --}}
							<img src="{{asset('images/products/' . $product->id . '/' . $product->slika2)}}" alt="" id="thumbnail-slika2" class="thumb_slika">
						{{-- </div> --}}
						{{-- </div> --}}
					@endif
					@if($product->slika3)
						{{-- <div class="hidden-xs hidden-sm col-md-1 col-lg-1"></div>
						<div class="hidden-xs hidden-sm col-md-2 col-lg-2"> --}}
							<img src="{{asset('images/products/' . $product->id . '/' . $product->slika3)}}" alt="" id="thumbnail-slika3" class="thumb_slika">
						{{-- </div> --}}
						{{-- <div class="hidden-xs hidden-sm col-md-1 col-lg-1"></div> --}}
					@endif
				</div>
			</div>
			<div class="col-12-xs col-12-sm hidden-md hidden-lg">
				<div class="lazy-container col-sm-12 col-lg-4 col-md-4">
					<div class="thumbnail">
						<div id="carousel-{{$product->id}}" class="carousel slide" data-interval="false" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carousel-{{$product->id}}" data-slide-to="0" active></li>
								@if(isset($p->slika1))
									<li data-target="#carousel-{{$product->id}}" data-slide-to="1"></li>
								@endif
								@if(isset($p->slika2))
									<li data-target="#carousel-{{$product->id}}" data-slide-to="2"></li>
								@endif
								@if(isset($p->slika3))
									<li data-target="#carousel-{{$product->id}}" data-slide-to="3"></li>
								@endif
							</ol>
							<div class="carousel-inner">
								<div class="item active">
									<img src="{{asset('images/products/' . $product->prva_slika)}}" alt="">
								</div>
								@if(isset($product->slika1))
									<div class="item">
										<img src="{{asset('images/products/' . $product->id . '/' . $product->slika1)}}" alt="">
									</div>
								@endif
								@if(isset($product->slika2))
									<div class="item">
										<img src="{{asset('images/products/' . $product->id . '/' . $product->slika2)}}" alt="">
									</div>
								@endif
								@if(isset($product->slika3))
									<div class="item">
										<img src="{{asset('images/products/' . $product->id . '/' . $product->slika3)}}" alt="">
									</div>
								@endif
							</div>
							<a href="#carousel-{{$product->id}}" class="left carousel-control" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left"></span>
							</a>
							<a class="right carousel-control" href="#carousel-{{$product->id}}" data-slide="next">
	                            <span class="glyphicon glyphicon-chevron-right"></span>
	                        </a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-1 col-lg-1 hidden-xs hidden-sm"></div>
			<div class="col-xs-12 col-sm-12 col-md-5 col-lg5">
				<div class="row pull-right">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right">
						Сите продукти од
						<form action="/soldby" method="POST">
							{{csrf_field()}}
							<input type="hidden" name="sid" value="{{$seller->id}}">
							<input type="submit" class="link-btn" value="{{$seller->ime}}">
						</form>
					</div>
				</div>
				<h1><b>{{$product->ime}}<b><br><small>{{$seller->telefon}}<br> {{$user->email}}</small></h1>
				<div class="show-product-desc">
					{!! $product->description !!}
				</div>
			</div>
		</div>
		<div class="back-btn-div">
			<a href="/" style="margin:auto;" class="btn btn-default btn-inverted-default btn-lg">Назад на почетна</a>
		</div>
	</div>

	<script type="text/javascript">
		$(".thumb_slika").click(function(){
			var tmp = "";
			tmp = $("#otvorena_slika").attr("src");
			$("#otvorena_slika").attr("src", $(this).attr("src"));
			$(this).attr("src", tmp);
		});

		$(".thumb_slika").hover(function(){
			console.log("this.width:" + $(this).css('width'));
			$(this).css('max-width', $(this).css('max-width')*1.3);
			$(this).css('width', $(this).css('width')*1.3);
		});
	</script>	

@endsection