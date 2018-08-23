<!-- BEGIN: Page content -->
<section id="<?= $this->mostrarMenu[0]['id_menu']; ?>">
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
                        <p class="text-right"><a href="#<?= $this->mostrarMenu[1]['id_menu']; ?>" class="button background-60-d heading-d"><?= utf8_encode($this->mostrarMenu[1]['descripcion']); ?></a><a href="#work" class="button background-60-f heading-f">Our Work</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="<?= $this->mostrarMenu[1]['id_menu']; ?>">
    <div class="view">
    </div>
    <div class="view">
        <img alt class="bg" src="<?= URL; ?>public/images/placeholders/1920x1200-0.jpg" /><img alt class="bg" src="<?= URL; ?>public/images/placeholders/1920x1200-1.jpg" />
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
    <div class="view" id="how-we-work">
        <?php foreach ($this->datosDirectores['imagenes'] as $imagen): ?>
            <img alt class="bg" src="<?= URL; ?>public/images/background-directores/<?= $imagen['imagen']; ?>" />
        <?php endforeach; ?>
        <div class="content colors-h">
            <div class="container">
                <h3><?= $this->datosDirectores['titulo']; ?></h3>
                <div class="row icon-set">
                    <?php foreach ($this->datosDirectores['directores'] as $director): ?>
                        <div class="col-md-4 text-center">
                            <p>
                                <i class="circle scroll-in-animation background-20 heading" data-animation="fadeInUp"><img class="img-responsive img-circle" src="<?= URL; ?>public/images/directores/<?= $director['imagen']; ?>" alt="<?= utf8_encode($director['nombre']); ?>"></i>
                            </p>
                            <p class="title"><span class="underline-text"><?= utf8_encode($director['nombre']); ?></span></p>
                            <p><?= utf8_encode($director['cargo']); ?></p>
                            <ul class="list-inline">
                                <li>
                                    <a href="<?= utf8_encode($director['linkedin']); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="mailto:<?= utf8_encode($director['email']); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                                </li>
                            </ul>
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
                                <img alt="Mike Johnson" src="<?= URL; ?>public/images/equipo/<?= $equipo['imagen']; ?>" title="<?= utf8_encode($equipo['nombre']); ?>" class="fluid-width">
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
<section id="<?= $this->mostrarMenu[2]['id_menu']; ?>">
    <div class="view">
        <?php foreach ($this->datosServicios['imagenes'] as $imagen): ?>
            <img alt class="bg" src="<?= URL; ?>public/images/background-servicios/<?= $imagen['imagen']; ?>" />
        <?php endforeach; ?>
        <div class="content colors-e">
            <div class="container">
                <h2><?= $this->datosServicios['titulo']; ?></h2>
                <div class="row">
                    <?php foreach ($this->datosServicios['servicios'] as $servicios): ?>
                        <div class="col-md-3 top-line">
                            <h4><?= utf8_encode($servicios['titulo']); ?></h4>
                            <?= utf8_encode($servicios['contenido']); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="<?= $this->mostrarMenu[3]['id_menu']; ?>">
    <div class="view">
        <img alt class="bg" src="<?= URL; ?>public/images/placeholders/1920x1200-1.jpg" /><img alt class="bg" src="<?= URL; ?>public/images/placeholders/1920x1200-2.jpg" />
        <div class="content colors-e">
            <div class="container">
                <h2>Our <span class="highlight">Process</span></h2>
                <p class="header-details"><span class="highlight">We Make</span> Our Customers Happy</p>
                <p class="lead">Curabitur eget nulla ut neque aliquam dictum. Nam sollicitudin leo dui, non malesuada felis aliquam non. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus finibus tempor neque vel scelerisque. Cras nec ex ut eleifend mollis ut a nibh. Vivamus commodo est sit amet ultricies.</p>
                <div class="process">
                    <div class="row process-row">
                        <div class="col-md-3 process-step">
                            <div class="process-box"><i class="li_search heading"></i></div>
                            <p class="title">Research</p>
                            <p class="text-center">Vestibulum placerat, ipsum vel mollis ornare, libero ex dapibus diam, gravida tempor.</p>
                        </div>
                        <div class="col-md-3 process-step">
                            <div class="process-box"><i class="li_pen heading"></i></div>
                            <p class="title">Concept</p>
                            <p class="text-center">Vestibulum vel dictum dolor, eget luctus risus. Nullam scelerisque viverra nisl et vehicula, in ut tellus.</p>
                        </div>
                        <div class="col-md-3 process-step">
                            <div class="process-box"><i class="li_settings heading"></i></div>
                            <p class="title">Develop</p>
                            <p class="text-center">Mauris venenatis vulputate ligula eu finibus. Donec pretium libero lacus, vitae maximus purus dapibus.</p>
                        </div>
                        <div class="col-md-3 process-step">
                            <div class="process-box"><i class="li_paperplane heading"></i></div>
                            <p class="title">Test</p>
                            <p class="text-center">Proin gravida, est sed vestibulum cursus, enim libero sollicitudin lacus, vel ornare nunc.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <p class="text-center">Aliquam fermentum massa ac est sollicitudin, at ultricies ligula tristique. Cras finibus, nulla ac convallis feugiat, nisl nisl lobortis est, eget auctor velit magna vel nunc. Donec nec eros rhoncus.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="<?= $this->mostrarMenu[4]['id_menu']; ?>">
    <div class="view">
        <div class="content no-bottom-padding colors-e">
            <div class="container">
                <h2>Our <span class="highlight">Work</span></h2>
                <p class="header-details"><span class="highlight">Some Recent</span> Projects</p>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
            </div>
            <div class="gallery background-e" data-default-group="all" data-overlay=".gallery-overlay">
                <div class="container-fluid">
                    <div class="filter">
                        <ul class="nav nav-pills text-center">
                            <li><a class="hover-effect" data-group="all" href="#">All</a></li>
                            <li><a class="hover-effect" data-group="web" href="#">Web</a></li>
                            <li><a class="hover-effect" data-group="video" href="#">Video</a></li>
                            <li><a class="hover-effect" data-group="photography" href="#">Photography</a></li>
                            <li><a class="hover-effect" data-group="design" href="#">Design</a> </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="grid">
                            <div class="item col-md-3 col-sm-4 col-xs-6" data-groups='["design"]'>
                                <a href="#!portfolio-item-1.html" class="hover-overlay">
                                    <img alt="Project 1" src="<?= URL; ?>public/images/placeholders/500x400-1.jpg" />
                                    <div class="overlay background-90-e">
                                        <div class="hidden-xs">
                                            <p class="title heading-e">Image</p>
                                            <p class="text-center heading-e"><strong>Excepteur sint lorem ipsum dolor sit amet consectetur.</strong></p>
                                            <p class="text-center"><i class="fa fa-picture-o heading-e"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item col-md-3 col-sm-4 col-xs-6" data-groups='["photography", "web", "video"]'>
                                <a href="#!portfolio-item-2.html" class="hover-overlay">
                                    <img alt="Project 2" src="<?= URL; ?>public/images/placeholders/500x400-2.jpg" />
                                    <div class="overlay background-90-e">
                                        <div class="hidden-xs">
                                            <p class="title heading-e">YouTube Video</p>
                                            <p class="text-center heading-e"><strong>Excepteur sint lorem ipsum dolor sit amet consectetur.</strong></p>
                                            <p class="text-center"><i class="fa fa-youtube-square heading-e"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item col-md-3 col-sm-4 col-xs-6" data-groups='["photography", "design"]'>
                                <a href="#!portfolio-item-3.html" class="hover-overlay">
                                    <img alt="Project 3" src="<?= URL; ?>public/images/placeholders/500x400-0.jpg" />
                                    <div class="overlay background-90-e">
                                        <div class="hidden-xs">
                                            <p class="title heading-e">Slider</p>
                                            <p class="text-center heading-e"><strong>Excepteur sint lorem ipsum dolor sit amet consectetur.</strong></p>
                                            <p class="text-center"><i class="fa fa-th heading-e"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item col-md-3 col-sm-4 col-xs-6" data-groups='["photography", "web", "video"]'>
                                <a href="#!portfolio-item-4.html" class="hover-overlay">
                                    <img alt="Project 4" src="<?= URL; ?>public/images/placeholders/500x400-1.jpg" />
                                    <div class="overlay background-90-e">
                                        <div class="hidden-xs">
                                            <p class="title heading-e">Vimeo Video</p>
                                            <p class="text-center heading-e"><strong>Excepteur sint lorem ipsum dolor sit amet consectetur.</strong></p>
                                            <p class="text-center"><i class="fa fa-vimeo-square heading-e"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item col-md-3 col-sm-4 col-xs-6" data-groups='["photography", "design"]'>
                                <a href="#!portfolio-item-5.html" class="hover-overlay">
                                    <img alt="Project 5" src="<?= URL; ?>public/images/placeholders/500x400-2.jpg" />
                                    <div class="overlay background-90-e">
                                        <div class="hidden-xs">
                                            <p class="title heading-e">Slider</p>
                                            <p class="text-center heading-e"><strong>Excepteur sint lorem ipsum dolor sit amet consectetur.</strong></p>
                                            <p class="text-center"><i class="fa fa-th heading-e"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item col-md-3 col-sm-4 col-xs-6" data-groups='["photography", "web", "design"]'>
                                <a href="#!portfolio-item-6.html" class="hover-overlay">
                                    <img alt="Project 6" src="<?= URL; ?>public/images/placeholders/500x400-0.jpg" />
                                    <div class="overlay background-90-e">
                                        <div class="hidden-xs">
                                            <p class="title heading-e">Image</p>
                                            <p class="text-center heading-e"><strong>Excepteur sint lorem ipsum dolor sit amet consectetur.</strong></p>
                                            <p class="text-center"><i class="fa fa-picture-o heading-e"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item col-md-3 col-sm-4 col-xs-6" data-groups='["design", "video", "web"]'>
                                <a href="#!portfolio-item-7.html" class="hover-overlay">
                                    <img alt="Project 7" src="<?= URL; ?>public/images/placeholders/500x400-1.jpg" />
                                    <div class="overlay background-90-e">
                                        <div class="hidden-xs">
                                            <p class="title heading-e">Vimeo Video</p>
                                            <p class="text-center heading-e"><strong>Excepteur sint lorem ipsum dolor sit amet consectetur.</strong></p>
                                            <p class="text-center"><i class="fa fa-vimeo-square heading-e"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item col-md-3 col-sm-4 col-xs-6" data-groups='["web"]'>
                                <a href="#!portfolio-item-8.html" class="hover-overlay">
                                    <img alt="Project 8" src="<?= URL; ?>public/images/placeholders/500x400-2.jpg" />
                                    <div class="overlay background-90-e">
                                        <div class="hidden-xs">
                                            <p class="title heading-e">Image</p>
                                            <p class="text-center heading-e"><strong>Excepteur sint lorem ipsum dolor sit amet consectetur.</strong></p>
                                            <p class="text-center"><i class="fa fa-picture-o heading-e"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item col-md-3 col-sm-4 col-xs-6" data-groups='["photography", "design", "video", "web"]'>
                                <a href="#!portfolio-item-9.html" class="hover-overlay">
                                    <img alt="Project 9" src="<?= URL; ?>public/images/placeholders/500x400-0.jpg" />
                                    <div class="overlay background-90-e">
                                        <div class="hidden-xs">
                                            <p class="title heading-e">YouTube Video</p>
                                            <p class="text-center heading-e"><strong>Excepteur sint lorem ipsum dolor sit amet consectetur.</strong></p>
                                            <p class="text-center"><i class="fa fa-youtube-square heading-e"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item col-md-3 col-sm-4 col-xs-6" data-groups='["photography", "design"]'>
                                <a href="#!portfolio-item-10.html" class="hover-overlay">
                                    <img alt="Project 10" src="<?= URL; ?>public/images/placeholders/500x400-1.jpg" />
                                    <div class="overlay background-90-e">
                                        <div class="hidden-xs">
                                            <p class="title heading-e">Vimeo Video</p>
                                            <p class="text-center heading-e"><strong>Excepteur sint lorem ipsum dolor sit amet consectetur.</strong></p>
                                            <p class="text-center"><i class="fa fa-vimeo-square heading-e"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item col-md-3 col-sm-4 col-xs-6" data-groups='["photography", "web"]'>
                                <a href="#!portfolio-item-11.html" class="hover-overlay">
                                    <img alt="Project 11" src="<?= URL; ?>public/images/placeholders/500x400-2.jpg" />
                                    <div class="overlay background-90-e">
                                        <div class="hidden-xs">
                                            <p class="title heading-e">Image</p>
                                            <p class="text-center heading-e"><strong>Excepteur sint lorem ipsum dolor sit amet consectetur.</strong></p>
                                            <p class="text-center"><i class="fa fa-picture-o heading-e"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item col-md-3 col-sm-4 col-xs-6" data-groups='["web", "design"]'>
                                <a href="#!portfolio-item-12.html" class="hover-overlay">
                                    <img alt="Project 12" src="<?= URL; ?>public/images/placeholders/500x400-0.jpg" />
                                    <div class="overlay background-90-e">
                                        <div class="hidden-xs">
                                            <p class="title heading-e">Slider</p>
                                            <p class="text-center heading-e"><strong>Excepteur sint lorem ipsum dolor sit amet consectetur.</strong></p>
                                            <p class="text-center"><i class="fa fa-th heading-e"></i></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="skills">
    <div class="view">
        <img alt class="bg" src="<?= URL; ?>public/images/placeholders/1920x1200-2.jpg" /><img alt class="bg" src="<?= URL; ?>public/images/placeholders/1920x1200-0.jpg" />
        <div class="content colors-e">
            <div class="container">
                <h2>Our <span class="highlight">Skills</span></h2>
                <p class="header-details"><span class="highlight">Our Main</span> Skills</p>
                <p class="lead">Aliquam scelerisque vestibulum mi, eu commodo sem vestibulum convallis. Proin sed mi vehicula, porta nisi eu, facilisis nisl. Etiam tristique mi nec fermentum vestibulum. Nullam in nisi ut tellus laoreet ultrices. In ullamcorper dictum interdum vestibulum etiam tristique mi nec fermentum commodo sem vestibulum laoreet ultrices.</p>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="widget-tabs nav nav-tabs background-lite-e">
                            <li class="active"><a href="#html5" data-toggle="tab">HTML5</a></li>
                            <li class=""><a href="#css3" data-toggle="tab">CSS3</a></li>
                            <li class=""><a href="#jquery-skill" data-toggle="tab">jQuery</a></li>
                            <li class=""><a href="#wordpress" data-toggle="tab">Wordpress</a></li>
                            <li class=""><a href="#seo" data-toggle="tab">SEO</a></li>
                            <li class=""><a href="#photoshop" data-toggle="tab">Photoshop</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="html5">
                                <p>Fusce hendrerit enim et lacus rutrum, fermentum consectetur mauris hendrerit. Mauris scelerisque, est eget convallis blandit, lorem est scelerisque dolor, non dapibus orci enim ut risus. Praesent rhoncus ex sit amet nunc luctus, nec eleifend erat suscipit. In feugiat dui eget gravida dignissim. Quisque sed dictum felis. Integer viverra iaculis nulla, a euismod est. Nulla nec felis ipsum. Phasellus sed scelerisque nisl, eu condimentum metus. Aenean convallis risus nec eleifend pharetra. Vivamus rhoncus eleifend mi in imperdiet. Nullam a justo quis dolor viverra elementum. Nam eleifend leo quis elementum cursus.</p>
                            </div>
                            <div class="tab-pane fade" id="css3">
                                <p>Sed dapibus, leo ut egestas convallis, leo purus condimentum ipsum, sit amet lobortis odio nisi id enim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi suscipit, mi in interdum volutpat, quam mi porta nisi, dapibus placerat sapien tortor eleifend arcu. Cras sit amet euismod mi, non imperdiet felis. Praesent eros nibh, ullamcorper ut suscipit sit amet, mattis sollicitudin lectus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis in enim sit amet nibh placerat consectetur id et enim. Nunc nec dui ac ligula posuere posuere vel id metus. Integer maximus eros nec lobortis tempor.</p>
                            </div>
                            <div class="tab-pane fade" id="jquery-skill">
                                <p>Nam eget ex mi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam blandit, enim nec rutrum maximus, odio purus maximus odio, vel mattis nisi ante ut velit. Nam ut turpis vel dolor maximus dictum. Donec blandit turpis ut vulputate facilisis. Nam est nisi, posuere vitae posuere in, viverra non tellus. Pellentesque congue, sapien eget sollicitudin sollicitudin, est leo imperdiet ante, facilisis viverra mi augue in leo. Vestibulum felis urna, pharetra et eros ut, mattis consequat mi. Curabitur id tortor mattis, aliquet eros hendrerit, mattis metus. Ut dignissim vel augue in congue. Nulla a ante ut mi scelerisque suscipit. Aenean condimentum turpis mi, sit amet ullamcorper mi commodo non.</p>
                            </div>
                            <div class="tab-pane fade" id="php">
                                <p>Nulla egestas eu odio ac dictum. Phasellus eu odio lectus. Fusce luctus tempor mauris, vel accumsan leo. Nam libero velit, ultrices vel malesuada nec, euismod nec dolor. Maecenas congue erat sed maximus semper. Aliquam vestibulum magna sit amet pulvinar vestibulum. Cras semper condimentum ante, eget suscipit sapien. Sed ac urna nunc. Aenean viverra sem sit amet dolor pretium fringilla. Nam luctus tempus nibh vitae efficitur. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                            </div>
                            <div class="tab-pane fade" id="wordpress">
                                <p>Fusce non commodo sapien, quis ultrices enim. Proin in placerat urna. Nulla luctus leo nec massa vestibulum consequat quis a quam. Maecenas et leo ut orci fringilla ornare non sit amet lectus. Donec ornare eros tortor, sit amet condimentum lectus placerat ut. Duis lacus neque, lacinia non nunc id, aliquet tincidunt orci. In tellus felis, posuere non est rhoncus, tincidunt elementum sapien. Sed non sagittis ante. Duis ultricies mi dolor, feugiat blandit metus ullamcorper nec. Nullam semper gravida consequat. Suspendisse potenti. Mauris sit amet nisi at enim lacinia dignissim. Aenean suscipit pulvinar ex, eu venenatis magna dapibus sit amet.</p>
                            </div>
                            <div class="tab-pane fade" id="seo">
                                <p>Proin non augue posuere, iaculis tortor in, molestie lorem. Praesent ut gravida sem. Aenean sit amet lorem leo. Curabitur risus ante, pulvinar vel erat viverra, porttitor volutpat turpis. Praesent et sapien interdum, sollicitudin nisi non, bibendum leo. Duis posuere lectus velit, vel volutpat massa blandit non. Donec pellentesque vel magna ut dignissim. Pellentesque luctus fringilla eros, in tempus neque venenatis consectetur. Pellentesque purus mauris, laoreet eget augue in, pellentesque sagittis arcu. Etiam at blandit lectus, sit amet volutpat tellus.</p>
                            </div>
                            <div class="tab-pane fade" id="photoshop">
                                <p>Donec ac consectetur neque, vel eleifend nisi. In et nibh at neque convallis tincidunt. Aliquam sodales odio vel malesuada interdum. Duis auctor malesuada lorem. Nulla sed neque ut dui imperdiet congue ut sit amet enim. Phasellus vel commodo dui. Aliquam eu eleifend diam, vitae dapibus velit. Suspendisse ac est hendrerit, mollis lectus vel, accumsan urna. Quisque sit amet iaculis libero, sed maximus justo. Nunc laoreet non libero eu vehicula. Vestibulum ex lectus, pharetra non elementum et, gravida quis mauris. Donec sodales odio eget accumsan blandit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="skillbars">
                            <div class="skillbar clearfix background-d" data-percent="40%">
                                <div class="skillbar-title background-b heading-b"><span>HTML5</span></div>
                                <div class="skillbar-bar background-b"></div>
                                <div class="skill-bar-percent heading-d">40%</div>
                            </div>
                            <div class="skillbar clearfix background-d" data-percent="45%">
                                <div class="skillbar-title background-c heading-c"><span>CSS3</span></div>
                                <div class="skillbar-bar background-c"></div>
                                <div class="skill-bar-percent heading-d">45%</div>
                            </div>
                            <div class="skillbar clearfix background-d" data-percent="50%">
                                <div class="skillbar-title background-b heading-b"><span>jQuery</span></div>
                                <div class="skillbar-bar background-b"></div>
                                <div class="skill-bar-percent heading-d">50%</div>
                            </div>
                            <div class="skillbar clearfix background-d" data-percent="40%">
                                <div class="skillbar-title background-c heading-c"><span>PHP</span></div>
                                <div class="skillbar-bar background-c"></div>
                                <div class="skill-bar-percent heading-d">40%</div>
                            </div>
                            <div class="skillbar clearfix background-d" data-percent="90%">
                                <div class="skillbar-title background-b heading-b"><span>Wordpress</span></div>
                                <div class="skillbar-bar background-b"></div>
                                <div class="skill-bar-percent heading-d">90%</div>
                            </div>
                            <div class="skillbar clearfix background-d" data-percent="75%">
                                <div class="skillbar-title background-c heading-c"><span>SEO</span></div>
                                <div class="skillbar-bar background-c"></div>
                                <div class="skill-bar-percent heading-d">75%</div>
                            </div>
                            <div class="skillbar clearfix background-d" data-percent="70%">
                                <div class="skillbar-title background-b heading-b"><span>Photoshop</span></div>
                                <div class="skillbar-bar background-b"></div>
                                <div class="skill-bar-percent heading-d">70%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="<?= $this->mostrarMenu[6]['id_menu']; ?>">
    <div class="view">
        <img alt class="bg" src="<?= URL; ?>public/images/placeholders/1920x1200-1.jpg" /><img alt class="bg" src="<?= URL; ?>public/images/placeholders/1920x1200-2.jpg" /><img alt class="bg" src="<?= URL; ?>public/images/placeholders/1920x1200-0.jpg" />
        <div class="content full-size colors-h">
            <div class="container">
                <h2>Contact</h2>
                <p class="header-details">Keep In Touch</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="text-right scroll-in-animation" data-animation="fadeInLeft">
                            <p class="big-font uppercase">
                                Tel: <strong class="highlight">+7 (781) 503-1810</strong>
                            </p>
                            <p class="big-font uppercase">
                                500 Unicorn Park Dr, 21st Floor
                                <br/> Woburn, MA 01801, United States
                            </p>
                            <p class="big-font">
                                <b>
                                    <a href="mailto:info@ouraddress.com">info@ouraddress.com</a><br/>
                                    <a href="http://www.ouraddress.com">www.ouraddress.com</a>
                                </b>
                            </p>
                            <p class="big-font">
                                <a target="_blank" href="https://twitter.com/"><span class="fa-stack"><i class="fa fa-circle fa-stack-2x heading"></i><i class="fa fa-twitter fa-stack-1x text-background"></i></span></a>
                                <a target="_blank" href="https://www.facebook.com/"><span class="fa-stack"><i class="fa fa-circle fa-stack-2x heading"></i><i class="fa fa-facebook fa-stack-1x text-background"></i></span></a>
                                <a target="_blank" href="http://www.youtube.com/"><span class="fa-stack"><i class="fa fa-circle fa-stack-2x heading"></i><i class="fa fa-youtube fa-stack-1x text-background"></i></span></a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-left scroll-in-animation" data-animation="fadeInRight">
                            <form class="ajax-form" data-message-class="colors-d background-95 heading border" action="contact.php" method="post" novalidate="novalidate">
                                <div class="row">
                                    <div class="col-md-6 control-group">
                                        <div class="alt-placeholder">Name</div>
                                        <input type="text" name="your-name" value="" size="40" placeholder="Name" data-validation-required-message="Please fill the required field." required>
                                        <div class="help-block"></div>
                                    </div>
                                    <div class="col-md-6 control-group">
                                        <div class="alt-placeholder">Email</div>
                                        <input type="email" name="your-email" value="" size="40" placeholder="Email" data-validation-required-message="Please fill the required field." required>
                                        <div class="help-block"></div>
                                    </div>
                                    <div class="col-md-12 control-group">
                                        <div class="alt-placeholder">Message</div>
                                        <textarea name="your-message" placeholder="Message" data-validation-required-message="Please fill the required field." required></textarea>
                                        <div class="help-block"></div>
                                    </div>
                                    <div class="col-md-12 form-actions">
                                        <input class="button" type="submit" value="Send">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a class="map-open button background-lite-b border-heading-b heading-b" data-map-overlay=".map-overlay" href="#">Locate Us on Map</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END: Page content -->
