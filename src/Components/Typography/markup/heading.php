<?php
/**
 * @var Iniznet\Mahout\Ui\ClassResolver                      $c
 * @var Iniznet\Mahout\Ui\Components\Typography\HeadingLevel $level
 * @var string                                               $text
 */
?>
<<?php echo esc_html($level->tag()); ?> class="<?php echo esc_attr(trim($c('heading').' '.$c('heading--'.$level->value))); ?>"><?php echo esc_html($text); ?></<?php echo esc_html($level->tag()); ?>>
