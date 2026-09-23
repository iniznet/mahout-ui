<?php
/**
 * @var Iniznet\Mahout\Ui\ClassResolver                    $c
 * @var string                                             $label
 * @var Iniznet\Mahout\Ui\Components\Actions\ButtonType    $type
 * @var Iniznet\Mahout\Ui\Components\Actions\ButtonVariant $variant
 * @var bool                                               $disabled
 */
?>
<button class="<?php echo esc_attr(trim($c('button').' '.$c('button--'.$variant->value))); ?>" type="<?php echo esc_attr($type->value); ?>"<?php echo $disabled ? ' disabled' : ''; ?>>
	<?php echo esc_html($label); ?>
</button>
