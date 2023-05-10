@extends('layouts.dashboard')
@section('controlPanel')
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                {{-- <th scope="col">{{$user->fullName??$user->name}}</th> --}}
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($orders as $order) --}}
            @foreach ($users as $user)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$user->name}}</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
            @endforeach
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>
@endsection
