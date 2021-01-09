@extends('layout.app', ["currentRoute" => "category"])

@section('body')
<h4>Editar Categoria</h4>

<div class="card border">
    <div class="card-body">
        <form action="{{route('category')}}/{{$category->id}}" method="POST">
            @csrf
            <div class="form-group">
            <label for="name">Nome da Categoria</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}" placeholder="Ex: Eletronicos">
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