<div <?php post_class('card mb-3'); ?>>
    <div class="row no-gutters">
        <div class="col-md-4">
            <a href="<?php the_permalink(); ?>">
                <img style="object-fit: cover; height: 100%" src="<?php echo get_the_post_thumbnail_url(); ?>" class="card-img" alt="...">
            </a>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <div class="card-text"><?php the_excerpt() ?></div>
                <p class="card-text"><small class="text-muted"><?php the_time('F jS, Y') ?>
                    </small></p>
            </div>
        </div>
    </div>
</div>