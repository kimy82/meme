<div class="container_post">
    <h2><a href="<?php echo get_post_url($post->slug); ?>"><?php echo $post->title;?></a></h2>
    <h3><?php echo strftime("%e de %B, %Y", strtotime($post->date)); ?></h3>
        <?php if(count($post->images)>0) : ?>    
    <div class="foto_blog">

        <?php foreach($post->images as $image) : ?>
        <img src="<?php echo image('uploads/blog/', $image->name, 620);?>" alt="" class="image-border" /><br />
        <?php endforeach;  ?>

    </div>
        <?php endif; ?>    
    <div class="blog_text">

    <p><?php echo $post->short_text; ?></p>
    <p class="lleigir_mes" style="margin-top: 20px;"><a href="<?php echo get_post_url($post->slug); ?>"><?php echo label('read_more');?></a></p>                    
    </div>
</div>
