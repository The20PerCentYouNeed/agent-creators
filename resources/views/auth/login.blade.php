@extends('layouts.app', ['footer' => false, 'header' => false])

@section('content')
    <div class="w-full min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <x-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <div x-data="{ showEmail: {{ ($errors->any() || old('name') || old('email')) ? 'true' : 'false' }} }">
                <!-- Providers / Email chooser -->
                <div x-show="!showEmail" x-cloak class="space-y-3">
                    <a href="{{ url('/auth/google/redirect') }}"
                    class="w-full inline-flex items-center justify-center gap-2 rounded-lg px-4 py-3 bg-white border border-gray-300 text-gray-700 hover:bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="h-5 w-5"><path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12S17.373,12,24,12 c3.059,0,5.842,1.153,7.961,3.039l5.657-5.657C34.756,6.053,29.652,4,24,4C12.955,4,4,12.955,4,24s8.955,20,20,20 c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"/><path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,16.087,18.961,12,24,12c3.059,0,5.842,1.153,7.961,3.039l5.657-5.657 C34.756,6.053,29.652,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"/><path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.197l-6.19-5.238C29.211,35.091,26.715,36,24,36 c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.026C9.505,39.556,16.227,44,24,44z"/><path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-3.995,5.565 c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.97,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"/></svg>
                        <span>{{ __('Continue with Google') }}</span>
                    </a>

                    <button type="button"
                            @click="showEmail = true"
                            class="w-full inline-flex items-center justify-center rounded-lg px-4 py-3 bg-black text-white hover:bg-gray-800">
                        {{ __('Continue with Email') }}
                    </button>

                    <div class="flex items-center gap-3 py-2">
                        <div class="flex-1 h-px bg-gray-200"></div>
                        <span class="text-xs text-gray-400 font-medium">{{ __('OR') }}</span>
                        <div class="flex-1 h-px bg-gray-200"></div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <a href="{{ url('/auth/apple/redirect') }}"
                        class="w-full inline-flex items-center justify-center gap-2 rounded-lg px-4 py-3 bg-white border border-gray-300 text-gray-700 hover:bg-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M16.365 1.43c.046.332.062.668.048 1.005a3.76 3.76 0 01-.71 1.92 3.894 3.894 0 01-1.7 1.32 4.09 4.09 0 01-.98.201 3.944 3.944 0 01.08-1.004 3.884 3.884 0 01.79-1.76 4.14 4.14 0 011.691-1.24 3.99 3.99 0 011.781-.442c-.001 0-.001 0 0 0z"/><path d="M20.25 17.23c-.37.85-.81 1.64-1.33 2.38-.7 1.006-1.27 1.7-1.71 2.08-.65.6-1.35.91-2.1.94-.54 0-1.19-.15-1.97-.45-.78-.3-1.5-.45-2.17-.45-.69 0-1.43.15-2.23.45-.8.3-1.43.46-1.9.47-.73.03-1.45-.27-2.15-.91-.46-.4-1.06-1.1-1.82-2.12A15.2 15.2 0 011.5 14.5c-.51-1.37-.76-2.68-.76-3.93 0-1.45.32-2.71.96-3.8a6.26 6.26 0 012.51-2.45A6.57 6.57 0 016.86 3c.58 0 1.34.17 2.28.5.93.33 1.53.5 1.79.5.2 0 .84-.2 1.94-.6A5.6 5.6 0 0115.1 3c1.3.11 2.4.51 3.28 1.2-1.31 1.61-1.96 3.23-1.94 4.87.02 2 1.01 3.62 2.86 4.87-.28.74-.6 1.43-.95 2.09z"/></svg>
                            <span>{{ __('Apple') }}</span>
                        </a>
                        <a href="{{ url('/auth/facebook/redirect') }}"
                        class="w-full inline-flex items-center justify-center gap-2 rounded-lg px-4 py-3 bg-white border border-gray-300 text-gray-700 hover:bg-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5" fill="#1877F2"><path d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.093 10.125 24v-8.437H7.078V12.07h3.047V9.412c0-3.007 1.792-4.668 4.533-4.668 1.312 0 2.686.235 2.686.235v2.953h-1.513c-1.49 0-1.953.93-1.953 1.887v2.25h3.328l-.532 3.492h-2.796V24C19.612 23.093 24 18.1 24 12.073z"/></svg>
                            <span>{{ __('Facebook') }}</span>
                        </a>
                    </div>
                </div>

                <!-- Email/password form -->
                <form x-show="showEmail" x-cloak method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <button type="button" @click="showEmail = false" class="text-sm text-gray-600 hover:text-gray-900">
                        {{ __('Back') }}
                    </button>
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
