<?php
/*
  Template Name: Тренеры и судьи
  
*/
?>
<?php get_header(); ?>
<?php get_template_part('blocks/header', 'photo');  ?>
<div class="container my-5">
    <?php get_template_part('blocks/breadcrumb');  ?>
    <div class="row">
        <div class="col-lg-8 order-md-1 mb-3">
            <h4 class="mb-3">Спортивные организации</h4>
            <?php
            $taxonomy = 'sport_organization';
            $terms = get_terms($taxonomy); // , "orderby=count&order=DESC"
            if ($terms) {
                echo '<div class="list-group">';
                foreach ($terms as $term) {
                    $link = get_term_link($term->term_id, $taxonomy);
                    $description = term_description($term->term_id, $taxonomy);
                    echo "<div class='list-group-item list-group-item-action'><h5><a href='{$link}'>{$term->name}</a></h5>
                       <div class='row d-flex'>"; ?>
                       <?php $id_logo = get_term_meta( $term->term_id, 'logo', true ); if ($id_logo) : ?>
                         <div class="col-md-2 d-flex justify-content-center align-items-center py-3"><img class="img-fluid" style="display: block; width: auto!important; max-height: 110px;" src="<?php echo wp_get_attachment_url( $id_logo ); ?>" alt=""></div>
                       <?php endif; ?>
                         <div class='col-md-10'><?php echo $description; ?></div>
                       </div>
                    </div>
                <?php }
                echo '</div>';
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
        
        .list-group-item h5 {
            text-align: center;
        }
        
    }
    
    
    @media (max-width: 330px){
        .header-photo {
            background-position: 25% 45%;
            background-size: auto;
        } 
        
        .list-group-item h5 {
            text-align: center;
        }
    }
    
    
    @media (min-width: 1430px){
        .header-photo {
            background-position: 0px -230px;
        } 
        
        .list-group-item h5 {
            text-align: center;
        }
    }

</style>
<?php get_footer(); ?>