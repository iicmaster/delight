@layout('layout.admin')

@section('title')
{{ __('materials.stock') }}
@endsection

@section('js')
	@parent
	<script>
		$(function() {
			$('.select2').select2({
				placeholder: "Select {{ __('suppliers.suppliers') }}",
				allowClear: true
			});

			$('form').submit(function() {
				if ($(':checked').length === 0) {
					alert('Please select at least 1 item.');
					return false;
				}

			})
		})
	</script>
@endsection

@section('content')
<div id="admin-materials-stock">
	<h1>{{ __('materials.stock') }}</h1>	
	<hr>    
	{{ Form::open('admin/materials/orders/create/') }}
		<table class="table table-striped">
			<thead>
				<tr>
					<th class="span1 center"><input type="checkbox" id="select-all" checked></th>
					<th class="span1 center">#</th>
					<th class="left">{{ __('admin.name') }}</th>
					<th class="span2 right">{{ __('materials.stock_remain') }}</th>
					<th class="span2 right">{{ __('materials.recommended_restock_quantity') }}</th>
					<th class="span1 center">{{ __('admin.unit') }}</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($query as $data)
				<tr>
					<th class="center"><input type="checkbox" name="selected_id[]" value="{{ $data->id }}" checked></th>
					<td class="center">{{ $data->id }}</td>
					<td class="left">{{ $data->name }}</td> 
					<td class="right">{{ Helper::add_comma($data->total) }}</td>
					<td class="right">
						@if ($data->max_stock - $data->total > 0)
							{{ Helper::add_comma($data->max_stock - $data->total) }}
						@else 
							0
						@endif
					</td>
					<td class="center">{{ $data->unit }}</td>
				</tr>
				@empty
				<tr><td colspan="7" class="center">No result found.</td></tr>
				@endforelse
			</tbody>
		</table>
		<hr>
		<div class="button-wraper right">
			<button class="btn btn-primary">Create Material Order</button>
		</div>
	{{ Form::close() }}
</div>
@endsection