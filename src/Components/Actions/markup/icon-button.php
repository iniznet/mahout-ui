<?php
/**
 * @var Iniznet\Mahout\Ui\ClassResolver                 $c
 * @var string                                          $label the accessible name
 * @var Iniznet\Mahout\Ui\Components\Actions\ButtonType $type
 */
?>
<button class="<?php echo esc_attr($c('icon-button')); ?>" type="<?php echo esc_attr($type->value); ?>" aria-label="<?php echo esc_attr($label); ?>"></button>
