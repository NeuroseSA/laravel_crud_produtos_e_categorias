@extends('layout.app')

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
                    <a href="/produtos" class="btn btn-primary">Cadastrar</a>
                </div>
            </div>
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title">Cadastro de Categorias</h5>
                    <p class="card-text">Aqui você cadastra suas categorias.
                        Para que os produtos possam ser ordenados.
                    </p>
                    <a href="/categorias" class="btn btn-primary">Cadastrar</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection