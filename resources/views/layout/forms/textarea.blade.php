
<div class="w3-margin-bottom">
    <label for="{{$name}}">{{$label ?? ucwords($name)}}:</label>
    <textarea name="{{$name}}" id="{{$name}}" required class="w3-input w3-border">{{old($name, $value ?? false)}}</textarea>
    
    @error ($name)
        <small class="w3-text-red">{{$message}}</small>
    @enderror
</div>
