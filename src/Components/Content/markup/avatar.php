<?php
/**
 * @var Iniznet\Mahout\Ui\ClassResolver $c
 * @var string                          $src
 * @var string                          $name
 */
?>
<img class="<?php echo esc_attr($c('avatar')); ?>" src="<?php echo esc_url($src); ?>" alt="<?php echo esc_attr(sprintf(__('Avatar of %s', 'mahout-ui'), $name)); ?>" width="48" height="48" loading="lazy" decoding="async">
