<?php /* Smarty version 2.6.19, created on 2011-12-15 16:12:22
         compiled from /var/www/procap/LiteFrame_1.2/config/custom/../../../../procap/applications/procap/templates/advogadoForm.tpl */ ?>
<!-- ###########    FORMULARIO COMECO  ################ -->
<?php if (! $this->_tpl_vars['lists']): ?>

<script language="javascript">

jQuery(function($){
   $("#cpf").mask("999.999.999-99");
   $("#cep").mask("99.999-999");
   $("#nascimento").mask("99/99/9999");
   $("#telefone_1").mask("(99) 9999-999?9");
   $("#telefone_2").mask("(99) 9999-999?9");
   $("#telefone_3").mask("(99) 9999-999?9");
});

 $(document).ready(function() {
   $("#pessoafisica").click(function() {
      $("#pessoafisica_fs").show(300);
      $("#endereco").show(300);
      $("#pessoajuridica_fs").hide(300);
      $("#mostrar_escolha").hide(300);
      $('#showErrorMessage').hide();
   });
   $("#pessoajuridica").click(function() {
      $("#pessoajuridica_fs").show(300);
      $("#endereco").show(300);
      $("#pessoafisica_fs").hide(300);
      $("#mostrar_escolha").hide(300);
      $('#showErrorMessage').hide(300);
   });
   $('#nome').corner("10");
 });

</script>


<div class="form">
   <div align="center" id="form" >
      <form <?php echo $this->_tpl_vars['formOptions']; ?>
 >
         <?php echo $this->_tpl_vars['jsScript']; ?>

         <?php echo $this->_tpl_vars['jqueryInputMaskScript']; ?>

         <?php echo $this->_tpl_vars['jsValidationScript']; ?>


         <?php echo $this->_tpl_vars['id_html']; ?>

         <?php echo $this->_tpl_vars['office_id_html']; ?>




   <div  id="button_menu"><?php echo $this->_tpl_vars['MM_list_html']; ?>
&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['MM_insert_html']; ?>
<?php echo $this->_tpl_vars['MM_update_html']; ?>
&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['MM_new_html']; ?>
</div>

   <?php if ($this->_tpl_vars['messages']['success']): ?>
   <div id="showSuccessMessage" class="successMessage">
   <?php $_from = $this->_tpl_vars['messages']['success']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['message']):
?>
      <?php echo $this->_tpl_vars['message']; ?>

   <?php endforeach; endif; unset($_from); ?>
   </div>
   <?php endif; ?>

   <?php if ($this->_tpl_vars['messages']['error']): ?>
   <div id="showErrorMessage" class="errorMessage">
   <?php $_from = $this->_tpl_vars['messages']['error']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['message']):
?>
      <?php echo $this->_tpl_vars['message']; ?>

   <?php endforeach; endif; unset($_from); ?>
   </div>
   <?php endif; ?>

      <table class="geral">
         <tr>
            <td>
               <center><h3>Advogado</h3></center>
               <fieldset class="interno" id="pessoafisica_fs"  ><legend>Advogado</legend>
                  <table class="geral" >
                  	<tr ><td align="right" nowrap ><strong><?php echo $this->_tpl_vars['nome_label']; ?>
* </strong></td><td colspan="3"><?php echo $this->_tpl_vars['nome_html']; ?>
<?php echo $this->_tpl_vars['nome_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['nome']; ?>
</span></td>
               	    </tr>
                  	<tr ><td height="25" align="right" nowrap ><strong><?php echo $this->_tpl_vars['sexo_label']; ?>
<?php echo $this->_tpl_vars['sexo_required']; ?>
 </strong></td><td height="25" align="left"><?php echo $this->_tpl_vars['sexo_html']; ?>
<?php echo $this->_tpl_vars['sexo_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['sexo']; ?>
</span></td>
                  	  <td height="25" align="right"><strong><?php echo $this->_tpl_vars['estadocivil_id_label']; ?>
<?php echo $this->_tpl_vars['estadocivil_id_required']; ?>
</strong></td>
                  	  <td height="25" align="left"><?php echo $this->_tpl_vars['estadocivil_id_html']; ?>
<?php echo $this->_tpl_vars['estadocivil_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['estadocivil_id']; ?>
</span></td>
                  	</tr>
                  	<tr ><td height="25" align="right" nowrap ><strong><?php echo $this->_tpl_vars['nascimento_label']; ?>
<?php echo $this->_tpl_vars['nascimento_required']; ?>
 </strong></td><td height="25" align="left"><?php echo $this->_tpl_vars['nascimento_html']; ?>
<?php echo $this->_tpl_vars['nascimento_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['nascimento']; ?>
</span></td>
                  	  <td height="25" align="right"><strong><?php echo $this->_tpl_vars['nacionalidade_label']; ?>
<?php echo $this->_tpl_vars['nacionalidade_required']; ?>
 </strong></td>
                  	  <td height="25" align="left"><?php echo $this->_tpl_vars['nacionalidade_html']; ?>
<?php echo $this->_tpl_vars['nacionalidade_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['nacionalidade']; ?>
</span></td>
                  	</tr>
                  	<tr ><td height="25" align="right" nowrap ><strong><?php echo $this->_tpl_vars['identidade_label']; ?>
<?php echo $this->_tpl_vars['identidade_required']; ?>
 </strong></td><td height="25" align="left"><?php echo $this->_tpl_vars['identidade_html']; ?>
<?php echo $this->_tpl_vars['identidade_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['identidade']; ?>
</span></td>
                  	  <td height="25" align="right"><strong><?php echo $this->_tpl_vars['cpf_label']; ?>
<?php echo $this->_tpl_vars['cpf_required']; ?>
 </strong></td>
                  	  <td height="25" align="left"><?php echo $this->_tpl_vars['cpf_html']; ?>
<?php echo $this->_tpl_vars['cpf_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['cpf']; ?>
</span></td>
                  	</tr>
                  	<tr >
                  	  <td height="25" align="right"><strong><?php echo $this->_tpl_vars['user_id_label']; ?>
<?php echo $this->_tpl_vars['user_id_required']; ?>
</strong></td>
                  	  <td height="25" align="left"><?php echo $this->_tpl_vars['user_id_html']; ?>
<?php echo $this->_tpl_vars['user_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['user_id']; ?>
</span></td>
                  	  <td height="25" align="right"><strong><?php echo $this->_tpl_vars['oab_label']; ?>
<?php echo $this->_tpl_vars['oab_required']; ?>
</strong></td>
                  	  <td height="25" align="left"><?php echo $this->_tpl_vars['oab_html']; ?>
<?php echo $this->_tpl_vars['oab_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['oab']; ?>
</span></td>
                  	</tr>
                  </table>
               </fieldset>
               <fieldset class="interno" id="endereco"  ><legend>Geral</legend>
                  <table width="100%" class="geral">
                  	<tr ><td nowrap ><strong><?php echo $this->_tpl_vars['endereco_label']; ?>
<?php echo $this->_tpl_vars['endereco_required']; ?>
 </strong></td><td><?php echo $this->_tpl_vars['endereco_html']; ?>
<?php echo $this->_tpl_vars['endereco_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['endereco']; ?>
</span></td>
                  	  <td align="right" nowrap="nowrap">&nbsp;</td>
                  	  <td align="right" nowrap="nowrap"><strong><?php echo $this->_tpl_vars['cidade_id_label']; ?>
<?php echo $this->_tpl_vars['cidade_id_required']; ?>
 </strong></td>
                  	  <td rowspan="3" valign="top"><?php echo $this->_tpl_vars['cidade_id_html']; ?>
<?php echo $this->_tpl_vars['cidade_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['cidade_id']; ?>
</span></td>
               	    </tr>
                  	<tr ><td nowrap ><strong><?php echo $this->_tpl_vars['complemento_label']; ?>
<?php echo $this->_tpl_vars['complemento_required']; ?>
 </strong></td><td><?php echo $this->_tpl_vars['complemento_html']; ?>
<?php echo $this->_tpl_vars['complemento_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['complemento']; ?>
</span></td>
                  	  <td align="right" nowrap="nowrap">&nbsp;</td>
                  	  <td align="right" nowrap="nowrap">&nbsp;</td>
               	    </tr>
                  	<tr ><td nowrap ><strong><?php echo $this->_tpl_vars['bairro_label']; ?>
<?php echo $this->_tpl_vars['bairro_required']; ?>
 </strong></td><td><?php echo $this->_tpl_vars['bairro_html']; ?>
<?php echo $this->_tpl_vars['bairro_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['bairro']; ?>
</span></td>
                  	  <td align="right" nowrap="nowrap">&nbsp;</td>
                  	  <td align="right" nowrap="nowrap">&nbsp;</td>
               	    </tr>
                  	<tr ><td nowrap ><strong><?php echo $this->_tpl_vars['cep_label']; ?>
<?php echo $this->_tpl_vars['cep_required']; ?>
 </strong></td><td><?php echo $this->_tpl_vars['cep_html']; ?>
<?php echo $this->_tpl_vars['cep_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['cep']; ?>
</span></td>
                  	  <td align="right" nowrap="nowrap">&nbsp;</td>
                  	  <td align="right" nowrap="nowrap"><strong><?php echo $this->_tpl_vars['email_label']; ?>
<?php echo $this->_tpl_vars['email_required']; ?>
 </strong></td>
                  	  <td><?php echo $this->_tpl_vars['email_html']; ?>
<?php echo $this->_tpl_vars['email_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['email']; ?>
</span></td>
               	    </tr>
                  	<tr ><td nowrap ><strong><?php echo $this->_tpl_vars['telefone_1_label']; ?>
<?php echo $this->_tpl_vars['telefone_1_required']; ?>
 </strong></td><td><?php echo $this->_tpl_vars['telefone_1_html']; ?>
<?php echo $this->_tpl_vars['telefone_1_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['telefone_1']; ?>
</span></td>
                  	  <td align="right" nowrap="nowrap">&nbsp;</td>
                  	  <td align="right" nowrap="nowrap"><strong><?php echo $this->_tpl_vars['telefone_2_label']; ?>
<?php echo $this->_tpl_vars['telefone_2_required']; ?>
 </strong></td>
                  	  <td><?php echo $this->_tpl_vars['telefone_2_html']; ?>
<?php echo $this->_tpl_vars['telefone_2_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['telefone_2']; ?>
</span></td>
               	    </tr>
                  	<tr ><td nowrap ><strong><?php echo $this->_tpl_vars['telefone_3_label']; ?>
<?php echo $this->_tpl_vars['telefone_3_required']; ?>
</strong></td><td><?php echo $this->_tpl_vars['telefone_3_html']; ?>
<?php echo $this->_tpl_vars['telefone_3_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['telefone_3']; ?>
</span></td>
                  	  <td align="right" nowrap="nowrap">&nbsp;</td>
                  	  <td align="right" nowrap="nowrap">&nbsp;</td>
                  	  <td>&nbsp;</td>
                  	</tr>
                  	<tr ><td nowrap ><strong><?php echo $this->_tpl_vars['obs_label']; ?>
<?php echo $this->_tpl_vars['obs_required']; ?>
 </strong></td><td colspan="4"><?php echo $this->_tpl_vars['obs_html']; ?>
<?php echo $this->_tpl_vars['obs_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['obs']; ?>
</span></td>
               	    </tr>
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


