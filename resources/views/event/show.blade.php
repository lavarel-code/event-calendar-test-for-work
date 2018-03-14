@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <tr>
                <td>ID</td>
                <td>{{$model->id}}</td>
            </tr>
            <tr>
                <td>Title</td>
                <td>{{$model->title}}</td>
            </tr>
            <tr>
                <td>Date</td>
                <td>{{$model->date}}</td>
            </tr>
            <tr>
                <td>Repeat By</td>
                <td>{{$model->repeat_by}}</td>
            </tr>
        </table>
    </div>
@endsection