<?php

/**
 * The template for displaying Search Results pages.
 *
 */

get_header(); ?>
<?php get_template_part('blocks/header', 'photo');  ?>
<div class="container my-5">
    <?php get_template_part('blocks/breadcrumb');  ?>
    <div class="row">
        <div class="col-lg-8 order-md-1 mb-3">
            <?php if (have_posts()) : ?>
                <?php //shape_content_nav( 'nav-above' ); ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title();  ?></h5>
                            <p class="card-text"> <?php the_excerpt(); ?></p>
                            <?php $post = get_post(); // print_r(get_post()); ?>
                            <a href="<?php if ($post->post_type == 'federation') {
                               $organization = array_shift(get_the_terms(get_the_ID(), 'sport_organization')); 
                               echo site_url() . '/sport_organization/' .  $organization->slug . '#' . $post->post_name;
                              // http://swim/type_document/record-2020/
                            } else if ($post->post_type == 'documents') {
                                $type_document = get_the_terms(get_the_ID(), 'type_document'); 
                                foreach ($type_document as $document) {
                                  if ($document->parent != 0 && count($type_document) > 1) {
                                    echo site_url() . '/type_document/' .  $document->slug;
                                  }
                                  else if ($document->parent == 0 && count($type_document) == 1)  echo site_url() . '/type_document/' .  $document->slug;
                              }
                            } else if ($post->post_type == 'media_content') {
                                $terms = get_the_terms(get_the_ID(), 'type_media');
                                if ($terms) {
                                    $term = array_shift($terms);
                                    if ($term->name == 'Видео' && get_field('type_link_video') == 'С других источников') 
                                        echo get_field('link_video_other'); 
                                    else the_permalink(); 
                                }
                            }
                            else the_permalink(); 
                             ?>" class="card-link">Подробнее</a>
                             <?php //print_r($type_document) ?>
                        </div>
                    </div>

                <?php endwhile; ?>
                
                <?php if (function_exists('wp_pagenavi')) : ?>
						<nav aria-label="Page navigation example mt-3">
							<?php wp_pagenavi(); ?>
						</nav>
				<?php endif; ?>

                <?php //shape_content_nav( 'nav-below' ); ?>

            <?php else : ?>
                <div class="page-header col-card">
                    <h4 class="page-title mb-3"><?php printf(__('К сожалению, ничего не найдено по запросу %s', 'shape'), '<span>' . get_search_query() . '</span>'); ?></h4>
                </div>
            <?php endif; ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>

<style>
    .header-photo {
        background-image: url('<?php bloginfo('template_directory'); ?>/img/search5.jpg');
        /* background-position: bottom; */
    }
    
    @media (max-width: 450px) {
        .header-photo {
            background-position: 35% 110%;
            background-size: auto;   
        }
    }
    
    
    @media (max-width: 330px){
        .header-photo {
             background-position: 35% 30%;
               background-size: auto;
        } 
    }
</style>

<?php get_footer(); ?>