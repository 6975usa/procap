<?php /* Smarty version 2.6.19, created on 2011-09-15 23:00:09
         compiled from /var/www/procap/LiteFrame_1.2/config/custom/../../../../procap/applications/admin/templates/groupsList.tpl */ ?>
<!-- ###########   LISTAS INICIO  ################ -->
<?php if ($this->_tpl_vars['lists']): ?>
<div class="list"  id="list_display">
   <div id="listDiv" align="center" class="listDiv" >

      <div  id="button_menu"><input class="botao" name="MM_new" value="Novo" type="button" onclick="appendHiddenToForm('MM_new',new Array('action','MM_new'));" /></div>

      <table class="geral" align="center" >
         <tr>
            <td align="center">
               <table cellpadding="3" class="<?php echo $this->_tpl_vars['displayOptions']['tableClass']; ?>
" >
                  <caption><h1><?php echo $this->_tpl_vars['listTitle']; ?>
</h1></caption>


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
                     <?php $_from = $this->_tpl_vars['dados']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['valor']):
?>
                     <td align="left"><?php echo $this->_tpl_vars['valor']; ?>
</TD>
                     <?php endforeach; endif; unset($_from); ?>
                  </tr>
                  <?php endforeach; endif; unset($_from); ?>
                  </tbody>


               </table>

               <table>
                  <tr valign="top">
                     <TD width="1" nowrap ><?php echo $this->_tpl_vars['perPageSelectBox']; ?>
</TD>
                     <td width="100%" align="center"><?php echo $this->_tpl_vars['links']; ?>
</td>
                     <TD width="1"  nowrap><?php echo $this->_tpl_vars['find']; ?>
</TD>
                  </tr>
               </table>
            </td>
         </tr>
      </table>
   </div>

   <script language="javascritp" type="text/javascript">
      //defineDivSize();
      //centerFormDiv();
   </script>
</div>
<?php endif; ?>
<!-- ###########   LISTAS FIM  ################ -->
