@extends('layouts.front')
@section('content')
    {{-- <div class="row">
        <div class="col-4">
            <img src="{{asset('storage/'.$product->photos->first()->image)}}" class="1-img-top img-fluid" alt="...">
            <div class="row">

            </div>
        </div>
        <div class="col-8">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <h3>{{ $product->price }}</h3>
            <span>
                Loja: {{ $product->store->name }}
            </span>
        </div>
    </div> --}}

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
          <div class="col-md-6">
            @if ($product->photos->count())
            <img src="{{asset('storage/'.$product->photos->first()->image)}}" class="card-img" alt="...">
            <div class="row">
                @foreach ($product->photos as $photo )
                <div class="col-6">
                    <img src="{{asset('storage/'.$photo->image)}}" class="img-fluid" alt="...">
                </div>
                @endforeach
            </div>
            @else
                <img src="{{asset('assets/img/no-photo.jpg')}}" class="card-img" alt="...">
            @endif
          </div>
          <div class="col-md-6">
            <div class="card-body">
                <div class="col-md-12">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <h5>R${{number_format($product->price, '2', ',', '.')}}</h5>
                    <span>Loja: {{ $product->store->name }}</span>
                </div>
             <div class="product-add col-md-12">

                <hr>

                 <form action="{{ route('cart.add') }}" method="post">
                    @csrf
                     <input type="hidden" name="product[name]" value="{{ $product->name }}">
                     <input type="hidden" name="product[price]" value="{{ $product->price }}">
                     <input type="hidden" name="product[slug]" value="{{ $product->slug }}">
                     <div class="form-group">
                         <label for="">Quantidade</label>
                         <input type="number" name="product[amount]" class="form-control col-md-4" value="1">
                     </div>
                    <button class="btn btn-lg btn-danger">Comprar</button>
                 </form>
             </div>
            </div>
          </div>
        </div>
      </div>

    <div class="row">
        <div class="col-12">
            <hr>
            {{ $product->body }}
        </div>
    </div>
@endsection