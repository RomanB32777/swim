<?php get_header(); ?>
<?php get_template_part('blocks/header', 'photo');  ?>
<div class="container my-5">
    <?php get_template_part('blocks/breadcrumb');  ?>
    <div class="row">
        <div class="col-lg-8 order-md-1 mb-3">
            <div class="col-card">
            <p><b>Название соревнований: </b> <?php the_title(); ?></p>
            <?php if (get_field('city')){ ?><p><b> Место проведения соревнований: </b> <?php echo get_field('city') ?> </p><?php } ?>
            <?php if (get_field('begin_date') && get_field('end_date')){ ?><p><b> Дата проведения: </b> <span> <?php echo get_field('begin_date'); ?> - <?php echo get_field('end_date'); ?></span> </p>
            <?php } ?>
            <b>Информация:</b>
               <?php while (have_posts()) : the_post();
                       $content = get_the_content();
                       if($content && $content !== "") echo $content;
                       else 
                         echo "Информация по данным соревнованиям отсутствует.";
                     endwhile;
            ?>
            <?php if (have_rows('documents')) : ?>
                 <table class="table table-hover table-light mt-3" style="border-radius: .25rem; border: 1px solid rgba(0,0,0,.125);">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th scope="col">Название документа</th>
                            <th class="text-center" scope="col">Скачать</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while (have_rows('documents')) : the_row(); ?>
                            <tr>
                                <td class="my-0"><?php the_sub_field('name_document'); ?></td>
                                <?php if (get_sub_field('doc')) { ?>
                                    <td class="text-center">
                                        <a href="<?php echo get_sub_field('doc'); ?>" class=""><img width="32" height="32" src="<?php bloginfo('template_directory'); ?>/img/download.svg" /></a>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else : echo '<p class="mt-3">Документов на данный момент нет..</p>';
            endif;
            ?>
            </div>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>

<style>
    .header-photo {
        background-image: url('<?php bloginfo('template_directory'); ?>/img/competition-jpg.jpg');
    }
    
        @media (max-width: 450px) {

        .breadcrumb-item {
            width: 100%;
        }
        
        .breadcrumb-item:first-child {
            padding-left: 1.5rem;
        }
    }
</style>

<?php get_footer(); ?>