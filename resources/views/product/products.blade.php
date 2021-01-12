@extends('layout.app', ["currentRoute" => "products"])

@section('body')

    <div class="card border">
        <div class="card-body">
            <h4>Todos os Produtos</h4>
            @if (count($listProducts) > 0)

                <table class="table table-ordered table-hover" id="tblProducts">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome do produto</th>
                            <th>Estoque</th>
                            <th>Preço</th>
                            <th>Categoria ID</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    
{{--  Listagem funcionando normalmente, comentado apenas para teste utilizando listagem via JQuery/Ajax
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
--}}
                {{-- Listagem utilizando JQuery/Ajax--}}
                    <tbody>

                    </tbody>

                </table>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('productCreate') }}" class="btn btn-primary btn-sm">Cadastrar</a>
            <a class="btn btn-secondary btn-sm" onclick="newproduct()">Cadastrar via Modal</a>
        </div>
    </div>


    <div class="modal" tabindex="-1" role="dialog" id="digProduct">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="card border">
                    <div class="card-body">
                        <form id="formProduct">
                            @csrf
                            <div class="modal-header">
                                <h4>Novo Produto</h4>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="id" class="form-control">
                                <label for="name">Nome do produto</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Ex: Motorola G5">
                                <label for="stock">Quantidade em estoque</label>
                                <input type="text" class="form-control" name="stock" id="stock" placeholder="Ex: 96">
                                <label for="price">Preço do produto</label>
                                <input type="text" class="form-control" name="price" id="price" placeholder="Ex: 689.99">
                                <label for="price">Categoria do produto</label>
                                <div class="input-group">
                                    <select class="custom-select" id="category_id" name="category_id">
                                        
                                    </select>
                                    <div class="input-group-append">
                                        <a href="{{ route('categoriesCreate') }}" class="btn btn-primary btn-sm center">
                                            <h6 style="margin-top: 4px; font-size: 14px">Cadastrar Categoria</h6
                                                style="position: relative;">
                                        </a>
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
            </div>
        </div>
    </div>


@endsection

@section('javascript')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        });

        function listCategories() {
            $.getJSON('/api/categorias', function(data){
                for (i = 0; i < data.length; i++) {
                    line = '<option value="' + data[i].id + '">' + data[i].name + '</option>';  
                    $("#category_id").append(line);              
                }
            });
        }

        function newproduct() {
            $('#id').val('');
            $('#name').val('');
            $('#stock').val('');
            $('#price').val('');
            $('#digProduct').modal('show');
        }

        function showLine(prod) {
            var line = 
            "<tr>" 
                +
                    "<td>" + prod.id + "</td>" +
                    "<td>" + prod.name + "</td>" +
                    "<td>" + prod.stock + "</td>" +
                    "<td>" + prod.price + "</td>" +
                    "<td>" + prod.category_id + "</td>" +
                    "<td>" + '<a class="btn btn-sm btn-primary" onclick="editProduct('+ prod.id +')">Editar </a>' +
                            '<a class="btn btn-sm btn-danger" onclick="deleteProduct('+ prod.id +')">Apagar </a>' +
                    "</td>" 
                +
            "</tr>";
            
            return line;
      
        }

        function ListProducts() {
            $.getJSON('/api/produtos', function (produts) {
                for ( i = 0; i < produts.length; i++) {
                    line = showLine(produts[i]);
                    $('#tblProducts>tbody').append(line);
                }
            })
        }

        function newProduct() {
            prod = {
                name: $("#name").val(),
                stock: $("#stock").val(),
                price: $("#price").val(),
                category_id: $("#category_id").val()
            };
            //console.log(prod);
            $.post('/api/produtos', prod, function(data) {
                product = JSON.parse(data);
                line = showLine(product);
                $('#tblProducts>tbody').append(line);
            });
        }

        function deleteProduct(id) {
            $.ajax({
                type: "DELETE",
                url: "/api/produtos/" + id,
                context: this,
                success: function () {
                    console.log("Removido com sucesso!");
                    lines = $("#tblProducts>tbody>tr");
                    item = lines.filter(function(i, elemento){
                        return elemento.cells[0].textContent == id; 
                    });
                    if(item){
                        item.remove();
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        function editProduct(id) {
            $.getJSON("/api/produtos/"+id, function (data){
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#stock').val(data.stock);
                $('#price').val(data.price);
                $('#category_id').val(data.category_id);
                $('#digProduct').modal('show');
            });
        }

        function saveEdit() {
            prod = {
                id: $("#id").val(),
                name: $("#name").val(),
                stock: $("#stock").val(),
                price: $("#price").val(),
                category_id: $("#category_id").val()
            };
            $.ajax({
                type: "PUT",
                url: "/api/produtos/" + prod.id,
                context: this,
                data: prod,
                success: function (data) {
                    prod = JSON.parse(data);
                    console.log("Editado com sucesso!");
                    lines = $("#tblProducts>tbody>tr");
                    item = lines.filter(function(i, elemento){
                        return (elemento.cells[0].textContent == prod.id); 
                    });
                    if(item){
                        item[0].cells[0].textContent = prod.id;
                        item[0].cells[1].textContent = prod.name;
                        item[0].cells[2].textContent = prod.stock;
                        item[0].cells[3].textContent = prod.price;
                        item[0].cells[4].textContent = prod.category_id;
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        $("#formProduct").submit(function (event) {
            event.preventDefault();
            if($("#id").val() != ''){
                saveEdit();
            }else{
                newProduct();
            }            
            $("#digProduct").modal('hide');           
        });

        $(function() {
            ListProducts();
            listCategories();
        });

    </script>
@endsection
