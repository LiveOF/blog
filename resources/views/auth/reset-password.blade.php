@extends('partials.layout')
@section('content')
    <div class="card bg-base-200 w-1/2 mx-auto">
        <div class="card-body space-y-4">
            <h2 class="card-title">{{ __('Verify Email') }}</h2>
            <p class="text-sm opacity-80">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </p>

            @if (session('status') == 'verification-link-sent')
                <div role="alert" class="alert alert-success">
                    <span>{{ __('A new verification link has been sent to the email address you provided during registration.') }}</span>
                </div>
            @endif

            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <button class="btn btn-primary">
                        {{ __('Resend Verification Email') }}
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto flex justify-end">
                    @csrf

                    <button type="submit" class="btn btn-ghost">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
