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
                    <h3 class="mb-0">Clientes</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Clientes
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
                            <!-- table -->
                            <table id="listaClientes" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Email</th>
                                        <th>Activo</th>
                                        <th>Fecha Creación</th>
                                        <th>Última Actualización</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($clientes as $cliente) : ?>
                                        <tr>
                                            <td><?= $cliente->id_cliente ?></td>
                                            <td><?= $cliente->nombre ?></td>
                                            <td><?= $cliente->apellidos ?></td>
                                            <td><?= $cliente->email ?></td>
                                            <td><?= $cliente->activo ?></td>
                                            <td><?= $cliente->fecha_creacion ?></td>
                                            <td><?= $cliente->ultima_actualizacion ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>

<script>
$(document).ready(function(){
$('#listaClientes').DataTable({
});
});
</script>

<?php require_once '../../layouts/footer.view.php'; ?>