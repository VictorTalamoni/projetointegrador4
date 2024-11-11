@extends('layouts.main')

@section('title', 'Dashboard')
@section('pagina')
    <a href="{{ url('/dashboard') }}">Página Inicial</a>
@stop

@section('nav1')
    @if (Route::has('login'))
        @auth
            @if (auth()->user()->id == 2)
                <a href="{{ route('register') }}">Cadastrar Novo Aluno |</a>
            @elseif (auth()->user()->id > 2)
            <a href="/eventos/perfil/{{ auth()->user()->id }}">Visualizar Perfil |</a>
            @endif

            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}">Log in</a>
        @endauth
    @endif
@stop

@section('content')

<div class="container-md p-5" style="margin-top: 50px;">
    <div class="row">
        <div class="rounded col-lg-4 height:100% bg-success text-white text-center py-4">
            <div class="header-left">
                <img src="/img/pessoas/{{$user->imagem}}" width="70%" height="80%" alt="{{$user->id}}" class="img-thumbnail rounded-circle mb-2">
                <h1 class="display-6"> {{$user->name}} </h1>
            </div>
        </div>
        <div class="col-lg-8 rounded text-dark text-center py-4 px-5" style="background-color: rgb(242, 253, 245);">
            <div class="header-right"> 
                <p> {{$user->name}} </p>
                <hr>
                <p> Email {{$user->email}} </p>
                <hr>
                <p style="vertical-align: bottom">Observação</p>
                @if (!empty($user->description))
                    <a> {{$user->description}} </a>
                @else
                    <p>Nenhuma observação para o aluno.</p>
                @endif
            </div>
        </div>
    </div>
</div>


@endsection
