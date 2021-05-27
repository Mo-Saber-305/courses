@extends('dashboard.layouts.auth')

@section(config('app.name'), ' | Register')

@section('content')
    <!--end::Login Header-->

    <!--begin::Login Sign up form-->
    <div>
        <div class="mb-20">
            <h3>Sign Up</h3>
            <p class="opacity-60">Enter your details to create your account</p>
        </div>
        <form class="form text-center" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <input
                    class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" type="text" placeholder="Full name"/>

                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input
                    class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" type="text" placeholder="Email"/>

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input
                    class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 @error('password') is-invalid @enderror"
                    type="password" placeholder="Password" name="password"/>
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input
                    class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8"
                    type="password" placeholder="Confirm Password" name="password_confirmation"/>
            </div>
            <div class="form-group">
                <button type="submit"
                        class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">
                    Sign Up
                </button>
            </div>
        </form>
    </div>
    <!--end::Login Sign up form-->
@stop
