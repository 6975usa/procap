<!-- ###########    FORMULARIO COMECO  ################ -->

<div class="form">
   {s $jsValidationScript s}
   <div align="center" id="form" >
      {s $jsScript s}
      <form {s $formOptions s} >
      {s $codigo_html s}


      <center>
         {s foreach from=$messages.success item=message  s}
            <div id="showMessage" class="successMessage">{s $message s}</div>
         {s /foreach s}
         {s foreach from=$messages.error item=message  s}
            <div id="showMessage" class="errorMessage">{s $message s}</div>
         {s /foreach s}
      </center>

         <fieldset class="interno"><legend>Escritorio</legend>
            <table class="geral">
            	<tr nowrap ><td nowrap >{s $fullname_label s}{s $fullname_required s} </td><td>{s $fullname_html s}{s $fullname_error s}<span class="error">{s $formErrorMessages.fullname s}</span></td></tr>
            	<tr><td nowrap >{s $name_label s}{s $name_required s} </td><td>{s $name_html s}{s $name_error s}<span class="error">{s $formErrorMessages.name s}</span></td></tr>
            	<tr><td nowrap >{s $active_label s}{s $active_required s} </td><td>{s $active_html s}{s $active_error s}<span class="error">{s $formErrorMessages.active s}</span></td></tr>
            	<tr><td nowrap >{s $logo_label s}{s $logo_required s} </td><td>{s $logo_html s} {s $logo_error s}<span class="error">{s $formErrorMessages.logo s}</span></td></tr>
            	<tr><td nowrap >{s $description_label s}{s $description_required s} </td><td>{s $description_html s}{s $description_error s}<span class="error">{s $formErrorMessages.description s}</span></td></tr>
            </table>
      </fieldset><br><br>


      <fieldset class="interno"><legend>Administrador</legend>
            <table>
            	<tr><td nowrap >{s $user_fullname_label s}{s $user_fullname_required s} </td><td>{s $user_fullname_html s}{s $user_fullname_error s}<span class="error">{s $formErrorMessages.user_fullname s}</span></td></tr>
            	<tr><td nowrap >{s $user_loginname_label s}{s $user_loginname_required s} </td><td>{s $user_loginname_html s}{s $user_loginname_error s}<span class="error">{s $formErrorMessages.user_loginname s}</span></td></tr>
            	<tr><td nowrap >{s $user_password_label s}{s $user_password_required s} </td><td>{s $user_password_html s}{s $user_password_error s}<span class="error">{s $formErrorMessages.user_password s}</span></td></tr>
            	<tr><td nowrap >{s $user_confirmpassword_label s}{s $user_confirmpassword_required s} </td><td>{s $user_confirmpassword_html s}{s $user_confirmpassword_error s}<span class="error">{s $formErrorMessages.user_confirmpassword s}</span></td></tr>
            	<tr><td nowrap >{s $user_email_label s}{s $user_email_required s} </td><td>{s $user_email_html s}{s $user_email_error s}<span class="error">{s $formErrorMessages.user_email s}</span></td></tr>
            	<tr><td nowrap >{s $user_image_label s}{s $user_image_required s} </td><td>{s $user_image_html s}{s $user_image_error s}<span class="error">{s $formErrorMessages.user_image s}</span></td></tr>
            	<tr><td nowrap >{s $user_desc_label s}{s $user_desc_required s} </td><td>{s $user_desc_html s}{s $user_desc_error s}<span class="error">{s $formErrorMessages.user_desc s}</span></td></tr>
            	<tr><td colspan="2"></td></tr>
            </table>
         </fieldset>


   {s foreach from=$messages.success item=message  s}
      <div id="showMessage" class="successMessage">{s $message s}</div>
   {s /foreach s}
   {s foreach from=$messages.error item=message  s}
      <div id="showMessage" class="errorMessage">{s $message s}</div>
   {s /foreach s}



                                                  <blockquote><p>{s $requiredNote s}</p></blockquote>



<table >
   <tr>
      <td valign="top" align="left" colspan="6">
         {s $MM_insert_html s}{s $MM_update_html s}&nbsp;&nbsp;&nbsp;{s $MM_delete_html s}&nbsp;&nbsp;&nbsp;{s $MM_new_html s}
         <br><br>
      </td>
   </tr>
</table>

   </form>
   </div>

</div>
<!-- ###########    FORMULARIO FIM  ################ -->