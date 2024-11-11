@extends('layouts.main')
@section('title', 'Cadastro de Pessoas')
@section('pagina', 'Página Inicial')
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
<div class="container">
    <div class="row mt-4">
        <div class="col">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="display-6 text-center" style="color: green;">Bem-Vindo</h3>
            </div>
                <div class="card-body">
                <p>Seja bem-vindo, Nesta página você pode tirar suas dúvidas para o que está vendo na barra de navegação acima de você, o botão login serve
                    para fazer sua entrada no site com seus dados de estudante, e aqui está uma breve descrição sobre o que você vai encontrar no site:
                    <br>
                    <br>
                    Um site dedicado a apoiar educadores, no processo de alfabetização de crianças. Com uma abordagem prática e acessível, o site oferece dicas, recursos e estratégias
                    para facilitar o aprendizado da leitura e escrita, desde os primeiros passos até o domínio completo da língua.
                </p>
                </div>

<br>
@endsection