<!-- ###########    FORMULARIO COMECO  ################ -->
{s if !$lists  s}
<div class="form">
   {s $jqueryInputMaskScript s}
   {s $jsValidationScript s}
   <div align="center" id="form" >
      {s $jsScript s}
      <form {s $formOptions s} >
      {s $id_html s}



   <div  id="button_menu">{s $MM_list_html s}&nbsp;&nbsp;&nbsp;{s $MM_insert_html s}{s $MM_update_html s}</div>


   {s foreach from=$messages.success item=message  s}
      <div id="showMessage" class="successMessage">{s $message s}</div>
   {s /foreach s}
   {s foreach from=$messages.error item=message  s}
      <div id="showMessage" class="errorMessage">{s $message s}</div>
   {s /foreach s}

      <table class="geral" ><tr><td>
      <fieldset class="interno"><legend>Grupo</legend>
         <table class="geral">
         	<tr nowrap ><td nowrap >{s $name_label s}{s $name_required s} </td><td>{s $name_html s}{s $name_error s}<span class="error">{s $formErrorMessages.name s}</span></td></tr>
         	<tr nowrap ><td nowrap >{s $description_label s}{s $description_required s} </td><td>{s $description_html s}{s $description_error s}<span class="error">{s $formErrorMessages.description s}</span></td></tr>
         	<tr nowrap ><td nowrap >{s $active_label s}{s $active_required s} </td><td>{s $active_html s}{s $active_error s}<span class="error">{s $formErrorMessages.active s}</span></td></tr>
         	<tr nowrap ><td nowrap >{s $office_id_label s}{s $office_id_required s} </td><td>{s $office_id_html s}{s $office_id_error s}<span class="error">{s $formErrorMessages.office_id s}</span></td></tr>
         	<tr nowrap ><td nowrap >{s $application_id_label s}{s $application_id_required s} </td><td>{s $application_id_html s}{s $application_id_error s}<span class="error">{s $formErrorMessages.application_id s}</span></td></tr>
         </table>
      </fieldset>
            </td>
            <td>
            	{s if $actions  s}
               <fieldset class="interno"><legend>Direitos</legend>
                  <table class="geral" >
                  {s foreach from=$actions key=app item=acts  s}
                     <tr>
                        <th colspan="2">{s $app s}</label></th>
                     </tr>
                     {s foreach from=$acts  item=action  s}
                        <tr>
                           <td  ><label for="{s $action.id s}">{s $action.name s}</label></td>
                           <td  ><input id="{s $action.id s}" name="actions[{s $action.id s}]" {s if $action.user_in s} value="1" checked="checked" {s /if s} type="checkbox"></td>
                        </tr>
               	     {s /foreach s}
               	{s /foreach s}
                  </table>
               </fieldset>
               {s /if s}
            </td>
         </tr>
      </table>
   <blockquote><p>{s $requiredNote s}</p></blockquote>
   </form>
   </div>

</div>
{s /if s}
<!-- ###########    FORMULARIO FIM  ################ -->