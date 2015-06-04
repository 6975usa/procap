<!-- ###########   LISTAS INICIO  ################ -->
<div class="list"  id="list_display">
   {s if $lists  s}
   <div id="listDiv" align="center" class="listDiv" >
      <fieldset>
      <table class="">
         <tr>
            <td align="center">
               <table cellpadding="3" class="{s $displayOptions.tableClass s}" >
                  <caption><h1>{s $listTitle s}</h1></caption>


                  <thead>
                  <tr class="{s $displayOptions.titleClass s}">
                     {s foreach from=$titles item=title s}
                     <th>{s $title s}</th>
                     {s /foreach s}
                  </tr>
                  </thead>


<!--                  <tbody style="overflow:scroll;overflow-x:hidden;"  id="listTbody">-->
                  <tbody  id="listTbody">
                  {s foreach from=$data key=k item=dados s}
                  {s assign var="item" value=$k%2  s}
                  <tr class="{s $displayOptions.trClasses.$item s}" onclick="javascript:changeTrStyle(this,'{s $displayOptions.trClasses.$item s}','{s $displayOptions.trClassSwitch s}')" >
                     {s foreach from=$dados item=valor s}
                     <td align="left">{s $valor s}</TD>
                     {s /foreach s}
                  </tr>
                  {s /foreach s}
                  </tbody>


               </table>

               <table>
                  <tr valign="top">
                     <TD width="1" nowrap >{s $perPageSelectBox s}</TD>
                     <td width="100%"><center>{s $links s}</center></td>
                     <TD width="1"  nowrap>{s $find s}</TD>
                  </tr>
               </table>
            </td>
         </tr>
      </table>
      </fieldset>
   </div>

   <script language="javascritp" type="text/javascript">
      //defineDivSize();
      //centerFormDiv();
   </script>
   {s /if s}
</div>
<!-- ###########   LISTAS FIM  ################ -->

