<div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
    <!--carouselExampleControls-->
    <div class="carousel-inner" style="background:white; ">
        <div class="carousel-text d-flex justify-content-center align-items-center">
            <div class="text-center carousel-content">
                <h1><?php $blog_title = get_bloginfo('name');
                         echo $blog_title ?></h1>
                <p>Брянская региональная общественная организация</p>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal">
                    Написать нам
                </button>
            </div>
        </div>
        <div id="carousel-1" class="carousel-item active ">
            <img style="object-fit: cover; width: 100%" class="d-block img-bg" src="<?php bloginfo('template_directory'); ?>/img/main2.jpg" alt="">
        </div>
        <!--<div class="carousel-item">-->
            <!--<img style="object-fit: cover; width: 100%" class="d-block img-bg" src="<?php bloginfo('template_directory'); ?>/img/person-swimming.jpg" alt="">-->
            <!-- <div class="carousel-caption" style="bottom: 30%">
						<h1>Федерация плавания Брянской области</h1>
						<p>Офицальный сайт</p>
					</div> -->
        <!--</div>-->
        <div class="carousel-item">
            <img style="object-fit: cover; width: 100%" class="d-block img-bg" src="<?php bloginfo('template_directory'); ?>/img/swim-start1-1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img style="object-fit: cover; width: 100%" class="d-block img-bg" src="<?php bloginfo('template_directory'); ?>/img/bat1-1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img style="object-fit: cover; width: 100%" class="d-block img-bg" src="<?php bloginfo('template_directory'); ?>/img/person-swimming2.jpg" alt="First slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


