@extends('welcome')

@section('title', 'Listado de Artículos')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Artículos</h1>
    <a href="{{ route('articles.create') }}" class="btn btn-primary">Agregar nuevo artículo</a>
</div>

<form action="{{ route('articles.index') }}" method="GET" class="row g-3 mb-4">
    <div class="col-md-4">
        <label for="category_id" class="form-label">Categoría</label>
        <select name="category_id" id="category_id" class="form-select">
            <option value="">-- Todas --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <label for="condition_id" class="form-label">Estado</label>
        <select name="condition_id" id="condition_id" class="form-select">
            <option value="">-- Todos --</option>
            @foreach($conditions as $condition)
                <option value="{{ $condition->id }}" {{ request('condition_id') == $condition->id ? 'selected' : '' }}>
                    {{ $condition->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4 d-flex align-items-end">
        <button type="submit" class="btn btn-primary me-2">Filtrar</button>
        <a href="{{ route('articles.index') }}" class="btn btn-secondary">Limpiar</a>
    </div>
</form>


<!-- Aquí tu tabla de artículos -->
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Título</th>
            <th>Descripción</th>
            <th>Categoría</th>
            <th>Condición</th>
            <th>Precio</th>
            <th>Acciones</th> <!-- Nueva columna -->
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
            <tr>
                <td>{{ $article->titulo }}</td>
                <td>{{ $article->descripcion }}</td>
                <td>{{ $article->category->name }}</td>
                <td>{{ $article->condition->name }}</td>
                <td>${{ number_format($article->precio, 2) }}</td>
                <td>
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este artículo?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>

@endsection
