@extends('layouts.app')

@section('content')
@if(!$store)
<a href="{{route('admin.stores.create')}}" class="btn btn-sm btn-primary">Criar Loja</a>
@else


<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Loja</th>
            <th>Total de produtos</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        {{-- @foreach($store as $store) --}}
        <tr>
            <td>{{$store->id}}</td>
            <td>{{$store->name}}</td>
            <td>{{$store->products->count()}}</td>
            <td>
                <div class="btn-group">
                    <a href="{{route('admin.stores.edit', ['store' => $store->id])}}" class="btn btn-sm btn-warning">Atualizar</a>
                    <form action="{{route('admin.stores.destroy', ['store' => $store->id])}}" method="post">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>

            </td>

        </tr>
        {{-- @endforeach --}}
    </tbody>
</table>
@endif

{{-- {{$stores->links()}} --}}

@endsection
