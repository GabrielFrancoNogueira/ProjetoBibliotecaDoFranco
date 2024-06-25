
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Painel de Controle</h1>
    <p>Bem-vindo ao seu painel de controle!</p>
    <a href="{{ route('books.index') }}" class="btn btn-primary">Gerenciar Livros</a>
</div>
@endsection
