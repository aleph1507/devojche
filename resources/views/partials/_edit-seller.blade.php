<div id="edit-{{$seller->id}}" class="modal-dialog">
		<div class="modal-content">
			<span class="close-modal">&times;</span>
			{!! Form::model($seller, ['route' => ['seller.update', $seller->id], 'method' => 'PATCH', 'files' => true]) !!}

				<div class="container">
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
	</div>