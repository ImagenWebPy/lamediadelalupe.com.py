<!-- start page not found section -->
<section id="home" class="no-padding parallax mobile-height wow fadeIn" data-stellar-background-ratio="0.5" style="background-image:url('<?= URL; ?>public/images/background/<?= utf8_encode($this->contenido['imagen']); ?>');">
    <div class="opacity-full bg-extra-dark-gray"></div>
    <div class="container position-relative full-screen">
        <div class="slider-typography text-center">
            <div class="slider-text-middle-main">
                <div class="slider-text-middle">
                    <div class="bg-black-opacity-light width-50 center-col sm-width-80">
                        <div class="padding-fifteen-all xs-padding-20px-all">
                            <span class="title-extra-large text-white font-weight-600 display-block margin-30px-bottom xs-margin-10px-bottom"><?= utf8_encode($this->contenido['titulo']); ?></span>
                            <h6 class="text-uppercase text-deep-pink font-weight-600 alt-font display-block margin-5px-bottom"><?= utf8_encode($this->contenido['texto_1']); ?></h6>
                            <span class="text-medium-gray width-60 display-block center-col text-large sm-width-100"><?= utf8_encode($this->contenido['texto_2']); ?></span>
                            
                            <a href="<?= URL; ?>" class="btn btn-transparent-white btn-medium text-extra-small border-radius-4"><i class="ti-arrow-left margin-5px-right no-margin-left" aria-hidden="true"></i> Volver al Inicio</a>
                        </div>
                    </div>                            
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page not found section -->