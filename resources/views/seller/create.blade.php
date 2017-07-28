@extends('layouts.master')

@section('content')

	<div class="container">
		<h2 class="pull-left">Информации за продавачот</h2><br>
		<hr class="form-title-hr">
		<br>
		{!! Form::open(['route' => 'seller.store', 'files' => true]) !!}

			{{ Form::label('ime', 'Име: ', ['class' => 'col-md-4 col-xs-12 control-label form-group']) }}
			{{ Form::text('ime', '', ['class' => 'form-control']) }}

			{{ Form::label('adresa', 'Адреса: ', ['class' => 'col-md-4 col-xs-12 control-label form-group']) }}
			{{ Form::text('adresa', '', ['class' => 'form-control']) }}

			{{ Form::label('telefon', 'Телефон: ', ['class' => 'col-md-4 col-xs-12 control-label form-group']) }}
			{{ Form::text('telefon', '', ['class' => 'form-control']) }}

			{{ Form::label('slika', 'Слика: ', ['class' => 'col-md-4 col-xs-12 control-label form-group']) }}
			{{ Form::file('slika', ['accept' => 'image/*', 'class' => 'form-control']) }}

			{{ Form::submit('Испрати', ['class' => 'btn btn-default btn-form']) }}

		{!! Form::close() !!}
	</div>

@endsection