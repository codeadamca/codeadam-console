
<div class="w3-margin-bottom">
    <label for="{{$name}}">{{$label ?? ucwords($name)}}:</label>    

    @if (($type ?? false) == 'table')


    @elseif (($type ?? false) == 'multiple')
        
        <select name="tag_id[]" id="tag_id" required multiple size="7" class="w3-input w3-border">
            @foreach($options as $option)
                <option value="{{$option->id}}"
                    {{(is_array(old('tag_id', $selected ?? false)) && in_array($option->id,old('tag_id', $selected ?? false))) ? 'selected' : ''}}>
                    {{$option->title}}
                </option>
            @endforeach
        </select>
          
    @else 

        <select name="{{$name}}" id="{{$name}}" required class="w3-input w3-border">
            @foreach ($options as $option)
                <option value="{{$option}}"
                    {{$option == old($name, $selected ?? false) ? 'selected' : ''}}>
                    {{$option}}
                </option>
            @endforeach
        </select>   

    @endif

    @error ($name)
        <small class="w3-text-red">{{$message}}</small>
    @enderror
</div>
