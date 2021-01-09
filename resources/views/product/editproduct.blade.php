@extends('layout.app', ["currentRoute" => "products"])

@section('body')
    <h4>Editar Produto</h4>

    <div class="card border">
        <div class="card-body">
            <form action="{{ route('products') }}/{{$prod->id}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nome do produto</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$prod->name}}"
                        placeholder="Ex: Sansung a10">
                    <label for="stock">Quantidade em estoque</label>
                    <input type="number" class="form-control" name="stock" id="stock" value="{{$prod->stock}}" placeholder="Ex: Sansung a10">
                    <label for="price">Preço do produto</label>
                    <input type="text" class="form-control" name="price" id="price" value="{{$prod->price}}" placeholder="Ex: Sansung a10">
                    <label for="price">Categoria do produto</label>
                    <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect01" name="category_id">                            
                            @foreach ($cat as $item)
                                @if ($item->id == $prod->category_id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>                                    
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif                                
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
