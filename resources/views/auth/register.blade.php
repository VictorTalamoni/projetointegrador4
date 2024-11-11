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
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="container p-3 col-sm-5 justify-content-center rounded" style="background-color: rgb(242, 253, 245);">
            <!-- Nome -->
            <div>
                <x-input-label for="name" :value="__('Nome')" />
                <x-text-input id="name" class="block mt-1 w-full" placeholder="Insira seu nome" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" placeholder="Insira seu email" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Senha -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Senha')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Insira sua senha" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirmar Senha -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Texto Longo (Descrição) -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Descrição')" />
                <textarea id="description" name="description" class="form-control block mt-1 w-full" rows="10" placeholder="Escreva sua descrição aqui (até 50 linhas ou mais)...">{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <!-- Botão Registrar -->
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Já Registrado?') }}
                </a>

                <x-primary-button class="btn btn-success">
                    {{ __('Registrar') }}
                </x-primary-button>
            </div>
        </div>
    </form>
@endsection
