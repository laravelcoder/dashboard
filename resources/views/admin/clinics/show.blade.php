@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.clinics.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.clinics.fields.nickname')</th>
                            <td field-key='nickname'>{{ $clinic->nickname }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clinics.fields.clinic-email')</th>
                            <td field-key='clinic_email'>{{ $clinic->clinic_email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clinics.fields.clinic-phone')</th>
                            <td field-key='clinic_phone'>{{ $clinic->clinic_phone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clinics.fields.clinic-phone-2')</th>
                            <td field-key='clinic_phone_2'>{{ $clinic->clinic_phone_2 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clinics.fields.logo')</th>
                            <td field-key='logo'>@if($clinic->logo)<a href="{{ asset(env('UPLOAD_PATH').'/' . $clinic->logo) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $clinic->logo) }}"/></a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.clinics.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
