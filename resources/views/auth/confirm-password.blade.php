@extends('partials.layout')
@section('content')
    <div class="card bg-base-200 w-1/2 mx-auto">
        <div class="card-body space-y-4">
            <h2 class="card-title">{{ __('Confirm Password') }}</h2>
            <p class="text-sm opacity-80">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </p>

            <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
                @csrf

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Password')</legend>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="input w-full @error('password') input-error @enderror" />
                    @error('password')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>

                <div class="flex justify-end">
                    <button class="btn btn-primary">
                        {{ __('Confirm') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
