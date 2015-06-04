<!-- ###########   LISTAS INICIO  ################ -->
{s if $lists  s}
<div class="list"  id="list_display">
   <div id="listDiv" align="center" class="listDiv" >

      <div  id="button_menu">
         <input class="botao" name="MM_new" value="Novo" type="button" onclick="appendHiddenToForm('MM_new',new Array('action','MM_new'));" />
         </div>

               <table class="geral" >
                  <caption style="white-space: nowrap;"><h3>{s $listTitle s}</h3></caption>


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
                     <td align="left">{s $dados.descricao s}</TD>
                     <td align="left">{s $dados.inicio_data s}</TD>
                     <td align="left">{s $dados.termino_data s}</TD>
                     <td align="left">{s $dados.conclusao_data s}</TD>
                     <td align="left">{s $dados.tipo s}</TD>
                     <td align="left">{s $dados.advogado s}</TD>
                     <td align="left">
                        {s foreach from=$dados.pecas item=peca s}
                           <div><a target="_blank" href="{s $peca.arquivo s}"><img src="{s $static_url s}/procap/tema01/images/task_f2.png" border="0" ></a></div>
                        {s /foreach s}
                     </TD>
                  </tr>
                  {s /foreach s}
                  <tr >
                     <td align="left" colspan="100">
                        <table width="100%" >
                        <tr valign="top">
                           <TD width="33%" nowrap align="left"  >{s $perPageSelectBox s}</TD>
                           <td width="33%" nowrap align="center" >{s $links s}</td>
                           <TD width="34%" nowrap align="right" >{s $find s}</TD>
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
{s /if s}
<!-- ###########   LISTAS FIM  ################ -->

