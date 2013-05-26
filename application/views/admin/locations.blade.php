@layout('layout.admin')

@section('title')
{{ __('locations.locations') }}
@endsection

@section('css')
  @parent
  <style>
    .product-tumbnail {
      background-position: center;
      background-size: cover;
      width: 250px;
      height: 250px;
    }
  </style>
@endsection

@section('js')
  @parent
  <script>
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
    {{ Form::open_for_files('admin/locations/create', '', array('class' => 'form-horizontal')); }}
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">{{ Str::singular(Lang::line('products.products')->get()) }}</h3>
    </div>
    <div class="modal-body">
      <div class="control-group">
        <label class="control-label" for="inputName">{{ __('admin.name') }}</label>
        <div class="controls">
          <input type="text" id="inputName" placeholder="Name" name="name" required>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputPrice">{{ __('products.price') }}</label>
        <div class="controls">
          <input type="text" id="inputPrice" placeholder="Price" name="price" required>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">{{ __('locations.owner') }}</label>
        <div class="controls">
          <select name="user_id">
            <option class="muted" value="" disabled selected>Choose...</option>
            @foreach ($users as $user)
              <option class="user-{{ $user->id }}" value="{{ $user->id }}" unit="{{ $user->unit }}">{{ $user->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <input type="submit" class="btn btn-primary" value="Save" />
    </div>
    {{ Form::close() }}
  </div>

  <h1>{{ __('locations.locations') }}</h1>  
  <hr>    

  <table class="table table-striped">
    <thead>
      <tr>
        <th class="span1 center">#</th>
        <th class="left">{{ __('locations.name') }}</th>
        <th class="span2 right">{{ __('locations.price') }}</th>
        <th class="span1 left">{{ __('locations.owner') }}</th>
        <th class="span2"></th>
      </tr>
    </thead>
    <tbody>
      @forelse ($query->results as $data)
        <tr>
          <td class="center">{{ $data->id }}</td>
          <td class="left">{{ $data->name }}</td>
          <td class="right">{{ Helper::add_comma($data->price) }}</td>
          <td class="left">{{ $data->owner->name }}</td>
          <td class="right">
            <a href="#update-modal-{{ $data->id }}" role="button" class="btn" data-toggle="modal" title="{{ __('admin.button_update') }}"><i class="icon-pencil"></i></a>
            <a href="/admin/locations/delete/{{ $data->id }}" role="button" class="btn" title="{{ __('admin.button_delete') }}"><i class="icon-trash"></i></a>

            <div id="update-modal-{{ $data->id }}" class="modal hide fade left" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              {{ Form::open_for_files('admin/locations/update/'.$data->id, '', array('class' => 'form-horizontal')) }}
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h3 id="myModalLabel">{{ $data->name }}</h3>
                </div>
                <div class="modal-body">
                  <div class="control-group">
                    <label class="control-label" for="inputName">{{ __('admin.name') }}</label>
                    <div class="controls">
                      <input type="text" id="inputName" placeholder="Name" name="name" value="{{ $data->name }}" required>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="inputPrice">{{ __('products.price') }}</label>
                    <div class="controls">
                      <input type="text" id="inputPrice" placeholder="Price" name="price" value="{{ $data->price }}" required>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">{{ __('locations.owner') }}</label>
                    <div class="controls">
                      <select name="user_id">
                        <option class="muted" value="" disabled>Choose...</option>
                        @foreach ($users as $user)
                          <option value="{{ $user->id }}" <?php if ($data->user_id == $user->id) echo 'selected="selected"' ?>>{{ $user->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-primary" value="Save" />
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