@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Minha Coleção de Livros</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Adicionar Novo Livro</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Autor</th>
                <th>Título</th>
                <th>Subtítulo</th>
                <th>Edição</th>
                <th>Editora</th>
                <th>Ano de Publicação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->subtitle }}</td>
                    <td>{{ $book->edition }}</td>
                    <td>{{ $book->publisher }}</td>
                    <td>{{ $book->publication_year }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Ações">
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="pagination">
        {{ $books->links() }}
    </div>
</div>
@endsection
