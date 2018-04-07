@extends('layouts.app')

@section('topscripts')
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

@endsection

@section('content')
    <h3 class="page-title">@lang('global.analytical-dashboard.title')</h3>
    {!! Form::open(['method' => 'get']) !!}
             <div class="col-md-3 text-right">
                <div class="input-group">
                    <span class="input-group-addon"> <i class="fa fa-calendar"></i> </span>
                    {!! Form::text('date-range', null, ['class' => 'form-control date-range']) !!}
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
                      </div>
                </div>
            </div>

            <div class="clearfix"></div>
    {!! Form::close() !!}
    <p>
        {{ trans('global.app_custom_controller_index') }}
    </p>

<div class="row">
    <div class="col-sm-12">
        <div class="row space12">
            <ul class="mini-stats col-sm-12">
                <li class="col-sm-4">
                    <div class="values alert alert-info">
                        <strong> </strong>
                        Active Users right now
                    </div>
                </li>
                <li class="col-sm-4">
                    <div class="values alert alert-success">
                        <strong>{{$total_visitors}}</strong>
                        Visitors
                    </div>
                </li>
                <li class="col-sm-4">
                    <div class="values alert alert-danger">
                        <strong>{{$total_pageviews}}</strong>
                        Pageviews
                    </div>
                </li>
                <li class="col-sm-4">
                    <div class="values alert alert-warning">
                        <strong> </strong>
                        Customers
                    </div>
                </li>
                <li class="col-sm-4">
                    <div class="values alert alert-info">
                        <strong> </strong>
                        Orders
                    </div>
                </li>
                <li class="col-sm-4">
                    <div class="values alert alert-success">
                        <strong> </strong>
                        Revenue
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="clip-stats"></i>
                Visitors
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                </div>
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
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                </div>
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
                <i class="clip-stats"></i>
                Revenue
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                </div>
            </div>
            <div class="panel-body">
                <div id="chart_div_revenue" style="height: 305px;"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="clip-stats"></i>
                Orders
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                </div>
            </div>
            <div class="panel-body">
                <div id="chart_div" style="height: 305px;"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="clip-stats"></i>
                Top Selling Products
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                </div>
            </div>
            <div class="panel-body"> 
                <div id="piechart_3d_product" style="width: 100%; height: 305px;"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="clip-stats"></i>
                Top Pages
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#"> </a>
                </div>
            </div>
            <div class="panel-body">
                <div id="piechart_3d_page" style="width: 100%; height: 305px;"></div>
            </div>
        </div>
    </div>
</div>



@stop


@section('bottomscripts')
    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@endsection