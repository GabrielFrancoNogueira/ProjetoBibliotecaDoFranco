@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/create-book.css') }}">

<div class="container">
    <h1>Adicione Um Novo Livro Aqui</h1>
    
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="author" class="form-label">Autor</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>
        
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        
        <div class="mb-3">
            <label for="subtitle" class="form-label">Subtítulo</label>
            <input type="text" class="form-control" id="subtitle" name="subtitle" required>
        </div>
        
        <div class="mb-3">
            <label for="edition" class="form-label">Edição</label>
            <input type="text" class="form-control" id="edition" name="edition" required>
        </div>
        
        <div class="mb-3">
            <label for="publisher" class="form-label">Editora</label>
            <input type="text" class="form-control" id="publisher" name="publisher" required>
        </div>
        
        <div class="mb-3">
            <label for="publication_year" class="form-label">Ano de Publicação</label>
            <input type="number" class="form-control" id="publication_year" name="publication_year" min="1500" max="{{ date('Y') + 1 }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
