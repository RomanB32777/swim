<?php get_template_part('blocks/main/carousel');  ?>
</main>
</div>
<div class="footer_container">
    <div class="footer_bg d-flex justify-content-between align-items-center" style="background-image: url('<?php bloginfo('template_directory'); ?>/img/bg_host.jpg');
    ">
        <div class="container footer_body py-5">
            <?php //dynamic_sidebar( 'footer_bar' ); 
            ?>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="footer-heading text-center">
                         <h3 style="font-weight: bold; font-size: 30px;"><?php $blog_title = get_bloginfo('name');
                         echo $blog_title ?></h3>
                         <p>Брянская региональная общественная организация</p>  
                    </div>
                    <div class="d-flex justify-content-center">
                        <div style="font-size: 18px;">
                            <p>Телефон: <a rel="noreferrer noopener" href="tel:+78142332211" target="_blank">+</a><a href="tel:+79191924787" target="_blank" rel="noreferrer noopener">7(919)192-47-87</a></p>
                            <p>Email:&nbsp;<a rel="noreferrer noopener" href="mailto:dolphin-brjansk@rambler.ru" target="_blank">dolphin-brjansk@rambler.ru</a></p>
                            <div class="d-md-none">
                                
                              <nav class="navbar p-0">
                                <form class="form-inline" role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                                   <!--<input class="form-control mr-sm-2" type="text" aria-label="Search" name="s" value="<?php the_search_query(); ?>">-->
                                   <!--<input class="btn btn-primary my-2 my-sm-0" type="submit" value="Поиск">-->
                                   <div class="input-group">
                                       <input type="text" class="form-control" placeholder="Поиск по сайту" name="s" aria-label="Search" value="<?php the_search_query(); ?>" aria-describedby="basic-addon2">
                                       <div class="input-group-append">
                                           <button class="btn btn-primary" type="submit" value="Поиск">Поиск</button>
                                        </div>
                                   </div>
                                </form>
                              </nav> 
                              <div class="footer-social mt-3 text-center">
                                   <?php echo do_shortcode('[widget id="zoom-social-icons-widget-2"]');  ?> 
                              </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="text-center" style="position: relative;">
            <p class="py-2 m-0">&copy; <?php echo date('Y'); ?> - ФПБО. Все права защищены.</p>
            <?php if (current_user_can('administrator')) : ?>
              <!-- Yandex.Metrika informer -->
              <a class="d-none d-md-block" style="position: absolute;top: 5px; right: 5px;" href="https://metrika.yandex.ru/stat/?id=61611844&amp;from=informer"
              target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/61611844/3_1_FFFFFFFF_EFEFEFFF_0_visits"
              style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="61611844" data-lang="ru" /></a>
              <!-- /Yandex.Metrika informer -->
            <?php endif; ?>
    </div>
</footer>

<?php get_template_part('blocks/header/modal');  ?>
<!--<script src="/js/script.js"></script>-->
<?php wp_footer(); ?>

<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>

</html>