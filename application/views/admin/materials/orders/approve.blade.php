@layout('layout.admin')

@section('title')
{{ __('materials.approve') }}
@endsection

@section('js')
	@parent
	<script>
		$(function() {
			$(':text:not([readonly])').change(function() {
				sumTotal($(this));
			});
		});

		function sumTotal(obj) {
			var id = obj.attr('ref');
			var quantity = Math.round(parseInt($('#item-'+id+'-quantity').val()), 2);
			var $price = $('#item-'+id+'-price');
			var price = parseFloat($price.val());
			var $total = $('#item-'+id+'-total');
			var total = parseFloat($total.val());

			// console.log('id', id);
			// console.log('quantity', quantity);
			// console.log('price', price);

			if (quantity !== NaN && price !== NaN && total !== NaN) {
				if (obj.attr('id') == 'item-'+id+'-quantity' || obj.attr('id') == 'item-'+id+'-price') {
					$total.val(quantity * price);
				} else {
					$price.val(total / quantity);
				}
			}
		}
	</script>
@endsection

@section('content')
<div id="admin-materials-order-approve">
	<h1 style="display:inline; margin-right:15px">Order: {{ $query->id }}</h1>
	<span>{{ $query->description }}</span>	
	<hr>    
	{{ Form::open('admin/materials/transactions/create') }}
		<table class="table table-striped">
			<thead>
				<tr>
					<th class="span1 center">#</th>
					<th class="left">{{ __('suppliers.suppliers') }}</th>
					<th class="left">{{ __('materials.materials') }}</th>
					<th class="right">{{ __('materials.ordered') }}</th>
					<th class="right">{{ __('materials.receive') }}</th>
					<th class="center">{{ __('admin.unit') }}</th>
					<th class="right">{{ __('materials.price_per_unit') }}</th>
					<th class="right">{{ __('materials.total') }}</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($query->items as $key => $data)
				<?php $loop = $key + 1; ?>
				<tr>
					<td class="center">{{ $loop }}</td>
					<td class="left nowrap">
						{{ $data->supplier->name }}
						<input type="hidden" name="items[{{ $data->id }}][supplier_id]" value="{{ $data->supplier->id }}">
					</td> 
					<td class="left nowrap">
						{{ $data->material->name }}
						<input type="hidden" name="items[{{ $data->id }}][material_id]" value="{{ $data->material->id }}">
					</td> 
					<td class="right">{{ Helper::add_comma($data->ordered_quantity) }}</td>
					<td class="right">
						<input 
							type="text" 
							id="item-{{ $loop }}-quantity" 
							name="items[{{ $data->id }}][approved_quantity]" 
							value="{{ $data->ordered_quantity }}"
							class="span1 right" 
							ref="{{ $loop }}"
							required 
							pattern="^[0-9]+$" 
							title="{{ __('validation.numeric') }}" 
						/>
					</td>
					<td class="center">{{ $data->material->unit }}</td>
					<td class="right">
					    <div class="input-append">
							<input 
								type="text" 
								id="item-{{ $loop }}-price" 
								name="items[{{ $data->id }}][price_per_unit]" 
								ref="{{ $loop }}"
								class="span1 right" 
								required 
								pattern="\d+(\.\d{1,4})?" 
								title="{{ __('validation.numeric') }}" 
							/>
					    	<span class="add-on">฿</span>
					    </div>
					</td>
					<td class="right">
					    <div class="input-append">
							<input 
								type="text" 
								id="item-{{ $loop }}-total" 
								name="items[{{ $data->id }}][amount]" 
								class="span1 right" 
								ref="{{ $loop }}"
								required 
								pattern="^[0-9]+$" 
								title="{{ __('validation.numeric') }}" 
							/>
					    	<span class="add-on">฿</span>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<hr>    
		<div class="right button-wraper">
			<button class="btn btn-primary">Save</button>
		</div>
		<input type="hidden" name="material_order_id" value="{{ $query->id }}">
	{{ Form::close() }}
</div>
@endsection