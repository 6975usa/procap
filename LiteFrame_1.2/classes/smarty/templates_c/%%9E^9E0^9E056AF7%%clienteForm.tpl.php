<?php /* Smarty version 2.6.19, created on 2011-12-13 15:22:18
         compiled from /var/www/procap/LiteFrame_1.2/config/custom/../../../../procap/applications/procap/templates/clienteForm.tpl */ ?>
<!-- ###########    FORMULARIO COMECO  ################ -->

<?php if (! $this->_tpl_vars['lists']): ?>

<script language="javascript">

jQuery(function($){
   $("#cnpj").mask("99.999.999/9999-99");
   $("#cpf").mask("999.999.999-99");
   $("#inscricao_estadual").mask("999.999.999.999");
   $("#inscricao_municipal").mask("999.999.999.999");
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

         <?php echo $this->_tpl_vars['cliente_html']; ?>

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
               <center>
                 <h3>Cliente</h3></center>
               <div id="mostrar_escolha" style="display:<?php echo $this->_tpl_vars['mostrar_escolha']; ?>
;">
              <p>Escolha Tipo de Pessoa:</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>
                <input type="radio" id="pessoafisica" name="cliente" value="pessoa_fisica">
                <label for="pessoafisica" >Pessoa Física</label>  </p>
              <p>&nbsp;</p>
              <p>
                <input type="radio" id="pessoajuridica" name="cliente" value="pessoa_juridica" >
                <label for="pessoajuridica" >Pessoa Jurídica</label></p>
            </div>
               <fieldset class="interno" id="pessoajuridica_fs"  style="display:<?php echo $this->_tpl_vars['mostrar_pessoa_juridica']; ?>
 ;"><legend>Pessoa Jurídica</legend>
                  <table class="geral" >
                  	<tr ><td nowrap ><strong><?php echo $this->_tpl_vars['nome_fantasia_label']; ?>
* </strong></td><td width="250"><?php echo $this->_tpl_vars['nome_fantasia_html']; ?>
<?php echo $this->_tpl_vars['nome_fantasia_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['nome_fantasia']; ?>
</span></td>
                  	  <td><strong><?php echo $this->_tpl_vars['inscricao_estadual_label']; ?>
<?php echo $this->_tpl_vars['inscricao_estadual_required']; ?>
 </strong></td>
                  	  <td><?php echo $this->_tpl_vars['inscricao_estadual_html']; ?>
<?php echo $this->_tpl_vars['inscricao_estadual_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['inscricao_estadual']; ?>
</span></td>
                  	</tr>
                  	<tr ><td nowrap ><strong><?php echo $this->_tpl_vars['inscricao_municipal_label']; ?>
<?php echo $this->_tpl_vars['inscricao_municipal_required']; ?>
 </strong></td><td width="250"><?php echo $this->_tpl_vars['inscricao_municipal_html']; ?>
<?php echo $this->_tpl_vars['inscricao_municipal_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['inscricao_municipal']; ?>
</span></td>
                  	  <td><strong><?php echo $this->_tpl_vars['cnpj_label']; ?>
<?php echo $this->_tpl_vars['cnpj_required']; ?>
 </strong></td>
                  	  <td><?php echo $this->_tpl_vars['cnpj_html']; ?>
<?php echo $this->_tpl_vars['cnpj_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['cnpj']; ?>
</span></td>
                  	</tr>
               	  </table>
               </fieldset>
               <fieldset class="interno" id="pessoafisica_fs"  style="display:<?php echo $this->_tpl_vars['mostrar_pessoa_fisica']; ?>
;" ><legend>Pessoa Física</legend>
                  <table class="geral" >
                  	<tr ><td nowrap ><strong><?php echo $this->_tpl_vars['nome_label']; ?>
* </strong></td><td colspan="3"><?php echo $this->_tpl_vars['nome_html']; ?>
<?php echo $this->_tpl_vars['nome_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['nome']; ?>
</span></td>
               	    </tr>
                  	<tr ><td nowrap ><strong>Sexo* </strong></td><td><?php echo $this->_tpl_vars['sexo_html']; ?>
<?php echo $this->_tpl_vars['sexo_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['sexo']; ?>
</span></td>
                  	  <td><strong><?php echo $this->_tpl_vars['nascimento_label']; ?>
<?php echo $this->_tpl_vars['nascimento_required']; ?>
 </strong></td>
                  	  <td><?php echo $this->_tpl_vars['nascimento_html']; ?>
<?php echo $this->_tpl_vars['nascimento_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['nascimento']; ?>
</span></td>
               	    </tr>
                  	<tr ><td nowrap ><strong><?php echo $this->_tpl_vars['estadocivil_id_label']; ?>
<?php echo $this->_tpl_vars['estadocivil_id_required']; ?>
 </strong></td><td width="250"><?php echo $this->_tpl_vars['estadocivil_id_html']; ?>
<?php echo $this->_tpl_vars['estadocivil_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['estadocivil_id']; ?>
</span></td>
                  	  <td><strong><?php echo $this->_tpl_vars['identidade_label']; ?>
<?php echo $this->_tpl_vars['identidade_required']; ?>
 </strong></td>
                  	  <td><?php echo $this->_tpl_vars['identidade_html']; ?>
<?php echo $this->_tpl_vars['identidade_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['identidade']; ?>
</span></td>
                  	</tr>
                  	<tr ><td nowrap ><strong><?php echo $this->_tpl_vars['nacionalidade_label']; ?>
<?php echo $this->_tpl_vars['nacionalidade_required']; ?>
 </strong></td><td width="250"><?php echo $this->_tpl_vars['nacionalidade_html']; ?>
<?php echo $this->_tpl_vars['nacionalidade_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['nacionalidade']; ?>
</span></td>
                  	  <td><strong><?php echo $this->_tpl_vars['cpf_label']; ?>
<?php echo $this->_tpl_vars['cpf_required']; ?>
 </strong></td>
                  	  <td><?php echo $this->_tpl_vars['cpf_html']; ?>
<?php echo $this->_tpl_vars['cpf_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['cpf']; ?>
</span></td>
                  	</tr>
                  	<tr ><td nowrap ><strong><?php echo $this->_tpl_vars['profissao_label']; ?>
<?php echo $this->_tpl_vars['profissao_required']; ?>
 </strong></td><td width="250"><?php echo $this->_tpl_vars['profissao_html']; ?>
<?php echo $this->_tpl_vars['profissao_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['profissao']; ?>
</span></td>
                  	  <td><strong><?php echo $this->_tpl_vars['oab_label']; ?>
<?php echo $this->_tpl_vars['oab_required']; ?>
 </strong></td>
                  	  <td><?php echo $this->_tpl_vars['oab_html']; ?>
<?php echo $this->_tpl_vars['oab_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['oab']; ?>
</span></td>
                  	</tr>
               	  </table>
               </fieldset>
               <fieldset class="interno" id="endereco" style="display:<?php echo $this->_tpl_vars['mostrar_endereco']; ?>
;" ><legend>Geral</legend>
                  <table class="geral">
                  	<tr ><td nowrap ><strong><?php echo $this->_tpl_vars['endereco_label']; ?>
<?php echo $this->_tpl_vars['endereco_required']; ?>
 </strong></td><td width="250"><?php echo $this->_tpl_vars['endereco_html']; ?>
<?php echo $this->_tpl_vars['endereco_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['endereco']; ?>
</span></td>
                  	  <td><strong><?php echo $this->_tpl_vars['cidade_id_label']; ?>
<?php echo $this->_tpl_vars['cidade_id_required']; ?>
 </strong></td>
                  	  <td rowspan="3" valign="top"><?php echo $this->_tpl_vars['cidade_id_html']; ?>
<?php echo $this->_tpl_vars['cidade_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['cidade_id']; ?>
</span></td>
                  	</tr>
                  	<tr ><td nowrap ><strong><?php echo $this->_tpl_vars['complemento_label']; ?>
<?php echo $this->_tpl_vars['complemento_required']; ?>
 </strong></td><td width="250"><?php echo $this->_tpl_vars['complemento_html']; ?>
<?php echo $this->_tpl_vars['complemento_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['complemento']; ?>
</span></td>
                  	  <td>&nbsp;</td>
               	    </tr>
                  	<tr ><td nowrap ><strong><?php echo $this->_tpl_vars['bairro_label']; ?>
<?php echo $this->_tpl_vars['bairro_required']; ?>
 </strong></td><td width="250"><?php echo $this->_tpl_vars['bairro_html']; ?>
<?php echo $this->_tpl_vars['bairro_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['bairro']; ?>
</span></td>
                  	  <td>&nbsp;</td>
               	    </tr>
                  	<tr ><td nowrap ><strong><?php echo $this->_tpl_vars['cep_label']; ?>
<?php echo $this->_tpl_vars['cep_required']; ?>
 </strong></td><td width="250"><?php echo $this->_tpl_vars['cep_html']; ?>
<?php echo $this->_tpl_vars['cep_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['cep']; ?>
</span></td>
                  	  <td><strong><?php echo $this->_tpl_vars['telefone_1_label']; ?>
<?php echo $this->_tpl_vars['telefone_1_required']; ?>
 </strong></td>
                  	  <td><?php echo $this->_tpl_vars['telefone_1_html']; ?>
<?php echo $this->_tpl_vars['telefone_1_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['telefone_1']; ?>
</span></td>
                  	</tr>
                  	<tr ><td nowrap ><strong><?php echo $this->_tpl_vars['email_label']; ?>
<?php echo $this->_tpl_vars['email_required']; ?>
 </strong></td><td width="250"><?php echo $this->_tpl_vars['email_html']; ?>
<?php echo $this->_tpl_vars['email_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['email']; ?>
</span></td>
                  	  <td><strong><?php echo $this->_tpl_vars['telefone_2_label']; ?>
<?php echo $this->_tpl_vars['telefone_2_required']; ?>
 </strong></td>
                  	  <td><?php echo $this->_tpl_vars['telefone_2_html']; ?>
<?php echo $this->_tpl_vars['telefone_2_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['telefone_2']; ?>
</span></td>
                  	</tr>
                  	<tr ><td nowrap ><strong><?php echo $this->_tpl_vars['telefone_3_label']; ?>
<?php echo $this->_tpl_vars['telefone_3_required']; ?>
 </strong></td><td width="250"><?php echo $this->_tpl_vars['telefone_3_html']; ?>
<?php echo $this->_tpl_vars['telefone_3_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['telefone_3']; ?>
</span></td>
                  	  <td>&nbsp;</td>
                  	  <td>&nbsp;</td>
                  	</tr>
                  	<tr >
                  	  <td nowrap ><strong><?php echo $this->_tpl_vars['obs_label']; ?>
<?php echo $this->_tpl_vars['obs_required']; ?>
 </strong></td><td colspan="3"><?php echo $this->_tpl_vars['obs_html']; ?>
<?php echo $this->_tpl_vars['obs_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['obs']; ?>
</span></td>
               	    </tr>
                  </table>
               </fieldset>
            </td>
         </tr>
         <tr>
           <td>&nbsp;</td>
         </tr>
      </table>
<blockquote><p><?php echo $this->_tpl_vars['requiredNote']; ?>
</p></blockquote>
   </form>
   </div>

</div>
<?php endif; ?>
<!-- ###########    FORMULARIO FIM  ################ -->


