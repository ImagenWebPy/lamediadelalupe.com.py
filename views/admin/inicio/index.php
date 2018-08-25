<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Inicio</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL ?>/admin">Inicio</a>
            </li>
            <li class="active">
                <strong>Inicio</strong>
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
                    <h5>Imagenes Inicio</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-slider" style="width: 100%">
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
                            <button type="button" class="btn btn-block btn-primary btnAgregarContenido" data-url="modalAgregarSlider">Agregar Imagen</button>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- /COL-LG-12-->
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Textos</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="row">
                        <form role="form" id="frmEditarIndexSeccion1" method="POST">
                            <div class="col-lg-12">
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Titulo</label>
                                            <input type="text" name="titulo" class="form-control" value="<?= utf8_encode($this->datosSeccion1['titulo']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Texto Descriptivo</label>
                                            <input type="text" name="contenido" class="form-control" value="<?= utf8_encode($this->datosSeccion1['contenido']); ?>">
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
        $('.dataTables-slider').DataTable({
            ajax: '<?= URL ?>/admin/listadoDTSlider',
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
        $(document).on("submit", "#frmEditarSlider", function (e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var url = "<?= URL ?>/admin/frmEditarSlider"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                data: $("#frmEditarSlider").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    $("#slider_" + data.id).html(data.content);
                    $(".genericModal").modal("toggle");
                    toastr.success(data.message);
                }
            });
        });
        $(document).on("submit", "#frmEditarIndexSeccion1", function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                e.preventDefault(); // avoid to execute the actual submit of the form.
                var url = "<?= URL; ?>/admin/frmEditarIndexSeccion1"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#frmEditarIndexSeccion1").serialize(), // serializes the form's elements.
                    success: function (data)
                    {
                        toastr.success(data.mensaje);
                    }
                });
            }
            e.handled = true;
        });
    });
</script>