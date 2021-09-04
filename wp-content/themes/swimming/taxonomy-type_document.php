<?php get_header(); ?>
<?php get_template_part('blocks/header', 'photo');  ?>
<div class="container my-5">
    <?php get_template_part('blocks/breadcrumb');  ?>
    <div class="row">
        <div class="col-lg-8 order-md-1 mb-3">
            <?php
            $termID = get_queried_object()->term_id; // - динамическое получение ID текущей рубрики
            $taxonomyName = "type_document";
            $termchildren = get_term_children($termID, $taxonomyName);
            $parentID = wp_get_term_taxonomy_parent_id($termID, $taxonomyName);

            if ($termchildren) {
                echo '<div class="list-group">';
                foreach ($termchildren as $child) {
                    $term = get_term_by('id', $child, $taxonomyName);
                    echo '<a class="list-group-item list-group-item-action" href="' . get_term_link($term->term_id, $term->taxonomy) . '">' . $term->name . '</a>';
                }
                echo '</div>';
            } else if ($parentID) {

                global $wp_query;
                $args = array(
                    'post_type' => 'documents',
                    'publish' => true,
                    'posts_per_page' => -1,
                    //'orderby' => 'title',
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'type_document',
                            'field' => 'id',
                            'terms' => $termID
                        ),
                        array(
                            'taxonomy' => 'type_document',
                            'field' => 'id',
                            'terms' => $parentID
                        ),
                    )
                );


                $wp_query = new WP_Query($args);
                //print_r($wp_query);

                if ($wp_query->have_posts()) { ?>
                     <table class="table table-hover table-light" style="border-radius: .25rem; border: 1px solid rgba(0,0,0,.125);">
                        <thead>
                            <tr class="bg-primary text-light">
                                <th scope="col">Название документа</th>
                                <th class="text-center" scope="col">Скачать</th>
                            </tr>
                        </thead>
                        <?php while ($wp_query->have_posts()) {
                            $wp_query->the_post(); ?>
                            <?php get_template_part('blocks/posts/posts', 'documents');  ?>
                        <?php }
                        wp_reset_query(); ?>
                    </table>
                <?php } else echo ' <p>Документов на данный момент нет..</p>';
            } else { ?>
                <?php if (have_posts()) { ?>
                      <table class="table table-hover table-light" style="border-radius: .25rem; border: 1px solid rgba(0,0,0,.125);">
                        <thead>
                            <tr class="bg-primary text-light">
                                <th scope="col">Название документа</th>
                                <th class="text-center" scope="col">Скачать</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while (have_posts()) {
                                the_post(); ?>
                                <?php get_template_part('blocks/posts/posts', 'documents');  ?>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php   } else echo '<p>Документов на данный момент нет..</p>'; ?>
            <?php }
            ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>
<style>
    .header-photo {
        background-image: url('<?php bloginfo('template_directory'); ?>/img/documents3.jpg');
    }
</style>
<?php get_footer(); ?>