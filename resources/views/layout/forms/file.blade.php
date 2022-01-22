
<div class="w3-margin-bottom">
<label for="{{$name ?? 'image'}}">{{$label ?? ucwords($name ?? 'Image')}}:</label>
    <input type="file" name="{{$name ?? 'image'}}" id="{{$name ?? 'image'}}" required class="w3-input w3-border">
    
    @error ($name ?? 'image')
        <small class="w3-text-red">{{$message}}</small>
    @enderror
</div>
