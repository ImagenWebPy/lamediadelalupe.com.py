<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Menú</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL ?>/admin">Inicio</a>
            </li>
            <li class="active">
                <strong>Menú</strong>
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
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Orden</th>
                                <th>Menú</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody id="tablaMenu">
                            <?php
                            foreach ($this->getMenu as $item):
                                $id = $item['id'];
                                if ($item['estado'] == 1) {
                                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="menu" data-rowid="menu_" data-tabla="menu" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                                } else {
                                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="menu" data-rowid="menu_" data-tabla="menu" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                                }
                                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarMenu"><i class="fa fa-edit"></i> Editar </a>';
                                ?>
                                <tr id="menu_<?= $id; ?>">
                                    <td><?= utf8_encode($item['orden']); ?></td>
                                    <td><?= utf8_encode($item['descripcion']); ?></td>
                                    <td> <?= $estado; ?> </td>
                                    <td> <?= $btnEditar; ?> </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(document).on("submit", "#frmEditarMenu", function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                e.preventDefault(); // avoid to execute the actual submit of the form.
                var url = "<?= URL ?>/admin/frmEditarMenu"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#frmEditarMenu").serialize(), // serializes the form's elements.
                    success: function (data)
                    {
                        $("#menu_" + data.id).html(data.content);
                        $(".genericModal").modal("toggle");
                        toastr.success(data.mensaje);
                    }
                });
            }
            e.handled = true;
        });
        $(document).on("submit", "#frmAgregarMenu", function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                e.preventDefault(); // avoid to execute the actual submit of the form.
                var url = "<?= URL ?>/admin/frmAgregarMenu"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    dataType: 'json',
                    data: $("#frmAgregarMenu").serialize(), // serializes the form's elements.
                    success: function (data)
                    {
                        $("#tablaMenu").append(data.content);
                        $(".genericModal").modal("toggle");
                        toastr.success(data.mensaje);
                    }
                });
            }
            e.handled = true;
        });
    });
</script>