<div id="projectes">	

    <table id="table_news" width="850">
        
        <tr><td>
    
        <div id="ndetall_left">
	    <ul>
		<li class="llistat_news_text" style="border-bottom: 0px;">                     
                    
                    <div class="news_left">
                        <?php if($video): ?>
                                <div style="margin-bottom:20px;">
                                <?php echo embed_video($video); ?>
                                </div>
                        <?php endif; ?>

                        <?php if ($image): ?>
                                <a href="<?php echo base_url(); ?>uploads/news/<?php echo $image;?>" class="lightbox"><img src="<?php echo image('uploads/news/', $image, 450, 354);?>" alt="" class="align-image-left image-border"></a>
                        <?php endif; ?>                           
                    </div>
                    
                    <div class="news_right">                     
                        <?php echo $long_text;?>                                                
                    </div>
                    
                    <div class="clear"></div>
                    
                    
		</li>
		<li><span class="llistat_news_data"><?php echo strftime("%e de %B, %Y", strtotime($date)); ?></span> <span class="llistat_news_titol"><?php echo $title?></span></li>           
                <li>
                        <!-- AddThis Button BEGIN -->
                        <div class="addthis_toolbox addthis_default_style" style="margin-top: 20px;">
                        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                        <a class="addthis_button_tweet"></a>
                        <a class="addthis_counter addthis_pill_style"></a>
                        </div>
                        <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=xa-4cf52eac3591c1a4"></script>
                        <!-- AddThis Button END -->                                                                
                </li>
	    </ul>
	    
	</div>
                
        </td></tr>
    </table>
</div>