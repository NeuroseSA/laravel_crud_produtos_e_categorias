<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <h4>
                <li @if ($currentRoute == 'home') class="nav-item active" @else
                        class="nav-item" @endif>
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                </h4>
                <h4>
                    <li @if ($currentRoute == 'logado.login') class="nav-item active"
                    @else
                        class="nav-item" @endif>
                        @auth
                            <a class="nav-link" aria-current="page" href="{{ route('logout') }}">Logout</a>
                        @endauth
                        @guest
                            <a class="nav-link" aria-current="page" href="{{ route('logado.showLogin') }}">Login</a>
                        @endguest
                    </li>
                </h4>
                <h4>
                    <h4>
                        <li @if ($currentRoute == 'client') class="nav-item active"
                        @else
                            class="nav-item" @endif>
                            <a class="nav-link" aria-current="page" href="{{ route('client') }}">Cliente</a>
                        </li>
                    </h4>
                    <h4>
                        <li @if ($currentRoute == 'products') class="nav-item active"
                        @else
                            class="nav-item" @endif >
                            <a class="nav-link" aria-current="page" href="{{ route('products') }}">Produtos</a>
                        </li>
                    </h4>
                    <h4>
                        <li @if ($currentRoute == 'categories') class="nav-item active"
                        @else class="nav-item" @endif >
                            <a class="nav-link" href="{{ route('category') }}">Categorias</a>
                        </li>
                    </h4>
                    <h4>
                        <li>
                            <a class="nav-link" href="{{ route('category') }}">Bem vindo
                                @auth
                                    {{ Auth::user()->name }}
                                @endauth
                            </a>
                        </li>
                    </h4>
            </ul>

        </div>
    </div>
</nav>
