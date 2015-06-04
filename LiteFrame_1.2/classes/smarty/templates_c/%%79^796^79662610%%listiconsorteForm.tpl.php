<?php /* Smarty version 2.6.19, created on 2011-12-13 15:25:04
         compiled from /var/www/procap/LiteFrame_1.2/config/custom/../../../../procap/applications/procap/templates/listiconsorteForm.tpl */ ?>
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

      <?php echo $this->_tpl_vars['processo_id_html']; ?>




   <div  id="button_menu"><?php echo $this->_tpl_vars['MM_list_html']; ?>
&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['MM_insert_html']; ?>
<?php echo $this->_tpl_vars['MM_update_html']; ?>
&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['MM_delete_html']; ?>
&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['MM_new_html']; ?>
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

      <table class="geral" >
         <tr>
            <td>
               <fieldset class="interno"><legend>Listiconsorte</legend>
                  <table class="geral">
                     <tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['pessoa_id_label']; ?>
<?php echo $this->_tpl_vars['pessoa_id_required']; ?>
 </td><td><?php echo $this->_tpl_vars['pessoa_id_html']; ?>
<?php echo $this->_tpl_vars['pessoa_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['pessoa_id']; ?>
</span></td></tr>
                  </table>
               </fieldset>
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