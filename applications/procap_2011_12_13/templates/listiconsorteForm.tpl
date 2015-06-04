<!-- ###########    FORMULARIO COMECO  ################ -->
{s if !$lists  s}
<div class="form">
   {s $jqueryInputMaskScript s}
   {s $jsValidationScript s}
   <div align="center" id="form" >
      {s $jsScript s}
      <form {s $formOptions s} >
      {s $id_html s}
      {s $processo_id_html s}



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
               <fieldset class="interno"><legend>Listiconsorte</legend>
                  <table class="geral">
                     <tr nowrap ><td nowrap >{s $pessoa_id_label s}{s $pessoa_id_required s} </td><td>{s $pessoa_id_html s}{s $pessoa_id_error s}<span class="error">{s $formErrorMessages.pessoa_id s}</span></td></tr>
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