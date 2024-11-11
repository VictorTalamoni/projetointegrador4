@extends('layouts.main')

@section('title', 'Dashboard')
@section('pagina', 'Página Inicial')

@section('nav1')
    @if (Route::has('login'))
        @auth
            @if (auth()->user()->id == 2)
                <a href="{{ route('register') }}">Cadastrar Aluno |</a>
                <a href="/eventos/perfil/{{ auth()->user()->id }}">Visualizar Perfil |</a>
                <a href="/eventos/dicas">Dicas |</a> <!-- Link para a página de dicas -->
            @elseif (auth()->user()->id > 2)
                <a href="/eventos/perfil/{{ auth()->user()->id }}">Visualizar Perfil |</a>
                <a href="/eventos/dicas">Dicas |</a> <!-- Link para a página de dicas -->
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

@section('styledbody')
    background-color: rgb(169, 250, 191);
@stop

@section('content')
    @if (Route::has('login'))
        @auth
            @if (auth()->user()->id == 2)
            <div class="container">
    <div class="row mt-4">
        <div class="col">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="display-6 text-center" style="color: green;">Alunos Cadastrados</h3>
                    @if(session('msg'))
                        <div class="alert alert-success" role="alert">
                            <center><p>{{ session('msg') }}</p></center>
                        </div>
                    @endif
                    <form action="{{ route('dashboard') }}" method="GET" class="text-center">
                    <input type="text" id="search" name="search" class="form-control" placeholder="Procure pelo nome aqui" value="{{ old('search', $search ?? '') }}">
                    <button type="submit" class="btn btn-primary mt-2">Pesquisar</button>
                    @if(isset($search) && $search != '')
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-2">Limpar Pesquisa</a>
                    @endif
                    </form>
                    @isset($search)
                        <p class="text-center">Buscando pelo nome: {{ $search }}</p>
                    @endisset
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <tr class="table-success">
                                <td>Nome</td>
                                <td>Email</td>
                                <td>Editar</td>
                                <td>Perfil</td>
                                <td>Apagar</td>
                            </tr>
                            @if(isset($users))
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><a href="/eventos/editar/{{ $user->id }}" class="btn btn-success">Editar</a></td>
                                        <td><a href="/eventos/perfil/{{ $user->id }}" class="btn btn-info">Visualizar</a></td>
                                        <td>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar este usuário?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Deletar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                        <div class="pagination d-flex justify-content-center">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif (auth()->user()->id > 2)
            <div class="container">
    <div class="row mt-4">
        <div class="col">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="display-6 text-center" style="color: green;">Bem-Vindo</h3>
            </div>
                <div class="card-body">
                <p>Seja bem-vindo aluno(a): {{ auth()->user()->name }}, Nesta página você pode tirar suas dúvidas para o que está vendo na barra de navegação acima de você, o botão perfil serve
                    para visitar seu perfil, o de logout serve para sair da sua conta, e o botão dicas serve para ver quais aplicativos são bons para melhorar sua alfabetização.
                </p>
                </div>
            @endif
        @endauth
    @endif
@stop
