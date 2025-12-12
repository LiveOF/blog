<section class="space-y-4">
    <header class="space-y-1">
        <h2 class="card-title text-xl">
            {{ __('Profile Information') }}
        </h2>

        <p class="text-sm opacity-80">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        @method('patch')

        <fieldset class="fieldset">
            <legend class="fieldset-legend">@lang('Name')</legend>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus
                autocomplete="name" class="input w-full @error('name') input-error @enderror" />
            @error('name')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">@lang('Email')</legend>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required
                autocomplete="username" class="input w-full @error('email') input-error @enderror" />
            @error('email')
                <p class="label text-error">{{ $message }}</p>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="alert alert-warning mt-2 flex flex-col gap-2">
                    <span>{{ __('Your email address is unverified.') }}</span>
                    <button form="send-verification" class="btn btn-sm btn-outline">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <span class="text-success text-sm">{{ __('A new verification link has been sent to your email address.') }}</span>
                    @endif
                </div>
            @endif
        </fieldset>

        <div class="flex items-center gap-3">
            <button class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
                <span
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="badge badge-success badge-outline"
                >{{ __('Saved.') }}</span>
            @endif
        </div>
    </form>
</section>
