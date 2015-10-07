<!-- ###########    FORMULARIO COMECO  ################ -->
{s if !$lists  s}
<script language="javascript">

 $(document).ready(function() {
   $("#trocaArquivo").click(function() {
      var arq = document.getElementById('arquivo') ;
      if( arq.disabled == 1){
         alert('Se a caixa de Arquivo estiver vazia o arquivo sera apagado.');
         arq.disabled = false ;
      }
      else{
         arq.disabled = true ;
      }
   });
 });

</script>


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
               <fieldset class="interno"><legend>Peca</legend>
                  <table class="geral">
                     <tr nowrap ><td nowrap >{s $descricao_label s}{s $descricao_required s} </td><td>{s $desc_html s}{s $descricao_error s}<span class="error">{s $formErrorMessages.descricao s}</span></td></tr>
                     <tr nowrap ><td nowrap >{s $andamento_id_label s}{s $andamento_id_required s} </td><td>{s $andamento_id_html s}{s $andamento_id_error s}<span class="error">{s $formErrorMessages.andamento_id s}</span></td></tr>
                     <tr nowrap ><td colspan="2" > <label for="trocaArquivo" > Trocar Arquivo </label><input type="checkbox" id="trocaArquivo" ></td></tr>
                     <tr nowrap ><td nowrap >{s $arquivo_label s}{s $arquivo_required s} </td><td>{s $arquivo_html s}{s $arquivo_error s}<span class="error">{s $formErrorMessages.arquivo s}</span></td></tr>
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