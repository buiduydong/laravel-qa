@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{$question->title}}</h2>
                    <div class="float-right">
                        <a href="/questions">Back all Questions</a>
                    </div>
                </div>

                <div class="card-body">
                <h4>{{$question->body}}</h4>
                </div>
                <div class="card-footer">
                    <h3>{{$question->answers_count}}</h3>
                    @foreach ($question->answers as $item)
                        <div class="card mb-4 p-3">{{ $item->body }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
