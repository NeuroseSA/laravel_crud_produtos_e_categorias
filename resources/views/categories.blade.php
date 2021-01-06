@extends('layout.app', ["currentRoute" => "categories"])

@section('body')   

<div class="card border">
    <div class="card-body">
        <h4>Todas Categorias</h4>
@if (count($listCategories) > 0)
    
        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome da Categoria</th>
                    <th>Ações</th>                    
                </tr>
            </thead>
            <tbody>
                @foreach ($listCategories as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                            <a href="/categorias/editar/{{$item->id}}" class="btn btn-sm btn-primary">Editar</a>
                            <a href="/categorias/apagar/{{$item->id}}" class="btn btn-sm btn-danger">Apagar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <a href="{{route('categoriesCreate')}}" class="btn btn-primary btn-sm">Cadastrar</a>
    </div>
</div>
@endif

@endsection