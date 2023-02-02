@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center" scope="col">ID</th>
                    <th class="text-center" scope="col">Slug</th>
                    <th class="text-center" scope="col">Titolo</th>
                    <th class="text-center" scope="col">Categoria</th>
                    <th class="text-center" scope="col">Tags</th>
                    <th class="text-center" scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr class="p-5">
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->title }}</td>
                        <td> <a href="{{route('admin.categories.show', ['category' => $post->category])}}">{{ $post->category->name }}</a></td>
                        <td>
                            @foreach ($post->tags as $tag)
                            <a href="{{route('admin.tags.show', ['tag' => $tag])}}">{{ $tag->name }}</a>{{ $loop->last ? '' : ', ' }}
                            @endforeach
                        </td>

                       @auth
                        <td class="d-flex justify-content-around">
                            <a href="{{ route('admin.posts.show', ['post' => $post]) }}" class="btn btn-primary">Visita</a>
                            <a href="{{ route('admin.posts.edit', ['post' => $post]) }}" class="btn btn-warning">Edita</a>
                            <button id="delete" class="btn btn-danger" onclick="showPopup()" data-id="{{$post->id}}">Elimina</button>
                            <div class="background">
                                <div class="popup">
                                    <h5 class="w-100 text-center mb-3">Sei sicuro di voler eliminarlo?</h5>
                                    <form action="{{ route('admin.posts.destroy', ['post' => $post]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger">Elimina</button>
                                    </form>
                                    <button class="btn btn-secondary" id="retry" onclick="hidePopup()">Annulla</button>
                                </div>
                            </div>


                        </td>
                       @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $posts->links() }}
    </div>
@endsection
