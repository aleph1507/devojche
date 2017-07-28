@if(isset($p))
	<tr>
		<td>{{$p->ime}}</td>
		<td>{{$p->seller->ime}}</td>
		<td>{{$p->cena}} ден.</td>
		<td>{{$p->category->ime}}</td>
		<td>{{$p->updated_at}}</td>
		<td>
			<a href="#editproduct-{{$p->id}}" class="open-modal"><span class="produkt"><i class="fa fa-pencil-square" aria-hidden="true"></i></span></a>
		</td>
		<td colspan="2">
			<a href="#pdelete-product-{{$p->id}}" class="open-modal"><span class="produkt"><i class="fa fa-trash" aria-hidden="true"></i></span>
			@include('partials._pdelete-product')
		</td>
			@include('partials._edit-product')
	</tr>
@endif
