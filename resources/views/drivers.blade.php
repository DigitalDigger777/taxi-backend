@extends('layout')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Город</th>
            <th scope="col">Телефон</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <th scope="row">1</th>
                <td>{{$item->last_name}} {{$item->first_name}} {{$item->middle_name}}</td>
                <td>{{$item->city}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->email}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection