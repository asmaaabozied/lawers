@props(['name', 'title', 'collection', 'hasEmptyOption'=>1, 'display', 'value'=>'id', 'oldValue'])

<div class="form-group">
    @if($title)
        <label for="{{$name}}">{{$title}}</label>
    @endif
    <select class="selectpicker form-control" data-live-search="true" id="{{$name}}" name="{{$name}}">
        @if($hasEmptyOption)
            <option value=""></option>
        @endif
        @foreach($collection as $item)
            <option value="{{$item[$value]}}" {{$item[$value] == $oldValue ? 'selected':''}}>{{$item[$display]}}</option>
        @endforeach
    </select>
    @error($name)
    <div class="alert alert-danger mt-2">
        {{$message}}
    </div>
    @enderror
</div>
