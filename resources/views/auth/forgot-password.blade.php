@extends('backend.auth.main')

@section('auth-title')
    Forgot Password
@endsection

@section('auth-content')


    <div class="card mb-0">
        <div class="card-body">
            <a href="{{ route('dashboard') }}" class="brand-logo">
                <img src="{{url('/img/logo.png')}}" width="50px" height="40px" alt="SUB"/>

                <h2 class="brand-text text-primary ms-1" style="margin-top: 7px;">SUB CAS</h2>
            </a>

            <h4 class="card-title mb-1">SUB Canteen Automation System</h4>
            <p class="card-text mb-2">We sent a reset link to your registered email.</p>
            @include('backend.layouts.partials.alerts')

            <form method="POST" action="{{ route('dashboard.forgot.password.submit') }}">
                @csrf
                <div class="mb-1">
                    <label for="login-email" class="form-label">Email</label>

                    <input type="email" class="form-control" placeholder="Email" id="email" name="email" :value="old('email')" required autofocus />
                </div>




                <button type="submit" class="btn btn-primary w-100" tabindex="4">Send Password Reset Link</button>
            </form>

        </div>
    </div>
    <!-- /Login basic -->

@endsection
