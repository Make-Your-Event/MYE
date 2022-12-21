@extends('layouts.login')
@section('title','login')
@section('content')
<x-guest-layout>
    <div class="login-card" >
        <x-slot name="logo">
            <img src="/img/logo.png" alt="logo" class="myelogo">
        </x-slot>
        <div class="login-title-container">
            <h1>MYE</h1>
        </div>
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
                <input id="email" class="form-control" type="email" name="email" :value="" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Senha') }}" />
                <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4 hidden">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 hidden" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button type="submit"  class="btn btn-primary">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
@endsection
