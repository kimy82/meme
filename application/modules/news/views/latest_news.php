<?php 
foreach ($query as $row): ?>

    <ul class="noticies_portada">

		<?php if(!empty($row->video)) : ?>
		<li><a href="<?php echo get_news_url($row->slug); ?>"><?php echo video_viewer($row->video);?></a></li>
		<?php endif; ?>
        <li><h5><?php echo strftime("%e de %B, %Y", strtotime($row->date)); ?><!--7 de novembre, 2011--></h5></li>
        <li class="noticiesp_titol"><a href="<?php echo get_news_url($row->slug); ?>"><?php echo $row->title;?></a></li>
        <li><p class="noticiesp_contingut"><?php echo word_limiter($row->short_text,18);?></p>
        </li>
        <li>
            <p class="lleigir_mes"><a href="<?php echo get_news_url($row->slug); ?>"><?php echo label('read_more');?></a></p>
        </li>
    </ul>        
        
<?php endforeach; ?>