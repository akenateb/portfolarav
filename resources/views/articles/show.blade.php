@extends('welcome')

@section('titlehead')
    Mostrando artículo único
@endsection

@section('content')
    <div class="card">
        <!-- Default panel contents -->
        <div class="card-header">{{ $article->title }}</div>
        <div class="card-body">
            <p class="card-text">{{ $article->content }}</p>
        </div>
        <div class="card-footer">
            <p class="card-text">{{ $article->category->name }}</p>
        </div>
    </div>


@endsection


