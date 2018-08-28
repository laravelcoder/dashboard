<tr data-index="{{ $index }}">
    <td>{!! Form::text('clinics['.$index.'][nickname]', old('clinics['.$index.'][nickname]', isset($field) ? $field->nickname: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('global.app_delete')</a>
    </td>
</tr>