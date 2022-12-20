@extends('layouts.login')
@section('title','login')
@section('content')
<x-guest-layout style="background-color: #9F63F2">
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="/img/logo.png" alt="logo" class="myelogo">
        </x-slot>

        <x-jet-validation-errors class="mb-4 hidden" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Senha') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4 hidden">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 hidden" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button type="submit"  style="
                background-color: var(--mye-color-6);
                border: 1px solid var(--mye-color-6);
                ">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
@endsection
