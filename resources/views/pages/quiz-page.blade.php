@extends('layouts.front')
@section('title', $title)

@section('content')
    <section id="quiz" class="quiz">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>{{ $title }}</h2>
                <p>{{ $quiz->description }}</p>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="quiz-content">
                        <form action="{{ route('quiz.quiz.submit', ['token' => $quizSession->token]) }}" method="POST">
                            @csrf
                            @foreach ($quiz->questions as $question)
                                <div class="question">
                                    <h3>{{ $question->question }}</h3>
                                    @php
                                        $answers = $question->options;
                                    @endphp
                                    <ul>
                                        @foreach ($answers as $key => $answer)
                                            <li>
                                                <input type="radio" name="answers[{{ $question->id }}]" id="answer-{{ $question->id.'-'.$key }}"
                                                    value="{{ $answer->value }}">
                                                <label for="answer-{{ $question->id.'-'.$key }}">{{ $answer->label }}</label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="quiz-sidebar">
                        <h3>Quiz Information</h3>
                        <ul>
                            <li><strong>Number of Questions:</strong> {{ $quiz->questions->count() }}</li>
                            <li><strong>Estimated Time:</strong> {{ $quiz->minutes ?? '-' }} minutes</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
