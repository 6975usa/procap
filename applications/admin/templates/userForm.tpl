<!-- ###########    FORMULARIO COMECO  ################ -->
{s if !$lists  s}

<div class="form">
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

      <table class="geral">
         <tr>
            <td>
               <fieldset class="interno"><legend>Usuário</legend>
                  <table class="geral">
                  	<tr nowrap ><td nowrap >{s $fullname_label s}{s $fullname_required s} </td><td>{s $fullname_html s}{s $fullname_error s}<span class="error">{s $formErrorMessages.fullname s}</span></td></tr>
                  	<tr nowrap ><td nowrap >{s $loginname_label s}{s $loginname_required s} </td><td>{s $loginname_html s}{s $loginname_error s}<span class="error">{s $formErrorMessages.loginname s}</span></td></tr>
                  	<tr nowrap ><td nowrap >{s $office_id_label  s}{s $office_id_required s} </td><td>{s $office_id_html s}{s $office_id_error s}<span class="error">{s $formErrorMessages.office_id s}</span></td></tr>
                  	<tr nowrap ><td nowrap >{s $active_label s}{s $active_required s} </td><td>{s $active_html s}{s $active_error s}<span class="error">{s $formErrorMessages.active s}</span></td></tr>
                  	<tr nowrap ><td nowrap >{s $description_label s}{s $description_required s} </td><td>{s $description_html s}{s $description_error s}<span class="error">{s $formErrorMessages.description s}</span></td></tr>
                  	<tr nowrap ><td nowrap >{s $email_label s}{s $email_required s} </td><td>{s $email_html s}{s $email_error s}<span class="error">{s $formErrorMessages.email s}</span></td></tr>
                  	<tr nowrap ><td nowrap >{s $password_first_label s}{s $password_first_required s} </td><td>{s $password_first_html s}{s $password_first_error s}<span class="error">{s $formErrorMessages.password_first s}</span></td></tr>
                  	<tr nowrap ><td nowrap >{s $password_confirm_label s}{s $password_confirm_required s} </td><td>{s $password_confirm_html s}{s $password_confirm_error s}<span class="error">{s $formErrorMessages.password_confirm s}</span></td></tr>
                  </table>
               </fieldset>
            </td>
            {s if $groups  s}
            <td>
               <fieldset class="interno"><legend>Grupos a que pertence</legend>
                  <table class="geral">
					{s foreach from=$groups key=app item=grps  s}
						<tr>
							<th colspan="2">{s $app s}</label></th>
						</tr>
						{s foreach from=$grps  item=group  s}
						<tr>
							<td  ><label for="{s $group.id s}">{s $group.name s}</label></td>
							<td  ><input id="{s $group.id s}" name="groups[{s $group.id s}]" {s if $group.user_in s} value="1" checked="checked" {s /if s} type="checkbox"></td>
						</tr>
						{s /foreach s}
					{s /foreach s}
                  </table>
               </fieldset>
            </td>
            {s /if s}
         </tr>
      </table>
   <blockquote><p>{s $requiredNote s}</p></blockquote>
   </form>
   </div>

</div>
{s /if s}
<!-- ###########    FORMULARIO FIM  ################ -->