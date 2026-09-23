<?php
/**
 * @var Iniznet\Mahout\Ui\ClassResolver $c
 * @var string|null                     $newer
 * @var string|null                     $older
 */
?>
<?php if (null !== $newer || null !== $older) { ?>
<nav class="<?php echo esc_attr($c('pagination')); ?>">
<?php if (null !== $newer) { ?>
	<a class="<?php echo esc_attr($c('pagination-newer')); ?>" href="<?php echo esc_url($newer); ?>"><?php esc_html_e('Newer', 'mahout-ui'); ?></a>
<?php } ?>
<?php if (null !== $older) { ?>
	<a class="<?php echo esc_attr($c('pagination-older')); ?>" href="<?php echo esc_url($older); ?>"><?php esc_html_e('Older', 'mahout-ui'); ?></a>
<?php } ?>
</nav>
<?php } ?>
