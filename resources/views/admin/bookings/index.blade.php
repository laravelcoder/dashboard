@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.bookings.title')</h3>
    @can('booking_create')
    <p>
        <a href="{{ route('admin.bookings.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.bookings.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.bookings.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($bookings) > 0 ? 'datatable' : '' }} @can('booking_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('booking_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.bookings.fields.submitted')</th>
                        <th>@lang('global.bookings.fields.customername')</th>
                        <th>@lang('global.bookings.fields.email')</th>
                        <th>@lang('global.bookings.fields.phone')</th>
                        <th>@lang('global.bookings.fields.family-number')</th>
                        <th>@lang('global.bookings.fields.requested-date')</th>
                        <th>@lang('global.bookings.fields.requested-clinic')</th>
                        <th>@lang('global.bookings.fields.clinic-id')</th>
                        <th>@lang('global.bookings.fields.clinic-phone')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($bookings) > 0)
                        @foreach ($bookings as $booking)
                            <tr data-entry-id="{{ $booking->id }}">
                                @can('booking_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='submitted'>{{ $booking->submitted }}</td>
                                <td field-key='customername'>{{ $booking->customername }}</td>
                                <td field-key='email'>{{ $booking->email }}</td>
                                <td field-key='phone'>{{ $booking->phone }}</td>
                                <td field-key='family_number'>{{ $booking->family_number }}</td>
                                <td field-key='requested_date'>{{ $booking->requested_date }}</td>
                                <td field-key='requested_clinic'>{{ $booking->requested_clinic }}</td>
                                <td field-key='clinic_id'>{{ $booking->clinic_id }}</td>
                                <td field-key='clinic_phone'>{{ $booking->clinic_phone }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.bookings.restore', $booking->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.bookings.perma_del', $booking->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('booking_view')
                                    <a href="{{ route('admin.bookings.show',[$booking->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('booking_edit')
                                    <a href="{{ route('admin.bookings.edit',[$booking->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('booking_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.bookings.destroy', $booking->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="20">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('booking_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.bookings.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection