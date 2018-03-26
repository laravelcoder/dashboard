@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.clinics.title')</h3>
    
    {!! Form::model($clinic, ['method' => 'PUT', 'route' => ['admin.clinics.update', $clinic->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nickname', trans('global.clinics.fields.nickname').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('nickname', old('nickname'), ['class' => 'form-control', 'placeholder' => 'Enter a name to reference this clinic location', 'required' => '']) !!}
                    <p class="help-block">Enter a name to reference this clinic location</p>
                    @if($errors->has('nickname'))
                        <p class="help-block">
                            {{ $errors->first('nickname') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('clinic_email', trans('global.clinics.fields.clinic-email').'*', ['class' => 'control-label']) !!}
                    {!! Form::email('clinic_email', old('clinic_email'), ['class' => 'form-control', 'placeholder' => 'Email for this clinic location. if same as another just add it again', 'required' => '']) !!}
                    <p class="help-block">Email for this clinic location. if same as another just add it again</p>
                    @if($errors->has('clinic_email'))
                        <p class="help-block">
                            {{ $errors->first('clinic_email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('clinic_phone', trans('global.clinics.fields.clinic-phone').'', ['class' => 'control-label']) !!}
                    {!! Form::text('clinic_phone', old('clinic_phone'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('clinic_phone'))
                        <p class="help-block">
                            {{ $errors->first('clinic_phone') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('clinic_phone_2', trans('global.clinics.fields.clinic-phone-2').'', ['class' => 'control-label']) !!}
                    {!! Form::text('clinic_phone_2', old('clinic_phone_2'), ['class' => 'form-control', 'placeholder' => 'this could be local phone or toll free  for examle']) !!}
                    <p class="help-block">this could be local phone or toll free  for examle</p>
                    @if($errors->has('clinic_phone_2'))
                        <p class="help-block">
                            {{ $errors->first('clinic_phone_2') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    @if ($clinic->logo)
                        <a href="{{ asset(env('UPLOAD_PATH').'/'.$clinic->logo) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/'.$clinic->logo) }}"></a>
                    @endif
                    {!! Form::label('logo', trans('global.clinics.fields.logo').'', ['class' => 'control-label']) !!}
                    {!! Form::file('logo', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('logo_max_size', 2) !!}
                    {!! Form::hidden('logo_max_width', 600) !!}
                    {!! Form::hidden('logo_max_height', 400) !!}
                    <p class="help-block"></p>
                    @if($errors->has('logo'))
                        <p class="help-block">
                            {{ $errors->first('logo') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('company_id', trans('global.clinics.fields.company').'', ['class' => 'control-label']) !!}
                    {!! Form::select('company_id', $companies, old('company_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('company_id'))
                        <p class="help-block">
                            {{ $errors->first('company_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('users', trans('global.clinics.fields.users').'', ['class' => 'control-label']) !!}
                    {!! Form::select('users[]', $users, old('users') ? old('users') : $clinic->users->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('users'))
                        <p class="help-block">
                            {{ $errors->first('users') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Contacts
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('global.contacts.fields.first-name')</th>
                        <th>@lang('global.contacts.fields.last-name')</th>
                        <th>@lang('global.contacts.fields.phone1')</th>
                        <th>@lang('global.contacts.fields.phone2')</th>
                        <th>@lang('global.contacts.fields.email')</th>
                        <th>@lang('global.contacts.fields.skype')</th>
                        
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="contacts">
                    @forelse(old('contacts', []) as $index => $data)
                        @include('admin.clinics.contacts_row', [
                            'index' => $index
                        ])
                    @empty
                        @foreach($clinic->contacts as $item)
                            @include('admin.clinics.contacts_row', [
                                'index' => 'id-' . $item->id,
                                'field' => $item
                            ])
                        @endforeach
                    @endforelse
                </tbody>
            </table>
            <a href="#" class="btn btn-success pull-right add-new">@lang('global.app_add_new')</a>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Website
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('global.website.fields.website')</th>
                        
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="website">
                    @forelse(old('websites', []) as $index => $data)
                        @include('admin.clinics.websites_row', [
                            'index' => $index
                        ])
                    @empty
                        @foreach($clinic->websites as $item)
                            @include('admin.clinics.websites_row', [
                                'index' => 'id-' . $item->id,
                                'field' => $item
                            ])
                        @endforeach
                    @endforelse
                </tbody>
            </table>
            <a href="#" class="btn btn-success pull-right add-new">@lang('global.app_add_new')</a>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Locations
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('global.locations.fields.nickname')</th>
                        <th>@lang('global.locations.fields.address')</th>
                        <th>@lang('global.locations.fields.address-2')</th>
                        <th>@lang('global.locations.fields.city')</th>
                        <th>@lang('global.locations.fields.state')</th>
                        <th>@lang('global.locations.fields.phone')</th>
                        <th>@lang('global.locations.fields.phone2')</th>
                        <th>@lang('global.locations.fields.google-map-link')</th>
                        
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="locations">
                    @forelse(old('locations', []) as $index => $data)
                        @include('admin.clinics.locations_row', [
                            'index' => $index
                        ])
                    @empty
                        @foreach($clinic->locations as $item)
                            @include('admin.clinics.locations_row', [
                                'index' => 'id-' . $item->id,
                                'field' => $item
                            ])
                        @endforeach
                    @endforelse
                </tbody>
            </table>
            <a href="#" class="btn btn-success pull-right add-new">@lang('global.app_add_new')</a>
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script type="text/html" id="contacts-template">
        @include('admin.clinics.contacts_row',
                [
                    'index' => '_INDEX_',
                ])
               </script > 

    <script type="text/html" id="website-template">
        @include('admin.clinics.websites_row',
                [
                    'index' => '_INDEX_',
                ])
               </script > 

    <script type="text/html" id="locations-template">
        @include('admin.clinics.locations_row',
                [
                    'index' => '_INDEX_',
                ])
               </script > 

            <script>
        $('.add-new').click(function () {
            var tableBody = $(this).parent().find('tbody');
            var template = $('#' + tableBody.attr('id') + '-template').html();
            var lastIndex = parseInt(tableBody.find('tr').last().data('index'));
            if (isNaN(lastIndex)) {
                lastIndex = 0;
            }
            tableBody.append(template.replace(/_INDEX_/g, lastIndex + 1));
            return false;
        });
        $(document).on('click', '.remove', function () {
            var row = $(this).parentsUntil('tr').parent();
            row.remove();
            return false;
        });
        </script>
@stop