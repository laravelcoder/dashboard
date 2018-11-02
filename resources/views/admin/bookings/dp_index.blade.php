@inject('request', 'Illuminate\Http\Request')
@extends('layouts.dp_app')

@section('content')
				<div class="page-header">
					<h4 class="page-title">@lang('global.bookings.title')</h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.bookings.newindex') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li>
						<li class="breadcrumb-item"><a href="{{ route('admin.bookings.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
					</ol>
					@can('booking_create')
					<a target="_blank" href="{{ route('admin.bookings.create') }}"><button type="button" class="btn btn-outline-primary"><i class="fa fa-pencil mr-2"></i>@lang('global.app_add_new')</button></a>
					@endcan
				</div>



 @include('admin.bookings.partials.dp_topwidgets')

						<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">
											@lang('global.app_list')
	 								</div>
	 							</div>
								<div class="card-body">
									<div class=" table-responsive">
										<table class="table table-bordered table-striped ajaxTable @can('booking_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
											<thead>
												<tr>
													@can('booking_delete')
														@if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
													@endcan

													<th>@lang('global.bookings.fields.id')</th>
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
													<th>Action</th>
													@else
													<th>Action</th>
													@endif
												</tr>
											</thead>
										</table>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
@stop

@section('javascript')
	<script>
		@can('booking_delete')
			@if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.bookings.mass_destroy') }}'; @endif
		@endcan
		$(document).ready(function () {
			window.dtDefaultOptions.ajax = '{!! route('admin.bookings.newindex') !!}?show_deleted={{ request('show_deleted') }}';
			window.dtDefaultOptions.order = [[1, "desc"]];
			window.dtDefaultOptions.columns = [
			@can('booking_delete')
				@if ( request('show_deleted') != 1 )
					{data: 'massDelete', name: 'id', searchable: false, sortable: false},
				@endif
			@endcan
				{data: 'id', name: 'id', visible: false, searchable: false},
				{data: 'submitted', name: 'submitted'},
				{data: 'customername', name: 'customername'},
				{data: 'email', name: 'email'},
				{data: 'phone', name: 'phone'},
				{data: 'family_number', name: 'family_number'},
				{data: 'requested_date', name: 'requested_date'},
				{data: 'requested_clinic', name: 'requested_clinic'},
				{data: 'clinic_id', name: 'clinic_id'},
				{data: 'clinic_phone', name: 'clinic_phone'},

				{data: 'actions', name: 'actions', searchable: false, sortable: false}
			];
			processAjaxTables();
		});
	</script>
@endsection