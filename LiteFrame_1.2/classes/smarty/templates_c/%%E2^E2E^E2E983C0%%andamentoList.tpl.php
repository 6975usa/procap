<?php /* Smarty version 2.6.19, created on 2011-12-13 15:25:05
         compiled from /var/www/procap/LiteFrame_1.2/config/custom/../../../../procap/applications/procap/templates/andamentoList.tpl */ ?>
<!-- ###########   LISTAS INICIO  ################ -->
<?php if ($this->_tpl_vars['lists']): ?>
<div class="list"  id="list_display">
   <div id="listDiv" align="center" class="listDiv" >

      <div  id="button_menu">
         <input class="botao" name="MM_new" value="Novo" type="button" onclick="appendHiddenToForm('MM_new',new Array('action','MM_new'));" />
         </div>

               <table class="geral" >
                  <caption style="white-space: nowrap;"><h3><?php echo $this->_tpl_vars['listTitle']; ?>
</h3></caption>


                  <thead>
                  <tr class="<?php echo $this->_tpl_vars['displayOptions']['titleClass']; ?>
">
                     <?php $_from = $this->_tpl_vars['titles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['title']):
?>
                     <th><?php echo $this->_tpl_vars['title']; ?>
</th>
                     <?php endforeach; endif; unset($_from); ?>
                  </tr>
                  </thead>


<!--                  <tbody style="overflow:scroll;overflow-x:hidden;"  id="listTbody">-->
                  <tbody  id="listTbody">
                  <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['dados']):
?>
                  <?php $this->assign('item', $this->_tpl_vars['k']%2); ?>
                  <tr class="<?php echo $this->_tpl_vars['displayOptions']['trClasses'][$this->_tpl_vars['item']]; ?>
" onclick="javascript:changeTrStyle(this,'<?php echo $this->_tpl_vars['displayOptions']['trClasses'][$this->_tpl_vars['item']]; ?>
','<?php echo $this->_tpl_vars['displayOptions']['trClassSwitch']; ?>
')" >
                     <td align="left"><?php echo $this->_tpl_vars['dados']['descricao']; ?>
</TD>
                     <td align="left"><?php echo $this->_tpl_vars['dados']['inicio_data']; ?>
</TD>
                     <td align="left"><?php echo $this->_tpl_vars['dados']['termino_data']; ?>
</TD>
                     <td align="left"><?php echo $this->_tpl_vars['dados']['conclusao_data']; ?>
</TD>
                     <td align="left"><?php echo $this->_tpl_vars['dados']['tipo']; ?>
</TD>
                     <td align="left"><?php echo $this->_tpl_vars['dados']['advogado']; ?>
</TD>
                     <td align="left">
                        <?php $_from = $this->_tpl_vars['dados']['pecas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['peca']):
?>
                           <div><a target="_blank" href="<?php echo $this->_tpl_vars['peca']['arquivo']; ?>
"><img src="<?php echo $this->_tpl_vars['static_url']; ?>
/procap/tema01/images/task_f2.png" border="0" ></a></div>
                        <?php endforeach; endif; unset($_from); ?>
                     </TD>
                  </tr>
                  <?php endforeach; endif; unset($_from); ?>
                  <tr >
                     <td align="left" colspan="100">
                        <table width="100%" >
                        <tr valign="top">
                           <TD width="33%" nowrap align="left"  ><?php echo $this->_tpl_vars['perPageSelectBox']; ?>
</TD>
                           <td width="33%" nowrap align="center" ><?php echo $this->_tpl_vars['links']; ?>
</td>
                           <TD width="34%" nowrap align="right" ><?php echo $this->_tpl_vars['find']; ?>
</TD>
                        </tr>
                        </table>
                     </TD>
                  </tr>
                  </tbody>


               </table>
   </div>

   <script language="javascritp" type="text/javascript">
      defineDivSize();
      centerFormDiv();
   </script>
</div>
<?php endif; ?>
<!-- ###########   LISTAS FIM  ################ -->
