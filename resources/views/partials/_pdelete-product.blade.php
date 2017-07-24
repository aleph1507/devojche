{{-- <script>
	var url = window.location.toString();
	window.location = url + ;
</script> --}}

<div class="modal-dialog" id="pdelete-product-{{$p->id}}">
	<div class="modal-content">
		{{Form::open(['route' => ['products.pdel', $p->id], 'method' => 'DELETE'])}}
			<p class="q1">Дали сакате перманентно да го избришете продуктот?</p>
			<a href="#" class="btn default-btn" style="display:none;"></a>
			{{ Form::submit('Да', ['class' => 'btn btn-danger']) }}
			<a class="close-modal-btn btn btn-default" id="btn-cancel{{$p->id}}">Не</a>
		{{Form::close()}}
	</div>
</div>