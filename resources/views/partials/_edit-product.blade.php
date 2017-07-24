<?php 
	if(isset($categories))
		$cat=$categories;
?>
<div class="modal-dialog" id="editproduct-{{$p->id}}">
<div class="modal-content">
	<span class="close-modal">&times;</span>
		{!! Form::model($p, ['route' => ['products.update', $p->id], 'method' => 'PATCH', 'files' => 'true']) !!}

			<div class="container modal-container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<div class="row">
							{{ Form::label('ime', 'Име:', ['class' => 'control-label form-group m2-control-label'])}}
							{{ Form::text('ime', null, ['class' => 'form-control m2-form-control']) }}
										
						</div>
						<div class="row">
							{{ Form::label('category', 'Категорија:', ['class' => 'control-label m2-control-label form-group']) }}
							<select class="form-control m2-form-control" name="category" id="category" required>
								@foreach($cat as $c)
									<option value="{{$c->id}}" {{ $p->category_id==$c->id ? "selected" : ""  }}>{{$c->ime}}</option>
								@endforeach
							</select>
						</div>
						<div class="row">
							{{ Form::label('cena', 'Цена:', ['class' => 'control-label form-group m2-control-label']) }}
							<input type="number" value="{{$p->cena}}" name="cena" min="0" step="1" class="form-control m2-form-control mid-form-control" required>
							{{ Form::label('den', 'ден') }}
						</div>
						<div class="row">
							{{ Form::label('prva_slika', 'Слика:', ['class' => 'control-label form-group m2-control-label']) }}
							{{ Form::file('prva_slika', ['class' => 'form-control m2-form-control']) }}
						</div>
					</div>
					<div class="hidden-xs hidden-sm col-md-1 col-lg-1"></div>
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
						<div class="row">
								<img src="{{ asset('/images/products') . '/' . $p->prva_slika }}" class="product-image pull-right img-responsive" alt="Слика од {{$p->ime}}">
						</div>
					</div>
				</div>
				<div class="row thumb-row">
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						@if(isset($p->slika1))
							<img class="editthumb" src="{{asset('/images/products/' . '/' . $p->id . '/' . $p->slika1)}}" alt="">
							{{Form::label('slika1', 'Промени ја првата слика:', ['class' => 'control-label form-group'])}}
							{{Form::file('slika1')}}
						@else
							{{ Form::label('slika1', 'Додади слика:', ['class' => 'control-label form-group']) }}
							{{Form::file('slika1', ['class' => 'form-control'])}}
						@endif
					</div>
				</div>

					{{ Form::submit('Запиши промени', ['class' => 'btn btn-default btn-inverted-default btn-lg btn-form']) }}	
					<button  class="btn btn-default pull-right btn-lg btn-form close-modal-btn" style="margin-right:5%;">Затвори</button>
			</div>
		{!! Form::close() !!}
	</div>
</div>