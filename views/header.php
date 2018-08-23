<!DOCTYPE html>
<html class="background-100-e" lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $this->title; ?></title>
        <meta name="description" content="Onepage Parallax Site" />
        <meta name="keywords" content="onepage, parallax" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?= URL; ?>public/bower_components/fontawesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?= URL; ?>public/bower_components/animate.css/animate.min.css" />
        <link rel="stylesheet" href="<?= URL; ?>public/bower_components/minicolors/jquery.minicolors.css" />
        <link rel="stylesheet" href="<?= URL; ?>public/bower_components/slick.js/slick/slick.css" />
        <link rel="stylesheet" href="<?= URL; ?>public/bower_components/slick.js/slick/slick-theme.css" />
        <link rel="stylesheet" href="<?= URL; ?>public/bootstrap/dist/css/bootstrap-custom.min.css" />
        <link rel="stylesheet" href="<?= URL; ?>public/lib/linecons/style.css" />
        <link rel="stylesheet" href="<?= URL; ?>public/styles/style.min.css" />
        <link rel="stylesheet" href="<?= URL; ?>public/styles/theme-custom.css" />
        <link rel="shortcut icon" href="<?= URL; ?>public/images/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="<?= URL; ?>public/images/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="<?= URL; ?>public/images/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="<?= URL; ?>public/images/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="<?= URL; ?>public/images/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="<?= URL; ?>public/images/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="<?= URL; ?>public/images/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="<?= URL; ?>public/images/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="<?= URL; ?>public/images/apple-touch-icon-152x152.png" />
    </head>
    <body class="state1 background-100-e">
        <div class="ext-nav background-95-h page-transition">
            <div class="view half-height">
                <img alt class="bg static" src="<?= URL; ?>public/images/placeholders/1920x1200-1.jpg" />
                <div class="content no-top-padding no-bottom-padding  full-height">
                    <div class="container-fluid  full-height">
                        <div class="row full-height">
                            <a href="blog.html" class="col-md-6 colors-e background-95-e full-height">
                                <div>
                                    <span class="side-label">All The Latest</span>
                                    <span class="side-title">Blog</span>
                                </div>
                            </a>
                            <a href="help.html" class="col-md-6 colors-f background-95-f full-height">
                                <div>
                                    <span class="side-label">Documentation</span>
                                    <span class="side-title">Help</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid  half-height">
                <div class="row full-height">
                    <a href="#how-we-work" class="col-md-4 colors-g background-solid full-height border-bottom border-lite">
                        <div>
                            <span class="side-label">Awesome</span>
                            <span class="side-title">How We Work</span>
                        </div>
                    </a>
                    <a href="#who-we-are" class="col-md-4 colors-g background-solid full-height border-bottom border-left border-lite">
                        <div>
                            <span class="side-label">We Are Designers</span>
                            <span class="side-title">Who We Are</span>
                        </div>
                    </a>
                    <a href="#numbers" class="col-md-4 colors-g background-solid full-height border-bottom border-left border-lite">
                        <div>
                            <span class="side-label">Some Facts</span>
                            <span class="side-title">Our Numbers</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="page-border bottom colors-e background-solid"><a href="#top" class="hover-effect">Al <span class="highlight">Inicio</span></a></div>
        <div class="page-border left colors-e background-solid">
            <ul>
                <?php foreach ($this->mostrarRedes as $red): ?>
                    <li><a href="<?= utf8_encode($red['url']); ?>" target="_blank" title="<?= utf8_encode($red['descripcion']); ?>"><i class="<?= utf8_encode($red['fontawesome']); ?>"></i></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <!-- BEGIN: Top menu -->
        <div class="page-border right colors-e background-solid"></div>
        <nav class="navbar navbar-default navbar-fixed-top page-transition colors-e background-solid" role="navigation" id="top-nav">
            <div class="container">
                <div class="navbar-header">
                    <a class="menu-toggle ext-nav-toggle visible-xs-block" data-target=".ext-nav" href="#"><span></span></a>
                    <a class="menu-toggle navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" href="#"><span></span></a>
                    <a class="navbar-brand" href=""><img src="<?= URL; ?>public/images/logo.png"</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <?php foreach ($this->mostrarMenu as $menu): ?>
                            <li><a href="#<?= $menu['id_menu']; ?>" class="hover-effect"><?= utf8_encode($menu['descripcion']); ?></a></li>
                        <?php endforeach; ?>
                        <li class="hidden-xs"><a class="menu-toggle ext-nav-toggle" data-target=".ext-nav" href="#"><span></span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END: Top menu -->
        <ul id="dot-scroll" class="colors-e background-solid"></ul>
        <div class="overlay-window gallery-overlay colors-f background-95-f" data-overlay-zoom="#work .content">
            <div class="overlay-control background-85-d">
                <a class="previos" href="#"></a>
                <a class="next" href="#"></a>
                <a class="cross" href="#"></a>
            </div>
            <div class="overlay-view"></div>
            <ul class="loader">
                <li class="background-100-d"></li>
                <li class="background-100-d"></li>
                <li class="background-100-d"></li>
            </ul>
        </div>
        <div class="overlay-window map-overlay colors-f background-95-f">
            <div class="overlay-control background-90-f">
                <a class="cross" href="#"></a>
            </div>
            <div class="overlay-view">
                <div class="map-canvas" data-latitude="42.487606" data-longitude="-71.115661" data-zoom="14">
                    <div class="map-marker" data-latitude="42.487606" data-longitude="-71.115661" data-text="Our awesome location"></div>
                    <div class="map-marker" data-latitude="42.485100" data-longitude="-71.113256" data-text="Our sales office"></div>
                </div>
            </div>
        </div>
        <div class="overlay-window credits-overlay colors-g background-95-g">
            <div class="overlay-control background-85-d">
                <a class="cross" href="#"></a>
            </div>
            <div class="overlay-view">
                <div class="content-container">
                    <h3>Credits</h3>
                    <ul>
                        <li>
                            Photos by:
                            <ul>
                                <li><a target="_blank" href="https://www.flickr.com/photos/katya_alagich/">Katya Alagich</a>, <a target="_blank" href="https://creativecommons.org/licenses/by/2.0/">CC BY 2.0 License</a></li>
                                <li><a target="_blank" href="https://www.flickr.com/photos/65047661@N00/">Jim Lukach</a>, <a target="_blank" href="https://creativecommons.org/licenses/by/2.0/">CC BY 2.0 License</a></li>
                                <li><a target="_blank" href="https://www.flickr.com/photos/johanl/">Johan Larsson</a>, <a target="_blank" href="https://creativecommons.org/licenses/by/2.0/">CC BY 2.0 License</a></li>
                                <li><a target="_blank" href="https://www.flickr.com/photos/johny/">John Kraus</a>, <a target="_blank" href="https://creativecommons.org/licenses/by/2.0/">CC BY 2.0 License</a></li>
                                <li><a target="_blank" href="https://www.flickr.com/photos/geishaboy500/">THOR</a>, <a target="_blank" href="https://creativecommons.org/licenses/by/2.0/">CC BY 2.0 License</a></li>
                                <li><a target="_blank" href="https://www.flickr.com/photos/stf-o/">stephane</a>, <a target="_blank" href="https://creativecommons.org/licenses/by/2.0/">CC BY 2.0 License</a></li>
                                <li><a target="_blank" href="http://www.pexels.com/">Pexels</a>, <a target="_blank" href="http://www.pexels.com/photo-license/">CC0 License</a></li>
                                <li><a target="_blank" href="https://stocksnap.io/">Stocksnap</a>, <a target="_blank" href="https://stocksnap.io/license">CC0 License</a></li>
                                <li><a target="_blank" href="http://picjumbo.com/">Picjumbo</a>, <a target="_blank" href="http://picjumbo.com/about-author/">Picjumbo License</a></li>
                            </ul>
                        </li>
                        <li>
                            Video by:
                            <ul>
                                <li><a target="_blank" href="http://mazwai.com/">Mazwai</a>, <a target="_blank" href="https://creativecommons.org/licenses/by/3.0/">CC BY 3.0 License</a></li>
                            </ul>
                        </li>
                        <li>
                            Icons by:
                            <ul>
                                <li><a target="_blank" href="http://designmodo.com/">Designmodoh</a>, <a target="_blank" href="http://designmodo.com/linecons-free/">License</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="gate colors-e background-solid">
            <div class="gate-bar background-highlight-e"></div>
            <ul class="loader">
                <li class="background-100-g"></li>
                <li class="background-90-c"></li>
                <li class="background-100-f"></li>
            </ul>
        </div>