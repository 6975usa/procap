<?php /* Smarty version 2.6.19, created on 2011-12-13 15:24:59
         compiled from /var/www/procap/LiteFrame_1.2/config/custom/../../../../procap/applications/procap/templates/processoList.tpl */ ?>
<!-- ###########   LISTAS INICIO  ################ -->
<?php if ($this->_tpl_vars['lists']): ?>
   <?php if ($this->_tpl_vars['find_txt']): ?>
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
                           <?php $this->assign('colspan', 0); ?>
                           <?php $_from = $this->_tpl_vars['titles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['title']):
?>
                           <th><?php echo $this->_tpl_vars['title']; ?>
</th>
                           <?php $this->assign('colspan', $this->_tpl_vars['colspan']+1); ?>
                           <?php endforeach; endif; unset($_from); ?>
                        </tr>
                        </thead>
      
      
                        <tbody  id="listTbody">
                        <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['dados']):
?>
                        <?php $this->assign('item', $this->_tpl_vars['k']%2); ?>
                        <tr class="<?php echo $this->_tpl_vars['displayOptions']['trClasses'][$this->_tpl_vars['item']]; ?>
" onclick="javascript:changeTrStyle(this,'<?php echo $this->_tpl_vars['displayOptions']['trClasses'][$this->_tpl_vars['item']]; ?>
','<?php echo $this->_tpl_vars['displayOptions']['trClassSwitch']; ?>
')" >
                           <?php $_from = $this->_tpl_vars['dados']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['valor']):
?>
                           <td align="left"><?php echo $this->_tpl_vars['valor']; ?>
</TD>
                           <?php endforeach; endif; unset($_from); ?>
                        </tr>
                        <?php endforeach; endif; unset($_from); ?>
                        </tbody>
      
                        <tfoot  id="listTfoot">
                        <tr >
                           <td colspan="<?php echo $this->_tpl_vars['colspan']; ?>
">
                              <table style="border:0px; width:100%; " >
                              <tr valign="top">
                                 <TD style="width:33%; text-align:left; white-space:nowrap;" ><?php echo $this->_tpl_vars['perPageSelectBox']; ?>
</TD>
                                 <td style="width:34%; text-align:center; white-space:nowrap;"  ><?php echo $this->_tpl_vars['links']; ?>
</td>
                                 <TD style="width:33%; text-align:right; white-space:nowrap;" ><?php echo $this->_tpl_vars['find']; ?>
</TD>
                              </tr>
                              </table>
                           </TD>
                        </tr>
                        </tfoot>
      
                     </table>
         </div>
      </div>
   <?php else: ?>
      <div class="list"  id="list_display">
         <div  id="button_menu">
            <input class="botao" name="MM_new" value="Novo" type="button" onclick="appendHiddenToForm('MM_new',new Array('action','MM_new'));" />
         </div>
	  <h3><?php echo $this->_tpl_vars['listTitle']; ?>
</h3>
         <div id="listDiv" align="center" class="listDiv" ><br /><br /><br />
            Pesquisar: <?php echo $this->_tpl_vars['find']; ?>

         </div>
      </div>
   <?php endif; ?>
<?php endif; ?>
<!-- ###########   LISTAS FIM  ################ -->
