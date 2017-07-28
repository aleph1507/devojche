@extends('layouts.master')

@section('content')

	<!-- {!!session()->has('tab') ? $tab = session('tab') : $tab = 'p'!!}-->

	<div class="container">
		<ul class="nav nav-tabs">
			<li class="{{$tab == 'p' ? 'active' : ''}}"><a data-toggle="tab" href="#products">Продукти</a></li>
			<li class="{{$tab == 'dp' ? 'active' : ''}}"><a data-toggle="tab" href="#dp">Деактивирани продукти</a></li>
			<li class="{{$tab == 'seller' ? 'active' : ''}}"><a data-toggle="tab" href="#sellers">Продавачи</a></li>
			<li class="{{$tab == 'category' ? 'active' : ''}}"><a data-toggle="tab" href="#categories">Категории</a></li>
		</ul>

			<div class="tab-content">
			<div id="products" class="tab-pane fade in {{$tab == 'p' ? 'in active' : ''}}">
				<h2>Продукти</h2>
				<table class="table table-responsive table-hover table-striped">
					<thead>
						<th>Продукт</th>
						<th>Продавач</th>
						<th>Цена</th>
						<th>Категорија</th>
						<th>Последна промена</th>
						<th>Промени</th>
						<th>Избриши</th>
					</thead>
					<tbody>
						@if(isset($products))
							@foreach($products as $p)
								@if(!$p->deleted)
									@include('partials._admin_pt')	
								@endif
							@endforeach
						@endif
					</tbody>
				</table>
				{{$products->links()}}
			</div>

			<div id="dp" class="tab-pane fade {{$tab == 'dp' ? 'in active' : ''}}">
				<h2 id="dphead">Деактивирани продукти</h2>
				<table class="table table-responsive table-hover table-striped">
					<thead>
						<th>Продукт</th>
						<th>Продавач</th>
						<th>Цена</th>
						<th>Категорија</th>
						<th>Последна промена</th>
						<th>Промени</th>
						<th>Избриши</th>
					</thead>
					<tbody>
						@foreach($dp as $p)
							@include('partials._admin_pt')	
						@endforeach
					</tbody>
				</table>
				{{-- <div class="dplinks" id="dplinks">
					{{$dp->links()}}
				</div> --}}
			</div>

			<div class="tab-pane fade {{$tab == 'seller' ? 'in active' : ''}}" id="sellers">
				<h2 id="sellershead">Продавачи</h2>
				<table class="table table-hover table-responsive table-striped">
					<thead>
						<th>Име</th>
						<th>Адреса</th>
						<th>Телефон</th>
						<th>Е-маил</th>
						<th>Активен</th>
						<th>Последна промена</th>
						<th>Промени</th>
						<th>Избриши</th>
					</thead>
					<tbody>
						@foreach($sellers as $seller)
							<tr>
								<td>{{$seller->ime}}</td>
								<td>{{$seller->adresa}}</td>
								<td>{{$seller->telefon}}</td>
								<td>{{$seller->user->email}}</td>
								<td>
									{{$seller->aktiviran ? "Да" : "Не"}}
									@if($seller->aktiviran)
										{{Form::open(['route' => ['seller.aktivnost', $seller->id], 'method' => 'POST'])}}
										
											{{Form::submit('Деактивирај', ['class' => 'btn btn-xs btn-default btn-inverted-default'])}}

										{{Form::close()}}
									@else
										{{Form::open(['route' => ['seller.aktivnost', $seller->id], 'method' => 'POST'])}}
										
											{{Form::submit('Активирај', ['class' => 'btn btn-xs btn-default btn-inverted-default'])}}

										{{Form::close()}}
									@endif
								</td>
								<td>{{$seller->updated_at}}</td>
								<td>
									<a href="#edit-{{$seller->id}}" class="open-modal"><span class="produkt"><i class="fa fa-pencil-square" aria-hidden="true"></i></span></a>
									@include('partials._edit-seller')
								</td>
								<td>
									<a href="#delete-seller-{{$seller->id}}" class="open-modal"><span class="produkt"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
									@include('partials._delete-seller')
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{{-- <div class="sellerslist" id="sellerslist">
					{{$sellers->links()}}
				</div> --}}
			</div>
			<div id="categories" class="tab-pane fade {{$tab == 'category' ? 'in active' : ''}}">
				<h2 id="categorieshead">Категории</h2>
				<table class="table table-hover table-responsive table-striped">
					<thead>
						<th>Име</th>
						<th>Последна промена</th>
						<th>Промени</th>
						<th>Избриши</th>
					</thead>
					<tbody>
						@foreach($categories as $cat)
							<tr>
								<td>{{$cat->ime}}</td>
								<td>{{$cat->updated_at}}</td>
								<td>
									{{Form::open(['route' => ['category.rename', $cat->id], 'method' => 'POST'])}}
										{{Form::text('ime', $cat->ime)}}
										{{Form::submit('Промени', ['class' => 'btn btn-xs btn-default btn-inverted-default'])}}
									{{Form::close()}}
								</td>
								<td>
									<a href="#delete-category-{{$cat->id}}" class="open-modal"><span class="produkt"><i class="fa fa-trash" aria-hidden="true"></i></span>
									@include('partials._delete-category')
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				<div class="new-category">
					{{Form::open(['route' => 'category.add', 'method' => 'POST'])}}
						<h3>Нова категорија</h3>
						{{Form::label('ime', 'Име:', ['class' => 'control-label form-group'])}}
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								{{Form::text('ime', null, ['class' => 'form-control'])}}
							</div>
						</div>
						{{Form::submit('Зачувај', ['class' => 'btn btn-default btn-inverted-default'])}}
					{{Form::close()}}
				</div>
			</div>
		</div>
	</div>


	<script>
		function show_del_div(id){
			$(id).slideToggle();
		}
		function hide_del_div(id){
			$(id).slideUp();
		}
	</script>

@endsection