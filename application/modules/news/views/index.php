	    <div id="projectes">
		<table id="table_news" width="850">
	    <tbody>
		<tr>
                    <td>&nbsp;
		    </td>
		    <td colspan="2">
			<div id="numeracio_news"><?php echo $this->pagination->create_links(); ?></div>
		    </td>
		</tr>
<?php foreach ($query as $row): ?>                 
		<tr >
		    <td width="120">
			<p class="llistat_news_data"><?php echo strftime("%e de %B, %Y", strtotime($row->date)); ?></p>
		    </td>
		    <td width="590">
			<p class="llistat_news_titol"><a href="<?php echo get_news_url($row->slug); ?>" title=""><?php echo $row->title;?></a>  </p>
			<p class="llistat_news_text"><?php echo $row->short_text;?></p>
		    </td>
		    <td width="140" align="center">
		<?php if ($row->image): ?>
			<a href="<?php echo get_news_url($row->slug); ?>"><img src="<?php echo image('uploads/news/', $row->image, 100, 70);?>" alt="<?php echo $row->title;?>" /></a>
                <?php else :?>
			<a href="<?php echo get_news_url($row->slug); ?>"><img src="<?php echo base_url();?>images/foto_news.jpg" width="100" height="70" alt="<?php echo $row->title;?>" /></a>
		<?php endif; ?> 
		    </td>
		</tr>
		
		<tr><td colspan="3" height="20"></td></tr>
<?php endforeach; ?>                 
	    
	    </tbody>
	</table>
		
		
	    </div><!--end projectes-->