@if(Session::has('success'))

	<div class="alert alert-success" role="alert">
		<strong>Success:</strong> {{ Session::get('success') }}
	</div>

@endif

@if(Session::has('warning'))
	<div class="alert alert-warning" role="alert">
		<strong>Warning:</strong> {{ Session::get('warning') }}
	</div>
@endif

@if(count($errors) > 0)

	<div class="alert alert-danger" role="alert">
		<strong>Errors:</strong>
		<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div>

@endif

{{-- @if(Auth::check())

	@if(!Auth::user()->isActivated())

		<div class="alert alert-warning" role="alert">
			Please verify your e-mail. <strong>Otherwise, your account may be deleted.</strong>
		</div>

	@endif

@endif --}}