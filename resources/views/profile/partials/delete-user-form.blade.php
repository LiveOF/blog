<section class="space-y-4" x-data="{ open: @js($errors->userDeletion->isNotEmpty()) }">
    <header class="space-y-1">
        <h2 class="card-title text-xl">
            {{ __('Delete Account') }}
        </h2>

        <p class="text-sm opacity-80">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button class="btn btn-error" type="button" x-on:click="open = true">
        {{ __('Delete Account') }}
    </button>

    <dialog x-ref="delete_modal" class="modal" x-bind:open="open" x-on:close="open = false">
        <div class="modal-box space-y-4">
            <h3 class="font-bold text-lg">{{ __('Are you sure you want to delete your account?') }}</h3>
            <p class="text-sm opacity-80">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <form method="post" action="{{ route('profile.destroy') }}" class="space-y-4">
                @csrf
                @method('delete')

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Password')</legend>
                    <input id="password" name="password" type="password"
                        class="input w-full @if ($errors->userDeletion->get('password')) input-error @endif"
                        placeholder="{{ __('Password') }}" />
                    @if ($errors->userDeletion->get('password'))
                        <p class="label text-error">{{ $errors->userDeletion->first('password') }}</p>
                    @endif
                </fieldset>

                <div class="modal-action">
                    <button type="button" class="btn" x-on:click="open = false">{{ __('Cancel') }}</button>
                    <button class="btn btn-error">{{ __('Delete Account') }}</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop" x-on:submit.prevent="open = false">
            <button>close</button>
        </form>
    </dialog>
</section>
