@extends('welcome')

@section('titlehead')
{{ $titlehead }}
@endsection

@section('content')
    @if($errors->any())
        <div class="bg-red-500 text-white p-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ $action }}">
        @csrf
        @if($article->id) @method("PUT") @endif
        <div class="container px-5 py-24 mx-auto flex">
            <div class="bg-gray-900 shadow-md rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10">
                <h2 class="text-white text-lg mb-1 font-medium title-font">{{ __($titlehead) }}</h2>

                <div class="relative mb-4">
                    <label for="content" class="leading-7 text-sm text-gray-400">{{ __("Title") }}</label>
                    <input type="text" id="title" name="title" class="w-full bg-gray-800 rounded border border-gray-700 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="{{ old("title", $article->title) }}">
                </div>
                <div class="relative mb-4">
                    <label for="category" class="leading-7 text-sm text-gray-400">{{ __("Category") }}</label>
                    <select id="category_id" name="category_id" class="w-full bg-gray-800 rounded border border-gray-700 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-900 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @foreach(\App\Models\Category::get() as $category)
                            <option {{ old("category_id", $article->category_id) == $category->id ? 'selected': ''}} value="{{ $category->id }}">{{ $category->name }}</option>

                        @endforeach
                    </select>
                </div>
                <div class="relative mb-4">
                    <label for="content" class="leading-7 text-sm text-gray-400">{{ __("Content") }}</label>
                    <textarea id="content" name="content" class="w-full bg-gray-800 rounded border border-gray-700 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-900 h-32 text-base outline-none text-gray-100 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"  >{{ old("content", $article->content) }}</textarea>
                </div>
                <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                    {{ __("Enviar") }}</button>

            </div>
        </div>
    </form>
@endsection
