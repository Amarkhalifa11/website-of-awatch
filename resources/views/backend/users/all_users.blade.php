@extends('backend.admin_master')
@section('content')
    <h1 class="text-center mb-2">all users</h1>
    <h2 class="text-center mb-2">welcome : {{Auth::User()->name}}</h2>
    <h2 class="text-center mb-5">count of users is  : {{count($users)}}</h2>


    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">name</th>
                            <th scope="col">email</th>
                            <th scope="col">created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($users as $user)
                            
                        <tr>
                            <td scope="row">{{$i++}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection