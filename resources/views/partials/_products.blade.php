

{{-- 	@if(count($products)>0)
	<div class="load">
		@foreach($products as $p)
			<div>
				<h3>
					<p>{{$p->ime}}</p>
				</h3>
			</div>
		@endforeach
	</div>
	@else
		0
	@endif --}}
{{-- @if(count($products)>0)
	<div class="load">
		@foreach($products as $p)
 --}}			{{-- @if(is_string($p->sliki))
				string
			@else
				NOT string
			@endif
			{{exit}} $p->sliki e string
 --}} 

	<div class="load row">
		@foreach($products as $p)
		@if($p->deleted == 0)
			<div class="lazy-container col-sm-12 col-lg-4 col-md-4">
				<div class="thumbnail">
					<div id="carousel-{{$p->id}}" class="carousel slide" data-interval="false" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carousel-{{$p->id}}" data-slide-to="0" active></li>
							@if(isset($p->slika1))
								<li data-target="#carousel-{{$p->id}}" data-slide-to="1"></li>
							@endif
							@if(isset($p->slika2))
								<li data-target="#carousel-{{$p->id}}" data-slide-to="2"></li>
							@endif
							@if(isset($p->slika3))
								<li data-target="#carousel-{{$p->id}}" data-slide-to="3"></li>
							@endif
						</ol>
						<div class="carousel-inner">
							<div class="item active">
								<img src="{{asset('images/products/' . $p->prva_slika)}}" alt="">
							</div>
							@if(isset($p->slika1))
								<div class="item">
									<img src="{{asset('images/products/' . $p->id . '/' . $p->slika1)}}" alt="">
								</div>
							@endif
							@if(isset($p->slika2))
								<div class="item">
									<img src="{{asset('images/products/' . $p->id . '/' . $p->slika2)}}" alt="">
								</div>
							@endif
							@if(isset($p->slika3))
								<div class="item">
									<img src="{{asset('images/products/' . $p->id . '/' . $p->slika3)}}" alt="">
								</div>
							@endif
						</div>
						<a href="#carousel-{{$p->id}}" class="left carousel-control" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>
						<a class="right carousel-control" href="#carousel-{{$p->id}}" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
					</div>
					<div class="caption">
                        <h4 class="pull-right">{{$p->cena}} ден.</h4>
                        <h4><a href="{{route('products.show', $p->id)}}">{{$p->ime}}</a></h4>
                        <p>{!!substr(strip_tags($p->description), 0, 80)!!}{!!isset($p->description) ? '...' : '<br>'!!} <a href="{{route('products.show', $p->id)}}">Види повеќе</a></p>
                    </div>
				</div>
			</div>
		@endif
		@endforeach
	</div><br>
	<div class="row pagelinks">
		{{-- <div class="pagelinks"> --}}
			{{$products->links()}}
		{{-- </div> --}}
	</div>
{{-- @else
	0
@endif
 --}}