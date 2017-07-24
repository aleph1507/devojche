

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
			<?php 
				if(isset($p->sliki))
					$sliki = explode(";", $p->sliki);
				else
					$sliki = null;
			?>
			<div class="lazy-container col-sm-12 col-lg-4 col-md-4">
				<div class="thumbnail">
					<div id="carousel-{{$p->id}}" class="carousel slide" data-interval="false" data-ride="carousel">
						<ol class="carousel-indicators">
							@for($i=0; $i<count($sliki); $i++)
								<li data-target="#carousel-{{$p->id}}" data-slide-to="{{$i}}" {{$i==0 ? "active" : ""}}></li>
							@endfor
						</ol>
						<div class="carousel-inner">
							@for($i=0; $i<count($sliki); $i++)
								<div class="item {{$i == 0 ? "active" : ""}}">
									<img src="{{asset('images/products/' . $p->ime . '/' . $sliki[$i])}}" alt="" class="slide-img">
								</div>
							@endfor
						</div>
						<a href="#carousel-{{$p->id}}" class="left carousel-control" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>
						<a class="right carousel-control" href="#carousel-{{$p->id}}" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
					</div>
					<div class="caption">
                        <h4 class="pull-right">{{$p->cena}}</h4>
                        <h4><a href="#">{{$p->ime}}</a></h4>
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