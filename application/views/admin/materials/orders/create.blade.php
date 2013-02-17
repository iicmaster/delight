@layout('layout.admin')

@section('title')
{{ __('materials.orders') }}
@endsection

@section('js')
	@parent
	<script>
		$(function() {

		})
	</script>
@endsection

@section('content')
<div id="admin-materials-order">
	<h1>{{ __('materials.orders') }}</h1>	
	<hr>    
	{{ Form::open('admin/materials/orders/store') }}
		<p>
			<p class="bold">{{ __('admin.description') }}</p>
			<textarea name="description" class="span6"></textarea>
		</p>
		<hr>    
		<table class="table table-striped">
			<thead>
				<tr>
					<th class="span1 center">#</th>
					<th class="left">{{ __('admin.name') }}</th>
					<th class="span2 right">{{ __('materials.quantity') }}</th>
					<th class="span1 center">{{ __('admin.unit') }}</th>
					<th class="span2 left">{{ __('suppliers.suppliers') }}</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($query as $data)
				<tr>
					<td class="center">{{ $data->id }}</td>
					<td class="left">{{ $data->name }}</td> 
					<td class="right">
						<input type="text" name="items[{{ $data->id }}][quantity]" value="<?php
							echo ($data->max_stock - $data->total > 0) ? ($data->max_stock - $data->total) : 0;
						?>" class="right" required pattern="^[0-9]+$" title="{{ __('validation.numeric') }}"></td>
					<td class="center">{{ $data->unit }}</td>
					<td class="left">
						<select id="inputSuppliers" name="items[{{ $data->id }}][supplier_id]" required>
							<option class="muted" value="" disabled selected>Choose...</option>
							@foreach ($data->suppliers as $supplier)
								<option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
							@endforeach
						</select>
					</td> 
				</tr>
				@empty
				<tr><td colspan="5" class="center">{{ __('admin.message_no_result') }}</td></tr>
				@endforelse
			</tbody>
		</table>
		<hr>
		<div class="button-wraper right">
			<button class="btn btn-primary">Save</button>
		</div>
	{{ Form::close() }}
</div>
@endsection