<?php
/**
 * @var Iniznet\Mahout\Ui\ClassResolver           $c
 * @var Iniznet\Mahout\Ui\Components\Layout\Width $width
 * @var list<string>                              $children
 */
?>
<div class="<?php echo esc_attr(trim($c('container').' '.$c('container--'.$width->value))); ?>">
<?php foreach ($children as $child) { ?>
	<?php echo $child; ?>
<?php } ?>
</div>
