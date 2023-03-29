@extends('layouts.app')

@section('content')
<div class="x_title">
    <h2>Users manage - Edit user</h2>
    <div class="clearfix"></div>
</div>

<div class="x_content">
    <div class="demo-container">
        <a href="/users" class="btn btn-primary btn-sm btn-flat">
            <i class="fa fa-backward"></i> Back to list</a>

            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Error!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li></li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            @include('common.errors')
            <form action="{{ url('edituser/'.$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Title" value="{{$user->name}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email</strong>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{$user->email}}">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>New Password:</strong>
                    <input type="password" name="password" class="form-control" placeholder="new password" minlength="6" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Confirm New Password</strong>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="new password" minlength="6" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="role" class="col-sm-3 control-label">Role:</label>

                    <select name="role" class="from-control input-sm">
                        @foreach($roles as $role)
                        <option value="{{$role}}"
                        @if($role=='user') selected @endif
                        >{{$role}}</option>
                    @endforeach
                    </select>
            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update event</button>
            </div>
            </form>
    </div>
</div>

@endsection