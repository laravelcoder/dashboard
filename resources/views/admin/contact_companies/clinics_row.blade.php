<tr data-index="{{ $index }}">
    <td>{!! Form::text('clinics['.$index.'][nickname]', old('clinics['.$index.'][nickname]', isset($field) ? $field->nickname: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::email('clinics['.$index.'][clinic_email]', old('clinics['.$index.'][clinic_email]', isset($field) ? $field->clinic_email: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('clinics['.$index.'][clinic_phone]', old('clinics['.$index.'][clinic_phone]', isset($field) ? $field->clinic_phone: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('clinics['.$index.'][clinic_phone_2]', old('clinics['.$index.'][clinic_phone_2]', isset($field) ? $field->clinic_phone_2: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('global.app_delete')</a>
    </td>
</tr>