<nav id="navbar" class="navbar fixed-top navbar-expand-lg navbar-light bg-light" style=" -webkit-transition: top 0.3s; -o-transition: top 0.3s; transition: top 0.3s; -webkit-box-shadow: 0 .125rem .25rem rgba(0,0,0,.125)!important; box-shadow: 0 .125rem .25rem rgba(0,0,0,.125)!important;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <div>
                    <img src="<?php bloginfo('template_directory'); ?>/img/logo-fpbo-jpg1.jpg" width="94" height="94" class="d-inline-block align-top" alt="">
                </div>

                <div class="logo-text">
                    <span style="white-space: normal;">Федерация плавания <br> Брянской области</span>
                </div>
            </a>
            <!-- <a class="navbar-brand" href="#"> <span>ФПБО</span> <span>Федерация плавания Брянской области</span> </a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <?php
                wp_nav_menu(
                    array(
                        'theme_location'    => 'header',
                        'depth'             => 2,
                        'container'         => null,
                        'menu_class'        => 'navbar-nav ml-auto',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker()
                    )
                );
                ?>
                <button type="button" class="btn btn-nav btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                    Написать нам
                </button>
            </div>
        </div>
    </nav>