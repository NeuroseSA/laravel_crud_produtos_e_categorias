@extends('layout.app', ["currentRoute" => "products"])

@section('body')
    <h4>Novo Produto</h4>

    <div class="card border">
        <div class="card-body">
            <form action="{{ route('products') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nome do produto</label>
                    <input type="text" class="form-control" name="name" id="name"
                        placeholder="Ex: Motorola G5">
                    <label for="stock">Quantidade em estoque</label>
                    <input type="text" class="form-control" name="stock" id="stock" placeholder="Ex: 96">
                    <label for="price">Preço do produto</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="Ex: 689.99">
                    <label for="price">Categoria do produto</label>
                    <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect01" name="category_id">
                            <option selected>Escolha Categoria</option>
                            @foreach ($cat as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <a href="{{route('categoriesCreate')}}" class="btn btn-primary btn-sm center"> <h6 style="margin-top: 4px; font-size: 14px">Cadastrar Categoria</h6 style="position: relative;"> </a>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="submit" class="btn btn-danger btn-sm">Cancelar</button>
            </form>
        </div>
        @if ($errors->any())
        <div class="card-footer">
            @foreach ($errors->all() as $errors)
                <div class="alert alert-danger" role="alert">
                    {{ $errors }}
                </div>
            @endforeach
        </div>
    @endif
    </div>
@endsection
