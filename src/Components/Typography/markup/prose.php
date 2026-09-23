<?php
/**
 * @var Iniznet\Mahout\Ui\ClassResolver $c
 * @var string                          $body trusted, already-escaped HTML
 */
?>
<div class="<?php echo esc_attr($c('prose')); ?>">
<?php echo $body; ?>
</div>
