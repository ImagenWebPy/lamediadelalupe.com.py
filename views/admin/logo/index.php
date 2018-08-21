<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Logos</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL; ?>/admin">Inicio</a>
            </li>
            <li class="active">
                <strong>Logos</strong>
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
                <div class="ibox-title">
                    <h5>Logo Principal</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="alert alert-info alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        Detalles de la imagen a subir:<br>
                        -Formato: PNG (transparente)<br>
                        -Dimensión Recomendada: 125 x 31px<br>
                        -Tamaño: 2MB<br>
                    </div>
                    <div class="html5fileupload fileLogoCabecera" data-max-filesize="2048000" data-url="<?= URL; ?>/admin/uploadImgLogo" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                        <input type="file" name="file_archivo" />
                    </div>
                    <script>
                        $(".html5fileupload.fileLogoCabecera").html5fileupload({
                            onAfterStartSuccess: function (response) {
                                $("#imgLogoCabecera").html(response.content);
                            }
                        });
                    </script>
                    <div class="row">
                        <div class="col-md-12" id="imgLogoCabecera">
                            <img class="img-responsive" src="<?= URL ?>public/images/<?= $this->logos['logo']; ?>">';
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Logo Principal X2</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="alert alert-info alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        Detalles de la imagen a subir:<br>
                        -Formato: PNG (transparente)<br>
                        -Dimensión Recomendada: 250 x 62<br>
                        -Tamaño: 2MB<br>
                    </div>
                    <div class="html5fileupload fileX2" data-max-filesize="2048000" data-url="<?= URL; ?>/admin/uploadImgLogoX2" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                        <input type="file" name="file_archivo" />
                    </div>
                    <script>
                        $(".html5fileupload.fileX2").html5fileupload({
                            onAfterStartSuccess: function (response) {
                                $("#imgLogoX2").html(response.content);
                            }
                        });
                    </script>
                    <div class="row">
                        <div class="col-md-12" id="imgLogoX2">
                            <img class="img-responsive" src="<?= URL ?>public/images/<?= $this->logos['logo_x2']; ?>">';
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Favicon</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="alert alert-info alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        Detalles de la imagen a subir:<br>
                        -Formato: PNG (transparente)<br>
                        -Dimensión Recomendada: 32  x 32<br>
                        -Tamaño: 2MB<br>
                    </div>
                    <div class="html5fileupload fileFavicon" data-max-filesize="2048000" data-url="<?= URL; ?>/admin/uploadImgFavicon" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                        <input type="file" name="file_archivo" />
                    </div>
                    <script>
                        $(".html5fileupload.fileFavicon").html5fileupload({
                            onAfterStartSuccess: function (response) {
                                $("#imgLogoFavicon").html(response.content);
                            }
                        });
                    </script>
                    <div class="row">
                        <div class="col-md-12" id="imgLogoFavicon">
                            <img class="img-responsive" src="<?= URL ?>public/images/<?= $this->logos['fav_icon']; ?>">';
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Favicon Apple 57</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="alert alert-info alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        Detalles de la imagen a subir:<br>
                        -Formato: PNG (transparente)<br>
                        -Dimensión Recomendada: 57  x 57<br>
                        -Tamaño: 2MB<br>
                    </div>
                    <div class="html5fileupload fileFaviconApple57" data-max-filesize="2048000" data-url="<?= URL; ?>/admin/uploadImgFaviconApple57" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                        <input type="file" name="file_archivo" />
                    </div>
                    <script>
                        $(".html5fileupload.fileFaviconApple57").html5fileupload({
                            onAfterStartSuccess: function (response) {
                                $("#imgLogoFaviconApple57").html(response.content);
                            }
                        });
                    </script>
                    <div class="row">
                        <div class="col-md-12" id="imgLogoFaviconApple57">
                            <img class="img-responsive" src="<?= URL ?>public/images/<?= $this->logos['apple_57']; ?>">';
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Favicon Apple 72</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="alert alert-info alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        Detalles de la imagen a subir:<br>
                        -Formato: PNG (transparente)<br>
                        -Dimensión Recomendada: 72  x 72<br>
                        -Tamaño: 2MB<br>
                    </div>
                    <div class="html5fileupload fileFaviconApple72" data-max-filesize="2048000" data-url="<?= URL; ?>/admin/uploadImgFaviconApple72" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                        <input type="file" name="file_archivo" />
                    </div>
                    <script>
                        $(".html5fileupload.fileFaviconApple72").html5fileupload({
                            onAfterStartSuccess: function (response) {
                                $("#imgLogoFaviconApple72").html(response.content);
                            }
                        });
                    </script>
                    <div class="row">
                        <div class="col-md-12" id="imgLogoFaviconApple72">
                            <img class="img-responsive" src="<?= URL ?>public/images/<?= $this->logos['apple_72']; ?>">';
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Favicon Apple 114</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="alert alert-info alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        Detalles de la imagen a subir:<br>
                        -Formato: PNG (transparente)<br>
                        -Dimensión Recomendada: 114  x 114<br>
                        -Tamaño: 2MB<br>
                    </div>
                    <div class="html5fileupload fileFaviconApple114" data-max-filesize="2048000" data-url="<?= URL; ?>/admin/uploadImgFaviconApple114" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                        <input type="file" name="file_archivo" />
                    </div>
                    <script>
                        $(".html5fileupload.fileFaviconApple114").html5fileupload({
                            onAfterStartSuccess: function (response) {
                                $("#imgLogoFaviconApple114").html(response.content);
                            }
                        });
                    </script>
                    <div class="row">
                        <div class="col-md-12" id="imgLogoFaviconApple114">
                            <img class="img-responsive" src="<?= URL ?>public/images/<?= $this->logos['apple_114']; ?>">';
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>