<section class="content_header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Administrador</h1>
            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"></li><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item active">Gestor de Categorias</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="btn-agregar-categoria">
            <button type="button" class="btn btn-info btn-sm mb-4" data-toggle="modal" data-target="#modal-actualizar-categoria" data-dismiss="modal">
                <i class=""fas fa-plus-square></i> Agregar árbol
            </button>
        </div>
        <table id="tablaCategorias" class="table table-striped table-bordered nowrap" style="width:100%;">
            <thead class="btn-info">
                <tr>
                    <td style="width:5%;">Id</td>
                    <td>Nombre del Arbol</td>
                    <td>Tipo</td>
                    <td style="width:15%;">Descripcion</td>
                    <td>Altura</td>
                    <td style="width:10%;">Acción</td>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</section>

<script>
    $(document).ready(function(){
        $.ajax({
            url: "ajax/categorias.ajax.php",
            method: "GET",
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta){
                console.log(respuesta);
            }
        })

        var table = $("#tablaCategorias").DataTable({
            "ajax":{
                "url": "ajax/categorias.ajax.php",
                "type": "POST",
                "dataSrc": ""
            },
                "columnDefs": [
                    {
                        "targets": 4,
                        "sortable": false,
                        "render": function(data, type, full, meta){
                            if(data == 1){
                                return 
                                    "<button type='button' class='btn btn-block btn-primary btn-sm' >Activo</button>"
                            }else{
                                return 
                                "<button type='button' class='btn btn-block btn-danger btn-sm' >Inactivo</button>" 
                            }      
                        }
                    },
                    {
                        "targets": 5,
                        "sortable": false,
                        "render": function(data, type, full, meta){
                                return 
                                "<center>" +
                                    "<button type='button' class='btn btn-primary btn-sm btnEditar' data-toggle='modal' data-target='#modal-actualizar-categoria'>" +
                                        "<i class='fas fa-pencil-alt'></i>"
                                    "</button>" +
                                    "<button type='button' class='btn btn-danger btn-sm btnEliminar'>" +
                                        "<i class='fas fa-trash'></i>" +
                                    "</button>" +
                                "</center>";
                        }
                    }
                ],
                "columns":[
                    {"data" : "id"},
                    {"data" : "nombrearbol"},
                    {"data" : "tipo"},
                    {"data" : "descripcion"},
                    {"data" : "altura"},
                    {"data" : "edit"}
                ]
            
        });
    })
</script>