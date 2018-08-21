<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Usuarios</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL; ?>/admin">Inicio</a>
            </li>
            <li class="active">
                <strong>Usuarios</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<?php
if (isset($_SESSION['message'])) {
    echo $this->helper->messageAlert($_SESSION['message']['type'], $_SESSION['message']['mensaje']);
}
?>
<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Listado de Usuarios</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>

        <div class="ibox-content">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-usuarios" >
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </tfoot>
                </table>
                <div class="col-xs-6 pull-right">
                    <button type="button" class="btn btn-block btn-primary btnAgregarContenido" data-url="modalAgregarUsuario">Agregar Usuario</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.dataTables-usuarios').DataTable({
            ajax: '<?= URL; ?>/admin/listadoDTUsuarios',
            columns: [
                {data: 'nombre'},
                {data: 'email'},
                {data: 'rol'},
                {data: 'estado'},
                {data: 'accion'}
            ],
            pageLength: 25,
            responsive: true,
            "language": {
                "url": "<?= URL ?>public/language/Spanish.json"
            }
        });
        $(document).on("submit", "#frmEditarUsuario", function (e) {
            var url = "<?= URL; ?>/admin/frmEditarUsuario"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#frmEditarUsuario").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    $("#usuarios_" + data.id).html(data.content);
                    $(".genericModal").modal("toggle");
                    toastr.success(data.message);
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    });
</script>