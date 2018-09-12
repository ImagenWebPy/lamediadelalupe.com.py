<?php
$inicio = FALSE;
$quienesSomos = FALSE;
$servicios = FALSE;
$herramientas = FALSE;
$clientes = FALSE;
$noticias = FALSE;
$contacto = FALSE;
foreach ($this->mostrarMenu as $val) {
    if ($val['id_menu'] == 'inicio') {
        $inicio = TRUE;
    }
    if ($val['id_menu'] == 'quienes_somos') {
        $quienesSomos = TRUE;
    }
    if ($val['id_menu'] == 'servicios') {
        $servicios = TRUE;
    }
    if ($val['id_menu'] == 'nuestros_clientes') {
        $clientes = TRUE;
    }
    if ($val['id_menu'] == 'noticias') {
        $noticias = TRUE;
    }
    if ($val['id_menu'] == 'contacto') {
        $contacto = TRUE;
    }
    if ($val['id_menu'] == 'herramientas') {
        $herramientas = TRUE;
    }
}
?>
<!-- BEGIN: Page content -->
<?php if (!empty($inicio)): ?>
    <section id="inicio">
        <div class="view">
            <?php foreach ($this->datosInicio['imagenes'] as $imagenes): ?>
                <img alt class="bg" src="<?= URL; ?>public/images/inicio/<?= $imagenes['imagen']; ?>" />
            <?php endforeach; ?>
            <div class="content home-alice full-size colors-a background-transparent">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                            <div class="text-right textillate heading  hidden-xs hidden-sm" data-textillate-options="{loop:true, in:{effect:'flipInY', reverse:true}, out:{effect:'flipOutY', reverse:true}}">
                                <ul class="texts">
                                    <?php foreach ($this->datosInicio['textos'] as $textos): ?>
                                        <li><?= utf8_encode($textos['texto']); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <h1 class="heading text-right"><?= utf8_encode($this->datosInicio['contenido']['titulo']); ?></h1>
                            <p class="text-right title">
                                <?= utf8_encode($this->datosInicio['contenido']['contenido']); ?>
                            </p>
                            <p class="text-right"><a href="#<?= $this->mostrarMenu[1]['id_menu']; ?>" class="button background-60-d heading-d"><?= utf8_encode($this->mostrarMenu[1]['descripcion']); ?></a><a href="#<?= $this->mostrarMenu[4]['id_menu']; ?>" class="button background-60-f heading-f"><?= utf8_encode($this->mostrarMenu[4]['descripcion']); ?></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if (!empty($quienesSomos)): ?>
    <section id="quienes_somos">
        <div class="view">
        </div>
        <div class="view">
            <?php foreach ($this->quienesSomosImagenes as $imagenes): ?>
                <img alt class="bg" src="<?= URL; ?>public/images/background-quienes_somos/<?= $imagenes['imagen']; ?>" />
            <?php endforeach; ?>
            <div class="content colors-e">
                <div class="container">
                    <h2><?= utf8_encode($this->quienesSomos['titulo']); ?></h2>
                    <?= utf8_encode($this->quienesSomos['contenido']); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-icon">
                                <i class="<?= utf8_encode($this->quienesSomos['fontawesome_vision']); ?>" aria-hidden="true"></i>
                            </div>
                            <div class="col-content">
                                <h4><span class="highlight"><?= utf8_encode($this->quienesSomos['titulo_vision']); ?></span></h4>
                                <p><?= utf8_encode($this->quienesSomos['contenido_vision']); ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-icon">
                                <i class="<?= utf8_encode($this->quienesSomos['fontawesome_mision']); ?>" aria-hidden="true"></i>
                            </div>
                            <div class="col-content">
                                <h4><span class="highlight"><?= utf8_encode($this->quienesSomos['titulo_mision']); ?></span></h4>
                                <p><?= utf8_encode($this->quienesSomos['contenido_mision']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="view">
            <?php foreach ($this->datosDirectores['imagenes'] as $imagen): ?>
                <img alt class="bg" src="<?= URL; ?>public/images/background-directores/<?= $imagen['imagen']; ?>" />
            <?php endforeach; ?>
            <div class="content colors-h">
                <div class="container">
                    <h3><?= $this->datosDirectores['titulo']; ?></h3>
                    <div class="row icon-set">
                        <?php foreach ($this->datosDirectores['directores'] as $director): ?>
                            <div class="col-md-4 col-sm-6  col-xs-6">
                                <div class="hover-overlay">
                                    <img alt="<?= utf8_encode($director['nombre']); ?>" src="<?= URL; ?>public/images/directores/<?= $director['imagen']; ?>" title="<?= utf8_encode($director['nombre']); ?>" class="fluid-width">
                                    <div class="overlay background-90-b">
                                        <div>
                                            <div class="separator-small"></div>
                                            <p class="text-center">
                                                <a target="_blank" href="mailto:<?= utf8_encode($director['email']); ?>"><i class="fa fa-envelope-o"></i></a>
                                                <a target="_blank" href="<?= utf8_encode($director['linkedin']); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="caption">
                                    <p>
                                        <span class="title"><?= utf8_encode($director['nombre']); ?></span>
                                        <br/>
                                        <span class="highlight"><?= utf8_encode($director['cargo']); ?></span>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="view">
            <div class="content colors-e">
                <div class="container">
                    <h2 class="highlight-a"><?= $this->datosEquipo['titulo']; ?></h2>
                    <div class="row">
                        <?php foreach ($this->datosEquipo['integrantes'] as $equipo): ?>
                            <div class="col-md-3 col-sm-6  col-xs-6">
                                <div class="hover-overlay">
                                    <img alt="<?= utf8_encode($equipo['nombre']); ?>" src="<?= URL; ?>public/images/equipo/<?= $equipo['imagen']; ?>" title="<?= utf8_encode($equipo['nombre']); ?>" class="fluid-width">
                                    <div class="overlay background-90-b">
                                        <div>
                                            <div class="separator-small"></div>
                                            <p class="text-center">
                                                <a target="_blank" href="mailto:<?= utf8_encode($equipo['email']); ?>"><i class="fa fa-envelope-o"></i></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="caption">
                                    <p>
                                        <span class="title"><?= utf8_encode($equipo['nombre']); ?></span>
                                        <br/>
                                        <span class="highlight"><?= utf8_encode($equipo['cargo']); ?></span>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="row">
                        <div class="col-md-8" style="float: none; margin: 0 auto; padding: 30px 0px;">
                            <img class="img-responsive" src="<?= URL; ?>public/images/equipo/lamedia-equipo.jpg" alt="Equipo de la Media" />
                        </div>
                    </div>
                    <h3><span class="highlight"><?= $this->datosValores['titulo']; ?></span></h3>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="skillbars">
                                <?php foreach ($this->datosValores['valores'] as $item): ?>
                                    <div class="skillbar clearfix background-d" data-percent="50%">
                                        <div class="skillbar-title background-b heading-b"><span><?= utf8_encode($item['descripcion']); ?></span></div>
                                        <div class="skillbar-bar background-b"></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if (!empty($servicios)): ?>
    <section id="servicios">
        <div class="view">
            <?php foreach ($this->datosServicios['imagenes'] as $imagen): ?>
                <img alt class="bg" src="<?= URL; ?>public/images/background-servicios/<?= $imagen['imagen']; ?>" />
            <?php endforeach; ?>
            <div class="content colors-e">
                <div class="container">
                    <h2><?= $this->datosServicios['titulo']; ?></h2>
                    <div class="row">
                        <?php foreach ($this->datosServicios['servicios'] as $servicios): ?>
                            <div class="col-md-4 top-line" style="height: 600px;">
                                <h4><?= utf8_encode($servicios['titulo']); ?></h4>
                                <?= utf8_encode($servicios['contenido']); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if (!empty($herramientas)): ?>
    <section id="herramientas">
        <div class="view">
            <?php foreach ($this->datosHerramientas['imagenes'] as $imagen): ?>
                <img alt class="bg" src="<?= URL; ?>public/images/background-herramientas/<?= $imagen['imagen']; ?>" />
            <?php endforeach; ?>
            <div class="content colors-e">
                <div class="container">
                    <h2><?= $this->datosHerramientas['titulo']; ?></h2>
                    <div class="process">
                        <div class="row process-row">
                            <?php foreach ($this->datosHerramientas['herramientas'] as $herramienta): ?>
                                <div class="col-md-4 process-step" style="height: 550px;">
                                    <div class="process-box"><img class="img-responsive" src="<?= URL; ?>public/images/herramientas/<?= utf8_encode($herramienta['imagen']); ?>" style="position: relative; top: 10px;"></i></div>
                                    <p class="title"><?= utf8_encode($herramienta['titulo']); ?></p>
                                    <?= utf8_encode($herramienta['contenido']); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if (!empty($clientes)): ?>
    <section id="nuestros_clientes">
        <div class="view">
            <div class="content no-bottom-padding colors-e">
                <div class="container">
                    <h2><span class="highlight"><?= $this->datosClientes['titulo']; ?></span></h2>
                </div>
                <div class="gallery background-e" data-default-group="all" data-overlay=".gallery-overlay">
                    <div class="container-fluid">
                        <!--                        <div class="filter">
                                                    <ul class="nav nav-pills text-center">
                                                        <li><a class="hover-effect" data-group="all" href="#">Todos</a></li>
                        <?php foreach ($this->datosClientes['tipos'] as $tipo): ?>
                                                                        <li><a class="hover-effect" data-group="<?= $tipo['tipo']; ?>" href="#"><?= $tipo['tipo']; ?></a></li>
                        <?php endforeach; ?>
                                                    </ul>
                                                </div>-->
                        <div class="row">
                            <div class="grid">
                                <?php foreach ($this->datosClientes['clientes'] as $cliente): ?>
                                    <div class="item col-md-3 col-sm-4 col-xs-6" data-groups='["<?= $cliente['tipo']; ?>"]'>
                                        <a href="#!<?= URL; ?>clientes/cliente/<?= $cliente['id']; ?>" class="hover-overlay">
                                            <img alt="<?= utf8_encode($cliente['nombre']); ?>" src="<?= URL; ?>public/images/clientes/<?= utf8_encode($cliente['imagen']); ?>" />
                                            <div class="overlay background-90-e">
                                                <div class="hidden-xs">
                                                    <p class="title heading-e"><?= utf8_encode($cliente['nombre']); ?></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if (!empty($noticias)): ?>
    <section id="noticias">
        <div class="view">
            <div class="content no-bottom-padding colors-e">
                <div class="container">
                    <h2><span class="highlight"><?= $this->datosMultimedia['titulo']; ?></span></h2>
                </div>
                <div class="gallery background-e" data-default-group="all" data-overlay=".gallery-overlay">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="grid">
                                <?php foreach ($this->datosMultimedia['multimedia'] as $multimedia): ?>
                                    <div class="item col-md-3 col-sm-4 col-xs-6">
                                        <a href="#!<?= URL; ?>multimedia/contenido/<?= $multimedia['id']; ?>" class="hover-overlay">
                                            <img alt="<?= utf8_encode($multimedia['titulo']); ?>" src="<?= URL; ?>public/multimedia/imagenes/<?= utf8_encode($multimedia['imagen']); ?>" />
                                            <div class="overlay background-90-e">
                                                <div class="hidden-xs">
                                                    <p class="title heading-e"><?= utf8_encode($multimedia['titulo']); ?></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if (!empty($quienesSomos)): ?>
    <section id="contacto">
        <div class="view">
            <?php foreach ($this->datosContacto['imagenes'] as $imagen): ?>
                <img alt class="bg" src="<?= URL; ?>public/images/background-contacto/<?= $imagen['imagen']; ?>" />
            <?php endforeach; ?>
            <div class="content full-size colors-h">
                <div class="container">
                    <h2><?= utf8_encode($this->datosContacto['datos']['titulo_contacto']); ?></h2>
                    <p class="header-details"><?= utf8_encode($this->datosContacto['datos']['subtitulo_contacto']); ?></p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-right scroll-in-animation" data-animation="fadeInLeft">
                                <p class="big-font uppercase">
                                    Tel: <strong class="highlight"><?= utf8_encode($this->datosContacto['datos']['telefono']); ?></strong>
                                </p>
                                <p class="big-font uppercase">
                                    <?= utf8_encode($this->datosContacto['datos']['direccion']); ?>
                                    <br/> <?= utf8_encode($this->datosContacto['datos']['ciudad']); ?>
                                </p>
                                <p class="big-font">
                                    <b>
                                        <a href="mailto:<?= utf8_encode($this->datosContacto['datos']['email']); ?>"><?= utf8_encode($this->datosContacto['datos']['email']); ?></a><br/>
                                        <a href=<?= utf8_encode($this->datosContacto['datos']['web']); ?>"><?= utf8_encode($this->datosContacto['datos']['web']); ?></a>
                                           </b>
                                           </p>
                                           </div>
                                           </div>
                                           <div class="col-md-6">
                                           <div class="text-left scroll-in-animation" data-animation="fadeInRight">
                                                <form class="ajax-form" action="<?= URL; ?>clientes/contacto" data-message-class="colors-d background-95 heading border" method="post" novalidate="novalidate">
                                                    <div class="row">
                                                        <div class="col-md-6 control-group">
                                                            <div class="alt-placeholder">Nombre</div>
                                                            <input type="text" name="nombre" value="" size="40" placeholder="Nombre" data-validation-required-message="Cual es tu nombre?" required>
                                                            <div class="help-block"></div>
                                                        </div>
                                                        <div class="col-md-6 control-group">
                                                            <div class="alt-placeholder">Email</div>
                                                            <input type="email" name="email" value="" size="40" placeholder="Email" data-validation-required-message="No te olvides de tu email" required>
                                                            <div class="help-block"></div>
                                                        </div>
                                                        <div class="col-md-12 control-group">
                                                            <div class="alt-placeholder">Mensaje</div>
                                                            <textarea name="mensaje" placeholder="Mensaje" data-validation-required-message="Escribínos un mensaje" required></textarea>
                                                            <div class="help-block"></div>
                                                        </div>
                                                        <div class="col-md-12 form-actions">
                                                            <input class="button" type="submit" value="Enviar">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="text-center">
                                                <a class="map-open button background-lite-b border-heading-b heading-b" data-map-overlay=".map-overlay" href="#">Localizanos en el mapa</a>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            </section>
                                        <?php endif; ?>
                                        <!-- END: Page content -->
