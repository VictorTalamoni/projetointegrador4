@extends('layouts.main')

@section('title', 'Criar Quiz')

@section('content')
<h1>Criar Novo Quiz</h1>

<form action="{{ route('quiz.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Título do Quiz:</label>
        <input type="text" id="title" name="title" required>
    </div>
    <div>
        <label for="description">Descrição (opcional):</label>
        <textarea id="description" name="description"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Criar Quiz</button>
</form>
@endsection
