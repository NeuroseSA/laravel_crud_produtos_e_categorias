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
            <a class="btn btn-secondary btn-sm" onclick="newClient()">Cadastrar via Modal</a>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="digClient">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                <div class="card border">
                    <div class="card-body">
                <form  class="form-horizontal" id="formCLients">
                    <div class="modal-header">
                        <h4>Novo Cliente</h4>
                    </div>
                    @csrf
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Ex: José Marcos">
                    </div>
                    <div class="form-group">
                        <label for="age">Idade</label>
                        <input type="number" class="form-control" name="age" id="age"
                            placeholder="Ex: 19">
                    </div>
                    <div class="form-group">
                        <label for="address">Endereço</label>
                        <input type="text" class="form-control" name="address" id="address"
                            placeholder="Ex: Avenida Bandeiras, 234">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Ex: jose@gmail.com">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                        <button type="cancel" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>

                    </div>

    
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

@endsection

@section('javascript')
    <script type="text/javascript">
        function newClient(params) {
            $('#name').val('');
            $('#age').val('');
            $('#email').val('');
            $('#address').val('');
            $('#digClient').modal('show');
        }
    </script>
@endsection

