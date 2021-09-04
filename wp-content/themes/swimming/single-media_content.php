<?php
/*
Template Name: альбом
Template Post Type: media_content
*/
?>
<?php get_header(); ?>
<?php get_template_part('blocks/header', 'photo');
$terms = get_the_terms(get_the_ID(), 'type_media');
?>

<div class="container my-5">
	<?php get_template_part('blocks/breadcrumb');  ?>
	<?php if ($terms) {
		$term = array_shift($terms);
		$id = get_the_ID();
		$checkContent = get_the_content($id);
		if ($term->name == 'Видео' && $checkContent && $checkContent !== "") { ?>
			<div class="col-card mb-3" style="font-size: 18px;">
			<?php  } ?>
			<?php while (have_posts()) : the_post();
				the_content();
			endwhile;
			?>
			<?php if ($term->name == 'Видео' && $checkContent && $checkContent !== "") { ?>
			</div>
		<?php } ?>
		<?php
		if ($term->name == 'Видео' && get_field('type_link_video') == 'С youtube') {
			if (have_rows('link_video_youtube')) : ?>
				<div class="d-flex flex-wrap justify-content-center"> 
				<!--col-md-6-->
					<?php while (have_rows('link_video_youtube')) : the_row(); ?>
						<div class="col-md-6 mb-3"><iframe class="embed-responsive" width="650" height="350" src=" <?php the_sub_field('youtube'); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe></div>
					<?php endwhile; ?>
				</div>

	<?php else : echo '<p>Видео на данный момент нет..</p>';
			endif;
		}
	}
	?>
</div>

<style>
	.header-photo {
		background-image: url('<?php bloginfo('template_directory'); ?>/img/camera5.jpg');
	}
</style>

<?php get_footer(); ?>