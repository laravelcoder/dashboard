@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.api-test.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.api_tests.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('submitted', trans('global.api-test.fields.submitted').'', ['class' => 'control-label']) !!}
                    {!! Form::text('submitted', old('submitted'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('submitted'))
                        <p class="help-block">
                            {{ $errors->first('submitted') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('global.api-test.fields.name').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('email', trans('global.api-test.fields.email').'', ['class' => 'control-label']) !!}
                    {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('subject', trans('global.api-test.fields.subject').'', ['class' => 'control-label']) !!}
                    {!! Form::text('subject', old('subject'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('subject'))
                        <p class="help-block">
                            {{ $errors->first('subject') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('message', trans('global.api-test.fields.message').'', ['class' => 'control-label']) !!}
                    {!! Form::text('message', old('message'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('message'))
                        <p class="help-block">
                            {{ $errors->first('message') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('submitted_user_city', trans('global.api-test.fields.submitted-user-city').'', ['class' => 'control-label']) !!}
                    {!! Form::text('submitted_user_city', old('submitted_user_city'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('submitted_user_city'))
                        <p class="help-block">
                            {{ $errors->first('submitted_user_city') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('submitted_user_state', trans('global.api-test.fields.submitted-user-state').'', ['class' => 'control-label']) !!}
                    {!! Form::text('submitted_user_state', old('submitted_user_state'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('submitted_user_state'))
                        <p class="help-block">
                            {{ $errors->first('submitted_user_state') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('searched_for', trans('global.api-test.fields.searched-for').'', ['class' => 'control-label']) !!}
                    {!! Form::text('searched_for', old('searched_for'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('searched_for'))
                        <p class="help-block">
                            {{ $errors->first('searched_for') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('latitide', trans('global.api-test.fields.latitide').'', ['class' => 'control-label']) !!}
                    {!! Form::text('latitide', old('latitide'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('latitide'))
                        <p class="help-block">
                            {{ $errors->first('latitide') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('longetude', trans('global.api-test.fields.longetude').'', ['class' => 'control-label']) !!}
                    {!! Form::text('longetude', old('longetude'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('longetude'))
                        <p class="help-block">
                            {{ $errors->first('longetude') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('country', trans('global.api-test.fields.country').'', ['class' => 'control-label']) !!}
                    {!! Form::text('country', old('country'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('country'))
                        <p class="help-block">
                            {{ $errors->first('country') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

