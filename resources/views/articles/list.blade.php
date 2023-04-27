@extends('welcome')

@section('titlehead')
    Listando artículos únicos
@endsection
@section('content')
    <div class="card">
        <!-- Default panel contents -->
        <div class="card-header">Card Heading</div>
        <div class="card-body">
            <p class="card-text">Some default panel content here. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
        </div>

        <!-- Table -->
        <table class="table mb-0">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Content</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->getExcerptAttribute($article->content) }}</td>
                <td>{{ $article->created_at }}</td>
                <td></td>
            </tr>

            @endforeach
            </tbody>
        </table>
    </div>
@endsection

