@extends('layout.app', ["currentRoute" => "products"])

@section('body')

    <div class="card border">
        <div class="card-body">
            <h4>Todos os Produtos</h4>
            @if (count($listProducts) > 0)

                <table class="table table-ordered table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome do produto</th>
                            <th>Estoque</th>
                            <th>Preço</th>
                            <th>Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listProducts as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->stock }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    @foreach ($cat as $catitem)
                                        @if ($catitem->id == $item->category_id)
                                            {{ $catitem->name }}
                                        @endif
                                    @endforeach
                                <td>
                                    <a href="/produtos/editar/{{ $item->id }}" class="btn btn-sm btn-primary">Editar</a>
                                    <a href="/produtos/apagar/{{ $item->id }}" class="btn btn-sm btn-danger">Apagar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
        <div class="card-footer">
            <a href="{{ route('productCreate') }}" class="btn btn-primary btn-sm">Cadastrar</a>
        </div>
    </div>
    @endif

@endsection
