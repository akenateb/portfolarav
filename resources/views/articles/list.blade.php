@extends('welcome')

@section('css')
    <!-- Bootstrap Data Table Plugin -->
    <link rel="stylesheet" href="css/components/bs-datatable.css" type="text/css" />
@endsection

@section('titlehead')
    Listando artículos únicos
@endsection

@section('content')

    <div class="table-responsive">
        <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Content</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Content</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td><a href="{{ route('articles.show',["article"=>$article]) }}">{{ $article->title }}</a></td>
                    <td>{{ $article->getExcerptAttribute($article->content) }}</td>
                    <td>{{ $article->created_at }}</td>
                    <td><a href="{{ route('articles.edit',["article"=>$article]) }}" class="btn btn-sm btn-warning">{{__('Editar')}}</a>
                        <form method="post" action="{{ route('articles.destroy', ["article"=>$article]) }}">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-sm btn-danger" name="delete">{{ __("Delete") }}</button>
                        </form></td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('js')
    <!-- Bootstrap Data Table Plugin -->
    <script src="js/components/bs-datatable.js"></script>
    <script>

        $(document).ready(function() {
            $('#datatable1').dataTable();
        });

    </script>
@endsection

