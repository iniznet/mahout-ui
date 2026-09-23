<?php
/**
 * @var Iniznet\Mahout\Ui\ClassResolver            $c
 * @var string                                     $message
 * @var Iniznet\Mahout\Ui\Components\Overlays\Tone $tone
 */
?>
<div class="<?php echo esc_attr(trim($c('toast').' '.$c('toast--'.$tone->value))); ?>" role="status"><?php echo esc_html($message); ?></div>
