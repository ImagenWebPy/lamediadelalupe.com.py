<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Inicio</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL ?>/admin">Inicio</a>
            </li>
            <li class="active">
                <strong>Página Inicio</strong>
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
                    <h5>Contenido Slider Inicio</h5>
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
                                    <th>Texto1 ES</th>
                                    <th>Texto1 EN</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>

                            <tfoot>
                                <tr>
                                    <th>Orden</th>
                                    <th>Imagen</th>
                                    <th>Texto1 ES</th>
                                    <th>Texto1 EN</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 pull-right">
                            <button type="button" class="btn btn-block btn-primary btnAgregarContenido" data-url="modalAgregarSlider">Agregar Slider</button>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- /COL-LG-12-->
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Seccion 1</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="row">
                        <form role="form" id="frmEditarIndexSeccion1" method="POST">
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" <?= ($this->datosSeccion1['estado'] == 1) ? 'checked' : '' ?>> <i></i> Mostrar </label></div>
                            </div>
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
                                            <label>Contenido</label>
                                            <textarea style="height:80px;" name="contenido" class="summernote"><?= utf8_encode($this->datosSeccion1['contenido']); ?></textarea>
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
                    <h5>Seccion 2</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-striped table-bordered table-hover dataTables-seccion2" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Orden</th>
                                        <th>Titulo</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>Orden</th>
                                        <th>Titulo</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="col-xs-12">
                                <button type="button" class="btn btn-block btn-primary btnAgregarContenido" data-url="modalAgregarItemSeccion2">Agregar Item</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /COL-LG-12-->
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Seccion 3</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="row">
                        <form role="form" id="frmEditarIndexSeccion3" method="POST">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" name="titulo" class="form-control" value="<?= utf8_encode($this->datosSeccion3['titulo']); ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>SubTitulo</label>
                                    <input type="text" name="subtitulo" class="form-control" value="<?= utf8_encode($this->datosSeccion3['subtitulo']); ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Contenido</label>
                                    <textarea style="height:80px;" name="descripcion" class="form-control"><?= utf8_encode($this->datosSeccion3['descripcion']); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Titulo Cuadro</label>
                                    <input type="text" name="titulo_cuadro" class="form-control" value="<?= utf8_encode($this->datosSeccion3['titulo_cuadro']); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contenido Cuadro</label>
                                    <textarea style="height:80px;" name="descripcion_cuadro" class="form-control"><?= utf8_encode($this->datosSeccion3['descripcion_cuadro']); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" <?= ($this->datosSeccion3['estado'] == 1) ? 'checked' : '' ?>> <i></i> Mostrar </label></div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Actualizar Contenido</button>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Imagen de la Sección</h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="alert alert-info alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        Detalles de la imagen a subir:<br>
                                        -Formato: JPG, PNG<br>
                                        -Dimensión Recomendada: 600 x 825px<br>
                                        -Tamaño: 2MB<br>
                                        <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                    </div>
                                    <div class="html5fileupload fileImagenSeccion3" data-max-filesize="2048000" data-url="<?= URL; ?>/admin/uploadImgSeccion3" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                        <input type="file" name="file_archivo" />
                                    </div>
                                    <script>
                                        $(".html5fileupload.fileImagenSeccion3").html5fileupload({
                                            onAfterStartSuccess: function (response) {
                                                $("#imgImagenSeccion3").html(response.content);
                                            }
                                        });
                                    </script>
                                    <div class="row">
                                        <div class="col-md-12" id="imgImagenSeccion3">
                                            <img class="img-responsive" src="<?= URL ?>public/images/<?= $this->datosSeccion3['imagen']; ?>">';
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /COL-LG-12-->
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Seccion 4</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="row">
                        <form role="form" id="frmEditarIndexSeccion4" method="POST">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" name="titulo" class="form-control" value="<?= utf8_encode($this->datosSeccion4['titulo']); ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>SubTitulo</label>
                                    <input type="text" name="subtitulo" class="form-control" value="<?= utf8_encode($this->datosSeccion4['subtitulo']); ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Contenido</label>
                                    <textarea style="height:80px;" name="descripcion" class="form-control"><?= utf8_encode($this->datosSeccion4['descripcion']); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" <?= ($this->datosSeccion4['estado'] == 1) ? 'checked' : '' ?>> <i></i> Mostrar </label></div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Actualizar Contenido</button>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Imagen de la Sección</h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="alert alert-info alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        Detalles de la imagen a subir:<br>
                                        -Formato: JPG, PNG<br>
                                        -Dimensión Recomendada: 600 x 825px<br>
                                        -Tamaño: 2MB<br>
                                        <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                    </div>
                                    <div class="html5fileupload fileImagenSeccion3" data-max-filesize="2048000" data-url="<?= URL; ?>/admin/uploadImgSeccion4" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                        <input type="file" name="file_archivo" />
                                    </div>
                                    <script>
                                        $(".html5fileupload.fileImagenSeccion3").html5fileupload({
                                            onAfterStartSuccess: function (response) {
                                                $("#imgImagenSeccion4").html(response.content);
                                            }
                                        });
                                    </script>
                                    <div class="row">
                                        <div class="col-md-12" id="imgImagenSeccion4">
                                            <img class="img-responsive" src="<?= URL ?>public/images/<?= $this->datosSeccion4['imagen']; ?>">';
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /COL-LG-12-->
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Seccion 5</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="row">
                        <form role="form" id="frmEditarIndexSeccion5" method="POST">
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" <?= ($this->datosSeccion5['estado'] == 1) ? 'checked' : '' ?>> <i></i> Mostrar </label></div>
                            </div>
                            <div class="col-lg-12">
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Titulo</label>
                                            <input type="text" name="titulo" class="form-control" value="<?= utf8_encode($this->datosSeccion5['titulo']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Subtitulo</label>
                                            <input type="text" name="subtitulo" class="form-control" value="<?= utf8_encode($this->datosSeccion5['subtitulo']); ?>">
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
                {data: 'titulo'},
                {data: 'texto_complementario'},
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
        $('.dataTables-seccion2').DataTable({
            ajax: '<?= URL; ?>/admin/listadoDTSeccion2',
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
        $(document).on("submit", "#frmEditarIndexSeccion2", function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                e.preventDefault(); // avoid to execute the actual submit of the form.
                var url = "<?= URL; ?>/admin/frmEditarIndexSeccion2"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    dataType: 'json',
                    data: $("#frmEditarIndexSeccion2").serialize(), // serializes the form's elements.
                    success: function (data)
                    {
                        $("#seccion2_" + data.id).html(data.content);
                        $(".genericModal").modal("toggle");
                        toastr.success(data.mensaje);
                    }
                });
            }
            e.handled = true;
        });
        $(document).on("submit", "#frmAgregarIndexSeccionItem2", function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                e.preventDefault(); // avoid to execute the actual submit of the form.
                var url = "<?= URL; ?>/admin/frmAgregarIndexSeccionItem2"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    dataType: 'json',
                    data: $("#frmAgregarIndexSeccionItem2").serialize(), // serializes the form's elements.
                    success: function (data)
                    {
                        $(".dataTables-seccion2 > tbody").append(data.content);
                        $(".genericModal").modal("toggle");
                        toastr.success(data.mensaje);
                    }
                });
            }
            e.handled = true;
        });
        $(document).on("submit", "#frmEditarIndexSeccion3", function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                e.preventDefault(); // avoid to execute the actual submit of the form.
                var url = "<?= URL; ?>/admin/frmEditarIndexSeccion3"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#frmEditarIndexSeccion3").serialize(), // serializes the form's elements.
                    success: function (data)
                    {
                        toastr.success(data.mensaje);
                    }
                });
            }
            e.handled = true;
        });
        $(document).on("submit", "#frmEditarIndexSeccion4", function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                e.preventDefault(); // avoid to execute the actual submit of the form.
                var url = "<?= URL; ?>/admin/frmEditarIndexSeccion4"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#frmEditarIndexSeccion4").serialize(), // serializes the form's elements.
                    success: function (data)
                    {
                        toastr.success(data.mensaje);
                    }
                });
            }
            e.handled = true;
        });
        $(document).on("submit", "#frmEditarIndexSeccion5", function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                e.preventDefault(); // avoid to execute the actual submit of the form.
                var url = "<?= URL; ?>/admin/frmEditarIndexSeccion5"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#frmEditarIndexSeccion5").serialize(), // serializes the form's elements.
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