@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('events.update', ['id' => $model->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" name="title" value="{{ old('title', $model->title) }}" type="text"
                       id="title">
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input class="datepicker form-control" name="date" value="{{ old('date', $model->date) }}" type="text"
                       id="date">
                @if ($errors->has('date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="repeatBy">Repeat By</label>
                @inject('eventHelper', 'App\Helpers\EventHelper')
                <select name="repeatBy" id="repeatBy" class="form-control">
                    @foreach($eventHelper::getRepeatByDropDown() as $id => $name)
                        <option value="{{$id}}" @if($id == old('repeatBy', $model->repeat_by)) @endif>{{$name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('repeatBy'))
                    <span class="help-block">
                        <strong>{{ $errors->first('repeatBy') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>
        </form>
    </div>
@endsection