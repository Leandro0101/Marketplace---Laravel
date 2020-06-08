<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Marketplace</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom:40px;">
        <a class="navbar-brand" href="{{route('home')}}">marketplace</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @auth


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                {{-- <li class="nav-item @if(request()->is('admin/stores*'))  active @endif">
                    <a class="nav-link" href="{{route('admin.stores.index')}}">Lojas <span class="sr-only">(current)</span></a>
                </li> --}}
                <li class="nav-item @if(request()->is('admin/products*'))  active @endif">
                    <a class="nav-link" href="{{route('admin.products.index')}}">Produtos</a>
                </li>
                <li class="nav-item @if(request()->is('admin/categories*'))  active @endif">
                    <a class="nav-link" href="{{route('admin.categories.index')}}">Categoria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <div class="my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="" onclick="event.preventDefault(); document.querySelector('form.logout').submit();">Sair</a>
                        <form action="{{route('logout')}}" class="logout" method="post" style="display:none;">
                            @csrf
                        </form>
                    </li>
                    {{-- <li>
                       <span class="nav-link">{{ auth()->user()->name }}</span>
                    </li> --}}
                </ul>

                @endauth

            </div>
        </div>
    </nav>
    @auth()
    <span class="nav-link"> Olá, {{ auth()->user()->name }}!</span>
    @endauth
    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>
</body>
</html>
