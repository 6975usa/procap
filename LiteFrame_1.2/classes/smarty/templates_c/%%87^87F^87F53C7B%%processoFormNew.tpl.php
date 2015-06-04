<?php /* Smarty version 2.6.19, created on 2011-12-14 11:01:00
         compiled from /var/www/procap/LiteFrame_1.2/config/custom/../../../../procap/applications/procap/templates/processoFormNew.tpl */ ?>
<!-- ###########    FORMULARIO COMECO  ################ -->
<?php if (! $this->_tpl_vars['lists']): ?>
<div class="form">
   <?php echo $this->_tpl_vars['jqueryInputMaskScript']; ?>

   <?php echo $this->_tpl_vars['jsValidationScript']; ?>

   <div align="center" id="form" >
      <?php echo $this->_tpl_vars['jsScript']; ?>

      <form <?php echo $this->_tpl_vars['formOptions']; ?>
 >
      <?php echo $this->_tpl_vars['id_html']; ?>

      <?php echo $this->_tpl_vars['office_id_html']; ?>







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




      <link rel="stylesheet" href="<?php echo $this->_tpl_vars['static_url']; ?>
/procap/css/menu.css" type="text/css" media="screen" />
      <script language="JavaScript" src="<?php echo $this->_tpl_vars['static_url']; ?>
/procap/js/tabcontent.js"></script>

      <div  id="button_menu"><?php echo $this->_tpl_vars['MM_list_html']; ?>
&nbsp;&nbsp;&nbsp;<?php echo $this->_tpl_vars['MM_insert_html']; ?>
</div>

      <h3>Processo</h3>

      <!--GERAL INICIO -->
<table class="geral" width="100%" >
         <tr>
            <td>



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
      </table>
      <!--GERAL FIM -->


      <script type="text/javascript">

      var mypets=new ddtabcontent("voluntarioTabs")
      mypets.setpersist(true)
      mypets.setselectedClassTarget("link")
      mypets.init()

      </script>




   <blockquote><p><?php echo $this->_tpl_vars['requiredNote']; ?>
</p></blockquote>
   </form>
   </div>

</div>
<?php endif; ?>
<!-- ###########    FORMULARIO FIM  ################ -->