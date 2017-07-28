@extends('layouts.master')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titlediv">
				<div class="pull-right"><i>Welcome</i> <b>{{$seller->ime}}</b></div>
			</div>
		</div>

		@if(!$seller->aktiviran)
			<div class="row alert alert-warning">	
				<p>Вашиот продавачки статус треба да биде потврден од администратор.</p>
			</div>
		@endif

		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 modal-div">
				<a class="open-modal btn btn-default modal-btn" href="#edit-{{$seller->id}}">Лични податоци</a>
			</div>
			{{-- <div class="col-md-6 col-lg-6"></div> --}}
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 pull-right modal-div">
				<a class="open-modal btn btn-default modal-btn" {{$seller->aktiviran ? '' : 'disabled'}} href="#add">Додади продукт</a>
			</div>
		</div>

		<table class="table table-hover products-table">
			<thead>
				<th>Име</th>
				<th>Промени</th>
				<th>Избриши</th>
			</thead>
			<tbody>
				@foreach($products as $p)
				@if(!$p->deleted)
					<tr>
						<td><span class="produkt">{{$p->ime}}</span></td>
						<td><a href="#editproduct-{{$p->id}}" class="open-modal"><span class="produkt"><i class="fa fa-pencil-square" aria-hidden="true"></i></span></a></td>
						<td>
							<a href="#deleteproduct-{{$p->id}}" class="open-modal"><span class="produkt"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
							@include('partials._delete-product')

						</td>
						@include('partials._edit-product')
					</tr>
				@endif
				@endforeach
				
			</tbody>
		</table>
		{{$products->links()}}
	</div>

	@include('partials._edit-seller')

	{{-- <div id="edit" class="modal-dialog">
		<div class="modal-content">
			<span class="close-modal">&times;</span>
			{!! Form::model($seller, ['route' => ['seller.update', $seller->id], 'method' => 'PATCH', 'files' => true]) !!}

				<div class="container">

					@include('partials._edit-seller')
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<img src="{{asset('images/sellers/' . $seller->slika)}}" class="img-responsive" alt="Вашата слика">
							{{ Form::file('slika', ['accept' => 'image/*', 'class' => 'form-control mform-control']) }}
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="row">
								{{ Form::text('ime', null, ['class' => 'form-control mform-control']) }}
							</div>
							<div class="row">
								{{ Form::text('adresa', null, ['class' => 'form-control mform-control']) }}
							</div>
							<div class="row">
								{{ Form::text('telefon', null, ['class' => 'form-control mform-control']) }}
							</div>
							<div class="row">
								{{ Form::submit('Промени', ['class' => 'btn btn-default btn-form btn-inverted-default']) }}<br><hr>
								{!! Form::open(['route' => ['seller.destroy', $seller->id], 'method' => 'DELETE']) !!}

									{{ Form::submit('Избриши продавач', ['class' => 'btn btn-danger btn-form']) }}

								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>

			{!! Form::close() !!}
		</div>
	</div> --}}

	<div id="add" class="modal-dialog">
		<div class="modal-content">
			<span class="close-modal">&times;</span>
				{!! Form::open(['route' => 'products.store', 'method' => 'POST', 'files' => true]) !!}

					{{ Form::label('ime', 'Име на продуктот: ', ['class' => 'control-label form-group']) }}
					{{ Form::text('ime', '', ['class' => 'form-control', 'required' => '']) }}

					{{ Form::label('category', 'Категорија: ', ['class' => 'control-label form-group']) }}
					<select class="form-control" name="category" id="category" required>
						@foreach($cat as $c)
							<option value="{{$c->id}}">{{$c->ime}}</option>
						@endforeach
					</select>

					{{ Form::label('cena', 'Цена: ', ['class' => 'control-label form-group mod-lg-form-group']) }}
					<input type="number" name="cena" min="0" step="1" class="form-control tight-form-control" required>
					{{ Form::label('den', 'ден') }}
					<br>

					{{ Form::label('prva_slika', 'Главна слика: ', ['class' => 'control-label form-group mod-lg-form-group']) }}
					{{ Form::file('prva_slika', ['class' => 'form-control', 'accept' => 'image/*', 'required' => '']) }}

					{{ Form::label('description', 'Опис: ', ['class' => 'control-label form-group mod-lg-form-group'])}}
					{!! Form::textarea('description', '', ['class' => 'tinymcetextarea form-control'])!!}
		
					{{ Form::label('slika1', 'Додатнa сликa 1:', ['class' => 'form-control form-group mod-lg-form-group']) }}
					<input type="file" name="slika1" accept="image/*">

					{{ Form::label('slika2', 'Додатнa сликa 2:', ['class' => 'form-control form-group mod-lg-form-group']) }}
					<input type="file" name="slika2" accept="image/*">

					{{ Form::label('slika3', 'Додатнa сликa 3:', ['class' => 'form-control form-group mod-lg-form-group']) }}
					<input type="file" name="slika3" accept="image/*">

					{{ Form::submit('Постави продукт', ['class' => 'btn btn-default btn-inverted-default btn-lg mod-lg-form-group']) }}

				{!! Form::close() !!}
		</div>
	</div>
	<script>
		function show_del_div(id){
			$(id).toggle('fast');
		}
		function hide_del_div(id){
			$(id).hide('fast');
		}
	</script>

@endsection