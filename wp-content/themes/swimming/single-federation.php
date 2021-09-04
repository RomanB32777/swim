<?php get_header(); ?>
<?php get_template_part('blocks/header', 'photo');  ?>
<div class="container my-5">
    <?php get_template_part('blocks/breadcrumb');  ?>
    <div class="row">
        <div class="col-lg-8 order-md-1 mb-3">
            <?php get_template_part('blocks/posts/posts', 'workers');  ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>

<style>
    .header-photo {
        background-image: url('<?php bloginfo('template_directory'); ?>/img/sportwatch5.jpg');
        /* background-image: url('<?php //echo get_the_post_thumbnail_url(); ?>'); */
    }
    
    @media (max-width: 450px) {
        .header-photo {
            background-position: 25% 100%;
            background-size: auto;   
        }
        
        .breadcrumb-item {
            width: 100%;
        }
        
        .breadcrumb-item:first-child {
            padding-left: 1.5rem;
        }
    }
    
    
    @media (max-width: 330px){
        .header-photo {
            background-position: 25% 45%;
            background-size: auto;
        } 
    }

</style>
<?php get_footer(); ?>