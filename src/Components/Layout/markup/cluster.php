<?php
/**
 * @var Iniznet\Mahout\Ui\ClassResolver          $c
 * @var Iniznet\Mahout\Ui\Components\Layout\Size $gap
 * @var list<string>                             $children
 */
?>
<div class="<?php echo esc_attr(trim($c('cluster').' '.$c('cluster--'.$gap->value))); ?>">
<?php foreach ($children as $child) { ?>
	<?php echo $child; ?>
<?php } ?>
</div>
