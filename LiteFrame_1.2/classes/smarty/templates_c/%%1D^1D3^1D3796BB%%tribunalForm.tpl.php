<?php /* Smarty version 2.6.19, created on 2012-01-12 10:46:44
         compiled from /var/www/procap/LiteFrame_1.2/config/custom/../../../../procap/applications/procap/templates/tribunalForm.tpl */ ?>
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

      <table class="geral" ><tr><td>
            <center><h3>Tribunal</h3></center>
      <fieldset class="interno"><legend>Geral</legend>
         <table class="geral">
         	<tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['nome_label']; ?>
<?php echo $this->_tpl_vars['nome_required']; ?>
 </td><td><?php echo $this->_tpl_vars['nome_html']; ?>
<?php echo $this->_tpl_vars['nome_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['nome']; ?>
</span></td></tr>
         	<tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['nomeabreviado_label']; ?>
<?php echo $this->_tpl_vars['nomeabreviado_required']; ?>
 </td><td><?php echo $this->_tpl_vars['nomeabreviado_html']; ?>
<?php echo $this->_tpl_vars['nomeabreviado_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['nomeabreviado']; ?>
</span></td></tr>
         	</table>
      </fieldset>
      <fieldset class="interno"><legend>Endereço</legend>
         <table class="geral">
         	<tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['endereco_label']; ?>
<?php echo $this->_tpl_vars['endereco_required']; ?>
 </td><td><?php echo $this->_tpl_vars['endereco_html']; ?>
<?php echo $this->_tpl_vars['endereco_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['endereco']; ?>
</span></td></tr>
         	<tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['complemento_label']; ?>
<?php echo $this->_tpl_vars['complemento_required']; ?>
 </td><td><?php echo $this->_tpl_vars['complemento_html']; ?>
<?php echo $this->_tpl_vars['complemento_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['complemento']; ?>
</span></td></tr>
         	<tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['cidade_id_label']; ?>
<?php echo $this->_tpl_vars['cidade_id_required']; ?>
 </td><td><?php echo $this->_tpl_vars['cidade_id_html']; ?>
<?php echo $this->_tpl_vars['cidade_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['cidade_id']; ?>
</span></td></tr>
         	<tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['bairro_label']; ?>
<?php echo $this->_tpl_vars['bairro_required']; ?>
 </td><td><?php echo $this->_tpl_vars['bairro_html']; ?>
<?php echo $this->_tpl_vars['bairro_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['bairro']; ?>
</span></td></tr>
         	<tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['cep_label']; ?>
<?php echo $this->_tpl_vars['cep_required']; ?>
 </td><td><?php echo $this->_tpl_vars['cep_html']; ?>
<?php echo $this->_tpl_vars['cep_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['cep']; ?>
</span></td></tr>
         	<tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['telefone1_label']; ?>
<?php echo $this->_tpl_vars['telefone1_required']; ?>
 </td><td><?php echo $this->_tpl_vars['telefone1_html']; ?>
<?php echo $this->_tpl_vars['telefone1_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['telefone1']; ?>
</span></td></tr>
         	<tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['telefone2_label']; ?>
<?php echo $this->_tpl_vars['telefone2_required']; ?>
 </td><td><?php echo $this->_tpl_vars['telefone2_html']; ?>
<?php echo $this->_tpl_vars['telefone2_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['telefone2']; ?>
</span></td></tr>
         	<tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['obs_label']; ?>
<?php echo $this->_tpl_vars['obs_required']; ?>
 </td><td><?php echo $this->_tpl_vars['obs_html']; ?>
<?php echo $this->_tpl_vars['obs_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['obs']; ?>
</span></td></tr>
         </table>
      </fieldset>
            </td>
<!--

            <td>
               <fieldset class="interno"><legend>Varas/Turmas</legend>
                  <table class="geral" >
            	<?php if ($this->_tpl_vars['turmas']): ?>
                  <?php $_from = $this->_tpl_vars['turmas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['turma']):
?>
                        <tr>
                           <td  ></td>
                           <td  ><input id="<?php echo $this->_tpl_vars['turma']['descricao']; ?>
" name="turmas[<?php echo $this->_tpl_vars['turma']['descricao']; ?>
]" type="text" value="<?php echo $this->_tpl_vars['turma']['descricao']; ?>
"></td>
                        </tr>
               	<?php endforeach; endif; unset($_from); ?>
               <?php endif; ?>
                        <tr>
                           <td  ><label for="turmas[new]">Nova: </label></td>
                           <td  ><input id="turmas[new]" name="turmas[new]"  type="text"></td>
                        </tr>
                  </table>
               </fieldset>
            </td>
-->


         </tr>
      </table>
   <blockquote><p><?php echo $this->_tpl_vars['requiredNote']; ?>
</p></blockquote>
   </form>
   </div>

</div>
<?php endif; ?>
<!-- ###########    FORMULARIO FIM  ################ -->