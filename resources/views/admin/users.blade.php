@extends('admin.layout.app')
@section('title', 'Users')
@section('content')
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 class="text-dark"><i class="fa fa-user-circle-o"></i><b> Users</b></h2>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)                            
                        <tr>
                            <td class="text-danger"><b>{{ $index + 1 }}</b></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="{{ ($user->type == 'ADMIN')? 'text-success':'text-danger' }}"><b>{{ $user->type }}</b></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
