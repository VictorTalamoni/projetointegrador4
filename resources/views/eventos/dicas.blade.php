@extends('layouts.main')

@section('title', 'Dicas')
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

<div class="container">
    <div class="row mt-4">
        <div class="col">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="display-6 text-center" style="color: green;">Dicas</h3>
            </div>
                <div class="card-body">
                <p>Seja bem-vindo aluno(a): {{ auth()->user()->name }}, Nesta página você pode ver alguns aplicativos que te ajudam na alfabetização:
</br>
</br>
                1. Kahoot!
                </br>
                Descrição:
                O Kahoot! é uma plataforma de quiz online muito popular que permite aos professores criar questionários interativos, pesquisas e discussões para os alunos. Ele torna o aprendizado 
                divertido e engajante, transformando a sala de aula em uma competição amigável. Os alunos podem participar de quizzes ao vivo usando seus próprios dispositivos, o que aumenta o 
                engajamento.
</br>
</br>
                2. Google Classroom
                </br>
                Descrição:
                O Google Classroom é uma plataforma educacional desenvolvida pelo Google, que facilita a criação, distribuição e correção de tarefas. Ele permite que professores e alunos se 
                comuniquem facilmente, compartilhem materiais e colaborem em tempo real.
</br>
</br>
                3. Padlet
                </br>
                Descrição:
                O Padlet é uma plataforma colaborativa que permite a criação de murais digitais onde os alunos podem compartilhar ideias, responder a perguntas, postar links, imagens, vídeos e 
                muito mais. É uma ferramenta bastante útil para discussões em grupo ou brainstorming.
</br>
</br>
                4. Edmodo
                </br>
                Descrição:  
                O Edmodo é uma plataforma de aprendizado social que conecta alunos e professores. Oferece um ambiente seguro e interativo onde os professores podem compartilhar tarefas, 
                perguntas e até quizzes com os alunos. Ele também permite comunicação via mensagens privadas e publicações de grupo.
<br>
<br>
                5. Quizizz
<br>
                Descrição:
                O Quizizz é uma plataforma de quiz online onde os professores podem criar quizzes personalizados ou usar quizzes prontos. Os alunos respondem aos quizzes em tempo real e 
                recebem feedback imediato. Também permite o modo de jogo para tornar a experiência mais divertida.
                </p>
                </div>
@endsection