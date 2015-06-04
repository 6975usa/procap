<!-- ###########    FORMULARIO COMECO  ################ -->
{s if !$lists  s}
<div class="form">
   {s $jqueryInputMaskScript s}
   {s $jsValidationScript s}
   <div align="center" id="form" >
      {s $jsScript s}
      <form {s $formOptions s} >
      {s $id_html s}



   <div  id="button_menu">{s $MM_list_html s}&nbsp;&nbsp;&nbsp;{s $MM_insert_html s}{s $MM_update_html s}&nbsp;&nbsp;&nbsp;{s $MM_delete_html s}&nbsp;&nbsp;&nbsp;{s $MM_new_html s}</div>


   {s foreach from=$messages.success item=message  s}
      <div id="showMessage" class="successMessage">{s $message s}</div>
   {s /foreach s}
   {s foreach from=$messages.error item=message  s}
      <div id="showMessage" class="errorMessage">{s $message s}</div>
   {s /foreach s}

      <table class="geral" ><tr><td>
      <fieldset class="interno"><legend>Geral</legend>
         <table class="geral">
         	<tr nowrap ><td nowrap >{s $nome_label s}{s $nome_required s} </td><td>{s $nome_html s}{s $nome_error s}<span class="error">{s $formErrorMessages.nome s}</span></td></tr>
         	<tr nowrap ><td nowrap >{s $nomeabreviado_label s}{s $nomeabreviado_required s} </td><td>{s $nomeabreviado_html s}{s $nomeabreviado_error s}<span class="error">{s $formErrorMessages.nomeabreviado s}</span></td></tr>
         	</table>
      </fieldset>
      <fieldset class="interno"><legend>Endereço</legend>
         <table class="geral">
         	<tr nowrap ><td nowrap >{s $endereco_label s}{s $endereco_required s} </td><td>{s $endereco_html s}{s $endereco_error s}<span class="error">{s $formErrorMessages.endereco s}</span></td></tr>
         	<tr nowrap ><td nowrap >{s $complemento_label s}{s $complemento_required s} </td><td>{s $complemento_html s}{s $complemento_error s}<span class="error">{s $formErrorMessages.complemento s}</span></td></tr>
         	<tr nowrap ><td nowrap >{s $estado_label s}{s $estado_required s} </td><td>{s $estado_html s}{s $estado_error s}<span class="error">{s $formErrorMessages.estado s}</span></td></tr>
         	<tr nowrap ><td nowrap >{s $cidade_label s}{s $cidade_required s} </td><td>{s $cidade_html s}{s $cidade_error s}<span class="error">{s $formErrorMessages.cidade s}</span></td></tr>
         	<tr nowrap ><td nowrap >{s $bairro_label s}{s $bairro_required s} </td><td>{s $bairro_html s}{s $bairro_error s}<span class="error">{s $formErrorMessages.bairro s}</span></td></tr>
         	<tr nowrap ><td nowrap >{s $cep_label s}{s $cep_required s} </td><td>{s $cep_html s}{s $cep_error s}<span class="error">{s $formErrorMessages.cep s}</span></td></tr>
         	<tr nowrap ><td nowrap >{s $telefone1_label s}{s $telefone1_required s} </td><td>{s $telefone1_html s}{s $telefone1_error s}<span class="error">{s $formErrorMessages.telefone1 s}</span></td></tr>
         	<tr nowrap ><td nowrap >{s $telefone2_label s}{s $telefone2_required s} </td><td>{s $telefone2_html s}{s $telefone2_error s}<span class="error">{s $formErrorMessages.telefone2 s}</span></td></tr>
         	<tr nowrap ><td nowrap >{s $obs_label s}{s $obs_required s} </td><td>{s $obs_html s}{s $obs_error s}<span class="error">{s $formErrorMessages.obs s}</span></td></tr>
         </table>
      </fieldset>
            </td>


            <td>
               <fieldset class="interno"><legend>Varas/Turmas</legend>
                  <table class="geral" >
            	{s if $turmas  s}
                  {s foreach from=$turmas  item=turma  s}
                        <tr>
                           <td  ></td>
                           <td  ><input id="{s $turma.descricao s}" name="turmas[{s $turma.descricao s}]" type="text" value="{s $turma.descricao s}"></td>
                        </tr>
               	{s /foreach s}
               {s /if s}
                        <tr>
                           <td  ><label for="turmas[new]">Nova: </label></td>
                           <td  ><input id="turmas[new]" name="turmas[new]"  type="text"></td>
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