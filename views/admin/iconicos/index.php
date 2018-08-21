<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Icónicos</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL ?>/admin">Inicio</a>
            </li>
            <li class="active">
                <strong>Icónicos</strong>
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
                    <h5>Datos Sección</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="row">
                        <form role="form" id="frmEditarIconicos" method="POST">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" name="header_titulo" class="form-control" value="<?= utf8_encode($this->datosPantalla['header_titulo']); ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Contenido</label>
                                    <textarea style="height:80px;" name="contenido" class="summernote"><?= utf8_encode($this->datosPantalla['contenido']); ?></textarea>
                                </div>
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
                                    <h5>Imagen de la Cabecera</h5>
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
                                        -Dimensión Recomendada: 1920 x 1100px<br>
                                        -Tamaño: 2MB<br>
                                        <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                    </div>
                                    <div class="html5fileupload fileImagenIconicos" data-max-filesize="2048000" data-url="<?= URL; ?>/admin/uploadImgHeaderPantallasLed" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                        <input type="file" name="file_archivo" />
                                    </div>
                                    <script>
                                        $(".html5fileupload.fileImagenIconicos").html5fileupload({
                                            onAfterStartSuccess: function (response) {
                                                $("#imgIconicosHeader").html(response.content);
                                            }
                                        });
                                    </script>
                                    <div class="row">
                                        <div class="col-md-12" id="imgIconicosHeader">
                                            <img class="img-responsive" src="<?= URL ?>public/images/header/<?= $this->datosPantalla['header_img']; ?>">';
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
                    <h5>Datos Meta Tags</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="row">
                        <form role="form" id="frmEditarIconicosMetaTags" method="POST">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" name="title" class="form-control" value="<?= utf8_encode($this->datosPantalla['title']); ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <textarea style="height:80px;" name="description" class="form-control"><?= utf8_encode($this->datosPantalla['description']); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Palabras Clave</label>
                                    <textarea style="height:80px;" name="keywords" class="form-control"><?= utf8_encode($this->datosPantalla['keywords']); ?></textarea>
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
                    <h5>Imagenes</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Agregar Imagen</h3>
                            <form role="form" id="frmAgregarImgIconicos" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Orden</label>
                                            <input type="text" name="orden" class="form-control" placeholder="Orden" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Descripción</label>
                                            <input type="text" name="descripcion" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Imagen</h3>
                                        <div class="alert alert-info alert-dismissable">
                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                            Detalles de la imagen a subir:<br>
                                            -Formato: JPG,PNG<br>
                                            -Dimensión: Imagen Normal: 800 x 650px<br>
                                            -Tamaño: Hasta 2MB<br>
                                            <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                        </div>
                                        <div class="html5fileupload fileAgregarIconicos" data-form="true" data-max-filesize="2048000"  data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                            <input type="file" name="file_archivo" />
                                        </div>
                                        <script>
                                            $(".html5fileupload.fileAgregarIconicos").html5fileupload();
                                        </script>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Slider</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="row" id="imagenesIconicos">
                        <?php
                        foreach ($this->imagenesIconicos as $item):
                            $idImg = $item['id'];
                            if ($item['estado'] == 1) {
                                $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $idImg . '" data-id="' . $idImg . '" data-metodo="estado_img_iconicos"><span class="label label-success">Visible</span></a>';
                            } else {
                                $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $idImg . '" data-id="' . $idImg . '" data-metodo="estado_img_iconicos"><span class="label label-danger">Oculta</span></a>';
                            }
                            ?>
                            <div class="col-sm-3" id="imagenGaleria<?= $idImg ?>">
                                <img style="width: 237px; height: 192px;" class="img-responsive" src="<?= URL ?>public/images/iconicos/<?= utf8_encode($item['imagen']) ?>" alt="Photo">
                                <p><?= $mostrar ?> | <a class="pointer btnEditarImg" data-id="<?= $idImg; ?>" data-metodo="editar_img_iconicos"><span class="label label-warning">Editar</span></a> | <a class="pointer btnEliminarImg" data-id="<?= $idImg ?>" data-metodo="eliminar_img_iconicos"><span class="label label-danger">Eliminar</span></a></p>
                            </div>
                            <!-- /.col -->
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div><!-- /COL-LG-12-->
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(".i-checks").iCheck({
            checkboxClass: "icheckbox_square-green",
            radioClass: "iradio_square-green",
        });
        $(".summernote").summernote({
            height: 300, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null // set maximum height of editor
        });
        $(document).on("submit", "#frmEditarIconicos", function (e) {
            var url = "<?= URL ?>/admin/frmEditarIconicos"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: $("#frmEditarIconicos").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        toastr.success(data.content)
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
        $(document).on("submit", "#frmEditarIconicosMetaTags", function (e) {
            var url = "<?= URL ?>/admin/frmEditarIconicosMetaTags"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: $("#frmEditarIconicosMetaTags").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        toastr.success(data.content)
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
        $(document).on("submit", "#frmEditarImagenesIconicos", function (e) {
            var url = "<?= URL ?>/admin/frmEditarImagenesIconicos"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: $("#frmEditarImagenesIconicos").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        toastr.success(data.content);
                        $(".genericModal").modal("toggle");
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
        $(document).on("submit", "#frmAgregarImgIconicos", function (e) {
            if (e.handled !== true) // This will prevent event triggering more then once
            {
                e.preventDefault(); // avoid to execute the actual submit of the form.
                $.ajax({
                    type: "POST",
                    url: "<?= URL; ?>admin/frmAgregarImgIconicos",
                    dataType: "json",
                    data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false, // The content type used when sending data to the server.
                    cache: false, // To unable request pages to be cached
                    processData: false,
                    success: function (data)
                    {
                        console.log(data);
                        $("#imagenesIconicos").append(data.content);
                        toastr.success(data.message);
                        $("input[name='orden']").val("");
                        $("input[name='descipcion']").val("");
                        $("input[name='estado']").val("");
                    }
                });
            }
            e.handled = true;
        });
    });
</script>