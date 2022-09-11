

@extends('backend.auth.main')

@section('auth-title')
    Reset Password
@endsection

@section('auth-content')


    <div class="card mb-0">
        <div class="card-body">
            <a href="{{ route('dashboard') }}" class="brand-logo">
                <img src="{{url('/img/logo.png')}}" width="50px" height="40px" alt="SUB"/>

                <h2 class="brand-text text-primary ms-1" style="margin-top: 7px;">SUB CAS</h2>
            </a>

            <h4 class="card-title mb-1">SUB Canteen Automation System</h4>
            <p class="card-text mb-2">Enter your new password for Canteen Automation System</p>
            @include('backend.layouts.partials.alerts')
            <form method="POST" action="{{ route('dashboard.reset.password.submit') }}">
                @csrf
                <input type="hidden" name="token" value="{{request('token')}}">

                <div class="mb-1">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="login-password">New Password</label>

                    </div>
                    <div class="input-group input-group-merge form-password-toggle">

                        <input type="password" class="form-control form-control-merge" placeholder="Password" id="password" name="password"
                               required autocomplete="password" />
                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                </div>
                <div class="mb-1">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="login-password">Confirm Password</label>

                    </div>
                    <div class="input-group input-group-merge form-password-toggle">

                        <input type="password" class="form-control form-control-merge" placeholder="Password" id="password" name="password_confirmation"
                               required autocomplete="password_confirmation" />
                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                </div>
                <button class="btn btn-primary w-100" tabindex="4">Reset Password</button>
            </form>

        </div>
    </div>
    <!-- /Login basic -->

@endsection

