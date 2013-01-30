@layout('layout.admin')

@section('title')
{{ __('users.user') }}
@endsection

@section('content')
<div id="admin-users">
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
		{{ Form::open('admin/users/create', '', array('class' => 'form-horizontal')); }}
	    <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="{{ __('admin.button_close') }}">×</button>
		    <h3 id="myModalLabel">{{ __('users.user') }}</h3>
	    </div>
	    <div class="modal-body">
		    <div class="control-group">
			    <label class="control-label" for="inputName">{{ __('admin.name') }}</label>
			    <div class="controls">
			    	<input type="text" id="inputName" placeholder="Name" name="name">
		    	</div>
		    </div>
		    <div class="control-group">
			    <label class="control-label" for="inputName">{{ __('users.username') }}</label>
			    <div class="controls">
			    	<input type="text" id="inputUsername" placeholder="username" name="username">
		    	</div>
		    </div>
		    <div class="control-group">
			    <label class="control-label" for="inputName">{{ __('users.password') }}</label>
			    <div class="controls">
			    	<input type="text" id="inputPassword" placeholder="Password" name="password">
		    	</div>
		    </div>
		    <div class="control-group">
			    <label class="control-label" for="inputName">{{ __('users.email') }}</label>
			    <div class="controls">
			    	<input type="text" id="inputEmail" placeholder="Email" name="email">
		    	</div>
		    </div>
		    <div class="control-group">
			    <label class="control-label" for="inputAddress">{{ __('users.address') }}</label>
			    <div class="controls">
			    	<input type="text" id="inputAddress" placeholder="Address" name="address">
		    	</div>
		    </div>
		    <div class="control-group">
			    <label class="control-label" for="inputTel">{{ __('users.tel') }}</label>
			    <div class="controls">
			    	<input type="text" id="inputTel" placeholder="Tel" name="tel">
		    	</div>
		    </div>
	    </div>
	    <div class="modal-footer">
		    <input type="submit" class="btn btn-primary" value="{{ __('admin.button_save') }}" />
	    </div>
	    {{ Form::close() }}
    </div>

	<h1>{{ __('users.user') }}</h1>	
	<hr>    

	

	<table class="table table-striped">
		<thead>
			<tr>
				<th class="span1 center">#</th>
				<th class="left">{{ __('admin.name') }}</th>
				<th class="span2 left">{{ __('users.username') }}</th>
				<th class="left">{{ __('users.email') }}</th>
				<th class="span2 left">{{ __('users.tel') }}</th>
				<th class="span2"></th>
			</tr>
		</thead>
		<tbody>
			@forelse ($query->results as $data)
			<tr>
				<td class="center">{{ $data->id }}</td>
				<td class="left">{{ $data->name }}</td>
				<td class="left">{{ $data->username }}</td>
				<td class="left">{{ $data->email }}</td>
				<td class="left">{{ $data->tel }}</td>
				<td class="right">
					<a href="#create-update-{{ $data->id }}" role="button" class="btn" data-toggle="modal" title="{{ __('admin.button_update') }}"><i class="icon-pencil"></i></a>
					<a href="/admin/users/delete/{{ $data->id }}" role="button" class="btn" title="{{ __('admin.button_delete') }}"><i class="icon-trash"></i></a>
				    <div id="create-update-{{ $data->id }}" class="modal hide fade left" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						{{ Form::open('admin/users/update/'.$data->id, '', array('class' => 'form-horizontal')) }}
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
								    <label class="control-label" for="inputAddress">{{ __('users.username') }}</label>
								    <div class="controls">
								    	<input type="text" id="inputUsername" placeholder="Username" name="username" value="{{ $data->username }}">
							    	</div>
							    </div>
							    <div class="control-group">
								    <label class="control-label" for="inputAddress">{{ __('users.password') }}</label>
								    <div class="controls">
								    	<input type="password" id="inputPassword" placeholder="Password" name="password" value="">
							    	</div>
							    </div>
							    <div class="control-group">
								    <label class="control-label" for="inputAddress">{{ __('users.email') }}</label>
								    <div class="controls">
								    	<input type="text" id="inputEmail" placeholder="Email" name="email" value="{{ $data->email }}">
							    	</div>
							    </div>
							    <div class="control-group">
								    <label class="control-label" for="inputAddress">{{ __('users.address') }}</label>
								    <div class="controls">
								    	<textarea id="inputAddress" placeholder="Address" name="address" row="3">{{ $data->address }}</textarea>
							    	</div>
							    </div>
							    <div class="control-group">
								    <label class="control-label" for="inputTel">{{ __('users.tel') }}</label>
								    <div class="controls">
								    	<input type="text" id="inputTel" placeholder="Tel" name="tel" value="{{ $data->tel }}">
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
			<tr><td colspan="6" class="center">{{ __('admin.message_no_result') }}</td></tr>
			@endforelse
		</tbody>
	</table>
    {{ $query->links() }}
</div>
@endsection