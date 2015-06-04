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
               <fieldset class="interno"><legend>Aplicação</legend>
                  <table class="geral">
                  	<tr><td nowrap >{s $name_label s}{s $name_required s} </td><td>{s $name_html s}{s $name_error s}<span class="error">{s $formErrorMessages.name s}</span></td></tr>
                  	<tr><td nowrap >{s $description_label s}{s $description_required s} </td><td>{s $description_html s}{s $description_error s}<span class="error">{s $formErrorMessages.description s}</span></td></tr>
                  </table>
               </fieldset>
            </td>
            <td>
               <fieldset class="interno"><legend>Grupos</legend>
                  <table class="geral">
                  {s foreach from=$appGroups key=id item=name  s}
                  	<tr>
                  	  <td >{s $name s}</td>
               	     </tr>
               	{s /foreach s}
                  	  <td ><a href="{s $site_url s}/admin/groups/">Novo Grupo</a></td>
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