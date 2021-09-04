<div class="col-lg-4 order-md-2 d-none d-md-block">
    <?php if (is_active_sidebar('true_side')) : ?>
        <div id="true-side" class="sidebar" style="background: white;
    border-radius: .25rem; border: 1px solid rgba(0,0,0,.125); padding: .75rem 1rem">
            <?php dynamic_sidebar('true_side'); ?>
        </div>
    <?php endif; ?>
</div>