@extends('layouts.app')

@section('content')
<a href="{{route('admin.products.create')}}" class="btn btn-sm btn-primary">Criar produto</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Loja</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($product as $p)
        <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->name}}</td>
            <td>R$ {{number_format($p->price, 2, ',', ',')}}</td>
            <td>{{ $p->store->name }}</td>
            <td>
            <div class="btn-group">
                <a href="{{route('admin.products.edit', ['product' => $p->id])}}" class="btn btn-sm btn-warning">Atualizar</a>

                <form action="{{route('admin.products.destroy', ['product' => $p->id])}}" method="post">
                @csrf
                @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </div>
            </td>
            
        </tr>
        @endforeach
    </tbody>
</table>

{{$product->links()}}

@endsection
