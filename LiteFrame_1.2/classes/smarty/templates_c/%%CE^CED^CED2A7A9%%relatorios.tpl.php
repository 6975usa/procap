<?php /* Smarty version 2.6.19, created on 2011-12-13 15:39:13
         compiled from /var/www/procap/LiteFrame_1.2/config/custom/../../../../procap/applications/procap/templates/relatorios.tpl */ ?>

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
                     <?php $_from = $this->_tpl_vars['listClientes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value'] => $this->_tpl_vars['name']):
?>
                        <option value="<?php echo $this->_tpl_vars['value']; ?>
"><?php echo $this->_tpl_vars['name']; ?>
</option>
                     <?php endforeach; endif; unset($_from); ?>
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
