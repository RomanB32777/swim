<tr>
    <td class="my-0"><?php the_title(); ?></td>
    <td class="text-center">
        <?php if (get_field('file')) {
            $file = get_field('file');
        ?>
            <a href="<?php echo $file['url'] ?>"><img width="32" height="32" src="<?php bloginfo('template_directory'); ?>/img/download.svg" /></a>
        <?php } else echo '-' ?>
    </td>
</tr>