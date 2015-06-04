
<script language="javascript">

$(document).ready(function() {

    $("#form_cliente").submit(function() {
      if ($("#cliente_id").val() == ""  ||  $("#cliente_id").val() == null ) {
        $("#cliente_warning").text(" Escolha um Cliente").show().fadeOut(10000);
        $("#cliente_id").attr('class','error');
        return false;
      }
      return true ;
    });



});

</script>

<div class="list"  id="list_display">
	<div id="listDiv" align="center" class="listDiv" >

	  <h1>Relatórios</h1>

      <fieldset style="width:70%"><legend>Últimos Andamentos</legend>
         <form name="form_cliente" id="form_cliente" method="post" action="/procap/procap/relatorio/ultimosAndamentos/" target="_blank">
            <div align="left">
            <table class="geral" width="100%" >
               <tr>
                  <td>Cliente:
                     <select id="cliente_id" name="cliente_id">
                        <option value=""></option>
                     {s foreach from=$listClientes key=value item=name s}
                        <option value="{s $value s}">{s $name s}</option>
                     {s /foreach s}
                     </select><span class="error" id="cliente_warning"></span>
                  </td>
                  <td width="50" align="center" valign="middle"><input value="Montar Relatório" id="cliente_submit" class="botao" type="submit" ></td>
               </tr>
            </table>
            </div>
         </form>
      </fieldset>


   	</div>
</div>

