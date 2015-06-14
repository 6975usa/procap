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


        <h3>Todos os Processo Ativos</h3>
        <h3>{s $clienteNome s}</h3>


        <table class="geral" id="example">
            <thead>
                <tr class="item3">
                    <th>N&uacute;mero</th>
                    <th>Cliente</th>
                    <th>Parte</th>
                    <th>Vara</th>
                    <th>Tribunal</th>
                    <th>Comarca</th>
                    <th>Valor</th>
                    <!--                     <th>Pe�as</th>-->
                </tr>
            </thead>
            <tbody  id="listTbody">
                {s foreach from=$uaList  key=k  item=processo s}
                <tr>
                    <td>{s $processo.numero s}</TD>
                    <td>{s $processo.cliente1 s} {s if $processo.cliente2 s}<br/>{s /if s} {s $processo.cliente2 s}</TD>
                    <td>{s $processo.contraparte1 s}  {s if $processo.contraparte2 s}<br/>{s /if s} {s $processo.contraparte2 s}</TD>
                    <td>{s $processo.vara s}</TD>
                    <td>{s $processo.tribunal s}</TD>
                    <td>{s $processo.camarca s}</TD>
                    <td>{s $processo.valorcausa s}</TD>
                </tr>
                {s /foreach s}
            </tbody>
        </table>
    </div>
</div>
<!-- ###########    FIM  ################ -->

