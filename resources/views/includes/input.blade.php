<div class="col-md-12">
    <label for="{{ isset($id) ? $id : $name }}">{{ $label }}</label>
    <input type="{{ isset($type) ? $type : 'text' }}" name="{{ $name }}"
           class="form-control {{ isset($input_class) ? $input_class : '' }}
                @if (isset($errors) && is_array($errors) && isset($errors[$name]))
                    is-invalid
                @elseif (isset($errors) && $errors instanceOf \Illuminate\Support\ViewErrorBag && $errors->has($name))
                    is-invalid
                @endif"
           id="{{ isset($id) ? $id : $name }}"
           value="{{ isset($value) ? $value : '' }}"
           placeholder="{{ isset($placeholder) ? $placeholder : '' }}">
    @if (isset($errors) && is_array($errors) && isset($errors[$name]))
        <div class="invalid-feedback">
            {{ $errors[$name] }}
        </div>
    @elseif (isset($errors) && $errors instanceOf \Illuminate\Support\ViewErrorBag && $errors->has($name))
        <div class="invalid-feedback">
            {{ $errors->get($name)[0] }}
        </div>
    @endif
</div>
