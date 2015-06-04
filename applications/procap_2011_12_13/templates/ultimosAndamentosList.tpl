<!-- ###########   LISTAS INICIO  ################ -->
{s if $lists  s}
<div class="list"  id="list_display">
   <div id="listDiv" align="center" class="listDiv" >

               <table class="geral" >
                  <caption style="white-space: nowrap;"><h3>{s $listTitle s}</h3></caption>


                  <thead>
                  <tr class="{s $displayOptions.titleClass s}">
                     <th>Data</th>
                     <th>Descrição</th>
                     <th>Tipo</th>
                     <th>Fase</th>
                     <th>Processo</th>
                  </tr>
                  </thead>


                  <tbody  id="listTbody">
                  {s foreach from=$data key=k item=dados s}
                  {s assign var="item" value=$k%2  s}
                  <tr class="{s $displayOptions.trClasses.$item s}" onclick="javascript:changeTrStyle(this,'{s $displayOptions.trClasses.$item s}','{s $displayOptions.trClassSwitch s}')" >
                     <td>{s $dados.data s}</td>
                     <td>{s $dados.descricao s}</td>
                     <td>{s $dados.tipo s}</td>
                     <td>{s $dados.fase s}</td>
                     <td>{s $dados.processo_nr s}</td>
                  </tr>
                  {s /foreach s}
                  </tbody>

                  <tfoot  id="listTfoot">
                  <tr >
                     <td colspan="5">
                        <table style="border:0px; width:100%; " >
                        <tr valign="top">
                           <TD style="width:33%; text-align:left; white-space:nowrap;" >{s $perPageSelectBox s}</TD>
                           <td style="width:34%; text-align:center; white-space:nowrap;"  >{s $links s}</td>
                           <TD style="width:33%; text-align:right; white-space:nowrap;" >{s $find s}</TD>
                        </tr>
                        </table>
                     </TD>
                  </tr>
                  </tfoot>

               </table>
   </div>
</div>
{s /if s}
<!-- ###########   LISTAS FIM  ################ -->

