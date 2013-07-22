<?php 
foreach ($query as $row): ?>

    <div class="projectes_portada">
        <div class="projectes_portada_img">
            <a href="<?php echo get_photography_url($row->slug); ?>"><img src="<?php echo image('uploads/photography/', $row->image, 578, 385);?>" alt="<?php echo $row->title;?>" border="0" /></a>
        </div>
        <div class="projectes_portada_info">
            <table width="270">
                <tbody>
                    <td width="70" class="projectes_fecha"><?php echo strftime("%d.%m.%Y", strtotime($row->date)); ?><!-- 09.12.2011 --></td>
                    <td width="200" class="projectes_titol"><?php echo $row->title;?></td>
                    <tr>
                        <td colspan="2" class="projectes_t"><?php echo $row->text;?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="projectes_e">
                        </td>
                    </tr>

                    <?php if(!empty($row->customer)) : ?>
                    <tr>
                    <td class="projectes_b"><?php echo label('projects_customer');?></td>
                    <td class="projectes"><?php echo $row->customer; ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if(!empty($row->location)) : ?>                    
                    <tr>
                    <td class="projectes_b"><?php echo label('projects_location');?></td>
                    <td class="projectes"><?php echo $row->location;?></td>
                    </tr>
                    <?php endif; ?>                    
                    <?php if(!empty($row->year)) : ?>                                        
                    <tr>
                    <td class="projectes_b"><?php echo label('projects_year');?></td>
                    <td class="projectes"><?php echo $row->year; ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if(!empty($row->area)) : ?>                                                            
                    <tr>
                    <td class="projectes_b"><?php echo label('projects_area');?></td>
                    <td class="projectes"><?php echo $row->area; ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if(!empty($row->photographer)) : ?>
                    <tr>
                    <td class="projectes_b"><?php echo label('projects_photographer');?></td>
                    <td class="projectes"><?php echo $row->photographer; ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if(!empty($row->team)) : ?>
                    <tr>
                    <td class="projectes_b"><?php echo label('projects_team');?></td>
                    <td class="projectes"><?php echo $row->team; ?></td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div> 

    </div><!--end projecte portada -->
        
<?php endforeach; ?>