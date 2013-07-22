<ul class="blog_menu">
    <li class="linia_blog_menu"></li>
    <li><a <?php if($this->router->class == 'blog') : ?>class="seleccionat"<?php endif; ?> href="<?php echo site_url('blog');?>">blog</a></li>
    <?php if($this->router->class == 'blog') : ?>
    
    
    <?php $total_dupletes = count($query); ?>
    
    <?php 
    
    if($total_dupletes > 0 ) :
        $i = 0;
        $any_actual = $any_anterior = $query[$i]->year;
        $any_url = $this->uri->segment(3,'');
    while($i < $total_dupletes) : ?>
    <li><a href="<?php echo site_url('blog/archive/'.$query[$i]->year);?>"><?php echo $query[$i]->year; ?></a></li>
    <?php while($any_actual == $any_anterior && $i < $total_dupletes) : ?>
    
    <?php if($any_url == $any_actual) : ?>
    <li class="categoria_mes_blog"><a href="<?php echo site_url('blog/archive/'.$query[$i]->year.'/'.$query[$i]->month);?>"><?php echo get_natural_month($query[$i]->month); ?></a></li>
    <?php endif; ?>
    
    <?php   
            $i++; 
            if($i < $total_dupletes) 
                $any_actual = $query[$i]->year; 
          endwhile; 
    ?>
    <?php 
    $any_anterior = $any_actual;     
    endwhile; // while principal ?>
    <?php 
    endif; // si posts ?>
    <?php 
    endif; // si router class = blog ?>
</ul>
