@extends('layout.app', ["currentRoute" => "client"])

@section('body')
    <h4>Editar Cliente</h4>

    <div class="card border">
        <div class="card-body">
            <form action="{{ route('client') }}/{{ $cli->id }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $cli->name }}"
                        placeholder="Ex: José Marcos">
                </div>
                <div class="form-group">
                    <label for="age">Idade</label>
                    <input type="number" class="form-control" name="age" id="age" value="{{ $cli->age }}"
                        placeholder="Ex: 19">
                </div>
                <div class="form-group">
                    <label for="address">Endereço</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{ $cli->address }}"
                        placeholder="Ex: Avenida Bandeiras, 234">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $cli->email }}"
                        placeholder="Ex: jose@gmail.com">
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
