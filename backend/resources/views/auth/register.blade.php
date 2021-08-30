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

            

            <div class="flex items-center justify-end mt-4">
                

                <x-button class="row g-0 justify-content-center mb-3">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-content>
</x-app-layout>
