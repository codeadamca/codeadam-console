
<div class="w3-margin-bottom">
    <label for="{{$name}}">{{$label ?? ucwords($name)}}:</label>

    @if ($type ?? 'enum' == 'enum')

        <select name="{{$name}}" id="{{$name}}" required class="w3-input w3-border">
            @foreach ($options as $id => $option)
                <option value="{{$option}}"
                    {{$option == old($name, $value ?? false) ? 'selected' : ''}}>
                    {{$option}}
                </option>
            @endforeach
        </select>        

    @elseif ($type == 'table')


    @elseif ($type == 'multiple')

        

    @endif

    @error ($name)
        <small class="w3-text-red">{{$message}}</small>
    @enderror
</div>
