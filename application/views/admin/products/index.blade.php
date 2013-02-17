@layout('layout.admin')

@section('title')
{{ __('products.products') }}
@endsection

@section('js')
	@parent
	<script>
		$(function() {
			/* ----------------- */
			/* New product modal */
			/* ----------------- */

			// $('#create-modal').modal('show');
			$('#create-modal-tab li:eq(0) a').tab('show'); 

			// Add material
			$('.materials-list').on('change', function() {
				var $root = $(this).parent().parent().parent();
				var $list = $root.find('.materials-list');
				var $item = $list.find('.material-' + $list.val()); 
				var $table = $root.find('.materials-table');

				var row = 	'<tr class="material-' + $item.val() + '">' +
								'<td class="center">' + $table.find('tbody tr').length + '</td>' +
								'<td>' + $item.html() + '</td>' +
								'<td class="right"><input class="right" type="text" name="materials[' + $item.val() + '][quantity]" required /></td>' +
								'<td>' + $item.attr('unit') + '</td>' +
								'<td class="right"><button ref="material-' + $item.val() + '" class="btn btn-remove-material"><i class="icon-trash"></i></button></td>' +
							'</tr>';

				// Clear placeholder 
				$table.find('tbody tr.placeholder').remove();
				
				// Append content to table
				$table.find('tbody').append(row);

				// Disable selected item
				$item.addClass('muted');
				$item.attr('disabled', 'disabled');
				$list.val('');

				return false;
			});

			// Remove material
			$('.btn-remove-material').live('click', function() {
				var $root = $(this).parent().parent().parent().parent().parent();
				var id = $(this).attr('ref');

				// Remove table row
				$root.find('tr.' + id).remove();

				// Enable removed item
				$root.find('option.' + id).removeClass('muted').removeAttr('disabled');

				return false;
			});
		});
	</script>
@endsection

@section('content')
<div id="admin-materials-index">
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

	<!-- Button to trigger modal -->
	<a href="#create-modal" role="button" class="btn" data-toggle="modal" style="float:right"><i class="icon-plus"></i> {{ __('admin.button_create') }}</a>
	 
	<!-- Create Modal -->
	<div id="create-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		{{ Form::open_for_files('admin/products/index/create', '', array('class' => 'form-horizontal')); }}
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">{{ Str::singular(Lang::line('products.products')->get()) }}</h3>
		</div>
		<div class="modal-body">
			<ul class="nav nav-tabs" id="create-modal-tab">
				<li><a href="#details" data-toggle="tab">{{ __('admin.details') }}</a></li>
				<li><a href="#materials" data-toggle="tab">{{ __('materials.materials') }}</a></li>
				<li><a href="#images" data-toggle="tab">{{ __('admin.image') }}</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane" id="details">
					<div class="control-group">
						<label class="control-label" for="inputName">{{ __('admin.name') }}</label>
						<div class="controls">
							<input type="text" id="inputName" placeholder="Name" name="name" required>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputDescription">{{ __('admin.description') }}</label>
						<div class="controls">
							<textarea id="inputDescription" placeholder="Description" name="description"></textarea>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputUnit">{{ __('admin.unit') }}</label>
						<div class="controls">
							<input type="text" id="inputUnit" placeholder="Unit" name="unit" required>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputMinStock">{{ __('materials.min_stock') }}</label>
						<div class="controls">
							<input type="text" id="inputMinStock" placeholder="{{ __('materials.min_stock') }}" name="min_Stock" required>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputMaxStock">{{ __('materials.max_stock') }}</label>
						<div class="controls">
							<input type="text" id="inputMaxStock" placeholder="{{ __('materials.max_stock') }}" name="max_stock" required>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputMinOrder">{{ __('products.min_order') }}</label>
						<div class="controls">
							<input type="text" id="inputMinOrder" placeholder="{{ __('products.min_order') }}" name="min_order" required>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="materials">
					<div class="control-group">
						<label class="control-label">{{ __('materials.materials') }}</label>
						<div class="controls">
							<select class="materials-list">
								<option class="muted" value="" disabled selected>Choose...</option>
								@foreach ($materials as $material)
									<option class="material-{{ $material->id }}" value="{{ $material->id }}" unit="{{ $material->unit }}">{{ $material->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<hr>
					<table class="table table-striped materials-table">
						<thead>
							<tr>
								<th class="span1 center">#</th>
								<th>{{ __('admin.name') }}</th>
								<th class="span2 right">{{ __('admin.quantity') }}</th>
								<th class="span1">{{ __('admin.unit') }}</th>
								<th class="span1"></th>
							</tr>
						</thead>
						<tbody>
							<tr class="placeholder">
								<td class="center muted" colspan="5">No materils selected yet.</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="tab-pane" id="images">
					<div class="control-group">
						<label class="control-label" for="inputImage">{{ __('admin.image') }}</label>
						<div class="controls">
							<input type="file" id="inputImage" placeholder="{{ __('admin.image') }}" name="image">
						</div>
					</div>
				</div>
			</div>			
	
		</div>
		<div class="modal-footer">
			<input type="submit" class="btn btn-primary" value="Save" />
		</div>
		{{ Form::close() }}
	</div>

	<h1>{{ __('products.products') }}</h1>	
	<hr>    

	<table class="table table-striped">
		<thead>
			<tr>
				<th class="span1 center">#</th>
				<th class="left">{{ __('admin.name') }}</th>
				<th class="span2 right">{{ __('materials.stock_remain') }}</th>
				<th class="span1 left">{{ __('admin.unit') }}</th>
				<th class="span2"></th>
			</tr>
		</thead>
		<tbody>
			@forelse ($query->results as $data)
			<tr>
				<td class="center">{{ $data->id }}</td>
				<td class="left">{{ $data->name }}</td>
				<td class="right">{{ Helper::add_comma($data->total) }}</td>
				<td class="left">{{ $data->unit }}</td>
				<td class="right">
					<a href="#update-modal-{{ $data->id }}" role="button" class="btn" data-toggle="modal" title="{{ __('admin.button_update') }}"><i class="icon-pencil"></i></a>
					<a href="/admin/products/index/delete/{{ $data->id }}" role="button" class="btn" title="{{ __('admin.button_delete') }}"><i class="icon-trash"></i></a>

					<div id="update-modal-{{ $data->id }}" class="modal hide fade left" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						{{ Form::open('admin/products/index/update/'.$data->id, '', array('class' => 'form-horizontal')) }}
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="{{ __('admin.button_close') }}">×</button>
							<h3 id="myModalLabel">{{ $data->name }}</h3>
						</div>
						<div class="modal-body">
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