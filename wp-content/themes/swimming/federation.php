<?php
/*
  Template Name: Состав Федерации
*/
?>

<?php get_header(); ?>
<?php get_template_part('blocks/header', 'photo');  ?>

<div class="container my-5">
    <?php get_template_part('blocks/breadcrumb');  ?>
    <div class="row">
        <div class="col-lg-8 order-md-1 mb-3">
            <?php
            $args = array(
                'post_type' => 'federation',
                'publish' => true,
                'posts_per_page' => -1,
                'meta_query' => [
                    [
                        'key' => 'member',
                        'value' => true
                    ]
                ]
            );
            $federation = get_posts($args);
            ?>
            <?php if ($federation) {
                $i = 0; ?>
                <table class="table table-hover table-light" style="border-radius: .25rem; border: 1px solid rgba(0,0,0,.125);">
                    <thead>
                        <tr class="bg-primary text-light">
                            <th scope="col"></th>
                            <th scope="col">Фамилия, имя, отчество</th>
                            <th scope="col">Должность</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php foreach ($federation as $post) {
                            setup_postdata($post); ?>
                            <tr>
                                <th scope="row"><?php echo ++$i; ?></th>
                                <td> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </td>
                                <td> <?php
                                        $positions = get_field('position_federation');
                                        if ($positions)
                                            foreach ($positions as $position) {
                                                if ($position == end($positions))
                                                    echo  $position;
                                                else
                                                    echo  $position . ', ';
                                            } else echo 'Должность не выбрана';
                                        ?> </td>
                                <!-- <td>@mdo</td> -->
                            </tr>
                        <?php    } // Конец while 
                        wp_reset_postdata();
                        ?>

                    </tbody>
                </table>
            <?php  } ?>
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