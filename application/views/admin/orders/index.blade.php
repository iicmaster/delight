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
  </script>
@endsection

@section('content')
<div id="admin-orders-index">
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
  <h1>{{ __('orders.orders') }}</h1>  
  <hr>    
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
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
            <a href="/admin/orders/show/{{ $data->id }}" role="button" class="btn" title="{{ __('admin.button_read') }}"><i class="icon-list"></i></a>
            <a href="#update-modal-{{ $data->id }}" role="button" class="btn" data-toggle="modal" title="{{ __('admin.button_update') }}"><i class="icon-pencil"></i></a>
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