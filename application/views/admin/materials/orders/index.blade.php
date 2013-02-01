@layout('layout.admin')

@section('title')
{{ __('materials.orders') }}
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
<div id="admin-materials-orders">
	<!-- Report Message -->
	@if ( ! is_null($report_message))
		@if ($report_message['status'])
			<div class="alert alert-success">
		@else
			<div class="alert alert-error">
		@endif
			<button class="close" data-dismiss="alert" type="button">×</button>
			{{ $report_message['message'] }}
		</div>
	@endif

	<a href="/admin/materials/stock/restock" role="button" class="btn" style="float:right">
		<i class="icon-plus"></i> {{ __('admin.button_create') }}
	</a>

	<h1>{{ __('materials.orders') }}</h1>	
	<hr>    

	<table class="table table-striped">
		<thead>
			<tr>
				<th class="span1 center">#</th>
				<th class="span2 left">{{ __('admin.date') }}</th>
				<th class="span3 left">{{ __('admin.description') }}</th>
				<th class="span2 left">{{ __('admin.status') }}</th>
				<th class="span2"></th>
			</tr>
		</thead>
		<tbody>
			@forelse ($query->results as $data)
			<tr>
				<td class="center">{{ $data->id }}</td>
				<td class="left nowrap">{{ Helper::change_date_time_format($data->created_at) }}</td>
				<td class="left">{{ $data->description }}</td>
				<td class="left">{{ $data->status }}</td>
				<td class="right">
					<a href="#create-update-{{ $data->id }}" role="button" class="btn" data-toggle="modal" title="{{ __('admin.button_read') }}"><i class="icon-list"></i></a>
					<a href="#create-update-{{ $data->id }}" role="button" class="btn" title="{{ __('admin.button_update') }}"><i class="icon-ok-circle"></i></a>
					<a href="/admin/materials/orders/delete/{{ $data->id }}" role="button" class="btn" title="{{ __('admin.button_delete') }}"><i class="icon-trash"></i></a>

					<div id="create-update-{{ $data->id }}" class="modal hide fade left" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						{{ Form::open('admin/materials/index/update/'.$data->id, '', array('class' => 'form-horizontal')) }}
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
												<option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
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
			<tr><td colspan="5" class="center">No result found.</td></tr>
			@endforelse
		</tbody>
	</table>
	{{ $query->links() }}
</div>
@endsection