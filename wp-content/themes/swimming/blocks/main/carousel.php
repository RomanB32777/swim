<div class="carousel-wrapper" style="background-color: #e9ecef;"> <!-- #f5f5f3-->
    <div class="container carousel-block">
        <div class="owl-carousel owl-theme">
            <div class="link-item">
                <a class="owl-carousel__link" href="https://russwimming.ru/" rel="noopener noreferrer" target="_blank">
                    <img class="img-fluid" src="<?php bloginfo('template_directory'); ?>/img/vfp.png" alt="">
                    <span>Всероссийская федерация плавания</span>
                </a>
            </div>

            <div class="link-item">
                <a class="owl-carousel__link" href="https://www.minsport.gov.ru/" rel="noopener noreferrer" target="_blank">
                    <img class="img-fluid" src="<?php bloginfo('template_directory'); ?>/img/min_sport_jpg.jpg" alt="">
                    <span>Министерство спорта Российской Федерации</span>
                </a>
            </div>

            <div class="link-item">
                <a href="https://www.fina.org/" class="owl-carousel__link" rel="noopener noreferrer" target="_blank">
                    <img class="img-fluid" src="<?php bloginfo('template_directory'); ?>/img/fina.png" alt="">
                    <span>Международная федерация плавания</span>
                </a>
            </div>
            
            <div class="link-item">
                <a href="https://rusada.ru/" class="owl-carousel__link" rel="noopener noreferrer" target="_blank">
                    <img class="img-fluid" src="<?php bloginfo('template_directory'); ?>/img/rusada-png.png" alt="">
                    <span>РУСАДА</span>
                </a>
            </div>
            
            <div class="link-item">
                <a href="https://sportbrobl.ru/" class="owl-carousel__link" rel="noopener noreferrer" target="_blank">
                    <img class="img-fluid" src="<?php bloginfo('template_directory'); ?>/img/sport-bryansk2.jpg" alt="">
                    <span>Управление ФК и спорта Брянской области</span>
                </a>
            </div>
            
            
             <div class="link-item">
                <a href="https://cspbo.ru/" class="owl-carousel__link" rel="noopener noreferrer" target="_blank">
                    <img class="img-fluid" src="<?php bloginfo('template_directory'); ?>/img/цсп.png" alt="">
                    <span>Центр спортивной подготовки Брянской области</span>
                </a>
            </div>
            
            
            <div class="link-item">
                <a href="http://fcpsr.ru/" class="owl-carousel__link" rel="noopener noreferrer" target="_blank">
                    <img class="img-fluid" src="<?php bloginfo('template_directory'); ?>/img/фцпср.png" alt="">
                    <span>Федеральный центр подготовки спортивного резерва</span>
                </a>
            </div>
            
        
            <?php $taxonomy = 'sport_organization';
            $terms = get_terms($taxonomy); // , "orderby=count&order=DESC"
            if ($terms) {
                foreach ($terms as $term) {
                    $term_id_acf = $taxonomy . '_' . $term->term_id;
                    $link = get_field( 'link', $term_id_acf  );
                    $title = get_field('short_title', $term_id_acf);
                    $logo = get_field('logo', $term_id_acf);
                    ?>
                    <div class="link-item">
                        <a class="owl-carousel__link" href="<?php echo $link;?>" rel="noopener noreferrer" target="_blank">
                            <div>
                              <?php if ($logo) : ?>
                                <img class="img-fluid" src="<?php echo $logo; ?>" alt="">
                               <?php endif; ?> 
                            </div>
                            <span><?php echo $title; ?></span>
                        </a>
                    </div>
                    <?php } } ?>
        </div>
    </div>
</div>