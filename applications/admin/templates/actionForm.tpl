<!-- ###########    FORMULARIO COMECO  ################ -->

<div class="form">
   {s $jsValidationScript s}
   <div align="center" id="form" >
      {s $jsScript s}
      <form {s $formOptions s} >
      {s $id_html s}


      <center>
         {s foreach from=$messages.success item=message  s}
            <div id="showMessage" class="successMessage">{s $message s}</div>
         {s /foreach s}
         {s foreach from=$messages.error item=message  s}
            <div id="showMessage" class="errorMessage">{s $message s}</div>
         {s /foreach s}
      </center>
      <table class="geral">
         <tr>
            <td>
               <fieldset class="interno"><legend>Action</legend>
                  <table class="geral">
                  	<tr nowrap ><td nowrap >{s $name_label s}{s $name_required s} </td><td>{s $name_html s}{s $name_error s}<span class="error">{s $formErrorMessages.name s}</span></td></tr>
                  	<tr nowrap ><td nowrap >{s $application_id_label s}{s $application_id_required s} </td><td>{s $application_id_html s}{s $application_id_error s}<span class="error">{s $formErrorMessages.application_id s}</span></td></tr>
                  	<tr nowrap ><td nowrap >{s $inmenu_label s}{s $inmenu_required s} </td><td>{s $inmenu_html s}{s $inmenu_error s}<span class="error">{s $formErrorMessages.inmenu s}</span></td></tr>
                  	<tr nowrap ><td nowrap >{s $menuname_label s}{s $menuname_required s} </td><td>{s $menuname_html s}{s $menuname_error s}<span class="error">{s $formErrorMessages.menuname s}</span></td></tr>
                  	<tr nowrap ><td nowrap >{s $menulevel1_label s}{s $menulevel1_required s} </td><td>{s $menulevel1_html s}{s $menulevel1_error s}<span class="error">{s $formErrorMessages.menulevel1 s}</span></td></tr>
                  	<tr nowrap ><td nowrap >{s $menulevel2_label s}{s $menulevel2_required s} </td><td>{s $menulevel2_html s}{s $menulevel2_error s}<span class="error">{s $formErrorMessages.menulevel2 s}</span></td></tr>
                  	<tr nowrap ><td nowrap >{s $accesslevel_label s}{s $accesslevel_required s} </td><td>{s $accesslevel_html s}{s $accesslevel_error s}<span class="error">{s $formErrorMessages.accesslevel s}</span></td></tr>
                  	<tr nowrap ><td nowrap >{s $description_label s}{s $description_required s} </td><td>{s $description_html s}{s $description_error s}<span class="error">{s $formErrorMessages.description s}</span></td></tr>
                  </table>
               </fieldset>
            </td>
         </tr>
      </table>




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