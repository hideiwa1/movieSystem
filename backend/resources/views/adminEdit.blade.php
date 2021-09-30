<x-app-layout>
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('admin.list') }}">管理者アカウント一覧</a></li>
        <li class="breadcrumb-item active" aria-current="page">管理者アカウント　編集</li>
    </x-breadcrumb>

<x-content>
<x-slot name="subtitle">
            <h2 class="col-lg-8 mb-0">管理者アカウント作成</h2>
        </x-slot>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
        {{session('message') ?? ''}}

        <form method="POST" action="{{ route('admin.edit', ['id' => $admin_data -> id]) }}">
            @csrf

            <!-- Name -->
            <div class="row g-0 align-items-center p-2">
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$admin_data -> name ?? old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div  class="row g-0 align-items-center p-2">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$admin_data -> email ?? old('email')" required />
            </div>

            <!-- currentPassword -->
            <div  class="row g-0 align-items-center p-2">
                <x-label for="current_password" :value="__('現在のパスワード')" />

                <x-input id="current_password" class="block mt-1 w-full"
                                type="password"
                                name="current_password" />
            </div>

            <!-- Password -->
            <div  class="row g-0 align-items-center p-2">
                <x-label for="password" :value="__('新しいパスワード')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="row g-0 align-items-center p-2">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('更新する') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-content>
</x-app-layout>
