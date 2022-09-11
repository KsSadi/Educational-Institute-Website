@section('page-title')
    Change Password
@endsection


@extends('backend.layouts.main')

@section('admin-section')
@include('backend.layouts.partials.alerts')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Change Password </h4>

    </div>
    <p><hr/></p>

    <div class="card-body">
        <form action="{{ route('user.update-password') }}" method="POST" autocomplete="off">
{{--            @method('PUT')--}}
            @csrf





            <input type="hidden" name="user_id" value="{{$user->id}}">
            <div class="mb-1 row">
                <label class="col-sm-2 col-form-label" style="font-size: medium">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control"  name="email" value="{{$user->email}}" readonly autofocus>
                </div>
            </div>

            <div class="mb-1 row">
                <label class="col-sm-2 col-form-label" style="font-size: medium">Current Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Current Password" name="current_password" required >
                </div>
            </div>
            <div class="mb-1 row">
                <label class="col-sm-2 col-form-label" style="font-size: medium">New Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="New Password" name="password" required>
                </div>
            </div>
            <div class="mb-1 row">
                <label class="col-sm-2 col-form-label" style="font-size: medium">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                </div>
            </div>
            <div class="mb-1 row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
