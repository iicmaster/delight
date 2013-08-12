@layout('layout.admin')

@section('title')
Materials Stock Transaction
@endsection

@section('js')
	@parent
	<script>
	$(function() {
		//
	})
</script>
@endsection

@section('content')
<div id="admin-materials-stock-transaction">
	<h1>Stock Transaction: {{ $material->name }}</h1>	
	<hr>    

	<table class="table table-striped">
		<thead>
			<tr>
				<th class="span1 center">#</th>
				<th class="left">Date</th>
				<th class="span2 right">Buy</th>
				<th class="span2 right">Remain</th>
				<th class="span1 right">Unit</th>
				<th class="span1 right">Unit Price</th>
				<th class="span1 right">Total</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($query->results as $key => $data)
				<?php $stock = current($history); ?>
				<tr>
					<td class="center">{{ $data->material_order_id }}</td>
					<td class="left">{{ Helper::change_date_format($data->stock_code) }}</td>
					<td class="right">{{ number_format($data->quantity) }}</td>
					<td class="right">{{ number_format($stock->remain) }}</td>
					<td class="right">{{ $data->material->unit }}</td>
					<td class="right">{{ number_format($data->price_per_unit, 2) }}</td>
					<td class="right">{{ number_format($data->amount) }}</td>
				</tr>
				<?php next($history); ?>
			@empty
				<tr><td colspan="4" class="center">No result found.</td></tr>
			@endforelse
		</tbody>
	</table>
	{{ $query->links() }}
</div>
@endsection