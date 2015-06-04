<?php /* Smarty version 2.6.19, created on 2011-09-15 23:00:09
         compiled from /var/www/procap/LiteFrame_1.2/config/custom/../../../../procap/applications/admin/templates/groupsForm.tpl */ ?>
<!-- ###########    FORMULARIO COMECO  ################ -->
<?php if (! $this->_tpl_vars['lists']): ?>
<div class="form">
   <?php echo $this->_tpl_vars['jqueryInputMaskScript']; ?>

   <?php echo $this->_tpl_vars['jsValidationScript']; ?>

   <div align="center" id="form" >
      <?php echo $this->_tpl_vars['jsScript']; ?>

      <form <?php echo $this->_tpl_vars['formOptions']; ?>
 >
      <?php echo $this->_tpl_vars['id_html']; ?>




   <div  id="button_menu"><?php echo $this->_tpl_vars['MM_list_html']; ?>
&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['MM_insert_html']; ?>
<?php echo $this->_tpl_vars['MM_update_html']; ?>
</div>


   <?php $_from = $this->_tpl_vars['messages']['success']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['message']):
?>
      <div id="showMessage" class="successMessage"><?php echo $this->_tpl_vars['message']; ?>
</div>
   <?php endforeach; endif; unset($_from); ?>
   <?php $_from = $this->_tpl_vars['messages']['error']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['message']):
?>
      <div id="showMessage" class="errorMessage"><?php echo $this->_tpl_vars['message']; ?>
</div>
   <?php endforeach; endif; unset($_from); ?>

      <table class="geral" ><tr><td>
      <fieldset class="interno"><legend>Grupo</legend>
         <table class="geral">
         	<tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['name_label']; ?>
<?php echo $this->_tpl_vars['name_required']; ?>
 </td><td><?php echo $this->_tpl_vars['name_html']; ?>
<?php echo $this->_tpl_vars['name_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['name']; ?>
</span></td></tr>
         	<tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['description_label']; ?>
<?php echo $this->_tpl_vars['description_required']; ?>
 </td><td><?php echo $this->_tpl_vars['description_html']; ?>
<?php echo $this->_tpl_vars['description_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['description']; ?>
</span></td></tr>
         	<tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['active_label']; ?>
<?php echo $this->_tpl_vars['active_required']; ?>
 </td><td><?php echo $this->_tpl_vars['active_html']; ?>
<?php echo $this->_tpl_vars['active_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['active']; ?>
</span></td></tr>
         	<tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['office_id_label']; ?>
<?php echo $this->_tpl_vars['office_id_required']; ?>
 </td><td><?php echo $this->_tpl_vars['office_id_html']; ?>
<?php echo $this->_tpl_vars['office_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['office_id']; ?>
</span></td></tr>
         	<tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['application_id_label']; ?>
<?php echo $this->_tpl_vars['application_id_required']; ?>
 </td><td><?php echo $this->_tpl_vars['application_id_html']; ?>
<?php echo $this->_tpl_vars['application_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['application_id']; ?>
</span></td></tr>
         </table>
      </fieldset>
            </td>
            <td>
            	<?php if ($this->_tpl_vars['actions']): ?>
               <fieldset class="interno"><legend>Direitos</legend>
                  <table class="geral" >
                  <?php $_from = $this->_tpl_vars['actions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['app'] => $this->_tpl_vars['acts']):
?>
                     <tr>
                        <th colspan="2"><?php echo $this->_tpl_vars['app']; ?>
</label></th>
                     </tr>
                     <?php $_from = $this->_tpl_vars['acts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['action']):
?>
                        <tr>
                           <td  ><label for="<?php echo $this->_tpl_vars['action']['id']; ?>
"><?php echo $this->_tpl_vars['action']['name']; ?>
</label></td>
                           <td  ><input id="<?php echo $this->_tpl_vars['action']['id']; ?>
" name="actions[<?php echo $this->_tpl_vars['action']['id']; ?>
]" <?php if ($this->_tpl_vars['action']['user_in']): ?> value="1" checked="checked" <?php endif; ?> type="checkbox"></td>
                        </tr>
               	     <?php endforeach; endif; unset($_from); ?>
               	<?php endforeach; endif; unset($_from); ?>
                  </table>
               </fieldset>
               <?php endif; ?>
            </td>
         </tr>
      </table>
   <blockquote><p><?php echo $this->_tpl_vars['requiredNote']; ?>
</p></blockquote>
   </form>
   </div>

</div>
<?php endif; ?>
<!-- ###########    FORMULARIO FIM  ################ -->