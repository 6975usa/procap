<!-- ###########   LISTAS INICIO  ################ -->
{s if $lists  s}
<div class="list"  id="list_display">
    <div id="listDiv" align="center" class="listDiv" >

        <div  id="button_menu">
            <input class="botao" name="MM_new" value="Novo" type="button" onclick="appendHiddenToForm('MM_new', new Array('action', 'MM_new'));" />
        </div>
        <table class="geral"><tr><td>

                    <table cellpadding="3" class="geral" >
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
                            <tr class="{s $displayOptions.trClasses.$item s}" onclick="javascript:changeTrStyle(this, '{s $displayOptions.trClasses.$item s}', '{s $displayOptions.trClassSwitch s}')" >
                                <td align="left">{s $dados.descricao s}</TD>
                                <td align="left">{s $dados.andamento s}</TD>
                                <td align="left">{s $dados.inicio s}</TD>
                                <td align="left">{s $dados.termino s}</TD>
                                <td align="left">&nbsp;
                                    {s if $dados.arquivo s}
                                    <a target="_blank" href="{s $dados.arquivo s}"><img src="{s $static_url s}/procap/tema01/images/task_f2.png" border="0" ></a>
                                        {s /if s}
                                </TD>
                            </tr>
                            {s /foreach s}
                        </tbody>


                    </table>
                </td></tr></table>
    </div>

    <script language="javascritp" type="text/javascript">
        defineDivSize();
        centerFormDiv();
    </script>
</div>
{s /if s}
<!-- ###########   LISTAS FIM  ################ -->

