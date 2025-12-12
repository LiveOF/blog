@extends('partials.layout')
@section('content')
    <div class="card bg-base-200 w-1/2 mx-auto">
        <div class="card-body space-y-4">
            <h2 class="card-title">{{ __('Forgot your password?') }}</h2>
            <p class="text-sm opacity-80">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </p>

            @if (session('status'))
                <div role="alert" class="alert alert-success">
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Email')</legend>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="input w-full @error('email') input-error @enderror" />
                    @error('email')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>

                <div class="flex items-center justify-end">
                    <button class="btn btn-primary">
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
