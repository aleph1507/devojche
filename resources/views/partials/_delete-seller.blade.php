<div class="modal-dialog" id="delete-seller-{{$seller->id}}">
	<div class="modal-content">
		{{Form::open(['route' => ['seller.destroy', $seller->id], 'method' => 'DELETE'])}}
			<span class="q1">Дали сигурно сакате перманентно да го избришете продавачот?</span><a href="#" style="display:none;"></a>
				{{ Form::submit('Да', ['class' => 'btn btn-danger']) }}
					<a class="close-modal-btn btn btn-default" id="btn-cancel">Не</a>
		{{Form::close()}}
	</div>
</div>