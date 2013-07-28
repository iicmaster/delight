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
					@if ( ! $data->is_approved)
						<a href="/admin/materials/orders/approve/{{ $data->id }}" role="button" class="btn" title="{{ __('materials.approve') }}"><i class="icon-ok-circle"></i></a>
						<a href="/admin/materials/orders/delete/{{ $data->id }}" role="button" class="btn" title="{{ __('admin.button_delete') }}"><i class="icon-trash"></i></a>
					@endif
					
					<!-- Order Detail Modal -->
					<div id="create-update-{{ $data->id }}" class="modal hide fade left" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="{{ __('admin.button_close') }}">×</button>
							<h3 id="myModalLabel" style="display:inline; margin-right:15px">Order: {{ $data->id }}</h3>
							<span>{{ $data->description }}</span>
						</div>
						<div class="modal-body">
							<table class="table">
								<thead>
									<tr>
										<th class=" center">#</th>
										<th class="left">{{ __('suppliers.suppliers') }}</th>
										<th class="left">{{ __('materials.materials') }}</th>
										<th class="right">{{ __('materials.ordered') }}</th>
										<th class="right">{{ __('materials.receive') }}</th>
										<th class="center">{{ __('admin.unit') }}</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($data->items as $key => $item)
									<tr>
										<td class="center">{{ $key + 1 }}</td>
										<td class="left">{{ $item->supplier->name }}</td>
										<td class="left">{{ $item->material->name }}</td>
										<td class="right">{{ Helper::add_comma($item->ordered_quantity) }}</td>
										<td class="right">{{ $item->approved_quantity ? Helper::add_comma($item->approved_quantity) : '-' }}</td>
										<td class="center">{{ $item->material->unit }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="modal-footer">

						</div>
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