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
                    <?php get_template_part('blocks/posts/posts', 'workers');  ?>
            <?php  }
            }
            ?>

        </div>
        <?php get_sidebar(); ?>
    </div>
</div>

<style>
    .header-photo {
        background-image: url('<?php bloginfo('template_directory'); ?>/img/sportwatch5.jpg');
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
    
    @media (min-width: 1430px){
        .header-photo {
            background-position: 0px -230px;
        } 
    }

</style>

<?php get_footer(); ?>