<?php get_header(); ?>

<?php get_template_part('blocks/header/slider');  ?>
<div class="container my-5">
	<!--<div class="row d-flex align-items-center justify-content-center text-center" style="height: 300px">-->
	<!--	<h4>Здесь будет интересная информация</h4>-->
	<!--</div>-->
	<div class="row">
		<div class="col-lg-8 order-md-1">
			<h4 class="mb-3">Новости</h4>
			<?php
			if (get_query_var('paged')) {
				$paged = get_query_var('paged');
			} elseif (get_query_var('page')) { // на статической главной странице используется 'page' вместо 'paged' 
				$paged = get_query_var('page');
			} else {
				$paged = 1;
			}

			$custom_query_args = array(
				'post_type' => 'post',
				'posts_per_page' => get_option('posts_per_page'),
				'paged' => $paged,
				'post_status' => 'publish',
				'ignore_sticky_posts' => true,
				'order' => 'DESC', // 'ASC'
				'orderby' => 'date' // modified | title | name | ID | rand
			);
			$custom_query = new WP_Query($custom_query_args);

			if ($custom_query->have_posts()) :
				while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
					<?php get_template_part('blocks/posts/posts');  ?>
				<?php
				endwhile;
				?>

				<?php if ($custom_query->max_num_pages > 1) : // custom pagination  
				?>
					<?php
					$orig_query = $wp_query; // исправление для работы пагинации
					$wp_query = $custom_query;
					?>

					<?php if (function_exists('wp_pagenavi')) { ?>
						<nav aria-label="Page navigation example mt-3">
							<?php wp_pagenavi(); ?>
						</nav>
					<?php } else { ?>
						<nav aria-label="Page navigation example">
							<ul class="pagination">
								<li class="page-item">
									<?php echo get_next_posts_link('Older Entries', $custom_query->max_num_pages); ?>
								</li>
								<li class="page-item">
									<?php echo get_previous_posts_link('Newer Entries'); ?>
								</li>
							</ul>
						</nav>
					<? } ?>


					<?php
					$wp_query = $orig_query; // исправление для работы пагинации
					?>
				<?php endif; ?>

			<?php
				wp_reset_postdata(); // сброс запроса 
			else :
				echo '<p>' . __('Новостей пока нет...') . '</p>';
			endif;
			?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>



<?php
get_footer();
?>