@extends('layout.app', ["currentRoute" => "home"])

@section('body')

    <div class="jumbotron bg-dark border border-secondary">
        <div class="row">
            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Produtos</h5>
                        <p class="card-text">Aqui você cadastra todos os produtos.
                            Necessário cadastrar categorias primeiro.
                        </p>
                        <a href="{{ route('productCreate') }}" class="btn btn-primary">Cadastrar</a>
                    </div>
                </div>
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Categorias</h5>
                        <p class="card-text">Aqui você cadastra suas categorias.
                            Para que os produtos possam ser ordenados.
                        </p>
                        <a href="{{ route('categoriesCreate') }}" class="btn btn-primary">Cadastrar</a>
                    </div>
                </div>
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Clientes</h5>
                        <p class="card-text">Aqui você cadastra seus clientes.
                            Para guardar o contato de cada cliente.
                        </p>
                        <a href="{{ route('clientCreate') }}" class="btn btn-primary">Cadastrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
