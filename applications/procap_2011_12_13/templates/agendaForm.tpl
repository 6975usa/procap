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

      <table class="geral" >
         <tr>
            <td>
               <fieldset class="interno"><legend>Agenda - Compromisso</legend>
                  <table class="geral">
                     <tr nowrap ><td nowrap >{s $processo_id_label s}{s $processo_id_required s} </td><td>{s $processo_id_html s}{s $processo_id_error s}<span class="error">{s $formErrorMessages.processo_id s}</span></td></tr>
                     <tr nowrap ><td nowrap >{s $tipo_id_label s}{s $tipo_id_required s} </td><td>{s $tipo_id_html s}{s $tipo_id_error s}<span class="error">{s $formErrorMessages.tipo_id s}</span></td></tr>
                     <tr nowrap ><td nowrap >{s $fase_id_label s}{s $fase_id_required s} </td><td>{s $fase_id_html s}{s $fase_id_error s}<span class="error">{s $formErrorMessages.fase_id s}</span></td></tr>
                     <tr nowrap ><td nowrap >{s $advogado_id_label s}{s $advogado_id_required s} </td><td>{s $advogado_id_html s}{s $advogado_id_error s}<span class="error">{s $formErrorMessages.advogado_id s}</span></td></tr>
                     <tr nowrap ><td nowrap >{s $inicio_data_label s}{s $inicio_data_required s} </td><td>{s $inicio_data_html s}{s $inicio_data_error s}<span class="error">{s $formErrorMessages.inicio_data s}</span></td></tr>
                     <tr nowrap ><td nowrap >{s $termino_data_label s}{s $termino_data_required s} </td><td>{s $termino_data_html s}{s $termino_data_error s}<span class="error">{s $formErrorMessages.termino_data s}</span></td></tr>
                     <tr nowrap ><td nowrap >{s $conclusao_data_label s}{s $conclusao_data_required s} </td><td>{s $conclusao_data_html s}{s $conclusao_data_error s}<span class="error">{s $formErrorMessages.conclusao_data s}</span></td></tr>
                     <tr nowrap ><td nowrap >{s $agenda_label s}{s $agenda_required s} </td><td>{s $agenda_html s}{s $agenda_error s}<span class="error">{s $formErrorMessages.agenda s}</span></td></tr>
                     <tr nowrap ><td nowrap >{s $descricao_label s}{s $descricao_required s} </td><td>{s $descricao_html s}{s $descricao_error s}<span class="error">{s $formErrorMessages.descricao s}</span></td></tr>
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