@extends('layouts.app')

@section('content')
<h1>Criar categoria</h1>
<form action="{{route('admin.categories.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label>Nome Loja</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name')  }}">

        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>
    <div class="form-group">
        <label>Descrição</label>
        <input type="text" name="decription" class="form-control @error('decription') is-invalid @enderror" value="{{ old('decription')  }}">
        @error('decription')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div>
        <button type="submit" class="btn btn-success btn-lg">Criar categoria</button>
    </div>
</form>

@endsection
