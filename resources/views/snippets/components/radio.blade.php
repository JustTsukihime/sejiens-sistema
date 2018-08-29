<div class="form-group row">
    {{ Form::label($name, $label, ['class' => 'col-sm-4']) }}
    <div class="col-sm-8 row">
        @foreach($radios as $radio)
            <label class="col">
                <input name="{{ $name }}" type="radio" value="{{ $radio['value'] }}" id="{{ $name }}" @if($value == $radio['value']) checked @endif {{ in_array('required', $radio) ? 'required' : '' }}> {{ $radio['label'] }}
            </label>
        @endforeach
        @if(isset($subtitle))
            <small class="form-text text-muted">{{ $subtitle }}</small>
        @endif
        @if ($errors->has($name))
            <small class="form-text text-danger">{{ $errors->first($name) }}</small>
        @endif
    </div>
</div>
