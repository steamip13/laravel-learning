@extends('layouts.app')

@section('content')
    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                </a>
            </x-slot>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input id="name" class="block mt-1 w-full" placeholder="Name" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input id="email" class="block mt-1 w-full" type="email" placeholder="Email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    placeholder="Password"
                                    required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    placeholder="Confirm Password"
                                    name="password_confirmation" required />
                </div>
                <div>
                    <input type="hidden" name="admin" value="0">
                    <input type="checkbox" id="admin" name="admin" value="1">
                    <label for="admin">Admin</label>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Register') }}
                    </x-button>

                    <a class="underline text-sm text-gray-600 forgot-password hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>
@endsection
