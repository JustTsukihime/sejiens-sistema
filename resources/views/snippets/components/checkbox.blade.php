<div class="form-group row">
    {{ Form::label($name, $label, ['class' => 'col-sm-4']) }}
    <div class="col-sm-8 row">
        @foreach($checkboxes as $checkbox)
            <label class="col">
                <input name="{{ $name }}" type="checkbox" value="{{ $checkbox['value'] }}" id="{{ $name }}" {{ in_array('checked', $checkbox) ? 'checked' : '' }} {{ in_array('required', $checkbox) ? 'required' : '' }}> {{ $checkbox['label'] }}
            </label>
        @endforeach
        @if(isset($subtitle))
            <small class="form-text text-info">{{ $subtitle }}</small>
        @endif
        @if ($errors->has($name))
            <small class="form-text text-danger">{{ $errors->first($name) }}</small>
        @endif
    </div>
</div>
