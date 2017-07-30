@extends('layouts.master')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12  col-md-6 col-lg-6 col-md-push-6 col-lg-push-6">
			<div class="contact-spacing hidden-xs hidden-sm"></div>
			<div class="row company-info info">
				Информации за компанијата Информации за компанијата Информации за компанијата Информации за компанијата Информации за компанијата Информации за компанијата Информации за компанијата Информации за компанијата Информации за компанијата 
			</div>
			<div class="row info contact-info">
				Контакт информации Контакт информации Контакт информации Контакт информации 
				<br>
			</div>
			<div class="row info addr-info">Адреса 1</div>
			<div class="row info addr-info">Адреса 2</div>
			<div class="row info social-media-info">Facebook kopce, twitter..</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-pull-6 col-lg-pull-6">
			<h1>Контакт</h1>
			<form action="{{route('contact.post')}}" method="POST">
				{{csrf_field()}}
				<label for="ime" class='control-label form-group'>Вашето име:</label>
				<input type="text" name="ime" class='form-control'>

				<label for="email" class='control-label form-group'>Вашиот емаил:</label>
				<input type="email" name="email" class='form-control'>

				<label for="msg" class='control-label form-group'>Вашата порака:</label>
				<textarea name="msg" id="" class='form-control' rows="10"></textarea>

				<label for="recaptcha" class='control-label form-group'>Верификација</label>
				<div class="g-recaptcha" data-sitekey="6LdiexAUAAAAAGMQTUZ7O_YsXYA4U8hgx2lJNEsG"></div>

				<input type="submit" value='Испрати' class='btn btn-default btn-inverted-default'>
			</form>
		</div>
	</div>
</div>

@endsection