@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{url('/events')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" name="title" value="{{ old('title') }}" type="text" id="title">
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input class="datepicker form-control" name="date" value="{{ old('date') }}" type="text" id="date">
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
                        <option value="{{$id}}">{{$name}}</option>
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