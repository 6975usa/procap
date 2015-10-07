<!-- ###########    INICIO  ################ -->
<style type="text/css" media="screen">
    @import "http://static.gabcmt.eb.mil.br/os/css/demo_table_jui.css";
    @import "http://static.gabcmt.eb.mil.br/os/css/jquery-ui-1.7.2.custom.css";
    @import "http://static.gabcmt.eb.mil.br/os/css/TableTools.css";
</style>


</style>

<script type="text/javascript" src="http://static.gabcmt.eb.mil.br/os/js/complete.min.js"></script>
<script type="text/javascript" src="http://static.gabcmt.eb.mil.br/os/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://static.gabcmt.eb.mil.br/os/js/TableTools.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

        $('#example').dataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "bStateSave": false,
            "sDom": 'T<"clear">lfrtip',
            "oTableTools": {
                "sSwfPath": "http://static.gabcmt.eb.mil.br/os/js/copy_cvs_xls_pdf.swf"
            },
            "bPaginate": false,
            "bInfo": false
        });

    });
</script>
<style type="text/css">
    .dataTables_filter {
        display: none;
    }
</style>


<div class="list"  id="list_display">
    <div id="listDiv" align="center" class="listDiv" >


        <h3>�ltimos Andamentos</h3>
        <h3>{s $clienteNome s}</h3>


        <table class="geral" id="example">
            <thead>
                <tr class="item3">
                    <th>Distribui��o</th>
                    <th>T�rmino</th>
                    <th>Descri��o</th>
                    <th>Processo</th>
                    <th>Valor</th>
                    <th>Vara</th>
                    <th>Comarca</th>
                    <th>Objeto</th>
                    <th>Justi�a</th>
                    <!--                     <th>Pe�as</th>-->
                </tr>
            </thead>


            <tbody  id="listTbody">
                {s foreach from=$uaList  key=k  item=andamento s}
                <tr>
                    <td>{s $andamento.inicio_data s}</TD>
                    <td>{s $andamento.termino_data s}</TD>
                    <td>{s $andamento.descricao s}</TD>
                    <td>{s $andamento.processo s}</TD>
                    <td>{s $andamento.valorcausa s}</TD>
                    <td>{s $andamento.vara s}</TD>
                    <td>{s $andamento.comarca s}</TD>
                    <td>{s $andamento.objeto s}</TD>
                    <td>{s $andamento.justica s}</TD>
                    <!--                     <td>
                    {s foreach from=$andamento.pecas  item=peca s}
                    {s $peca.descricao s}<br>
                    {s /foreach s}
                 </TD>-->
                </tr>
                {s /foreach s}
            </tbody>


        </table>
    </div>
</div>
<!-- ###########    FIM  ################ -->

