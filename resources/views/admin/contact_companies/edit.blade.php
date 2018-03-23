@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.contact-companies.title')</h3>
    
    {!! Form::model($contact_company, ['method' => 'PUT', 'route' => ['admin.contact_companies.update', $contact_company->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('global.contact-companies.fields.name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    @if ($contact_company->logo)
                        <a href="{{ asset(env('UPLOAD_PATH').'/'.$contact_company->logo) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/'.$contact_company->logo) }}"></a>
                    @endif
                    {!! Form::label('logo', trans('global.contact-companies.fields.logo').'', ['class' => 'control-label']) !!}
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
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

