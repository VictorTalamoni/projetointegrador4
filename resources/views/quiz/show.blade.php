@extends('layouts.main')

@section('title', $quiz->title)

@section('content')
<h1>{{ $quiz->title }}</h1>
<p>{{ $quiz->description }}</p>

<form action="{{ route('quiz.submit', $quiz->id) }}" method="POST">
    @csrf
    @foreach ($questions as $question)
        <div>
            <p>{{ $question->question }}</p>
            @foreach (['option1', 'option2', 'option3', 'option4'] as $option)
                @if ($question->$option)
                    <label>
                        <input type="radio" name="answer_{{ $question->id }}" value="{{ $question->$option }}">
                        {{ $question->$option }}
                    </label><br>
                @endif
            @endforeach
        </div>
    @endforeach
    <button type="submit" class="btn btn-success">Enviar Respostas</button>
</form>
@endsection
