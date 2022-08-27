@extends('layout')

@section('title', 'Login')

@section('cssLink')
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
@endsection

@php
$styles = [
    'container' => 'w-screen h-screen flex font-["Poppins"]',
    'login' => 'lg:w-6/12 flex justify-center content-center w-full ',
    'form' => 'lg:w-8/12 md:w-10/12 h-3/6 mt-[10vw] bg-white rounded px-12 pt-6 pb-8 mb-4 w-full',
    'label' => 'block text-sm font-normal mb-2 text-lg font-semibold',
    'input' => 'block p-4 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-50 border-none bg-gray-100 font-medium',
    'submitBtn' => 'px-4 py-2 rounded text-white inline-block shadow-lg bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 w-[100%] bg-[#4b7cc3] font-semibold',
    'hero-bg' => 'lg:w-6/12 bg-cover bg-center rounded-l-sm drop-shadow-2xl',
    'errorMessage' => 'text-red-500 italic text-sm p-2',
    'errorMessageNoti' => 'flex p-4 mt-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800',
    'errorInfoIcon' => 'flex-shrink-0 inline w-5 h-5 mr-3',
];
@endphp

@section('body')
    <!-- component -->
    <div class="{{ $styles['container'] }}">
        <div class="{{ $styles['login'] }}">
            <form action="{{ route('checkLogin', App::getLocale()) }}" class="{{ $styles['form'] }}" method="POST">
                @csrf
                <div class="text-gray-800 text-3xl flex justify-center py-2 mb-4 font-semibold">
                    {{ __('message.login') }}

                </div>
                <div class="mb-4">
                    <label class="{{ $styles['label'] }}" for="username">
                        {{ __('message.email') }}
                    </label>
                    <input class="{{ $styles['input'] }}" name="email" v-model="form.email" type="text" autofocus
                        placeholder="Email" value="{{ old('email') }}" />
                    @error('email')
                        <p class="{{ $styles['errorMessage'] }}">{{ $message }}</p>
                    @enderror


                </div>
                <div class="mb-6">
                    <label class="{{ $styles['label'] }}" for="password">
                        {{ __('message.password') }}

                    </label>
                    <input class="{{ $styles['input'] }}" v-model="form.password" type="password" placeholder="Password"
                        name="password" required autocomplete="current-password" />
                    @error('password')
                        @if ($message == 'incorrect user')
                            <div class="{{ $styles['errorMessageNoti'] }}" role="alert">
                                <svg aria-hidden="true" class="{{ $styles['errorInfoIcon'] }}" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">Warning</span> Email or password is wrong
                                </div>
                            </div>
                        @else
                            <p class="{{ $styles['errorMessage'] }}">{{ $message }}</p>
                        @endif
                    @enderror
                </div>
                <div class="flex items-center justify-between mb-4">
                    <button class="{{ $styles['submitBtn'] }}" type="submit">{{ __('message.login_now') }}</button>
                </div>
                <p class="text-center text-gray-500 text-xs">
                    &copy;2020 Gau Corp. All rights reserved.
                </p>
            </form>

        </div>
        <div class="lg:bg-[url({{ asset('/image/login.webp') }})] {{ $styles['hero-bg'] }}">

            <img src="" alt="">
        </div>
    </div>
@endsection
