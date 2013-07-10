@layout('layout.admin')

@section('title')
{{ __('reports.material_used') }}
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
  <div id="material-used-report">
    <h1>{{ __('reports.material_used') }}</h1>
    <hr>
    <p>Start date {{ Input::get('start-date')}} to {{ Input::get('end-date')}}</p>
    <?php // dd($materials); ?>
    @if(count($materials))
      <table class="table table-striped materials-table">
        <thead>
          <tr>
            <th class="span1">#</th>
            <th>Name</th>
            <th class="span2">Quantity</th>
            <th class="span2">Unit</th>
          </tr>
        </thead>
        <tbody>
          @foreach($materials as $key => $material)
            <tr>
              <td>{{ ++$key }}</td>
              <td>{{ $material->material->name }}</td>
              <td class="right">{{ Helper::add_comma(abs($material->total)) }}</td>
              <td>{{ $material->material->unit }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>No content to show.</p>
    @endif
  </div>
@endsection