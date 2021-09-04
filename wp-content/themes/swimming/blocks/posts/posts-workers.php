<div id="<?php echo get_post()->post_name ?>" <?php post_class('card mb-3'); ?>>
    <div class="row no-gutters">
        <div class="col-md-4" style="max-height: 350px; overflow: hidden;">
            <img style="object-fit: cover; <?php echo (get_the_post_thumbnail_url()) ? '' : 'padding: 50px;' ?>" src="<?php echo (get_the_post_thumbnail_url())  ?  get_the_post_thumbnail_url() :  bloginfo('template_directory') . '/img/person.png';
            ?>" class="card-img" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5><?php the_title(); ?></h5>
                <?php if (is_single()) { ?>
                    <p class="card-text">
                        <?php while (have_posts()) : the_post();
                            the_content();
                        endwhile; ?></p>
                <?php   } else { ?>
                <p class="card-text"><?php the_content(); ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>