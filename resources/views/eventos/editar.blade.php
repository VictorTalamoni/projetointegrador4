@extends('layouts.main')
@section('title', $user->name)
@section('pagina', 'Editar Pessoas')
@section('nav1')
    <a href="{{ url('/dashboard') }}">Página Inicial</a>
@stop
@section('nav2')

@stop
@section('styledobody')
background-color: rgb(169, 250, 191);
@stop

@section('content')

<br>
<div class="container p-5 col-sm-8 justify-content-center rounded" style="background-color: rgb(242, 253, 245);">
    <form method="POST" action="/eventos/update/{{$user->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <center><h1 style="color: green;">Edição de Pessoas</h1></center>
    <hr>

    <div class="mb-3">
    <label for="nome" class="form-label"><strong>Nome: </strong></label>
    <input type="text" name="name" class="form-control" value="{{ $user->name }}" id="nome" required>
    </div>

    <div class="mb-3">
    <label for="number" class="form-label"><strong>Email </strong></label>
    <input type="email" name="email" class="form-control" value="{{ $user->email }}" id="number" required>
    </div>

    <label for="foto" class="form-label"><strong>Insira uma foto: </strong></label>
    <input type="file" class="form-control" name="foto" id="foto" title="Insira uma foto">

    <!-- Novo campo de descrição -->
    <div class="mt-4">
        <label for="description" class="form-label"><strong>Descrição: </strong></label>
        <textarea id="description" name="description" class="form-control block mt-1 w-full" rows="10" placeholder="Escreva sua descrição aqui (até 50 linhas ou mais)...">{{ old('description', $user->description) }}</textarea>
    </div>
</br>
    
    <center>
        <img width="35%" height="175px" src="/img/pessoas/{{$user->imagem}}" alt="foto" class="rounded-circle border border-success shadow-lg">
    </center>

    

    <hr>
    <div class="text-center">
        <div class="d-grid gap-2 col-2 btn-lg mx-auto">
            <input class="btn btn-success" type="submit" name="submit" value="Enviar">
            @if($errors->has('id'))
            <div class="alert alert-danger">
                <center>{{ $errors->first('id') }}</center>
            </div>
            @endif
            @if(session('msg'))
            <div class="alert alert-success" role="alert">
                <center><p>{{session('msg')}}</p></center>
            </div>
            @endif
        </div>
    </div>
    </form>
</div>

@endsection
