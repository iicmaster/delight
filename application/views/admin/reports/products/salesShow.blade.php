@layout('layout.admin')

@section('title')
{{ __('reports.product_sales') }}
@endsection

@section('css')
  @parent
@endsection

@section('js')
  @parent
  <script type="text/javascript">
    $(function() {
    })
  </script>
@endsection

@section('content')
  <div id="product-sales-show">
    <h1>{{ __('reports.product_sales') }}</h1>
    <hr>
    <p>{{ Input::get('start-date')}} to {{ Input::get('end-date')}}</p>
    <?php // dd($materials); ?>
    @if(count($products))
      <table class="table table-striped products-table">
        <thead>
          <tr>
            <th class="span1">#</th>
            <th>Name</th>
            <th class="span2">Quantity</th>
            <th class="span2">Size</th>
            <th class="span2">Unit</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $key => $product)
            <tr>
              <td>{{ ++$key }}</td>
              <td>{{ $product->product->name }}</td>
              <td class="right">{{ Helper::add_comma(abs($product->total)) }}</td>
              <td class="right">{{ $product->product->size }}</td>
              <td>{{ $product->product->unit }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>No content to show.</p>
    @endif
  </div>
@endsection