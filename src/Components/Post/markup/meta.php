<?php
/**
 * @var Iniznet\Mahout\Ui\ClassResolver                $c
 * @var Iniznet\Mahout\Content\PostData                $post
 * @var Iniznet\Mahout\Ui\Components\Post\PostTermList $categories
 * @var Iniznet\Mahout\Ui\Components\Post\PostTermList $tags
 */
?>
<div class="<?php echo esc_attr($c('post-meta')); ?>">
	<time class="<?php echo esc_attr($c('post-meta-date')); ?>" datetime="<?php echo esc_attr($post->publishedAt->format('c')); ?>"><?php echo esc_html($post->dateDisplay); ?></time>
<?php if ('' !== $post->authorName) { ?>
	<span class="<?php echo esc_attr($c('post-meta-author')); ?>">
<?php if ('' !== $post->authorUrl) { ?>
		<a href="<?php echo esc_url($post->authorUrl); ?>"><?php echo esc_html($post->authorName); ?></a>
<?php } else { ?>
		<?php echo esc_html($post->authorName); ?>
<?php } ?>
	</span>
<?php } ?>
	<?php echo $categories->render(); // the term list's own escaped bytes?>
	<?php echo $tags->render(); // the term list's own escaped bytes?>
</div>
