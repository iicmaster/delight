@layout('layout.admin')

@section('title')
{{ __('reports.material_used') }}
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
	<div id="material-used-report">
		<h1>{{ __('reports.material_used') }}</h1>
		<form method="post">
			<table class="table products-table">
		        <tbody>
		          	<tr>
		              	<td class="span2">Start Date</td>
		              	<td class="span7"><input type="text" id="start-date" name="start-date" class="datepicker"></td>
		              	<td class="span2">End Date</td>
		              	<td class="span7"><input type="text" id="end-date" name="end-date" class="datepicker"></td>
		            </tr>
		        </tbody>
	      	</table>
			<p><input type="submit" class="btn btn-primary btn-large" value="Report"></p>
		</form>
	</div>
@endsection