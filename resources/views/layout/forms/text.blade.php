
<div class="w3-margin-bottom">
    <label for="{{$name}}">{{$label ?? ucwords($name)}}:</label>
    <input type="{{$type ?? 'text'}}" name="{{$name}}" id="{{$name}}" value="{{old($name, $value ?? false)}}" required class="w3-input w3-border">
    
    @error ($name)
        <small class="w3-text-red">{{$message}}</small>
    @enderror
</div>
