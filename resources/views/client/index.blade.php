@extends('layout.app', ["currentRoute" => "client"])

@section('body')

    <div class="card border">
        <div class="card-body">
            <h4>Todos os Clientes</h4>
            @if (count($cli) > 0)

                <table class="table table-ordered table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome do cliente</th>
                            <th>Idade</th>
                            <th>Endereço</th>
                            <th>E-mail</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cli as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->age }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <a href="/cliente/editar/{{ $item->id }}" class="btn btn-sm btn-primary">Editar</a>
                                    <a href="/cliente/apagar/{{ $item->id }}" class="btn btn-sm btn-danger">Apagar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('clientCreate') }}" class="btn btn-primary btn-sm">Cadastrar</a>
        </div>
    </div>
   

@endsection

