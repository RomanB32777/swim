<?php
/*
  Template Name: Соревнования
  
*/
?>
<?php get_header(); ?>
<?php get_template_part('blocks/header', 'photo');  ?>

<div class="container my-5">
    <?php get_template_part('blocks/breadcrumb');  ?>
    <div class="row">
        <div class="col-lg-8 order-md-1 mb-3">

            <?php
            if (get_query_var('paged')) {
                $paged = get_query_var('paged');
            } else {
                $paged = 1;
            }

            $custom_query_args = array(
                'post_type' => 'competitions',
                'posts_per_page' => get_option('posts_per_page'),
                'paged' => $paged,
                'post_status' => 'publish',
                'ignore_sticky_posts' => true,
                'order' => 'DESC', // 'ASC'
                'orderby' => 'date' // modified | title | name | ID | rand
            );
            $custom_query = new WP_Query($custom_query_args);

            if ($custom_query->have_posts()) : ?>
                <div class="list-group">
                    <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                        <?php get_template_part('blocks/posts/posts', 'competitions');  ?>
                    <?php
                    endwhile;
                    ?>
                </div>
                <?php if ($custom_query->max_num_pages > 1) : // custom pagination  
                ?>
                    <?php
                    $orig_query = $wp_query; // исправление для работы пагинации
                    $wp_query = $custom_query;
                    ?>

                    <?php if (function_exists('wp_pagenavi')) { ?>
                        <nav aria-label="Page navigation example" style="margin-top: 10px">
                            <?php wp_pagenavi(); ?>
                        </nav>
                    <?php } else { ?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <?php echo get_next_posts_link('Older Entries', $custom_query->max_num_pages); ?>
                                </li>
                                <li class="page-item">
                                    <?php echo get_previous_posts_link('Newer Entries'); ?>
                                </li>
                            </ul>
                        </nav>
                    <? } ?>

                    <?php
                    $wp_query = $orig_query; // исправление для работы пагинации
                    ?>
                <?php endif; ?>

            <?php
                wp_reset_postdata(); // сброс запроса 
            else :
                echo '<p>' . __('Соревнований пока нет...') . '</p>';
            endif;
            ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>

<style>
    .header-photo {
        background-image: url('<?php bloginfo('template_directory'); ?>/img/competition-jpg.jpg');
    }
</style>

<?php get_footer(); ?>