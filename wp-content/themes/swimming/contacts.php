<?php
/*
  Template Name: Контакты
*/
?>
<?php get_header(); ?>
<?php get_template_part('blocks/header', 'photo');  ?>

<div class="container py-5">
  <?php get_template_part('blocks/breadcrumb');  ?>
  <div class="row m-0" style="background: white; border-radius: .25rem; border: 1px solid rgba(0,0,0,.125);">
    <div class="col-md-5 contacts-info">
      <h4><b>Контактная информация</b></h4>
      <?php
      global $post;
      echo apply_filters('the_content', $post->post_content);
      ?>
      <?php //the_widget( 'Zoom_Social_Icons_Widget' ); ?>
      <?php echo do_shortcode('[widget id="zoom-social-icons-widget-2"]');  ?>
    </div>
    <div class="col-md-7 contacts-map">
      <div class="embed-responsive-item">
        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A90798a928b3c2d4679f91daa679f7db3f6cc9131f3b29f4920cbbc25c18fb6fd&amp;source=constructor" width="100%" height="570" frameborder="0"></iframe>
        <!--<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A90798a928b3c2d4679f91daa679f7db3f6cc9131f3b29f4920cbbc25c18fb6fd&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>-->
      </div>
    </div>
  </div>
</div>

<style>
    .header-photo {
        background-image: url('<?php bloginfo('template_directory'); ?>/img/contacts3.jpg');
    }
    
    @media (max-width: 450px){
      main {
          background-position: bottom!important;
      }
</style>
<?php get_footer(); ?>