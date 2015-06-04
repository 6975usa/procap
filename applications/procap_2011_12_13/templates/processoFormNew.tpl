<!-- ###########    FORMULARIO COMECO  ################ -->
{s if !$lists  s}
<div class="form">
   {s $jqueryInputMaskScript s}
   {s $jsValidationScript s}
   <div align="center" id="form" >
      {s $jsScript s}
      <form {s $formOptions s} >
      {s $id_html s}
      {s $office_id_html s}






   {s foreach from=$messages.success item=message  s}
      <div id="showMessage" class="successMessage">{s $message s}</div>
   {s /foreach s}
   {s foreach from=$messages.error item=message  s}
      <div id="showMessage" class="errorMessage">{s $message s}</div>
   {s /foreach s}




      <link rel="stylesheet" href="{s $static_url s}/procap/css/menu.css" type="text/css" media="screen" />
      <script language="JavaScript" src="{s $static_url s}/procap/js/tabcontent.js"></script>

      <div  id="button_menu">{s $MM_list_html s}&nbsp;&nbsp;&nbsp;{s $MM_insert_html s}</div>

      <h3>Processo</h3>

      <!--GERAL INICIO -->
<table class="geral" width="100%" >
         <tr>
            <td>



               {s foreach from=$messages.success item=message  s}
                  <div id="showMessage" class="successMessage">{s $message s}</div>
               {s /foreach s}
               {s foreach from=$messages.error item=message  s}
                  <div id="showMessage" class="errorMessage">{s $message s}</div>
               {s /foreach s}

               <table class="geral" width="100%"><tr><td>
               <fieldset class="interno">
                  <table class="geral"width="100%">
                     <tr >
                        <td align="right" nowrap="nowrap" width="1">{s $numero_label s}{s $numero_required s}</td><td> <strong>{s $numero_html s}</strong>{s $numero_error s}<span class="error">{s $formErrorMessages.numero s}</span></td>
                        <td align="right" nowrap="nowrap" width="1">{s $pasta_label s}{s $pasta_required s}</td><td> {s $pasta_html s}{s $pasta_error s}<span class="error">{s $formErrorMessages.pasta s}</span></td>
                     </tr>
                     <tr  >
                        <td align="right" nowrap="nowrap" width="1">{s $processopai_label s}{s $processopai_required s}</td><td>{s $processopai_html s}{s $processopai_error s}<span class="error">{s $formErrorMessages.processopai s}</span></td>
                        <td align="right" nowrap="nowrap" width="1">{s $distribuicao_data_label s}{s $distribuicao_data_required s}</td><td> {s $distribuicao_data_html s}{s $distribuicao_data_error s}<span class="error">{s $formErrorMessages.distribuicao_data s}</span></td>
                     </tr>
                  </table>
               </fieldset>
               </td></tr></table>

               <fieldset class="interno"><legend>Partes</legend>
                  <table class="geral" >
                     <tr nowrap >
                        <td align="right" nowrap >Clientes</td>
                        <td align="right" nowrap ><!--{s $cliente1_id_label s}-->{s $cliente1_id_required s} {s $cliente1_id_html s}{s $cliente1_id_error s}<span class="error">{s $formErrorMessages.cliente1_id s}</span>
                        <br>e <!--{s $cliente2_id_label s}-->{s $cliente2_id_required s}{s $cliente2_id_html s}{s $cliente2_id_error s}<span class="error">{s $formErrorMessages.cliente2_id s}</span></td>
                        <td align="right" nowrap >{s $condicao_label s}{s $condicao_required s} {s $condicao_html s}{s $condicao_error s}<span class="error">{s $formErrorMessages.condicao s}</span> </td>
                     </tr>
                     <tr nowrap >
                        <td align="right" nowrap >Partes contrárias</td>
                        <td align="right" nowrap colspan="2" ><!--{s $contraparte1_id_label s}-->{s $contraparte1_id_required s} {s $contraparte1_id_html s}{s $contraparte1_id_error s}<span class="error">{s $formErrorMessages.contraparte1_id s}</span>
                        <br>e <!--{s $contraparte2_id_label s}-->{s $contraparte2_id_required s}{s $contraparte2_id_html s}{s $contraparte2_id_error s}<span class="error">{s $formErrorMessages.contraparte2_id s}</span></td>
                     </tr>
                  </table>
               </fieldset><br />

              <fieldset class="interno">
              <table width="100%"><tr>
              	<td>

                 <table class="geral">
                    <tr nowrap ><td nowrap >{s $status_id_label s}{s $status_id_required s} </td>
                      <td>{s $status_id_html s}{s $status_id_error s}<span class="error">{s $formErrorMessages.status_id s}</span></td>
                    </tr>
                    <tr nowrap ><td nowrap >{s $fase_id_label s}{s $fase_id_required s} </td>
                      <td>{s $fase_id_html s}{s $fase_id_error s}<span class="error">{s $formErrorMessages.fase_id s}</span></td>
                    </tr>
                    <tr nowrap ><td nowrap >{s $acao_id_label s}{s $acao_id_required s} </td>
                      <td>{s $acao_id_html s}{s $acao_id_error s}<span class="error">{s $formErrorMessages.acao_id s}</span></td>
                    </tr>
                    <tr nowrap >
                      <td>{s $tribunal_id_label s}{s $tribunal_id_required s} </td>
                     <td>{s $tribunal_id_html s}{s $tribunal_id_error s}<span class="error">{s $formErrorMessages.tribunal_id s}</span></td>
                    </tr>
                    <tr nowrap ><td nowrap >{s $vara_id_label s}{s $vara_id_required s} </td>
                      <td>{s $vara_id_html s}{s $vara_id_error s}<span class="error">{s $formErrorMessages.vara_id s}</span></td>
                    </tr>
                 </table></td>
                <td align="right">

                 <table class="geral">
                    <tr nowrap >
                      <td>{s $comarca_id_label s}{s $comarca_id_required s} </td>
                     <td>{s $comarca_id_html s}{s $comarca_id_error s}<span class="error">{s $formErrorMessages.comarca_id s}</span></td>
                    </tr>
                    <tr nowrap >
                      <td>{s $justica_id_label s}{s $justica_id_required s} </td>
                     <td>{s $justica_id_html s}{s $justica_id_error s}<span class="error">{s $formErrorMessages.justica_id s}</span></td>
                    </tr>
                    <tr nowrap >
                      <td>{s $rito_id_label s}{s $rito_id_required s} </td>
                     <td>{s $rito_id_html s}{s $rito_id_error s}<span class="error">{s $formErrorMessages.rito_id s}</span></td>
                    </tr>
                    <tr nowrap >
                      <td>{s $objeto_id_label s}{s $objeto_id_required s} </td>
                     <td>{s $objeto_id_html s}{s $objeto_id_error s}<span class="error">{s $formErrorMessages.objeto_id s}</span></td>
                    </tr>
                    <tr nowrap >
                      <td>{s $turma_id_label s}{s $turma_id_required s} </td>
                     <td>{s $turma_id_html s}{s $turma_id_error s}<span class="error">{s $formErrorMessages.turma_id s}</span></td>
                    </tr>
                 </table></td>
              </tr></table>
               </fieldset><br />

               <fieldset class="interno"><legend>Valores</legend>
                  <table class="geral">
                     <tr nowrap ><td align="right" nowrap >{s $valorcausa_label s}{s $valorcausa_required s} </td>
                       <td width="200" align="left" nowrap="nowrap">{s $valorcausa_html s}{s $valorcausa_error s}<span class="error">{s $formErrorMessages.valorcausa s}</span></td>
                     </tr>
                     <tr nowrap >
                       <td align="right" nowrap >{s $valorrepercussaoeconomica_label s}{s $valorrepercussaoeconomica_required s}</td>
                       <td align="left" nowrap="nowrap">{s $valorrepercussaoeconomica_html s}{s $valorrepercussaoeconomica_error s}<span class="error">{s $formErrorMessages.valorrepercussaoeconomica s}</span></td>
                     </tr>
                  </table>
               </fieldset>
            </td>
         </tr>
      </table>
      <!--GERAL FIM -->


      <script type="text/javascript">

      var mypets=new ddtabcontent("voluntarioTabs")
      mypets.setpersist(true)
      mypets.setselectedClassTarget("link")
      mypets.init()

      </script>




   <blockquote><p>{s $requiredNote s}</p></blockquote>
   </form>
   </div>

</div>
{s /if s}
<!-- ###########    FORMULARIO FIM  ################ -->