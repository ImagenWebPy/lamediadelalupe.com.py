<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Servicios</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL ?>/admin">Inicio</a>
            </li>
            <li class="active">
                <strong>Servicios</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Imagenes de Fondo</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-serviciosimg" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Orden</th>
                                    <th>Imagen</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <th>Orden</th>
                                    <th>Imagen</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 pull-right">
                            <button type="button" class="btn btn-block btn-primary btnAgregarContenido" data-url="modalAgregarServiciosImg">Agregar Imagen</button>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- /COL-LG-12-->
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Contenido de la sección</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="row">
                        <form role="form" id="frmEditarContenidoServicios" method="POST">
                            <div class="col-lg-12">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Titulo</label>
                                                <input type="text" name="titulo" class="form-control" value="<?= utf8_encode($this->datosContenido['titulo']); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Actualizar Contenido</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /COL-LG-12-->
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Servicios</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-striped table-bordered table-hover dataTables-servicios" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Orden</th>
                                        <th>Descripcion</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>Orden</th>
                                        <th>Descripcion</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="col-xs-12">
                                <button type="button" class="btn btn-block btn-primary btnAgregarContenido" data-url="modalAgregarServicios">Agregar Item</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /COL-LG-12-->
    </div><!-- /row-->
</div>
<script>
    $(document).ready(function () {
        $(".i-checks").iCheck({
            checkboxClass: "icheckbox_square-green"
        });
        $(".summernote").summernote({
            height: 300, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null // set maximum height of editor
        });
        $('.dataTables-serviciosimg').DataTable({
            ajax: '<?= URL ?>/admin/listadoDTServiciosImg',
            columns: [
                {data: 'orden'},
                {data: 'imagen'},
                {data: 'estado'},
                {data: 'editar'}
            ],
            pageLength: 25,
            responsive: true,
            "language": {
                "url": "<?= URL ?>public/language/Spanish.json"
            }

        });
        $(document).on("submit", "#frmEditarServiciosImg", function (e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var url = "<?= URL ?>/admin/frmEditarServiciosImg"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#frmEditarServiciosImg").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    $("#servicios_img_" + data.id).html(data.content);
                    $(".genericModal").modal("toggle");
                    toastr.success(data.message);
                }
            });
        });
        $(document).on("submit", "#frmEditarContenidoServicios", function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                e.preventDefault(); // avoid to execute the actual submit of the form.
                var url = "<?= URL; ?>/admin/frmEditarContenidoServicios"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#frmEditarContenidoServicios").serialize(), // serializes the form's elements.
                    success: function (data)
                    {
                        toastr.success(data.mensaje);
                    }
                });
            }
            e.handled = true;
        });
        $('.dataTables-servicios').DataTable({
            ajax: '<?= URL; ?>/admin/listadoDTServicios',
            columns: [
                {data: 'orden'},
                {data: 'titulo'},
                {data: 'estado'},
                {data: 'editar'}
            ],
            pageLength: 25,
            responsive: true,
            "language": {
                "url": "<?= URL ?>public/language/Spanish.json"
            }
        });
        $(document).on("submit", "#frmEditarServicios", function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                e.preventDefault(); // avoid to execute the actual submit of the form.
                var url = "<?= URL; ?>/admin/frmEditarServicios"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    dataType: 'json',
                    data: $("#frmEditarServicios").serialize(), // serializes the form's elements.
                    success: function (data)
                    {
                        $("#servicios_" + data.id).html(data.content);
                        $(".genericModal").modal("toggle");
                        toastr.success(data.message);
                    }
                });
            }
            e.handled = true;
        });
        $(document).on("submit", "#frmAgregarServicios", function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                e.preventDefault(); // avoid to execute the actual submit of the form.
                var url = "<?= URL; ?>/admin/frmAgregarServicios"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    dataType: 'json',
                    data: $("#frmAgregarServicios").serialize(), // serializes the form's elements.
                    success: function (data)
                    {
                        $(".dataTables-servicios > tbody").append(data.content);
                        $(".genericModal").modal("toggle");
                        toastr.success(data.mensaje);
                    }
                });
            }
            e.handled = true;
        });
    });
</script>