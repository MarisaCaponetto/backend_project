@extends('base')
@section('title') Post Edit @endsection
@section('content')
    <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field("PATCH")}}



        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
        </div>
        <div class="form-group has feedback">
            <label class="form-label">Categoría</label>
            <select name="category_id" class="form-selected" required>
                <option value=" ">Selecciona la categoría</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}" selected="{{$post->category_id==$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="image" name="image" value="{{$post->image}}">
        </div>

        <div class="mb-3">
            <label for="summary" class="form-label">Resumen</label>
            <textarea name="summary" id="summary" class="form-control" cols="30" rows="5">{{$post->summary}}</textarea>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{$post->description}}</textarea>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Autor</label>
            <input type="text" class="form-control" id="title" name="author" value="{{$post->author}}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>



    </form>
@endsection
