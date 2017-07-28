<div id="edit-{{$seller->id}}" class="modal-dialog">
		<div class="modal-content">
			<span class="close-modal">&times;</span>
			{!! Form::model($seller, ['route' => ['seller.update', $seller->id], 'method' => 'PATCH', 'files' => true]) !!}

				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
							<img src="{{asset('images/sellers/' . $seller->slika)}}" class="img-responsive" alt="Вашата слика">
							{{ Form::file('slika', ['accept' => 'image/*', 'class' => 'form-control mform-control']) }}
						</div>
						<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
							<div class="row">
								<div class="col-xs-12 col-sm-5 col-md-2 col-lg-2">
									{{Form::label('ime', 'Име: ', ['class' => 'control-label form-group pull-right'])}}
								</div>
								<div class="col-xs-12 col-sm-7 col-md-10 col-lg-10">
								{{ Form::text('ime', null, ['class' => 'form-control mform-control']) }}
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-5 col-md-2 col-lg-2">
								{{Form::label('email', 'Е-маил:', ['class' => 'control-label form-group pull-right'])}}
								</div>
								<div class="col-xs-12 col-sm-7 col-md-10 col-lg-10">
								{{Form::text('email', $seller->user->email, ['class' => 'form-control mform-control'])}}
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-5 col-md-2 col-lg-2">
									{{Form::label('adresa', 'Адреса:', ['class' => 'control-label form-group pull-right'])}}
								</div>
								<div class="col-xs-12 col-sm-7 col-md-10 col-lg-10">
									{{ Form::text('adresa', null, ['class' => 'form-control mform-control']) }}
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-5 col-md-2 col-lg-2">
									{{Form::label('telefon', 'Телефон:', ['class' => 'control-label form-group pull-right'])}}
								</div>
								<div class="col-xs-12 col-sm-7 col-md-10 col-lg-10">
									{{ Form::text('telefon', null, ['class' => 'form-control mform-control']) }}
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
									{{ Form::submit('Промени', ['class' => 'btn btn-default btn-form btn-inverted-default btn-block']) }}
								</div>
								{{-- <div class="col-sm-1 col-md-1 col-lg-1"></div> --}}
				{!! Form::close() !!}
								<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
									{!! Form::open(['route' => ['seller.destroy', $seller->id], 'method' => 'DELETE']) !!}

										{{ Form::submit('Избриши продавач', ['class' => 'btn btn-danger btn-form btn-block']) }}

									{!! Form::close() !!}
									{{-- <a href=""></a> --}}
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>