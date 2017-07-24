{{-- <div id="deleteproduct-{{$p->id}}" class="del-product deleteproduct">
	{{Form::open(['route' => ['products.sdel', $p->id], 'method' => 'POST'])}}
		<span class="q1">Дали сигурно сакате да го избришете продуктот?</span><br>
		{{ Form::submit('Да', ['class' => 'btn btn-danger']) }}
			<a class="btn btn-default" id="btn-cancel{{$p->id}}" onclick="hide_del_div('#deleteproduct-{{$p->id}}')">Не</a>
	{{ Form::close() }}
</div> --}}

<div class="modal-dialog" id="deleteproduct-{{$p->id}}">
	<div class="modal-content">
		{{-- <span class="close-modal">&times;</span> --}}
			{{Form::open(['route' => ['products.sdel', $p->id], 'method' => 'POST'])}}
				<span class="q1">Дали сигурно сакате да го избришете продуктот?</span>
				{{ Form::submit('Да', ['class' => 'btn btn-danger']) }}
					<a class="close-modal-btn btn btn-default" id="btn-cancel{{$p->id}}">Не</a>
			{{ Form::close() }}
	</div>
</div>
