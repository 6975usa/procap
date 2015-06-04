<!-- ###########    FORMULARIO COMECO  ################ -->

{s if !$lists  s}

   <script language="javascript" type="text/javascript" src="{s $static_url s}/framework/js/autoNumeric-1.6.2.js"></script>
   <script language="javascript" type="text/javascript" src="{s $static_url s}/framework/js/autoLoader.js"></script>
   
   
<script language="javascript">
    $(document).ready(function() {
    
        jQuery(function($) {
        	$('#valor').autoNumeric({
        		mNum: 10, 
        		mDec: 2 , 
                aSep: '.', 
                aDec: ',', 
        	});
        });
      
    });
</script>

<div id="custas_form" class="list">
   {s $jqueryInputMaskScript s}
   {s $jsValidationScript s}
   <div align="center" id="form" class="listDiv">
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
               <fieldset class="interno"><legend>Custas</legend>
                  <table class="geral">
                     <tr nowrap ><td nowrap >{s $processo_id_label s}{s $processo_id_required s} </td><td>{s $processo_id_html s}{s $processo_id_error s}<span class="error">{s $formErrorMessages.processo_id s}</span></td></tr>
                     <tr nowrap ><td nowrap >{s $descricao_label s}{s $descricao_required s} </td><td>{s $descricao_html s}{s $descricao_error s}<span class="error">{s $formErrorMessages.descricao s}</span></td></tr>
                     <tr nowrap ><td nowrap >{s $data_label s}{s $data_required s} </td><td>{s $data_html s}{s $data_error s}<span class="error">{s $formErrorMessages.data s}</span></td></tr>
                     <tr nowrap ><td nowrap >{s $tipo_label s}{s $tipo_required s} </td><td>{s $tipo_html s}{s $tipo_error s}<span class="error">{s $formErrorMessages.tipo s}</span></td></tr>
                     <tr nowrap ><td nowrap >{s $valor_label s}{s $valor_required s} </td><td>{s $valor_html s}{s $valor_error s}<span class="error">{s $formErrorMessages.valor s}</span></td></tr>
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