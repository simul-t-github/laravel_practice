<div>
    <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="{{$id}}">{{$label}}</label><br>
        <input id="{{$id}}" class="form-control" type="{{$type}}" name="{{$name}}" value="{{$value}}">
        <span class="text-danger">
            <!-- @error('name')
            {{$message}}
            @enderror -->
        </span>
    </div>
</div>