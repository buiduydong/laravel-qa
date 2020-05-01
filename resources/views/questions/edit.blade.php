@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Questions
                    <div class="float-right">
                        <a href="/questions">Back all Questions</a>
                    </div>
                </div>

                <div class="card-body">
                <form method="post" action="/questions/{{$question->id}}" class="needs-validation">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" value="{{old('title',$question->title)}}" placeholder="Title" name="title">
                        <small id="emailHelp" class="form-text text-muted">
                        {{showErrs($errors,"title")}}
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="body">Question</label>
                        <textarea class="form-control" id="body" rows="3" name="body">{{old('body',$question->body)}}</textarea>
                        <small id="emailHelp" class="form-text text-muted">
                        <p class="</p>">{{showErrs($errors,"body")}}</p>
                        </small>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Edit this question</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
