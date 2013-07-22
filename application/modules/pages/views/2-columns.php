<h1><?php echo $page_h1; ?></h1>

<div id="left">
	<?php echo $page_text; ?>
</div>

<div id="right">
	<div class="widget">
		<h3><?php echo label('articles_categories'); ?></h3>
		<ul>
			<?php echo articles_category_tree(); ?>
		</ul>
	</div>
	<div class="widget">
		<h3><?php echo label('random_gallery'); ?></h3>
		<?php echo latest_galleries(1, 0, 'gallery/latest_galleries', true); ?>
	</div>
</div>