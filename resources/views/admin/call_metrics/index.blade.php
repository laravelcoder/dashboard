@extends('layouts.app')

@section('topscripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="{!! asset('/javascript/embed-api/components/date-range-selector.js') !!}"></script>
    <script src="{!! asset('/javascript/embed-api/components/active-users.js') !!}"></script>
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
        <div class="form-group col-md-3">
            <label>Date Range</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="date-range" class="form-control pull-right" value="{!!@$search_params['date-range']!!}">
            </div>
        </div>
        <div class="form-group col-md-3">
            <label>Company</label>
            <select class="form-control" name="company_id" required>
                <option value="" @if(empty($search_params['company_id'])) selected @endif>SELECT COMPANY</option>
                @foreach($companies as $item)
                    <option value="{!! $item->id !!}" @if($search_params['company_id'] == $item->id) selected @endif>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-3">
            <label>Location</label>
            <select class="form-control" name="location_id">
                <option value="" @if(empty($search_params['location_id'])) selected @endif>All Locations</option>
                @foreach($locations as $item)
                    <option value="{!! $item->id !!}" @if($search_params['location_id'] == $item->id) selected @endif>{{ $item->nickname }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-3">
            <label>Numbers</label>
            <select class="form-control" name="tracking_number_ids[]" multiple>
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
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.call_metrics')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped js-dt" style="width: 100%">
                <thead>
                    <tr>
                        <th>@lang('global.call-metrics.by-dimension')</th>
                        @foreach($reportDto->metricMapping as $key => $val)
                            <th>{!! $val !!}</th>
                        @endforeach
                    </tr>
                </thead>
                {{-- 
                <tbody>
                    @foreach($reportDto->groups as $group)
                        <tr>
                            <td>
                                <div>
                                    {{ $group->name->name }} 
                                </div>
                                <small>{{ $group->name->desc }}</small>
                            </td>
                            @foreach($group->metrics as $metricName => $metric)
                                <td>
                                    {!! $reportDto->getDisplayableValue($metricName,$metric) !!}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody> --}}
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

            $('select[name=company_id]').on('change',function () {
                $('select[name="tracking_number_ids[]"]').val('').trigger('change');
                $('#filter_form').submit();
            });
            $('select[name=location_id]').on('change',function () {
                $('select[name="tracking_number_ids[]"]').val('').trigger('change');
                $('#filter_form').submit();
            });
            $('select[name="tracking_number_ids[]"]').select2({
                placeholder: 'Select Numbers',
                multiple: true
            });

            // $(function () {
            //
            //     $('select[name="numbers[]"]').select2({
            //         placeholder: 'Select Numbers',
            //         multiple: true,
            //         ajax: {
            //             url: '/admin/call_metrics/numbers-select2',
            //             dataType: 'json',
            //             delay: 250,
            //             data: function (params) {
            //                 return {
            //                     account_id: $('select[name=account]').val(),
            //                     page: params.page || 1
            //                 };
            //             },processResults(data,params) {
            //                 data.results.map((item)=>{
            //                     item.text = item.number;
            //                     item.id = JSON.stringify({
            //                         id: item.id,
            //                         number: item.number
            //                     })
            //                 });
            //
            //                 return data;
            //             }
            //         }
            //     });
            // });


            var mappingElem = $('#metric-mapping');
            if(mappingElem.length>0) {
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
                
                $('.js-dt').DataTable({
                    columns: columns,
                    searching: false,
                    lengthChange: false,
                    ajax:  {
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
                        }
                    },
                    processing: true,
                    serverSide: true
                });
            }
        });
    </script>
@endsection