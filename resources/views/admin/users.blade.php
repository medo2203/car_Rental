@extends('layouts.dashboard')
@section('ordersNotification')
    {{$orders->count()}}
@endsection
@section('controlPanel')

    <div class="d-flex align-items-center flex-column col-6">
        <div>
            <table class="table table-hover col-6">
                <thead>
                    <tr>
                        <th scope="col">User Id</th>
                        <th scope="col">Username</th>
                        <th scope="col">User Full Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->fullName?? 'not set' }}</td>
                            <td>
                                <a href="{{route('users.edit',$user->id)}}">
                                    <button class="btn btn-outline-secondary">Send Email</button>
                                </a>
                                <a href="{{route('users.destroy',$user->id)}}">
                                    <button class="btn btn-outline-danger">Delete user</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach

            </table>
        </div>
    </div>
@endsection
