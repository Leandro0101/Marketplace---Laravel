@extends('layouts.app')

@section('content')
    <h1>Atualizar categoria</h1>
   <form action="{{route('admin.categories.update', ['category' => $category->id])}}" method="post">
    @csrf
    @method('put')
    
    <div class="form-group">
        <label>Nome da categoria</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"value="{{$category->name}}">

    @error('name')
        <div class="invalid-feedback">
        {{ $message }}
        </div>
    @enderror

    </div>
    <div class="form-group">
        <label>Descrição</label>
        <input type="text" name="decription" class="form-control @error('decription') is-invalid @enderror" value="{{$category->decription}}">
        @error('decription')
        <div class="invalid-feedback">
        {{ $message }}
        </div>
    @enderror
    </div>

    <div>
        <button type="submit" class="btn btn-success btn-lg">Atualizar categoria</button>
    </div>
</form>


@endsection