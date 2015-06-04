
<!-- ###########   LISTAS INICIO  ################ -->
   {if $lists }
   <div id="listDiv" align="center" class="listDiv" >
      <table class="geral" align="center" >
         <tr>
            <td align="center">
               <table cellpadding="3" class="{$displayOptions.tableClass}" >
                  <caption><h1 align="center">{$listTitle}</h1></caption>


                  <thead>
                  <tr class="{$displayOptions.titleClass}">
                     {foreach from=$titles item=title}
                     <th>{$title}</th>
                     {/foreach}
                  </tr>
                  </thead>


                  <tbody style="overflow:scroll;overflow-x:hidden;" id="listTbody">
                  {foreach from=$data key=k item=dados}
                  {assign var="item" value=$k%2 }
                  <tr class="{$displayOptions.trClasses.$item}" onclick="javascript:changeTrStyle(this,'{$displayOptions.trClasses.$item}','{$displayOptions.trClassSwitch}')" >
                     {foreach from=$dados item=dado}
                     <td align="left">{$dado}</TD>
                     {/foreach}
                  </tr>
                  {/foreach}
                  </tbody>


               </table>

               <table>
                  <tr valign="top">
                     <TD width="1" nowrap >{$perPageSelectBox}</TD>
                     <td width="100%" align="center">{$links}</td>
                     <TD width="1"  nowrap>{$find}</TD>
                  </tr>
               </table>
            </td>
         </tr>
      </table>
   </div>

   <script language="javascritp" type="text/javascript">
      defineDivSize();
      centerFormDiv();
   </script>
   {/if}
<!-- ###########   LISTAS FIM  ################ -->

