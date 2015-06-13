<!-- ###########   LISTAS INICIO  ################ -->
{s if $lists  s}
{s if $find_txt  s}
<div class="list"  id="list_display">
    <div id="listDiv" align="center" class="listDiv" >

        <div  id="button_menu">
            <input class="botao" name="MM_new" value="Novo" type="button" onclick="appendHiddenToForm('MM_new', new Array('action', 'MM_new'));" />
        </div>

        <table class="geral" >
            <caption style="white-space: nowrap;"><h3>{s $listTitle s}</h3></caption>


            <thead>
                <tr class="{s $displayOptions.titleClass s}">
                    {s assign var="colspan" value=0  s}
                    {s foreach from=$titles item=title s}
                    <th>{s $title s}</th>
                        {s assign var="colspan" value=$colspan+1  s}
                        {s /foreach s}
                </tr>
            </thead>


            <tbody  id="listTbody">
                {s foreach from=$data key=k item=dados s}
                {s assign var="item" value=$k%2  s}
                <tr class="{s $displayOptions.trClasses.$item s}" onclick="javascript:changeTrStyle(this, '{s $displayOptions.trClasses.$item s}', '{s $displayOptions.trClassSwitch s}')" >
                    {s foreach from=$dados item=valor s}
                    <td align="left">{s $valor s}</TD>
                        {s /foreach s}
                </tr>
                {s /foreach s}
            </tbody>

            <tfoot  id="listTfoot">
                <tr >
                    <td colspan="{s $colspan s}">
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
{s else  s}
<div class="list"  id="list_display">
    <div  id="button_menu">
        <input class="botao" name="MM_new" value="Novo" type="button" onclick="appendHiddenToForm('MM_new', new Array('action', 'MM_new'));" />
    </div>
    <h3>{s $listTitle s}</h3>
    <div id="listDiv" align="center" class="listDiv" ><br /><br /><br />
        Pesquisar: {s $find s}
    </div>
</div>
{s /if s}
{s /if s}
<!-- ###########   LISTAS FIM  ################ -->

