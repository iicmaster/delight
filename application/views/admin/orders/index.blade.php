@layout('layout.admin')

@section('title')
{{ __('orders.orders') }}
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
    $(function() {
      $('select[id^=input-order]').on('change', function() {
        console.log($(this).attr('id'))
        if ($(this).val() == 3) {
          $('#shiping-cost-' + $(this).attr('ref') + '-section').show();
        } else {
          $('#shiping-cost-' + $(this).attr('ref') + '-section').hide();
        }
      });
    });
  </script>
@endsection

@section('content')
<div id="admin-orders-index">
  <!-- Report Message -->
  @if ( ! is_null($report_message))
      <div class="alert alert-{{ $report_message['status'] }}">
      <button class="close" data-dismiss="alert" type="button">×</button>
      {{ $report_message['message'] }}
    </div>
  @endif
  <h1>{{ __('orders.orders') }}</h1>  
  <hr>    
  <table class="table table-striped">
    <thead>
      <tr>
        <th class="center">#</th>
        <th>Name</th>
        <th>Tel</th>
        <th>Created Date</th>
        <th>Status</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @forelse ($query->results as $data)
        <tr>
          <td class="center">{{ $data->id }}</td>
          <td class="left">{{ $data->name }}</td>
          <td class="left">{{ $data->tel }}</td>
          <td class="left">{{ Helper::change_date_time_format($data->created_at) }}</td>
          <td class="left">{{ $data->status_text }}</td>
          <td class="right">
            <a 
              class="btn" 
              href="/admin/orders/show/{{ $data->id }}" 
              role="button" 
              title="{{ __('admin.button_read') }}"
            ><i class="icon-list"></i></a>
            <a 
              class="btn" 
              data-toggle="modal" 
              href="#update-modal-{{ $data->id }}" 
              role="button" 
              title="{{ __('admin.button_update') }}"
            ><i class="icon-pencil"></i></a>
            
            <div 
              aria-hidden="true"
              aria-labelledby="myModalLabel" 
              class="modal hide fade left" 
              id="update-modal-{{ $data->id }}" 
              role="dialog" 
              tabindex="-1" 
            >
              {{ Form::open('admin/orders/update/'.$data->id, '', array('class' => 'form-horizontal')) }}
                <div class="modal-header">
                  <button 
                    aria-hidden="true" 
                    class="close" 
                    data-dismiss="modal" 
                    title="{{ __('admin.button_close') }}"
                    type="button" 
                  >×</button>
                  <h3 id="myModalLabel">Order no: {{ $data->id }}</h3>
                </div>
                <div class="modal-body">
                  <div class="control-group">
                    <label class="control-label" for="input-order-{{ $data->id }}-status">Order Status</label>
                    <div class="controls">
                      <select id="input-order-{{ $data->id }}-status" name="status" ref="{{ $data->id }}">
                        <option 
                          value="0" 
                          {{ $data->status == 0 ? 'selected="selected"' : '' }}
                        >Waiting for Baking</option>
                        <option 
                          value="1" 
                          {{ $data->status == 1 ? 'selected="selected"' : '' }}
                        >Baking</option>
                        <option 
                          value="2" 
                          {{ $data->status == 2 ? 'selected="selected"' : '' }}
                        >Waiting for shipping</option>
                        <option 
                          value="3" 
                          {{ $data->status == 3 ? 'selected="selected"' : '' }}
                        >Completed</option>
                        <option 
                          value="4" 
                          {{ $data->status == 4 ? 'selected="selected"' : '' }}
                        >Cancel</option>
                      </select>
                    </div>
                  </div>
                  <div 
                    class="control-group {{ $data->shiping_cost ?:'hide' }}"
                    id="shiping-cost-{{ $data->id }}-section" 
                  >
                    <label class="control-label" for="input-shiping-cost">Shiping Cost</label>
                    <div class="controls">
                      <input 
                        class="right" 
                        id="input-shiping-cost" 
                        name="shiping_cost" 
                        type="text" 
                        value="{{ $data->shiping_cost }}" 
                      >
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