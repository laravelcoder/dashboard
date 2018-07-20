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
        <div class="form-group col-md-4">
            <label>Date Range</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="date-range" class="form-control pull-right" value="{!!@$search_params['date-range']!!}">
            </div>
        </div>
        <div class="form-group col-md-4">
            <label for="inputWebsite">Account</label>
            <select class="form-control" id="account" name="account">
            @foreach($accounts as $account)
                @if(isset($search_params['account']) && $search_params['account'] == $account->id)
                    <option value="{!! $account->id !!}" selected>{{ $account->name }}</option>
                @else
                    <option value="{!! $account->id !!}">{{ $account->name }}</option>
                @endif
            @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="view">Numbers</label>
            <select name="numbers[]" class="form-control" style="width: 100%" multiple>
                @foreach($search_params['numbers'] as $number)
                    <option selected value="{!! json_encode($number) !!}" selected>{{ $number->number }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="text-center">
        <button class="btn">Update Data</button>
    </div>
    {!! Form::close() !!}
    <hr style="clear:both" />
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

            $('select[name=account]').on('change',function () {
                $('#filter_form').submit();
            });

            $(function () {

                $('select[name="numbers[]"]').select2({
                    placeholder: 'Select Numbers',
                    multiple: true,
                    ajax: {
                        url: '/admin/call_metrics/numbers-select2',
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                account_id: $('select[name=account]').val(),
                                page: params.page || 1
                            };
                        },processResults(data,params) {
                            data.results.map((item)=>{
                                item.text = item.number;
                                item.id = JSON.stringify({
                                    id: item.id,
                                    number: item.number
                                })
                            });

                            return data;
                        }
                    }
                });
            });
        });
    </script>
@endsection