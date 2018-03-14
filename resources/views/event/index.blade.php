@extends('layouts.app')

@section('content')
    <div class="container">
        <p><a href="{{url('/events/create')}}" class="btn-primary btn">Create</a></p>
        <table class="table">
            <tr>
                <td>Id</td>
                <td>Title</td>
                <td>Date</td>
                <td>Repeat By</td>
                <td></td>
            </tr>
            @foreach($models as $model)
                <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->title}}</td>
                    <td>{{$model->date}}</td>
                    <td>{{$model->repeat_by}}</td>
                    <td><a href="{{route('events.edit', ['id' => $model->id])}}">Edit</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection