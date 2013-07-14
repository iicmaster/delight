@layout('layout.admin')

@section('title')
{{ __('reports.income_charge') }}
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
  <div id="financial-income-show">
    <h1>{{ __('reports.income_charge') }}</h1>
    <hr>
    <p>{{ Input::get('start-date')}} to {{ Input::get('end-date')}}</p>
    <h2>Income</h2>
    <table class="table">
      <tr>
        <td class="span6 right">Prduct Sales</td>
        <td class="right">{{ number_format($prduct_sales, 2) }}</td>
        <td class="span1 left">Baht</td>
      </tr>
      <tr>
        <td class="span6 right">Shipping Fee</td>
        <td class="right">{{ number_format($shipping_fee, 2) }}</td>
        <td class="span1 left">Baht</td>
      </tr>
      <tr>
        <td class="span6 right">Total</td>
        <td class="right">{{ number_format($total_income, 2) }}</td>
        <td class="span1 left">Baht</td>
      </tr>
    </table>
    <h2>Cost</h2>
    <table class="table">
      <tr>
        <td class="span6 right">Materials Cost</td>
        <td class="right">{{ number_format($materials_cost, 2) }}</td>
        <td class="span1 left">Baht</td>
      </tr>
      <tr>
        <td class="span6 right">Shipping Cost</td>
        <td class="right">{{ number_format($shipping_cost, 2) }}</td>
        <td class="span1 left">Baht</td>
      </tr>
      <tr>
        <td class="span6 right">Total</td>
        <td class="right">{{ number_format($total_cost, 2) }}</td>
        <td class="span1 left">Baht</td>
      </tr>
    </table>
    <h2>Profit</h2>
    <table class="table">
      <tr>
        <td class="span6 right">Total</td>
        <td class="right">{{ number_format($total_profit, 2) }}</td>
        <td class="span1 left">Baht</td>
      </tr>
    </table>
  </div>
@endsection