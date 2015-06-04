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

      <table class="geral" ><tr><td>
      <fieldset class="interno"><legend>Escritórios</legend>
         <table class="geral">
         	<tr nowrap ><td nowrap >{s $fullname_label s}{s $fullname_required s} </td><td>{s $fullname_html s}{s $fullname_error s}<span class="error">{s $formErrorMessages.fullname s}</span></td></tr>
         	<tr nowrap ><td nowrap >{s $name_label s}{s $name_required s} </td><td>{s $name_html s}{s $name_error s}<span class="error">{s $formErrorMessages.name s}</span></td></tr>
         	<tr nowrap ><td nowrap >{s $description_label s}{s $description_required s} </td><td>{s $description_html s}{s $description_error s}<span class="error">{s $formErrorMessages.description s}</span></td></tr>
         	<tr nowrap ><td nowrap >{s $active_label s}{s $active_required s} </td><td>{s $active_html s}{s $active_error s}<span class="error">{s $formErrorMessages.active s}</span></td></tr>
         </table>
      </fieldset>
            </td>
            <td>
               <fieldset class="interno"><legend>Sistemas que acessa</legend>
                  <table class="geral">
                  {s foreach from=$apps item=app  s}
                  	<tr>
                  	  <td nowrap ><label for="{s $app.id s}">{s $app.name s}</label></td>
                  	  <td nowrap ><input id="{s $app.id s}" name="apps[{s $app.id s}]" {s if $app.user_in s} value="1" checked="checked" {s /if s} type="checkbox"></td>
               	     </tr>
               	{s /foreach s}
                  </table>
               </fieldset>
            </td>
         </tr>
      </table>
      <br><br>




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
         {s $MM_update_html s}
         <br><br>
      </td>
   </tr>
</table>

   </form>
   </div>

</div>
<!-- ###########    FORMULARIO FIM  ################ -->