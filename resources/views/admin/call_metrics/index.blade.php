@extends('layouts.app')

@section('topscripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
    <style type="text/css">
        .select2-container--default .select2-selection--multiple .select2-selection__choice {background-color: #3c8dbc!important; border-color: #367fa9!important; color:#fff!important; }
        span.select2-selection__choice__remove {float: right; color:#000!important; margin-left:5px; font-size: 120%; }
        div.amcharts-chart-div a {display: none; }
        #series_chart {width: 100%; height: 300px; } 
        #series_chart2 {width: 100%; height: 300px; } 
        .select2-selection {
            min-height: 34px;
        }
    </style> 
    <script src="{!! asset('/javascript/embed-api/components/date-range-selector.js') !!}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/dark.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/black.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/chalk.js"></script>

@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <h3 class="page-title">@lang('global.call-metrics.title')</h3>
            <p> {{-- trans('global.app_custom_controller_index') --}} </p>
        </div>
    </div>

    {!! Form::open(['method' => 'get','id' => 'filter_form']) !!}
    <div class="row">
        <div class="form-group col-md-2">
            <label>Date Range</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="date-range" class="form-control pull-right" value="{!!@$search_params['date-range']!!}">
            </div>
        </div>
        <div class="form-group col-md-2">
            <label>Company</label>
            <select class="form-control" style="width:100%" name="company_id" required>
                <option value="" @if(empty($search_params['company_id'])) selected @endif>SELECT COMPANY</option>
                @foreach($companies as $item)
                    <option value="{!! $item->id !!}" @if($search_params['company_id'] == $item->id) selected @endif>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-2">
            <label>Account</label>
            <select class="form-control pull-right"  style="width:100%" name="callmetric_account_id">
                @foreach($callMetricAccounts as $item)
                    <option value="{!! $item->id !!}" @if($search_params['callmetric_account_id'] == $item->id) selected @endif>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-3">
            <label>Location</label>
            <select class="form-control" name="location_id" style="width:100%">
                <option value="" @if(empty($search_params['location_id'])) selected @endif>All Locations</option>
                @foreach($locations as $item)
                    <option value="{!! $item->id !!}" @if($search_params['location_id'] == $item->id) selected @endif>{{ $item->nickname }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-3">
            <label>Numbers</label>
            <select class="form-control" name="tracking_number_ids[]" multiple style="width: 100%">
                @foreach($tracking_numbers as $item)
                    <option value="{!! $item->id !!}" @if(in_array($item->id, $search_params['tracking_number_ids'])) selected @endif>{{ $item->number }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="text-center">
        <button class="btn">Update Data</button>
    </div>
    {!! Form::close() !!}
    <hr style="clear:both" />
    @if($reportDto!==null)
    <!-- Map box -->
    <div class="box box-solid ">
        <div class="box-header bg-light-blue-gradient">
            <!-- tools box -->
            <div class="pull-right box-tools">
                <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
                    data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                <i class="fa fa-minus"></i></button>
            </div>
            <!-- /. tools -->
            <i class="fa fa-phone"></i>
            <h3 class="box-title">
                Call Metrics
            </h3>
        </div>
        <div class="box-body">
        
            <div id="series_chart" class="col-md-12"></div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.call_metrics')
        </div>

        
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped js-dt" id="tracking-dt" style="width: 100%">
                <thead>
                    <tr>
                        <th>@lang('global.call-metrics.dimension-tracking')</th>
                        @foreach($reportDto->metricMapping as $key => $val)
                            <th>{!! $val !!}</th>
                        @endforeach
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <!-- Map box -->
    <div class="box box-solid ">
        <div class="box-header bg-green-gradient">
            <!-- tools box -->
            <div class="pull-right box-tools">
                <button type="button" class="btn btn-success btn-sm pull-right" data-widget="collapse"
                    data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                <i class="fa fa-minus"></i></button>
            </div>
            <!-- /. tools -->
            <i class="fa fa-phone"></i>
            <h3 class="box-title">
                Call Sources
            </h3>
        </div>
        <div class="box-body">
            <div id="series_chart2" class="col-md-12"></div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.call_metrics')
        </div>

        
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped js-dt" id="sources-dt" style="width: 100%">
                <thead>
                    <tr>
                        <th>@lang('global.call-metrics.dimension-source')</th>
                        @foreach($reportDto->metricMapping as $key => $val)
                            <th>{!! $val !!}</th>
                        @endforeach
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    @endif
    @if(isset($reportDto))
        <script type="application/json" id="metric-mapping">
            {!! json_encode($reportDto->metricMapping) !!}
        </script>
    @endif
@endsection

@section('bottomscripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
    <script>
        $(function () {
            $('input[name="date-range"]').daterangepicker({
                opens: 'left',
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, function (start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                $('input[name="date-range"]').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'))
                $('#filter_form').submit();
            });

            $('select[name=callmetric_account_id]').on('change', function() {
                $('#filter_form').submit();
            });

            $('select[name=callmetric_account_id]').select2();
            $('select[name=company_id]').on('change',function () {
                $('select[name="tracking_number_ids[]"]').val('').trigger('change');
                $('#filter_form').submit();
            });
            $('select[name=company_id]').select2();
            $('select[name=location_id]').select2();
            $('select[name=location_id]').on('change',function () {
                $('select[name="tracking_number_ids[]"]').val('').trigger('change');
                $('#filter_form').submit();
            });
            $('select[name="tracking_number_ids[]"]').select2({
                placeholder: 'Select Numbers',
                multiple: true
            });

            var mappingElem = $('#metric-mapping');
            if(mappingElem.length>0) {
                initChart();
                window.dtDefaultOptions.ajax = '{!! route('admin.call_metrics.index') !!}';
                var columns = [
                    {
                        data: 'first',
                        name: 'first',
                        searchable: false,
                        orderable: false
                    }
                ];
                var mappings = JSON.parse(mappingElem.text());
                for(var prop in mappings) {
                    if(mappings.hasOwnProperty(prop)){
                        columns.push({
                            data: prop,
                            name: prop,
                            searchable: false,
                        });
                    }
                }
                
                $('#tracking-dt').DataTable({
                    columns: columns,
                    searching: false,
                    lengthChange: false,
                    ajax:  getCallMetricDataAjaxConfig('series_chart','tracking_number')(),
                    processing: true,
                    serverSide: true
                });

                $('#sources-dt').DataTable({
                    columns: columns,
                    searching: false,
                    lengthChange: false,
                    ajax:  getCallMetricDataAjaxConfig('series_chart2','source')(),
                    processing: true,
                    serverSide: true
                });
            }

            function getCallMetricDataAjaxConfig(chart_id, dimension, onCompleted){
                return function () {
                    var dd = null;
                    return {
                        "url": window.dtDefaultOptions.ajax,
                        "type": "GET",
                        "data": function(data) {
                            var d = $("#filter_form").serializeArray();
                            d.forEach(function(item) {
                                var name = item.name;
                                if(item.name.indexOf("[]")>-1) {
                                    name = item.name.replace("[]","");
                                    if(!data[name])
                                        data[name] = [];
                                    data[name].push(item.value);
                                } else
                                    data[item.name] = item.value;
                            });
                            data['dimension'] = dimension;
                            dd = data;
                        },
                        complete: function(d) {
                            d = JSON.parse(d.responseText)
                            
                            refreshChart(d.series, chart_id);
                            if(onCompleted) {
                                onCompleted(dd);
                            }
                            return d;
                        }
                    };
                }
            }

            function refreshChart(series, id) {
                if(!series) {
                    $('#'+id).css('display','none');
                    return;
                }
                $('#'+id).css('display','block');
                
                var graphs = [];
                var dataProvider = [];
                var amChartConfig = {
                    "type": "serial",
                    "theme": "light",
                        // "marginTop":0,
                        // "marginRight": 80,
                    "legend": {
                        "horizontalGap": 10,
                        "maxColumns": 1,
                        "position": "right",
                        "useGraphSettings": true,
                        "markerSize": 10
                    },
                    "dataProvider": dataProvider,
                    "valueAxes": [{
                        "stackType": "regular",
                        "axisAlpha": 15,
                        "gridAlpha": 0
                    }],
                    "graphs": graphs,
                    "categoryField": "date",
                    "categoryAxis": {
                        "gridPosition": "start",
                        "axisAlpha": 0,
                        "gridAlpha": 0,
                        "position": "left"
                    },
                    "export": {
                        "enabled": true
                    }
                };

                series.items.forEach(function(item, index) {
                    item.data.forEach(function(dataPoint, index) {
                        if(dataProvider.length<=index) {
                            var label = moment.utc(dataPoint[0],'x').format('DD-MMM-YYYY');
                            dataProvider.push({
                                date: label
                            });
                        }
                    
                        var rowData = dataProvider[index];
                        rowData[item.id] = dataPoint[1];
                    })

                    graphs.push({
                        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
                        "fillAlphas": 0.8,
                        "labelText": "[[value]]",
                        "lineAlpha": 0.3,
                        "title": item.name.name + "\n" + (item.name.desc ? item.name.desc : ''),
                        "type": "column",
                        "color": "#000000",
                        "valueField": item.id
                    })
                });
            
                AmCharts.makeChart(id, amChartConfig);
            }

            function initChart(){
                google.charts.load('current', {packages: ['corechart', 'line']});
            }
        });
            function resize() {
              var w = Math.random() * 600 + 100;
              var h = Math.random() * 600 + 100;
              document.getElementById('series_chart').style.width = w + 'px';
              document.getElementById('series_chart').style.height = h + 'px';
              document.getElementById('series_chart2').style.width = w + 'px';
              document.getElementById('series_chart2').style.height = h + 'px';
              chart.invalidateSize();
            }
    </script>
@endsection