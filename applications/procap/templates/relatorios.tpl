
<script language="javascript">

    $(document).ready(function () {

        $("#form_cliente").submit(function () {
            if ($("#cliente_id").val() == "" || $("#cliente_id").val() == null) {
                $("#cliente_warning").text(" Escolha um Cliente").show().fadeOut(10000);
                $("#cliente_id").attr('class', 'error');
                return false;
            }
            if ( ! ( $("#tipo1").is(':checked') || $("#tipo2").is(':checked') || $("#tipo3").is(':checked') )) {
                $("#tipo_warning").text(" Escolha o tipo de relatorio").show().fadeOut(10000);
                return false;
            }
            $('#cliente_submit').val('Montando...')
            return true;
        });



    });

</script>

<div class="list"  id="list_display">
    <div id="listDiv" align="center" class="listDiv" >

        <h1>Relat�rios</h1>

        <fieldset style="width:70%"><legend>Relat&oacute;rios</legend>
            <form name="form_cliente" id="form_cliente" method="post" action="/procap/procap/relatorio/ultimosAndamentos/" >
                <div align="left">
                    <table class="geral" width="100%" >
                        <tr  style="height: 80px;">
                            <td>Cliente:
                                <select id="cliente_id" name="cliente_id">
                                    <option value=""></option>
                                    {s foreach from=$listClientes key=value item=name s}
                                    <option value="{s $value s}">{s $name s}</option>
                                    {s /foreach s}
                                </select><span class="error" id="cliente_warning"></span>
                            </td>
                            <td width="50" align="center" valign="middle"></td>
                        </tr>
                        <tr  style="height: 80px; vertical-align: central;">
                            <td style="vertical-align: central;">
                                <div> 
                                    <input type="radio" name="tipo" id="tipo1" value="ultimos_andamentos">
                                    <label for="tipo1">&Uacute;ltimos Andamentos</label>
                                </div>
                                <div> 
                                    <input type="radio" name="tipo" id="tipo2" value="ativos">
                                    <label for="tipo2">Processos Ativos</label>
                                </div>
                                <div> 
                                    <input type="radio" name="tipo" id="tipo3" value="baixados">
                                    <label for="tipo3">Processos Baixados</label>
                                </div>
                                <div><span class="error" id="tipo_warning"></span></div>
                            </td>
                            <td style="vertical-align: central;"><input value="Montar Relat�rio" id="cliente_submit" class="botao" type="submit" ></td>
                        </tr>
                    </table>
                </div>
            </form>
        </fieldset>


    </div>
</div>

