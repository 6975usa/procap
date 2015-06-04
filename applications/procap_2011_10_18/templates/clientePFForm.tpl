<!-- ###########    FORMULARIO COMECO  ################ -->
{s if !$lists  s}

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
      <form {s $formOptions s} >
         {s $jsScript s}
         {s $jqueryInputMaskScript s}
         {s $jsValidationScript s}

         {s $id_html s}
         {s $cliente_html s}
         {s $office_id_html s}



   <div  id="button_menu">{s $MM_list_html s}&nbsp;&nbsp;&nbsp;{s $MM_insert_html s}{s $MM_update_html s}&nbsp;&nbsp;&nbsp;{s $MM_new_html s}</div>

   {s if $messages.success s}
   <div id="showSuccessMessage" class="successMessage">
   {s foreach from=$messages.success item=message  s}
      {s $message s}
   {s /foreach s}
   </div>
   {s /if s}

   {s if $messages.error s}
   <div id="showErrorMessage" class="errorMessage">
   {s foreach from=$messages.error item=message  s}
      {s $message s}
   {s /foreach s}
   </div>
   {s /if s}

      <table class="geral">
         <tr>
            <td>
            <center>
              <h3>Cliente</h3></center>
               <fieldset class="interno" id="pessoafisica_fs"  ><legend>Pessoa F&iacute;sica</legend>
                 <table class="geral" >
                   <tr >
                     <td nowrap="nowrap" ><strong>{s $nome_label s}* </strong></td>
                     <td colspan="3">{s $nome_html s}{s $nome_error s}<span class="error">{s $formErrorMessages.nome s}</span></td>
                   </tr>
                   <tr >
                     <td nowrap="nowrap" ><strong>Sexo* </strong></td>
                     <td>{s $sexo_html s}{s $sexo_error s}<span class="error">{s $formErrorMessages.sexo s}</span></td>
                     <td><strong>{s $nascimento_label s}{s $nascimento_required s} </strong></td>
                     <td>{s $nascimento_html s}{s $nascimento_error s}<span class="error">{s $formErrorMessages.nascimento s}</span></td>
                   </tr>
                   <tr >
                     <td nowrap="nowrap" ><strong>{s $estadocivil_id_label s}{s $estadocivil_id_required s} </strong></td>
                     <td width="250">{s $estadocivil_id_html s}{s $estadocivil_id_error s}<span class="error">{s $formErrorMessages.estadocivil_id s}</span></td>
                     <td><strong>{s $identidade_label s}{s $identidade_required s} </strong></td>
                     <td>{s $identidade_html s}{s $identidade_error s}<span class="error">{s $formErrorMessages.identidade s}</span></td>
                   </tr>
                   <tr >
                     <td nowrap="nowrap" ><strong>{s $nacionalidade_label s}{s $nacionalidade_required s} </strong></td>
                     <td width="250">{s $nacionalidade_html s}{s $nacionalidade_error s}<span class="error">{s $formErrorMessages.nacionalidade s}</span></td>
                     <td><strong>{s $cpf_label s}{s $cpf_required s} </strong></td>
                     <td>{s $cpf_html s}{s $cpf_error s}<span class="error">{s $formErrorMessages.cpf s}</span></td>
                   </tr>
                   <tr >
                     <td nowrap="nowrap" ><strong>{s $profissao_label s}{s $profissao_required s} </strong></td>
                     <td width="250">{s $profissao_html s}{s $profissao_error s}<span class="error">{s $formErrorMessages.profissao s}</span></td>
                     <td><strong>{s $oab_label s}{s $oab_required s} </strong></td>
                     <td>{s $oab_html s}{s $oab_error s}<span class="error">{s $formErrorMessages.oab s}</span></td>
                   </tr>
                 </table>
               </fieldset>
               <fieldset class="interno" id="endereco"  ><legend>Geral</legend>
                 <table class="geral">
                   <tr >
                     <td nowrap="nowrap" ><strong>{s $endereco_label s}{s $endereco_required s} </strong></td>
                     <td width="250">{s $endereco_html s}{s $endereco_error s}<span class="error">{s $formErrorMessages.endereco s}</span></td>
                     <td><strong>{s $cidade_id_label s}{s $cidade_id_required s} </strong></td>
                     <td rowspan="3" valign="top">{s $cidade_id_html s}{s $cidade_id_error s}<span class="error">{s $formErrorMessages.cidade_id s}</span></td>
                   </tr>
                   <tr >
                     <td nowrap="nowrap" ><strong>{s $complemento_label s}{s $complemento_required s} </strong></td>
                     <td width="250">{s $complemento_html s}{s $complemento_error s}<span class="error">{s $formErrorMessages.complemento s}</span></td>
                     <td>&nbsp;</td>
                   </tr>
                   <tr >
                     <td nowrap="nowrap" ><strong>{s $bairro_label s}{s $bairro_required s} </strong></td>
                     <td width="250">{s $bairro_html s}{s $bairro_error s}<span class="error">{s $formErrorMessages.bairro s}</span></td>
                     <td>&nbsp;</td>
                   </tr>
                   <tr >
                     <td nowrap="nowrap" ><strong>{s $cep_label s}{s $cep_required s} </strong></td>
                     <td width="250">{s $cep_html s}{s $cep_error s}<span class="error">{s $formErrorMessages.cep s}</span></td>
                     <td><strong>{s $telefone_1_label s}{s $telefone_1_required s} </strong></td>
                     <td>{s $telefone_1_html s}{s $telefone_1_error s}<span class="error">{s $formErrorMessages.telefone_1 s}</span></td>
                   </tr>
                   <tr >
                     <td nowrap="nowrap" ><strong>{s $email_label s}{s $email_required s} </strong></td>
                     <td width="250">{s $email_html s}{s $email_error s}<span class="error">{s $formErrorMessages.email s}</span></td>
                     <td><strong>{s $telefone_2_label s}{s $telefone_2_required s} </strong></td>
                     <td>{s $telefone_2_html s}{s $telefone_2_error s}<span class="error">{s $formErrorMessages.telefone_2 s}</span></td>
                   </tr>
                   <tr >
                     <td nowrap="nowrap" ><strong>{s $telefone_3_label s}{s $telefone_3_required s} </strong></td>
                     <td width="250">{s $telefone_3_html s}{s $telefone_3_error s}<span class="error">{s $formErrorMessages.telefone_3 s}</span></td>
                     <td>&nbsp;</td>
                     <td>&nbsp;</td>
                   </tr>
                   <tr >
                     <td nowrap="nowrap" ><strong>{s $obs_label s}{s $obs_required s} </strong></td>
                     <td colspan="3">{s $obs_html s}{s $obs_error s}<span class="error">{s $formErrorMessages.obs s}</span></td>
                   </tr>
                 </table>
               </fieldset>
            </td>
         </tr>
      </table>
   <blockquote><p>{s $requiredNote s}</p></blockquote>
   </form>
   </div>

{s /if s}
<!-- ###########    FORMULARIO FIM  ################ -->



