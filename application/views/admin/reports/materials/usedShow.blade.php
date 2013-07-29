@layout('layout.admin')

@section('title')
{{ __('reports.material_used') }}
@endsection

@section('css')
  @parent
  <style>
    #report-table.table-striped table,
    #report-table.table-striped table tr,
    #report-table.table-striped table td {
      background: transparent !important;
    }
  </style>
@endsection

@section('js')
  @parent
  <script type="text/javascript">
    $(function() {
    })
  </script>
@endsection

@section('content')
  <div id="material-used-report">
    <h1>{{ __('reports.material_used') }}</h1>
    <hr>
    <p>Date: {{ Input::get('start-date')}} to {{ Input::get('end-date')}}</p>
    @if(isset($materials) and count($materials) > 0)
      <table id="report-table" class="table table-striped">
        <thead>
          <tr>
            <th class="span1">#</th>
            <th>Name</th>
            <th class="span2">Date</th>
            <th class="span2">Order ID</th>
            <th class="span2">Quantity</th>
            <th class="span2">Unit</th>
            <th class="span2">Unit Price</th>
          </tr>
        </thead>
        <tbody>
          @foreach($materials as $key => $material)
            <tr>
              <td>{{ ++$key }}</td>
              <td colspan="6">
                <p>{{ $material['name'] }}</p>
                <table class="table">
                  <tbody>
                    @foreach($material['transactions'] as $key => $transaction)
                      <tr>
                        <td></td>
                        <td class="span2">{{ $transaction->stock_code }}</td>
                        <td class="span2 right">{{ $transaction->material_order_id }}</td>
                        <td class="span2 right">{{ Helper::add_comma(abs($transaction->total)) }}</td>
                        <td class="span2">{{ $transaction->material->unit }}</td>
                        <td class="span2 right">{{ $transaction->price_per_unit }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>No content to show.</p>
    @endif
  </div>
@endsection