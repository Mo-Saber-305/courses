@extends('dashboard.layouts.auth')

@section(config('app.name'), ' | Reset Password')

@section('content')
    <!--begin::Login forgot password form-->
    <div>
        <div class="mb-20">
            <h3>Forgotten Password ?</h3>
            <p class="opacity-60">Enter your email to reset your password</p>
        </div>
        <form class="form" method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group mb-10">
                <input
                    class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8  @error('email') is-invalid @enderror"
                    type="text" placeholder="Email" name="email" value="{{ old('email') }}"/>
            </div>
            <div class="form-group">
                <button type="submit"
                        class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">
                    Send
                </button>

            </div>
        </form>
    </div>
    <!--end::Login forgot password form-->
@stop
