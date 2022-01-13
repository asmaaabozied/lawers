@props(['name', 'value', 'title'])

<div class="form-group">
    @if($title)
        <label for="{{$name}}">{{$title}}</label>
    @endif
    <textarea type="text" class="form-control @error($name) is-invalid @endif" id="{{$name}}" name="{{$name}}">{{$value}}</textarea>
    @error($name)
    <div class="alert alert-danger mt-2">
        {{$message}}
    </div>
    @enderror
</div>
