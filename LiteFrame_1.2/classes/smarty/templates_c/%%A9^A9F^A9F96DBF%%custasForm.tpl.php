<?php /* Smarty version 2.6.19, created on 2011-12-13 15:25:04
         compiled from /var/www/procap/LiteFrame_1.2/config/custom/../../../../procap/applications/procap/templates/custasForm.tpl */ ?>
<!-- ###########    FORMULARIO COMECO  ################ -->

<?php if (! $this->_tpl_vars['lists']): ?>

   <script language="javascript" type="text/javascript" src="<?php echo $this->_tpl_vars['static_url']; ?>
/framework/js/autoNumeric-1.6.2.js"></script>
   <script language="javascript" type="text/javascript" src="<?php echo $this->_tpl_vars['static_url']; ?>
/framework/js/autoLoader.js"></script>
   
   
<script language="javascript">
    $(document).ready(function() {
    
        jQuery(function($) {
        	$('#valor').autoNumeric({
        		mNum: 10, 
        		mDec: 2 , 
                aSep: '.', 
                aDec: ',', 
        	});
        });
      
    });
</script>

<div id="custas_form" class="list">
   <?php echo $this->_tpl_vars['jqueryInputMaskScript']; ?>

   <?php echo $this->_tpl_vars['jsValidationScript']; ?>

   <div align="center" id="form" class="listDiv">
      <?php echo $this->_tpl_vars['jsScript']; ?>

      <form <?php echo $this->_tpl_vars['formOptions']; ?>
 >
      <?php echo $this->_tpl_vars['id_html']; ?>




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
               <fieldset class="interno"><legend>Custas</legend>
                  <table class="geral">
                     <tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['processo_id_label']; ?>
<?php echo $this->_tpl_vars['processo_id_required']; ?>
 </td><td><?php echo $this->_tpl_vars['processo_id_html']; ?>
<?php echo $this->_tpl_vars['processo_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['processo_id']; ?>
</span></td></tr>
                     <tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['descricao_label']; ?>
<?php echo $this->_tpl_vars['descricao_required']; ?>
 </td><td><?php echo $this->_tpl_vars['descricao_html']; ?>
<?php echo $this->_tpl_vars['descricao_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['descricao']; ?>
</span></td></tr>
                     <tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['data_label']; ?>
<?php echo $this->_tpl_vars['data_required']; ?>
 </td><td><?php echo $this->_tpl_vars['data_html']; ?>
<?php echo $this->_tpl_vars['data_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['data']; ?>
</span></td></tr>
                     <tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['tipo_label']; ?>
<?php echo $this->_tpl_vars['tipo_required']; ?>
 </td><td><?php echo $this->_tpl_vars['tipo_html']; ?>
<?php echo $this->_tpl_vars['tipo_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['tipo']; ?>
</span></td></tr>
                     <tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['valor_label']; ?>
<?php echo $this->_tpl_vars['valor_required']; ?>
 </td><td><?php echo $this->_tpl_vars['valor_html']; ?>
<?php echo $this->_tpl_vars['valor_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['valor']; ?>
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