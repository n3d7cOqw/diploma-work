@extends('layouts.main-layout')
@section('title')
    Головна
@endsection
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-8 flex flex-col lg:flex-row gap-8">
        <!-- Ліве бокове меню -->
        <aside class="bg-white shadow rounded-lg w-full lg:w-1/4 p-4">
            <h2 class="text-xl font-semibold mb-4">Меню</h2>
            <ul class="space-y-3">
                <li>
                    <a href="#" class="block text-blue-600 hover:text-blue-800 font-medium">📄 Загальна інформація</a>
                </li>
                <li>
                    <a href="#" class="block text-blue-600 hover:text-blue-800 font-medium">📚 Мої курси</a>
                </li>
                <li>
                    <a href="#" class="block text-blue-600 hover:text-blue-800 font-medium">🗓️ Розклад занять</a>
                </li>
                <li>
                    <a href="#" class="block text-blue-600 hover:text-blue-800 font-medium">🔒 Зміна пароля</a>
                </li>
                <li>
                    <a href="#" class="block text-blue-600 hover:text-blue-800 font-medium">⚙️ Налаштування профілю</a>
                </li>
            </ul>
        </aside>

        <!-- Основний контент -->
        <main class="bg-white shadow rounded-lg w-full lg:w-3/4 p-6">
            <h2 class="text-2xl font-semibold mb-4">Налаштування профілю</h2>



                <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                    @csrf
                    @method('patch')

                    <!-- Поле Ім'я -->
                    <div>
                        <label for="name" class="block text-gray-700 font-medium mb-1">{{ __('Name') }}</label>
                        <input type="text" id="name" name="name" class="block w-full p-2 border border-gray-300 rounded focus:ring focus:ring-blue-200"
                               value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Поле Email -->
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-1">{{ __('Email') }}</label>
                        <input type="email" id="email" name="email" class="block w-full p-2 border border-gray-300 rounded focus:ring focus:ring-blue-200"
                               value="{{ old('email', $user->email) }}" required autocomplete="username" />
                        @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <!-- Перевірка Email -->
                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div class="mt-2">
                                <p class="text-sm text-gray-800">
                                    {{ __('Your email address is unverified.') }}
                                    <button form="send-verification" class="text-blue-600 hover:underline focus:outline-none">
                                        {{ __('Click here to re-send the verification email.') }}
                                    </button>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-1 text-sm text-green-600">
                                        {{ __('A new verification link has been sent to your email address.') }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <!-- Кнопки -->
                    <div class="flex items-center gap-4">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 focus:ring focus:ring-blue-200">
                            {{ __('Save') }}
                        </button>

                        @if (session('status') === 'profile-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-green-600"
                            >{{ __('Saved.') }}</p>
                        @endif
                    </div>
                </form>
        </main>
    </div>

@endsection





