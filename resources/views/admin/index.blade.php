@extends('layouts.master')

@section('content')

	<div class="container">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#products">Продукти</a></li>
			<li><a data-toggle="tab" href="#dp">Деактивирани продукти</a></li>
			<li><a data-toggle="tab" href="#sellers">Продавачи</a></li>
		</ul>

		<div class="tab-content">
			<div id="products" class="tab-pane fade in active">
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
						@foreach($products as $p)
							@if(!$p->deleted)
								@include('partials._admin_pt')	
							@endif
						@endforeach
					</tbody>
				</table>
				{{$products->links()}}
			</div>

			<div id="dp" class="tab-pane fade">
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
				<div class="dplinks" id="dplinks">
					{{$dp->links()}}
				</div>
			</div>

			<div class="tab-pane fade" id="sellers">
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
								<td>{{$seller->aktiven}}</td>
								<td>{{$seller->updated_at}}</td>
								<td>
									<a href="#" class="open-modal"><span class="produkt"><i class="fa fa-pencil-square" aria-hidden="true"></i></span></a>
								</td>
								<td>
									<a href="#" class="open-modal"><span class="produkt"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				<div class="sellerslist" id="sellerslist">
					{{$sellers->links()}}
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