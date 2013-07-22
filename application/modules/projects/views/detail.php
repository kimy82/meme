<div id="projectes">
    <div class="projectes_seccio">
        
        <div style="overflow:hidden;height:600px;">
            <div id="slider" class="pics">
            <?php if (count($images)>0): ?>            
                <?php foreach($images as $image) : ?>
                    <img src="<?php echo image('uploads/projects/', $image->name, 873, 597);?>" alt="<?php echo $image->text;?>" >
                <?php endforeach; ?>
            <?php endif; ?>

            </div>
            
            <script type="text/javascript">

                $(document).ready(function(){
                    $('#slider').cycle({
                        fx:     'scrollHorz',
                        speed: 'slow',
                        timeout: 0,                        
                        next:   '#next_photo,#slider',
                        prev:   '#prev_photo',
                        after: function(curr, next, opts) {
                            var caption = (opts.currSlide + 1) ;
                            $('#counter_photo').html(caption +"/"+opts.slideCount);
                        }
                    }); 
                    
                    $('#menu li:nth-child(2) a').trigger('click');
                    
                })
            </script>
            
        </div>
        <div class="clear"></div>
        <div class="peu_de_foto">
            <table width="560" border="0">
                <tbody>
                    <tr>
                    <td class="projectes_fecha" width="70"><?php echo strftime("%d.%m.%Y", strtotime($date)); ?> <!-- 07.02.2012 --></td>
                    <td class="projectes_titol" width="510"><?php echo $title; ?></td>
                    </tr>
                    <tr>
                    <td class="projectes_t" colspan="2"><?php echo $long_text;?></td>
                    </tr>
                    <tr>
                    <td colspan="2">&nbsp;</td>
                    </tr>
                </tbody>
            </table>
            <table width="265" border="0">
                <tbody>
                    <tr>
                    <td class="projectes_fecha" width="80"><span id="counter_photo"></span></td>
                    <td width="190">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="projectes_fecha">
                            
                            <a id="prev_photo" href="javascript:void(0);"><?php echo ucfirst(label('pagination_previous'));?></a>
                            /
                            <a id="next_photo" href="javascript:void(0);"><?php echo ucfirst(label('pagination_next'));?></a>
                            
                        </td>
                    </tr>
                    <tr>
                    <td>&nbsp;</td>
                    <td class="projectes">&nbsp;</td>
                    </tr>
                    <?php if(!empty($customer)) : ?>
                    <tr>
                    <td class="projectes_b"><?php echo label('projects_customer');?></td>
                    <td class="projectes"><?php echo $customer; ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if(!empty($location)) : ?>                    
                    <tr>
                    <td class="projectes_b"><?php echo label('projects_location');?></td>
                    <td class="projectes"><?php echo $location;?></td>
                    </tr>
                    <?php endif; ?>                    
                    <?php if(!empty($year)) : ?>                                        
                    <tr>
                    <td class="projectes_b"><?php echo label('projects_year');?></td>
                    <td class="projectes"><?php echo $year; ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if(!empty($area)) : ?>                                                            
                    <tr>
                    <td class="projectes_b"><?php echo label('projects_area');?></td>
                    <td class="projectes"><?php echo $area; ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if(!empty($photographer)) : ?>
                    <tr>
                    <td class="projectes_b"><?php echo label('projects_photographer');?></td>
                    <td class="projectes"><?php echo $photographer; ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if(!empty($team)) : ?>
                    <tr>
                    <td class="projectes_b"><?php echo label('projects_team');?></td>
                    <td class="projectes"><?php echo $team; ?></td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>

    </div><!--end projectes_secció-->

</div><!--end projectes-->


