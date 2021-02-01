@extends('base')
@section('title') Post Create @endsection
@section('content')
<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="mb-3">
        <label for="title" class="form-label">Titulo</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group has-feedback">
        <label class="form-label">Categoria</label>
        <select name="category_id" class="form-select" required>
            <option value="">Seleccione la Categoria</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" >{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Imagen</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <div class="mb-3">
        <label for="summary" class="form-label">Resumen</label>
        <textarea name="summary" id="summary" class="form-control" cols="30" rows="5"></textarea>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">descripción</label>
        <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Autor</label>
        <input type="text" class="form-control" id="title" name="author">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
