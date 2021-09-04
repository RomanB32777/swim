<?php get_header(); ?>
<?php get_template_part('blocks/header', 'photo');  ?>

<div class="container my-5">
    <?php get_template_part('blocks/breadcrumb');  ?>
    <div class="row">
        <div class="col-lg-8 order-md-1 mb-3">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post(); ?>
                    <?php get_template_part('blocks/posts/posts');  ?>
                <?php  }
                if (function_exists('wp_pagenavi')) { ?>
                    <nav aria-label="Page navigation example mt-3">
                        <?php wp_pagenavi(); ?>
                    </nav>
            <?php }
            }
            ?>

        </div>
        <?php get_sidebar(); ?>
    </div>
</div>

<style>
    .header-photo {
        background-image: url('<?php bloginfo('template_directory'); ?>/img/news2.jpg');
        background-position: bottom;
    }
</style>

<?php get_footer(); ?>