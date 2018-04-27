@extends('layouts.app')

@section('topcss')
<link rel="stylesheet" type="text/css" href="{!! asset('/DataTables/datatables.min.css') !!}"/>

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

			<div class="form-group col-md-12">
			<label>From:</label>
				<div class='input-group date' id='datetimepicker1'>
				<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
					{!! Form::text('date-range', null, ['class' => 'form-control date-range-from']) !!}

				</div>
			</div>
			<div class="clearfix"></div>

		</div>

		<div class="col-md-3">

			<div class="form-group col-md-12">
			<label>To:</label>
				<div class='input-group date' id='datetimepicker2'>
				<span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
					{!! Form::text('date-range', null, ['class' => 'form-control date-range-to']) !!}

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

<hr class="padded-center" style="clear:both" />

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
	<script>
		jQuery(function ($) {
		   var bindDatePicker = function() {
				$("div#datetimepicker2>span").datetimepicker({
				format:'YYYY-MM-DD',
					icons: {
						time: "fa fa-clock-o",
						date: "fa fa-calendar",
						up: "fa fa-arrow-up",
						down: "fa fa-arrow-down"
					}
				}).find('input:first').on("blur",function () {
					// check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
					// update the format if it's yyyy-mm-dd
					var date = parseDate($(this).val());

					if (! isValidDate(date)) {
						//create date based on momentjs (we have that)
						date = moment().format('YYYY-MM-DD');
					}

					$(this).val(date);
				});
			}

		   var isValidDate = function(value, format) {
				format = format || false;
				// lets parse the date to the best of our knowledge
				if (format) {
					value = parseDate(value);
				}

				var timestamp = Date.parse(value);

				return isNaN(timestamp) == false;
		   }

		   var parseDate = function(value) {
				var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
				if (m)
					value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

				return value;
		   }

		   bindDatePicker();
		 });
	</script>
	{{-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY --}}
@endsection

@section('afterJQ')
	{{-- start: JAVASCRIPTS REQUIRED AFTER JQ  --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script>
 	{{-- end: JAVASCRIPTS REQUIRED AFTER JQ --}}
@endsection