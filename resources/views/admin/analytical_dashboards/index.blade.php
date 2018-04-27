@extends('layouts.app')

@section('topcss')
<link rel="stylesheet" type="text/css" href="{!! asset('/DataTables/datatables.min.css') !!}"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<style type="text/css">
	.mini-stats{border-left: none !important; }
	.mini-stats .values strong{font-size: 36px !important; }
	.mini-stats .values{font-size: 18px !important; }
	.mini-stats li{border-right: none !important; }
	.table-13 th,.table-13 td{font-size: 13px !important; }
	.todo li a strong{padding-right: 5px; }
	.message-actions:focus,.todo li .message-actions:hover{text-decoration:none;background-color:#F4F6F9!important }
	.todo li .message-actions i{color:#C7CBD5;font-size:18px;margin:0 5px 0 0;position:absolute;left:10px }
</style>
@endsection

@section('afterJQ')
	{{-- start: JAVASCRIPTS REQUIRED AFTER JQ  --}}
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
 	{{-- end: JAVASCRIPTS REQUIRED AFTER JQ --}}
@endsection

@section('topscripts')


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript" src="{!! asset('/DataTables/datatables.min.js') !!}"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	google.charts.load('current', {packages: ['corechart', 'line']});
	google.charts.setOnLoadCallback(drawChartVisitors);

	function drawChartVisitors() {

		var data = new google.visualization.DataTable();
		data.addColumn('{{$column_type}}', '{{$column_name}}');
		data.addColumn('number', 'Visitors');
		<?php
			$json = json_encode($visitors_chart);
			$json = preg_replace("/(('|\")%%|%%(\"|'))/", '', $json);
		?>
		data.addRows(<?=$json?>);

		var options = {
			hAxis: {
				title: '{{$column_name}}',
				format: '{{$column_format}}'
			},
			vAxis: {
				title: 'Visitors',
				format: '#',
			},
			chartArea: {right: 0, width: '90%', height: '80%'}
		};

		var chart = new google.visualization.LineChart(document.getElementById('chart_div_visitors'));

		chart.draw(data, options);
	}
</script>
<script type="text/javascript">
	google.charts.load('current', {packages: ['corechart', 'line']});
	google.charts.setOnLoadCallback(drawChartPageviews);

	function drawChartPageviews() {

		var data = new google.visualization.DataTable();
		data.addColumn('{{$column_type}}', '{{$column_name}}');
		data.addColumn('number', 'Pageviews');
		<?php
$json = json_encode($pageviews_chart);
$json = preg_replace("/(('|\")%%|%%(\"|'))/", '', $json);
?>
		data.addRows(<?=$json?>);

		var options = {
			hAxis: {
				title: '{{$column_name}}',
				format: '{{$column_format}}'
			},
			vAxis: {
				title: 'Pageviews',
				format: '#',
			},
			chartArea: {right: 0, width: '90%', height: '80%'}
		};

		var chart = new google.visualization.LineChart(document.getElementById('chart_div_pageviews'));

		chart.draw(data, options);
	}
</script>
<script type="text/javascript">
	google.charts.load("current", {packages: ["corechart"]});
	google.charts.setOnLoadCallback(drawChartPage);
	function drawChartPage() {
		var data = google.visualization.arrayToDataTable(<?=json_encode($page_chart)?>);

		var options = {
			is3D: true,
			chartArea: {left: 0, top: 0, width: '100%', height: '100%'}
		};

		var chart = new google.visualization.PieChart(document.getElementById('piechart_3d_page'));
		chart.draw(data, options);
	}
</script>
<script type="text/javascript">
	$(function() {

	    var start = moment().subtract(29, 'days');
	    var end = moment();

	    function cb(start, end) {
	        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
	    }

	    $('#reportrange').daterangepicker({
	        startDate: start,
	        endDate: end,
	        ranges: {
	           'Today': [moment(), moment()],
	           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
	           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
	           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
	           'This Month': [moment().startOf('month'), moment().endOf('month')],
	           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
	        }
	    }, cb);

	    cb(start, end);

	});
	</script>

@endsection

@section('content')
	<div class="row">
		<div class="col-md-3">
			<h3 class="page-title">@lang('global.analytical-dashboard.title')</h3>
			<p> {{-- trans('global.app_custom_controller_index') --}} </p>
		</div>
	</div>

	<div class="row">


		{!! Form::open(['method' => 'get']) !!}
		<div class="col-md-3">


		</div>

		<div class="col-md-3">

			<div class="form-group col-md-12">
			<label>Date Ranges:</label>
			 <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
			    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
			    <span></span> <b class="caret"></b>
			</div>
			</div>
			<div class="clearfix"></div>

		</div>

		{!! Form::close() !!}

		<div class="col-md-3">
		    <div class="form-group col-md-12">
		      <label for="inputWebsite">Website</label>
		      <select id="inputWebsite" class="form-control">
		        <option selected>Choose Site...</option>
		        <option>www.example.com</option>
		        <option>www.otherexample.com</option>
		      </select>
		    </div>
		</div>

		<div class="col-md-3">
			<div class="form-group col-md-12">

				<div class="form-group">
				<label for="view">Select View</label>
					<select class="form-control" id="view">
					  <option value="view_id">View Name</option>
					  <option value="view_id">View Name</option>
					  <option value="view_id">View Name</option>
					  <option value="view_id">View Name</option>
					  <option value="view_id">View Name</option>
					</select>
				</div>

			</div>
		</div>
	</div>
<hr style="clear:both" />

@include('admin.analytical_dashboards.partials.topwidgets')

<hr style="clear:both" />

<div class="row">
{{-- dd($anadata) --}}
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="clip-stats"></i>
				Visitors
			</div>
			<div class="panel-body">
				<div id="chart_div_visitors" style="height: 305px;"></div>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="clip-stats"></i>
				Pageviews
			</div>
			<div class="panel-body">
				<div id="chart_div_pageviews" style="height: 305px;"></div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="clip-stats"></i>Top Pages
			</div>
			<div class="panel-body">
				<div id="piechart_3d_page" style="height: 305px;"></div>
			</div>
		</div>
	</div>
</div>


@stop

@section('bottomscripts')
	{{-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY  --}}

	{{-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY --}}
@endsection

