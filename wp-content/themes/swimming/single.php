<?php get_header(); ?>
<?php get_template_part('blocks/header', 'photo');  ?>
<div class="container my-5">
    <?php get_template_part('blocks/breadcrumb');  ?>
    <div class="row">
        <div class="col-lg-8 order-md-1 mb-3">
            <div class="col-card">
                <p class="card-date"><small class="text-muted"><?php the_time('F jS, Y') ?></small></p>
                <div class="card-content">
                    <?php
//  if ( has_post_thumbnail()) {
//   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
//   echo '<a href="' . $large_image_url[0] . '" data-rel="lightbox-gallery-0" title="' . the_title_attribute('echo=0') . '" >';
//   $arr = 'class=alignleft wp-image-' . get_post_thumbnail_id();
//   the_post_thumbnail('thumbnail', $arr);
//   echo '</a>';
//  }
 ?>
            <?php while (have_posts()) : the_post();
                the_content();
            endwhile;
            ?>
            </div>
             <?php if (have_rows('post_documents')) : ?>
                 <table class="table table-hover table-light mt-3" style="border-radius: .25rem; border: 1px solid rgba(0,0,0,.125);">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th scope="col">Название документа</th>
                            <th class="text-center" scope="col">Скачать</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while (have_rows('post_documents')) : the_row(); ?>
                            <tr>
                                <td class="my-0"><?php the_sub_field('post_documents_name'); ?></td>
                                <?php if (get_sub_field('post_documents_file')) { ?>
                                    <td class="text-center">
                                        <a href="<?php echo get_sub_field('post_documents_file'); ?>" class=""><img width="32" height="32" src="<?php bloginfo('template_directory'); ?>/img/download.svg" /></a>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php endif; ?>
            <?php the_tags( '<div class="d-flex flex-wrap">Метки: <span class="badge badge-pill badge-primary mx-2 mt-1">','</span><span class="badge badge-pill badge-primary mr-2 mt-1">','</span></div>'); ?>
            </div>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>
<style>
    .header-photo {
        background-image: url('<?php bloginfo('template_directory'); ?>/img/news2.jpg');
        background-position: bottom;
        /* background-image: url('<?php //echo get_the_post_thumbnail_url(); 
                                    ?>'); */
    }
    
    @media (max-width: 450px){
        .card-content img {
            object-fit: cover;
            width: 100%;
        }
    }
    
    @media (max-width: 750px){
        iframe {
            position: relative;
            display: block;
            width: 100%;
            padding: 0;
            overflow: hidden;
        }
    }
</style>
<?php get_footer(); ?>