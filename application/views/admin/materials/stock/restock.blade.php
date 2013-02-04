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
					<th class="span1 center"><input type="checkbox" id="select-all"></th>
					<th class="span1 center">#</th>
					<th class="left">{{ __('admin.name') }}</th>
					<th class="span2 right">{{ __('materials.stock_remain') }}</th>
					<th class="span2 right">{{ __('materials.recommended_restock_quantity') }}</th>
					<th class="span1 center">{{ __('admin.unit') }}</th>
					<th class="span2"></th>
				</tr>
			</thead>
			<tbody>
				@forelse ($query as $data)
				<tr>
					<th class="center"><input type="checkbox" name="selected_id[]" value="{{ $data->id }}"></th>
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
					<td class="right">
						<a href="#create-update-{{ $data->id }}" role="button" class="btn" data-toggle="modal" title="{{ __('admin.detail') }}"><i class="icon-list"></i></a>

						<div id="create-update-{{ $data->id }}" class="modal hide fade left" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							{{ Form::open('admin/materials/update/'.$data->id, '', array('class' => 'form-horizontal')) }}
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="{{ __('admin.button_close') }}">×</button>
								<h3 id="myModalLabel">{{ $data->name }}</h3>
							</div>
							<div class="modal-body">
									<div class="control-group">
										<label class="control-label" for="inputSuppliers">{{ __('suppliers.suppliers') }}</label>
										<div class="controls">
											<select id="inputSuppliers" class="select2" name="suppliers[]" multiple="multiple">
												@foreach ($suppliers as $supplier)
													<option 
														value="{{ $supplier->id }}" 
														@foreach ($data->suppliers as $own_supplier)
															@if ($supplier->name == $own_supplier->name) 
																selected="selected" 
															@endif
														@endforeach
														>{{ $supplier->name }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputName">{{ __('admin.name') }}</label>
										<div class="controls">
											<input type="text" id="inputName" placeholder="Name" name="name" value="{{ $data->name }}">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputTotal">{{ __('admin.total') }}</label>
										<div class="controls">
											<input type="text" id="inputTotal" placeholder="Total" name="total" value="{{ $data->total }}">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputUnit">{{ __('admin.unit') }}</label>
										<div class="controls">
											<input type="text" id="inputUnit" placeholder="Unit" name="unit" value="{{ $data->unit }}">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputMin Stock">{{ __('materials.min_stock') }}</label>
										<div class="controls">
											<input type="text" id="inputMin Stock" placeholder="Min Stock" name="min_stock" value="{{ $data->min_stock }}">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputMax Stock">{{ __('materials.max_stock') }}</label>
										<div class="controls">
											<input type="text" id="inputMax Stock" placeholder="Max Stock" name="max_stock" value="{{ $data->max_stock }}">
										</div>
									</div>
							</div>
							<div class="modal-footer">
								<input type="submit" class="btn btn-primary" value="{{ __('admin.button_save') }}" />
							</div>
							{{ Form::close() }}
						</div>
					</td>
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