@extends('layouts.main')

@section('title', 'Quizzes')

@section('content')
<h1>Quizzes Disponíveis</h1>
<ul>
    @foreach ($quizzes as $quiz)
        <li><a href="{{ route('quiz.show', $quiz->id) }}">{{ $quiz->title }}</a></li>
    @endforeach
</ul>
@endsection