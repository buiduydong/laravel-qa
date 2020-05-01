@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Questions
                    <div class="float-right">
                        <a href="/questions/create">Question</a>
                    </div>
                </div>

                <div class="card-body">
                    @foreach($questions as $question)
                        <div class="media">
                            <div class="media-body mb-5">
                                <div class="float-right">
                                    @if (Auth::user()&&Auth::user()->can('updateAndDelete-question', $question))
                                        <a href="/questions/{{$question->id}}/edit"><button class="btn btn-outline-warning btn-sm">edit</button></a>
                                    
                                    <form class="formDelete" action="/questions/{{$question->id}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="confirm('Are you sure?')">Delete</button>
                                    </form>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="float-left col-md-1">
                                        <div class="vote">
                                            <span>{{ $question->votes }}</span> {{Str::plural('vote', $question->votes)}}
                                        </div>
                                        <div class="status ">
                                            <span>{{ $question->views }} </span> {{Str::plural('view', $question->views)}}
                                        </div>
                                        <div class="answer {{ $question->status }}">
                                            <span>{{ $question->answers_count }}</span> {{Str::plural('answer', $question->answers_count)}}
                                        </div>
                                    </div>
                                    <div class="float-left col-md-9">
                                        <a href="{{$question->url}}"><h3 class="mt-0">{{ $question->title }}</h3></a>
                                        <h4>Asked by: {{ $question->user->name }}</h4><p>{{ $question->create_date }}</p>
                                        {{ Str::limit($question->body,100) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $questions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
