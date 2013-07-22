<script language="javascript" type="text/javascript">
$(function() {
	$("input[name='secure_code']").val('siteform').hide();
});
</script>

<?php echo form_open( !empty($form_action) ? $form_action : '' ); ?>
<table id="tnewsletter" width="230">
    <tbody>
        <tr>
            <td width="60">
                <?php echo $this->lang->line('name'); ?>
            </td>
            <td width="170">
                <input class="inputbox" type="text" size="20" name="name" id="name" value="<?php echo set_value('name');?>" />
		<?php echo form_error('name'); ?>                
            </td>
        </tr>
        <tr>
            <td>
                <?php echo $this->lang->line('email'); ?>
            </td>
            <td>
                <input class="inputbox" type="text" size="20" name="email" id="email" value="<?php echo set_value('email');?>" />
		<?php echo form_error('email'); ?>                
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
<?php echo form_close(); ?>
