@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.clinics.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.clinics.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
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
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

