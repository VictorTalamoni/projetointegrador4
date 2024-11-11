@extends('layouts.main')
@section('title', 'Cadastro de Pessoas')
@section('pagina', 'Cadastro de pessoas')
@section('nav1')
@if (Route::has('login'))
    @auth
        <a href="{{ url('/dashboard') }}">
            Página do Professor
        </a>
    @else
        <a href="{{ route('login') }}">
            Log in
        </a>
    @endauth
@endif
@stop
@section('nav2')
@stop
@section('styledobody')
background-color: rgb(169, 250, 191);
@stop


@section('content')
    <!-- Session Status -->
    <div class="container p-3 col-sm-5 justify-content-center rounded" style="background-color: rgb(242, 253, 245);">

    <form method="POST" action="{{ route('login') }}">
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

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="btn btn-success">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    @endsection

