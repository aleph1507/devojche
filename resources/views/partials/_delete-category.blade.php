{{-- {{isset($p) ? '' : $p=""}} --}}
<div class="modal-dialog" id="delete-category-{{$cat->id}}">
	<div class="modal-content">
		{{Form::open(['route' => ['category.delete', $cat->id], 'method' => 'DELETE'])}}
			<span class="q1">Дали сигурно сакате да ја избришете категоријата?</span><a href="#" style="display:none;"></a>
				{{ Form::submit('Да', ['class' => 'btn btn-danger']) }}
					<a class="close-modal-btn btn btn-default" id="btn-cancel">Не</a>
		{{Form::close()}}
	</div>
</div>