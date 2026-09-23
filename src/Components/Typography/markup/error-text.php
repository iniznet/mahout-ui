<?php
/**
 * @var Iniznet\Mahout\Ui\ClassResolver $c
 * @var string                          $id
 * @var string                          $message
 */
?>
<p class="<?php echo esc_attr($c('error-text')); ?>" id="<?php echo esc_attr($id); ?>"><?php echo esc_html($message); ?></p>
