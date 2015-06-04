<?php /* Smarty version 2.6.19, created on 2011-12-13 15:25:04
         compiled from /var/www/procap/LiteFrame_1.2/config/custom/../../../../procap/applications/procap/templates/processoForm.tpl */ ?>
<!-- ###########    FORMULARIO COMECO  ################ -->
<?php if (! $this->_tpl_vars['lists']): ?>

<script language="javascript">





$(document).ready(function() {

   $("#distribuido").click(function() {
      if ($("#distribuido")[0].checked == false){
         $("#distribuicao_data").val('') ;
         document.getElementsByName("tipotribunal")[0].checked = false ;
         document.getElementsByName("tipotribunal")[1].checked = false ;
      }
   });

    jQuery(function($) {
    	$('#valorcausa').autoNumeric({
    		mNum: 10,
    		mDec: 2 ,
            aSep: '.',
            aDec: ',',
    	});
    	$('#valorrepercussaoeconomica').autoNumeric({
    		mNum: 10,
    		mDec: 2 ,
            aSep: '.',
            aDec: ',',
    	});
    });

});


</script>

<div class="form">
   <?php echo $this->_tpl_vars['jqueryInputMaskScript']; ?>

   <?php echo $this->_tpl_vars['jsValidationScript']; ?>

   <div align="center" id="form" >
      <?php echo $this->_tpl_vars['jsScript']; ?>

      <form <?php echo $this->_tpl_vars['formOptions']; ?>
 >
      <?php echo $this->_tpl_vars['id_html']; ?>

      <?php echo $this->_tpl_vars['office_id_html']; ?>




               <div  id="button_menu"><?php echo $this->_tpl_vars['MM_list_html']; ?>
</div>


      <link rel="stylesheet" href="<?php echo $this->_tpl_vars['static_url']; ?>
/procap/<?php echo $this->_tpl_vars['defaultTheme']; ?>
/css/menu.css" type="text/css" media="screen" />
      <script language="JavaScript" src="<?php echo $this->_tpl_vars['static_url']; ?>
/procap/<?php echo $this->_tpl_vars['defaultTheme']; ?>
/js/tabcontent.js"></script>

      <h3>Processo <?php echo $this->_tpl_vars['processoNumero']; ?>
</h3>


      <div id="voluntarioTabs" class="menu_tabelas" >
          <ul>
              <li class="menu_triplo"><a href="#" rel="tab1">Geral</a></li>

               <?php if ($this->_tpl_vars['permiteCustas']): ?>
              <li class="menu_triplo"><a href="#" rel="tab2">Custas</a></li>
               <?php endif; ?>


               <?php if ($this->_tpl_vars['permiteListiconsortes']): ?>
              <li class="menu_triplo"><a  id="li_lc" href="#" rel="tab3">Listiconsorte</a></li>
               <?php endif; ?>

               <?php if ($this->_tpl_vars['permiteAdvogados']): ?>
              <li class="menu_triplo"><a href="#" rel="tab4">Advogados</a></li>
               <?php endif; ?>

               <?php if ($this->_tpl_vars['permiteAndamentos']): ?>
              <li class="menu_triplo"><a href="#" rel="tab5">Andamentos</a></li>
               <?php endif; ?>

               <?php if ($this->_tpl_vars['permitePecas']): ?>
              <li class="menu_triplo"><a href="#" rel="tab6">Peças</a></li>
               <?php endif; ?>
          </ul>
      </div>

      <!--GERAL INICIO -->
      <div id="tab1"   class="vt" >

      <table class="geral" width="100%" >
         <tr>
            <td>
               <div  id="button_menu"><?php echo $this->_tpl_vars['MM_insert_html']; ?>
<?php echo $this->_tpl_vars['MM_update_html']; ?>
</div>


               <?php $_from = $this->_tpl_vars['messages']['success']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['message']):
?>
                  <div id="showMessage" class="successMessage"><?php echo $this->_tpl_vars['message']; ?>
</div>
               <?php endforeach; endif; unset($_from); ?>
               <?php $_from = $this->_tpl_vars['messages']['error']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['message']):
?>
                  <div id="showMessage" class="errorMessage"><?php echo $this->_tpl_vars['message']; ?>
</div>
               <?php endforeach; endif; unset($_from); ?>

               <table class="geral" width="100%"><tr><td>
               <fieldset class="interno">
                  <table class="geral"width="100%">
                     <tr >
                        <td align="right" nowrap="nowrap" width="1"><?php echo $this->_tpl_vars['numero_label']; ?>
<?php echo $this->_tpl_vars['numero_required']; ?>
</td><td> <strong><?php echo $this->_tpl_vars['numero_html']; ?>
</strong><?php echo $this->_tpl_vars['numero_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['numero']; ?>
</span></td>
                        <td align="right" nowrap="nowrap" width="1"><?php echo $this->_tpl_vars['pasta_label']; ?>
<?php echo $this->_tpl_vars['pasta_required']; ?>
</td><td> <?php echo $this->_tpl_vars['pasta_html']; ?>
<?php echo $this->_tpl_vars['pasta_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['pasta']; ?>
</span></td>
                     </tr>
                     <tr  >
                        <td align="right" nowrap="nowrap" width="1"><?php echo $this->_tpl_vars['processopai_label']; ?>
<?php echo $this->_tpl_vars['processopai_required']; ?>
</td><td><?php echo $this->_tpl_vars['processopai_html']; ?>
<?php echo $this->_tpl_vars['processopai_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['processopai']; ?>
</span></td>
                        <td align="right" nowrap="nowrap" width="1"><?php echo $this->_tpl_vars['distribuicao_data_label']; ?>
<?php echo $this->_tpl_vars['distribuicao_data_required']; ?>
</td><td> <?php echo $this->_tpl_vars['distribuicao_data_html']; ?>
<?php echo $this->_tpl_vars['distribuicao_data_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['distribuicao_data']; ?>
</span></td>
                     </tr>
                  </table>
               </fieldset>
               </td></tr></table>

               <fieldset class="interno"><legend>Partes</legend>
                  <table class="geral" >
                     <tr nowrap >
                        <td align="right" nowrap >Clientes</td>
                        <td align="right" nowrap ><!--<?php echo $this->_tpl_vars['cliente1_id_label']; ?>
--><?php echo $this->_tpl_vars['cliente1_id_required']; ?>
 <?php echo $this->_tpl_vars['cliente1_id_html']; ?>
<?php echo $this->_tpl_vars['cliente1_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['cliente1_id']; ?>
</span>
                        <br>e <!--<?php echo $this->_tpl_vars['cliente2_id_label']; ?>
--><?php echo $this->_tpl_vars['cliente2_id_required']; ?>
<?php echo $this->_tpl_vars['cliente2_id_html']; ?>
<?php echo $this->_tpl_vars['cliente2_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['cliente2_id']; ?>
</span></td>
                        <td align="right" nowrap ><?php echo $this->_tpl_vars['condicao_label']; ?>
<?php echo $this->_tpl_vars['condicao_required']; ?>
 <?php echo $this->_tpl_vars['condicao_html']; ?>
<?php echo $this->_tpl_vars['condicao_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['condicao']; ?>
</span> </td>
                     </tr>
                     <tr nowrap >
                        <td align="right" nowrap >Partes contrárias</td>
                        <td align="right" nowrap colspan="2" ><!--<?php echo $this->_tpl_vars['contraparte1_id_label']; ?>
--><?php echo $this->_tpl_vars['contraparte1_id_required']; ?>
 <?php echo $this->_tpl_vars['contraparte1_id_html']; ?>
<?php echo $this->_tpl_vars['contraparte1_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['contraparte1_id']; ?>
</span>
                        <br>e <!--<?php echo $this->_tpl_vars['contraparte2_id_label']; ?>
--><?php echo $this->_tpl_vars['contraparte2_id_required']; ?>
<?php echo $this->_tpl_vars['contraparte2_id_html']; ?>
<?php echo $this->_tpl_vars['contraparte2_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['contraparte2_id']; ?>
</span></td>
                     </tr>
                  </table>
               </fieldset><br />

              <fieldset class="interno">
              <table width="100%"><tr>
              	<td>

                 <table class="geral">
                    <tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['status_id_label']; ?>
<?php echo $this->_tpl_vars['status_id_required']; ?>
 </td>
                      <td><?php echo $this->_tpl_vars['status_id_html']; ?>
<?php echo $this->_tpl_vars['status_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['status_id']; ?>
</span></td>
                    </tr>
                    <tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['fase_id_label']; ?>
<?php echo $this->_tpl_vars['fase_id_required']; ?>
 </td>
                      <td><?php echo $this->_tpl_vars['fase_id_html']; ?>
<?php echo $this->_tpl_vars['fase_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['fase_id']; ?>
</span></td>
                    </tr>
                    <tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['acao_id_label']; ?>
<?php echo $this->_tpl_vars['acao_id_required']; ?>
 </td>
                      <td><?php echo $this->_tpl_vars['acao_id_html']; ?>
<?php echo $this->_tpl_vars['acao_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['acao_id']; ?>
</span></td>
                    </tr>
                    <tr nowrap >
                      <td><?php echo $this->_tpl_vars['tribunal_id_label']; ?>
<?php echo $this->_tpl_vars['tribunal_id_required']; ?>
 </td>
                     <td><?php echo $this->_tpl_vars['tribunal_id_html']; ?>
<?php echo $this->_tpl_vars['tribunal_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['tribunal_id']; ?>
</span></td>
                    </tr>
                    <tr nowrap ><td nowrap ><?php echo $this->_tpl_vars['vara_id_label']; ?>
<?php echo $this->_tpl_vars['vara_id_required']; ?>
 </td>
                      <td><?php echo $this->_tpl_vars['vara_id_html']; ?>
<?php echo $this->_tpl_vars['vara_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['vara_id']; ?>
</span></td>
                    </tr>
                 </table></td>
                <td align="right">

                 <table class="geral">
                    <tr nowrap >
                      <td><?php echo $this->_tpl_vars['comarca_id_label']; ?>
<?php echo $this->_tpl_vars['comarca_id_required']; ?>
 </td>
                     <td><?php echo $this->_tpl_vars['comarca_id_html']; ?>
<?php echo $this->_tpl_vars['comarca_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['comarca_id']; ?>
</span></td>
                    </tr>
                    <tr nowrap >
                      <td><?php echo $this->_tpl_vars['justica_id_label']; ?>
<?php echo $this->_tpl_vars['justica_id_required']; ?>
 </td>
                     <td><?php echo $this->_tpl_vars['justica_id_html']; ?>
<?php echo $this->_tpl_vars['justica_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['justica_id']; ?>
</span></td>
                    </tr>
                    <tr nowrap >
                      <td><?php echo $this->_tpl_vars['rito_id_label']; ?>
<?php echo $this->_tpl_vars['rito_id_required']; ?>
 </td>
                     <td><?php echo $this->_tpl_vars['rito_id_html']; ?>
<?php echo $this->_tpl_vars['rito_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['rito_id']; ?>
</span></td>
                    </tr>
                    <tr nowrap >
                      <td><?php echo $this->_tpl_vars['objeto_id_label']; ?>
<?php echo $this->_tpl_vars['objeto_id_required']; ?>
 </td>
                     <td><?php echo $this->_tpl_vars['objeto_id_html']; ?>
<?php echo $this->_tpl_vars['objeto_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['objeto_id']; ?>
</span></td>
                    </tr>
                    <tr nowrap >
                      <td><?php echo $this->_tpl_vars['turma_id_label']; ?>
<?php echo $this->_tpl_vars['turma_id_required']; ?>
 </td>
                     <td><?php echo $this->_tpl_vars['turma_id_html']; ?>
<?php echo $this->_tpl_vars['turma_id_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['turma_id']; ?>
</span></td>
                    </tr>
                 </table></td>
              </tr></table>
               </fieldset><br />

               <fieldset class="interno"><legend>Valores</legend>
                  <table class="geral">
                     <tr nowrap ><td align="right" nowrap ><?php echo $this->_tpl_vars['valorcausa_label']; ?>
<?php echo $this->_tpl_vars['valorcausa_required']; ?>
 </td>
                       <td width="200" align="left" nowrap="nowrap"><?php echo $this->_tpl_vars['valorcausa_html']; ?>
<?php echo $this->_tpl_vars['valorcausa_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['valorcausa']; ?>
</span></td>
                     </tr>
                     <tr nowrap >
                       <td align="right" nowrap ><?php echo $this->_tpl_vars['valorrepercussaoeconomica_label']; ?>
<?php echo $this->_tpl_vars['valorrepercussaoeconomica_required']; ?>
</td>
                       <td align="left" nowrap="nowrap"><?php echo $this->_tpl_vars['valorrepercussaoeconomica_html']; ?>
<?php echo $this->_tpl_vars['valorrepercussaoeconomica_error']; ?>
<span class="error"><?php echo $this->_tpl_vars['formErrorMessages']['valorrepercussaoeconomica']; ?>
</span></td>
                     </tr>
                  </table>
               </fieldset>
            </td>
         </tr>
      </table><br class="cleared" />
      <blockquote><p><?php echo $this->_tpl_vars['requiredNote']; ?>
</p></blockquote>
      </div>
      <!--VALORES FIM -->




      <script language="JavaScript">
      function resize(frame)
      {
         var the_height= document.getElementById(frame).contentWindow.document.body.scrollHeight;
         var altura =  new Number( the_height );
         if( altura < 500 ){
            altura = 646 ;
         }
         document.getElementById(frame).height= altura;

         var the_width= document.getElementById(frame).contentWindow.document.body.scrollWidth;
         var largura =  new Number(  the_width );
         if( largura < 774 ){
            largura = 774 ;
         }
         document.getElementById(frame).width= largura;

         /*        alert(altura + ' ' + largura );*/

      }
      </script>


      <!--CUSTAS INICIO-->
      <?php if ($this->_tpl_vars['permiteCustas']): ?>
      <div id="tab2" >
            <iframe frameborder="0"  onLoad="resize('iframe_custas');"  width="774" height="500" id='iframe_custas'  height="200" width="200"  src="<?php echo $this->_tpl_vars['site_url']; ?>
/procap/custas/?pc=<?php echo $this->_tpl_vars['processoCodigo']; ?>
"></iframe>
      </div>
      <?php endif; ?>
      <!--CUSTAS FIM-->


      <!--LISTICONSORTES INICIO-->
      <?php if ($this->_tpl_vars['permiteListiconsortes']): ?>
      <div id="tab3"  class="vt">
         <iframe frameborder="0"  onLoad="resize('iframe_listiconsorte');"  width="774" height="500"  id='iframe_listiconsorte'  src="<?php echo $this->_tpl_vars['site_url']; ?>
/procap/listiconsorte/?pc=<?php echo $this->_tpl_vars['processoCodigo']; ?>
" ></iframe>
      </div>
      <?php endif; ?>
      <!--LISTICONSORTE FIM-->


      <!--ADVOGADO INICIO-->
      <?php if ($this->_tpl_vars['permiteAdvogados']): ?>
      <div id="tab4"  class="vt">
         <iframe  frameborder="0"   onLoad="resize('iframe_processoadvogado');"  width="774" height="500"  id='iframe_processoadvogado'  src="<?php echo $this->_tpl_vars['site_url']; ?>
/procap/processoadvogado/?pc=<?php echo $this->_tpl_vars['processoCodigo']; ?>
"></iframe>
      </div>
      <?php endif; ?>
      <!--ADVOGADO FIM-->


      <!--ANDAMENTOS INICIO-->
      <?php if ($this->_tpl_vars['permiteAndamentos']): ?>
      <div id="tab5"  class="vt">
         <iframe frameborder="0"    onLoad="resize('iframe_andamento');" style=" width:774; height:1800; "  id='iframe_andamento'   src="<?php echo $this->_tpl_vars['site_url']; ?>
/procap/andamento/?pc=<?php echo $this->_tpl_vars['processoCodigo']; ?>
" ></iframe>
      </div>
      <?php endif; ?>
      <!--ANDAMENTOS FIM-->


      <!--PEÇAS INICIO-->
      <?php if ($this->_tpl_vars['permitePecas']): ?>
      <div id="tab6"  class="vt">
         <iframe frameborder="0"   onLoad="resize('iframe_peca');"  width="774" height="500"  id='iframe_peca'   src="<?php echo $this->_tpl_vars['site_url']; ?>
/procap/peca/?pc=<?php echo $this->_tpl_vars['processoCodigo']; ?>
" ></iframe>
      </div>
      <?php endif; ?>
      </script>
      <!--PEÇAS FIM-->


      <script type="text/javascript">

      var mypets=new ddtabcontent("voluntarioTabs")
      mypets.setpersist(true)
      mypets.setselectedClassTarget("link")
      mypets.init()

      </script>






                          <div class="cleared"></div>
   </form>
   </div>

</div>





<?php endif; ?>
<!-- ###########    FORMULARIO FIM  ################ -->