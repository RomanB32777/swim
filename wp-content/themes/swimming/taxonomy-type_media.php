<?php get_header(); ?>
<?php get_template_part('blocks/header', 'photo');  ?>
<div class="container my-5">
    <?php get_template_part('blocks/breadcrumb');  ?>
    <div class="row">
        <div class="col-lg-8 order-md-1 mb-3">
            <?php $term_name = get_query_var('term');
                  if ($term_name == 'photoalbom') : ?>
                    <p class="col-card">Также можно посмотреть фото с соревнований и праздников на странице в ВК нашего внештатного фоторепортёра <a href="https://vk.com/sax32?z=albums41113564" rel="noopener noreferrer" target="_blank">Константина Сургучёва</a></p>
                  <?php endif; ?>
            <div class="list-group">
                <?php if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        $terms = get_the_terms(get_the_ID(), 'type_media');
                        if ($terms) {
                            $term = array_shift($terms);
                            if ($term->name == 'Видео' && get_field('type_link_video') == 'С других источников') { 
                                ?>
                                <a href="<?php echo get_field('link_video_other'); ?>" target="_blank" rel="noopener noreferrer" class="list-group-item list-group-item-action">
                                    <?php the_title(); ?>
                                </a>
                            <?php }
                            else if ($term->name == 'Фото' && !empty(get_field('link_photo_other'))){ ?>
                                <a href="<?php echo get_field('link_photo_other'); ?>" target="_blank" rel="noopener noreferrer" class="list-group-item list-group-item-action">
                                    <?php the_title(); ?>
                                </a>
                          <?php  }
                            else { ?>
                                <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action">
                                    <?php the_title(); ?>
                                </a>
                        <?php   }
                        }
                        ?>
                <?php    }
                } else echo '<p>Альбомов пока нет..</p>'
                ?>
            </div>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>

<style>
    .header-photo {
        background-image: url('<?php bloginfo('template_directory'); ?>/img/camera5.jpg');
    }
</style>

<?php get_footer(); ?>