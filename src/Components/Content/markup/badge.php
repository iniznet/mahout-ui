<?php
/**
 * @var Iniznet\Mahout\Ui\ClassResolver           $c
 * @var string                                    $label
 * @var Iniznet\Mahout\Ui\Components\Content\Tone $tone
 */
?>
<span class="<?php echo esc_attr(trim($c('badge').' '.$c('badge--'.$tone->value))); ?>"><?php echo esc_html($label); ?></span>
