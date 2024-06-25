@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/edit-book.css') }}">

<div class="container">
    <h1>Editar Livro</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="author" class="form-label">Autor</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="subtitle" class="form-label">Subtítulo</label>
            <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $book->subtitle }}"  required>
        </div>
        <div class="form-group mb-3">
            <label for="edition" class="form-label">Edição</label>
            <input type="text" class="form-control" id="edition" name="edition" value="{{ $book->edition }}"  required>
        </div>
        <div class="form-group mb-3">
            <label for="publisher" class="form-label">Editora</label>
            <input type="text" class="form-control" id="publisher" name="publisher" value="{{ $book->publisher }}"  required>
        </div>
        <div class="form-group mb-3">
            <label for="publication_year" class="form-label">Ano de Publicação</label>
            <input type="number" class="form-control" id="publication_year" name="publication_year" value="{{ $book->publication_year }}" min="1500" max="{{ date('Y') + 1 }}"  required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
