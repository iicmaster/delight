@layout('layout.admin')

@section('title')
Suppliers
@endsection

@section('content')
<div id="admin-suppliers">
	<!-- Report Message -->
	@if ($report_message !== false and ! is_null($report_message))
		<div class="alert alert-success">
			<button class="close" data-dismiss="alert" type="button" title="{{ __('admin.button_close') }}">×</button>
			{{ $report_message }}
		</div>
	@endif

	<!-- Button to trigger modal -->
    <a href="#create-modal" role="button" class="btn" data-toggle="modal" style="float:right"><i class="icon-plus"></i> {{ __('admin.button_create') }}</a>
     
    <!-- Create Modal -->
    <div id="create-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		{{ Form::open('admin/suppliers/create', '', array('class' => 'form-horizontal')); }}
	    <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="{{ __('admin.button_close') }}">×</button>
		    <h3 id="myModalLabel">Supplier</h3>
	    </div>
	    <div class="modal-body">
			    <div class="control-group">
				    <label class="control-label" for="inputName">{{ __('admin.name') }}</label>
				    <div class="controls">
				    	<input type="text" id="inputName" placeholder="Name" name="name">
			    	</div>
			    </div>
			    <div class="control-group">
				    <label class="control-label" for="inputAddress">{{ __('suppliers.address') }}</label>
				    <div class="controls">
				    	<input type="text" id="inputAddress" placeholder="Address" name="address">
			    	</div>
			    </div>
			    <div class="control-group">
				    <label class="control-label" for="inputTel">{{ __('suppliers.tel') }}</label>
				    <div class="controls">
				    	<input type="text" id="inputTel" placeholder="Tel" name="tel">
			    	</div>
			    </div>
			    <div class="control-group">
				    <label class="control-label" for="inputContact">{{ __('suppliers.contact') }}</label>
				    <div class="controls">
				    	<input type="text" id="inputContact" placeholder="Contact" name="contact">
			    	</div>
			    </div>
			    <div class="control-group">
				    <label class="control-label" for="inputContact Tel">{{ __('suppliers.contact_tel') }}</label>
				    <div class="controls">
				    	<input type="text" id="inputContact Tel" placeholder="Contact Tel" name="contact_tel">
			    	</div>
			    </div>
	    </div>
	    <div class="modal-footer">
		    <input type="submit" class="btn btn-primary" value="{{ __('admin.button_save') }}" />
	    </div>
	    {{ Form::close() }}
    </div>

	<h1>Suppliers</h1>	
	<hr>    

	<table class="table table-striped">
		<thead>
			<tr>
				<th>{{ __('admin.id') }}</th>
				<th>{{ __('admin.name') }}</th>
				<th>{{ __('suppliers.address') }}</th>
				<th>{{ __('suppliers.tel') }}</th>
				<th>{{ __('suppliers.contact') }}</th>
				<th>{{ __('suppliers.contact_tel') }}</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@forelse ($query->results as $data)
			<tr>
				<td>{{ $data->id }}</td>
				<td>{{ $data->name }}</td>
				<td>{{ $data->address }}</td>
				<td>{{ $data->tel }}</td>
				<td>{{ $data->contact }}</td>
				<td>{{ $data->contact_tel }}</td>
				<td class="right">
					<a href="#create-update-{{ $data->id }}" role="button" class="btn" data-toggle="modal" title="{{ __('admin.button_update') }}"><i class="icon-pencil"></i></a>
					<a href="/admin/suppliers/delete/{{ $data->id }}" role="button" class="btn" title="{{ __('admin.button_delete') }}"><i class="icon-trash"></i></a>
				    <div id="create-update-{{ $data->id }}" class="modal hide fade left" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						{{ Form::open('admin/suppliers/update/'.$data->id, '', array('class' => 'form-horizontal')) }}
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
								    <label class="control-label" for="inputAddress">{{ __('suppliers.address') }}</label>
								    <div class="controls">
								    	<input type="text" id="inputAddress" placeholder="Address" name="address" value="{{ $data->address }}">
							    	</div>
							    </div>
							    <div class="control-group">
								    <label class="control-label" for="inputTel">{{ __('suppliers.tel') }}</label>
								    <div class="controls">
								    	<input type="text" id="inputTel" placeholder="Tel" name="tel" value="{{ $data->tel }}">
							    	</div>
							    </div>
							    <div class="control-group">
								    <label class="control-label" for="inputContact">{{ __('suppliers.contact') }}</label>
								    <div class="controls">
								    	<input type="text" id="inputContact" placeholder="Contact" name="contact" value="{{ $data->contact }}">
							    	</div>
							    </div>
							    <div class="control-group">
								    <label class="control-label" for="inputContact Tel">{{ __('suppliers.contact_tel') }}</label>
								    <div class="controls">
								    	<input type="text" id="inputContact Tel" placeholder="Contact Tel" name="contact_tel" value="{{ $data->contact_tel }}">
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
			<tr><td colspan="7" class="center">{{ __('admin.message_no_result') }}</td></tr>
			@endforelse
		</tbody>
	</table>
    {{ $query->links() }}
</div>
@endsection