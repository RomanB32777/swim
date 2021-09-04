<div class="list-group-item">
    <div class="w-100 competition-info">
        <a href="<?php the_permalink() ?>" class="">
            <h5 class="mb-1"><?php the_title(); ?></h5>
        </a>
        <span class="badge badge-primary badge-pill"> <?php echo get_field('begin_date') ?> - <?php echo get_field('end_date') ?></span>
    </div>
    <p class="mb-1"> Место проведения: <?php echo get_field('city') ?> </p>
</div>