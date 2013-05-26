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
            @if($data->status < 3)
              <a 
                class="btn" 
                data-toggle="modal" 
                href="#update-modal-{{ $data->id }}" 
                role="button" 
                title="Cancel order"
              ><i class="icon-remove"></i></a>
            @endif
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