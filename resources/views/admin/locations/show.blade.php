@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.locations.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.locations.fields.nickname')</th>
                            <td field-key='nickname'>{{ $location->nickname }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.locations.fields.address')</th>
                            <td field-key='address'>{{ $location->address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.locations.fields.address-2')</th>
                            <td field-key='address_2'>{{ $location->address_2 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.locations.fields.city')</th>
                            <td field-key='city'>{{ $location->city }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.locations.fields.state')</th>
                            <td field-key='state'>{{ $location->state }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.locations.fields.phone')</th>
                            <td field-key='phone'>{{ $location->phone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.locations.fields.phone2')</th>
                            <td field-key='phone2'>{{ $location->phone2 }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.locations.fields.storefront')</th>
                            <td field-key='storefront'>@if($location->storefront)<a href="{{ asset(env('UPLOAD_PATH').'/' . $location->storefront) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $location->storefront) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('global.locations.fields.google-map-link')</th>
                            <td field-key='google_map_link'>{{ $location->google_map_link }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.locations.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
