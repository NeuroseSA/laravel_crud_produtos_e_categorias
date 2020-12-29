@extends('layout.app', ["currentRoute" => "category"])

@section('body')
<h4>New Category</h4>

<div class="card border">
    <div class="card-body">
        <form action="{{route('category')}}" method="POST">
            @csrf
            <div class="form-group">
            <label for="nameCategory">Nome da Categoria</label>
            <input type="text" class="form-control" name="nameCategory" id="nameCategory" placeholder="Ex: Eletronicos">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="submit" class="btn btn-danger btn-sm">Cancelar</button>

        </form>
    </div>
</div>
@endsection