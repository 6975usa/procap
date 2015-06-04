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
            <center><h3> Pessoa </h3></center>
               <fieldset class="interno" id="pessoajuridica_fs"  ><legend>Pessoa Jurídica</legend>
                 <table class="geral" >
                   <tr >
                     <td nowrap="nowrap" ><strong>{s $nome_fantasia_label s}* </strong></td>
                     <td width="250">{s $nome_fantasia_html s}{s $nome_fantasia_error s}<span class="error">{s $formErrorMessages.nome_fantasia s}</span></td>
                     <td><strong>{s $inscricao_estadual_label s}{s $inscricao_estadual_required s} </strong></td>
                     <td>{s $inscricao_estadual_html s}{s $inscricao_estadual_error s}<span class="error">{s $formErrorMessages.inscricao_estadual s}</span></td>
                   </tr>
                   <tr >
                     <td nowrap="nowrap" ><strong>{s $inscricao_municipal_label s}{s $inscricao_municipal_required s} </strong></td>
                     <td width="250">{s $inscricao_municipal_html s}{s $inscricao_municipal_error s}<span class="error">{s $formErrorMessages.inscricao_municipal s}</span></td>
                     <td><strong>{s $cnpj_label s}{s $cnpj_required s} </strong></td>
                     <td>{s $cnpj_html s}{s $cnpj_error s}<span class="error">{s $formErrorMessages.cnpj s}</span></td>
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

</div>
{s /if s}
<!-- ###########    FORMULARIO FIM  ################ -->



