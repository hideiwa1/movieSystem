<x-app-layout>

    <x-content>

        <x-slot name="subtitle">
            トレーナー追加
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

           

            <!-- Email Address -->
            <div class="row g-0 mb-3 p-sm-3">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="row g-0 mb-3 p-sm-3">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                 autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="row g-0 mb-3 p-sm-3">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                

                <x-button class="row g-0 justify-content-center mb-3">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-content>
</x-app-layout>
