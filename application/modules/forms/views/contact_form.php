<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"> </script>
<script language="javascript" type="text/javascript">
jQuery(function() {
	$("input[name='secure_code']").val('siteform').hide();
});
</script>

<?php echo form_open(); ?>
        
<div id="formulari_contacte">
    <h3><?php echo label('contact_form');?></h3>
    <table id="tnewsletter" width="355">
        <tbody>
            <tr>
                <td width="55">
                    <?php echo $this->lang->line('name');?>
                </td>
                <td width="300">
                    <input class="inputbox" type="text" size="35" name="name" id="name" value="<?php echo set_value('name'); ?>">
                    <?php echo form_error('name'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->lang->line('email');?>
                </td>
                <td>
                    <input class="inputbox" type="text" size="35" name="email" id="email"  value="<?php echo set_value('email'); ?>">
                    <?php echo form_error('email'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->lang->line('telephone');?>
                </td>
                <td>
                    <input class="inputbox" type="text" size="35" name="telephone" id="telephone" value="<?php echo set_value('telephone');?>">
                    <?php echo form_error('telephone'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->lang->line('fax');?>
                </td>
                <td>
                    <input class="inputbox" type="text" size="35" name="fax" id="fax" value="<?php echo set_value('fax');?>">
                    <?php echo form_error('fax'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->lang->line('message');?>
                </td>
                <td>
                    <textarea class="textareabox" name="message" id="message" size="35" cols="35" rows="5"><?php echo set_value('message'); ?></textarea>
                    <?php echo form_error('message'); ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="boto">
                    <input type="text" name="secure_code" value="" />
                <input class="button" type="submit" name="submit" id="submit" value="<?php echo $this->lang->line('send');?>" />
                </td>
            </tr>
        </tbody>
    </table>
</div>        
        
<?php echo form_close(); ?>