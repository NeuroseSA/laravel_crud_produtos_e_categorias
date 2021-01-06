@extends('layout.app', ["currentRoute" => "products"])

@section('body')
    <h4>Novo Produto</h4>

    <div class="card border">
        <div class="card-body">
            <form action="{{ route('products') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nameProduct">Nome do produto</label>
                    <input type="text" class="form-control" name="nameProduct" id="nameProduct"
                        placeholder="Ex: Sansung a10">
                    <label for="stock">Quantidade em estoque</label>
                    <input type="text" class="form-control" name="stock" id="stock" placeholder="Ex: Sansung a10">
                    <label for="price">Preço do produto</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="Ex: Sansung a10">
                    <label for="price">Categoria do produto</label>
                    <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect01" name="category_id">
                            <option selected>Escolha Categoria</option>
                            @foreach ($cat as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-primary btn-sm" type="button">Cadastrar Categoria</button>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="submit" class="btn btn-danger btn-sm">Cancelar</button>
            </form>
        </div>
    </div>
@endsection
