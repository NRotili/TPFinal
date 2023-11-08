<?php

require_once '../../layouts/header.view.php';
?>

<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Dashboard
                        </li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">

            <div class="row">
                <div class="col col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                                <div class="form-row">
                                    <div class="col col-6">
                                        <select name="id_cliente" id="" class="form-control">
                                            <option value="" hidden>Seleccione un cliente</option>
                                            <?php foreach ($clientes as $cliente) : ?>
                                                <option value="<?= $cliente->id_cliente ?>"><?= $cliente->nombre . " " . $cliente->apellidos ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col col-6">
                                        <select name="id_empleado" id="" class="form form-control">
                                            <option value="" hidden>Seleccione un empleado</option>
                                            <?php foreach ($empleados as $empleado) : ?>
                                                <option value="<?= $empleado->id_empleado ?>"><?= $empleado->nombre . " " . $empleado->apellidos ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-2 form-row">
                                    <div class="col col-12">

                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>
                                                    <select name="" id="itemcode" class="form-control">
                                                        <option value="" hidden>Seleccione un item</option>
                                                        <?php foreach ($inventarios as $inventario) : ?>
                                                            <option value="<?= $inventario->id_inventario ?>"> <?= $inventario->pelicula()->titulo ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </th>
                                                <th><input class="form form-control" placeholder="fecha alquiler" type="datetime-local" value="<?= date('Y-m-d H:i:s') ?>"name="" id="itemfechaalquiler"></th>
                                                <th><input class="form form-control" placeholder="fecha devolución" type="datetime-local" value="<?= date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . "+3 day")) ?>"name="" id="itemfechadevolucion"></th>
                                                <th>Acción</th>
                                            </tr>
                                            </thead>
                                            

                                            <tbody id="itemlist">


                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <input type="submit" name="enviar" value="Save">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>


<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.2.min.js"></script>

<script type="text/javascript">
    $('#itemcode').keypress(function(e){
        if(e.keyCode==13){
            e.preventDefault();
            $('#itemfechaalquiler').focus();
        }
    });

    $('#itemfechaalquiler').keypress(function(e){
        if(e.keyCode==13){
            e.preventDefault();
            $('#itemfechadevolucion').focus();
        }
    });

    $('#itemfechadevolucion').on('keypress', function(e){
        if (e.keyCode==13) {
            e.preventDefault();
            var itemcode = $('#itemcode').val();
            var itemfechaalquiler = $('#itemfechaalquiler').val();
            var itemfechadevolucion = $('#itemfechadevolucion').val();


            var items = "";
            items += "<tr>";
            items += "<td><input type='hidden' value='"+itemcode+"' name='item[code][]'>"+itemcode+"</td>";
            items += "<td><input type='datetime-local' class='form form-control' value='"+itemfechaalquiler+"' name='item[fechaalquiler][]' id=''></td>";
            items += "<td><input type='datetime-local' class='form form-control' value='"+itemfechadevolucion+"' name='item[fechadevolucion][]' id=''></td>";
            items += "<td><button class='btn btn-warning btn-sm remover-fila'>Eliminar</button></td>";
            items += "</tr>";

            $('#itemlist').append(items);
            clear();


        }
    })

    $("tbody#itemlist").on('click', ".remover-fila", function(){
        $(this).closest('tr').remove();
    })

    function clear(){
        $('#itemcode').val('');
        $('#itemcode').focus();
    }

</script>



<?php require_once '../../layouts/footer.view.php'; ?>