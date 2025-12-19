<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold">
            {{ __('Account settings') }}
        </h2>
        <p class="text-sm opacity-70">
            Manage your profile, password and security options.
        </p>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto px-4">
            <div role="tablist" class="tabs tabs-lifted">
                <input type="radio" name="profile_tabs" role="tab" class="tab" aria-label="Profile" checked />
                <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                    <div class="card bg-base-200">
                        <div class="card-body">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>

                <input type="radio" name="profile_tabs" role="tab" class="tab" aria-label="Password" />
                <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                    <div class="card bg-base-200">
                        <div class="card-body">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>

                <input type="radio" name="profile_tabs" role="tab" class="tab text-error" aria-label="Danger zone" />
                <div role="tabpanel" class="tab-content bg-base-100 border-base-300 rounded-box p-6">
                    <div class="card bg-base-200 border border-error/30">
                        <div class="card-body">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>