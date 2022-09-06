@section('page-title')
    Edit Admin
@endsection


@extends('backend.layouts.main')

@section('admin-section')
@include('backend.layouts.partials.alerts')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit Admin </h4>

    </div>
    <p><hr/></p>

    <div class="card-body">
        <form action="{{ route('dashboard.admins.update', $admin->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="mb-1 row">
                    <label class="col-sm-2 col-form-label" style="font-size: medium">Admin Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Niamul Hasan" name="name" value=" {{ $admin->name }}">
                </div>
                </div>

                <div class="mb-1 row">
                    <label class="col-sm-2 col-form-label" style="font-size: medium">Admin Username</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="niamul_hasan" name="username" value="{{ $admin->username }}" required>
                </div>
                </div>

                <div class="mb-1 row">
                    <label class="col-sm-2 col-form-label" style="font-size: medium">Email</label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control" placeholder="username@gmail.com" name="email" value="{{ $admin->email }}">
                </div>
                </div>

                <div class="mb-1 row">
                    <label class="col-sm-2 col-form-label" style="font-size: medium">Password</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Enter Password" name="password">
                </div>
                </div>

                <div class="mb-1 row">
                    <label class="col-sm-2 col-form-label" style="font-size: medium">Password</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                </div>
                </div>

                @foreach ($roles as $role)
                    @if ($role->guard_name == 'admin')
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-10">
                        <div class="form-check form-check-success">
                            <input type="checkbox" class="form-check-input" value="{{ $role->name }}" name="roles[]" id="permission-{{ $loop->index }}" {{ $admin->hasRole($role) ? 'checked' : ''}}>
                            <label class="form-check-label" style="padding: 3px;" for="permission-{{ $loop->index }}"><span class="badge badge bg-info">{{ $role->name }}</span></label>
                        </div>
                        </div>
                    @endif
                @endforeach

                <div class="sm:ml-20 sm:pl-5 mt-5">
                    <input type="submit" class="btn btn-gradient-primary" value="Update" />
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
