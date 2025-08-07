@extends('welcome')

@section('title', 'Agregar Nuevo Artículo')

@section('content')
<h1>Agregar Nuevo Artículo</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('articles.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" step="0.01" min="0" class="form-control" id="precio" name="precio" value="{{ old('precio') }}" required>
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Categoría</label>
        <select class="form-select" id="category_id" name="category_id" required>
            <option value="">Selecciona una categoría</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="condition_id" class="form-label">Condición</label>
        <select class="form-select" id="condition_id" name="condition_id" required>
            <option value="">Selecciona una condición</option>
            @foreach ($conditions as $condition)
                <option value="{{ $condition->id }}" {{ old('condition_id') == $condition->id ? 'selected' : '' }}>
                    {{ $condition->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('articles.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
