@layout('layout.admin')

@section('title')
{{ __('reports.product_sales') }}
@endsection

@section('css')
	@parent
	{{ HTML::style('css/datetimepicker.css') }}
@endsection

@section('js')
	@parent
	{{ HTML::script('js/jquery-ui/jquery.ui.datepicker.js') }}
	<script type="text/javascript">
		$(function() {
			// $(".datepicker").datepicker();
		})
	</script>
@endsection

@section('content')
	<div id="product-sales-index">
		<h1>{{ __('reports.product_sales') }}</h1>
		<form method="post">
			<label class="inline">Start Date <input type="text" id="start-date" name="start-date" class="datepicker"></label>
			<label>End Date <input type="text" id="end-date" name="end-date" class="datepicker"></label>
			<p><input type="submit" class="btn btn-primary btn-large" value="Report"></p>
		</form>
	</div>
@endsection