<?php /* Smarty version 2.6.19, created on 2011-12-16 10:01:42
         compiled from /var/www/procap/LiteFrame_1.2/config/custom/../../../../procap/applications/procap/templates/ultimosAndamentos.tpl */ ?>
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
			$(document).ready( function() {

				$('#example').dataTable( {
					"bJQueryUI": true,
					"sPaginationType": "full_numbers",
               "bStateSave": false,
					"sDom": 'T<"clear">lfrtip',
					"oTableTools": {
						"sSwfPath": "http://static.gabcmt.eb.mil.br/os/js/copy_cvs_xls_pdf.swf"
					},

					"bPaginate": false,
               "bInfo": false
				} );

			} );
		</script>
		<style type="text/css">
         .dataTables_filter {
            display: none;
         }
      </style>


<div class="list"  id="list_display">
   <div id="listDiv" align="center" class="listDiv" >


   <h3>Últimos Andamentos</h3>
   <h3><?php echo $this->_tpl_vars['clienteNome']; ?>
</h3>


            <table class="geral" id="example">
                  <thead>
                  <tr class="item3">
                     <th>Distribuição</th>
                     <th>Término</th>
                     <th>Descrição</th>
                     <th>Processo</th>
                     <th>Valor</th>
                     <th>Vara</th>
                     <th>Comarca</th>
                     <th>Objeto</th>
                     <th>Justiça</th>
<!--                     <th>Peças</th>-->
                  </tr>
                  </thead>


                  <tbody  id="listTbody">
                  <?php $_from = $this->_tpl_vars['uaList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['andamento']):
?>
                  <tr>
                     <td><?php echo $this->_tpl_vars['andamento']['inicio_data']; ?>
</TD>
                     <td><?php echo $this->_tpl_vars['andamento']['termino_data']; ?>
</TD>
                     <td><?php echo $this->_tpl_vars['andamento']['descricao']; ?>
</TD>
                     <td><?php echo $this->_tpl_vars['andamento']['processo']; ?>
</TD>
                     <td><?php echo $this->_tpl_vars['andamento']['valorcausa']; ?>
</TD>
                     <td><?php echo $this->_tpl_vars['andamento']['vara']; ?>
</TD>
                     <td><?php echo $this->_tpl_vars['andamento']['comarca']; ?>
</TD>
                     <td><?php echo $this->_tpl_vars['andamento']['objeto']; ?>
</TD>
                     <td><?php echo $this->_tpl_vars['andamento']['justica']; ?>
</TD>
<!--                     <td>
                        <?php $_from = $this->_tpl_vars['andamento']['pecas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['peca']):
?>
                           <?php echo $this->_tpl_vars['peca']['descricao']; ?>
<br>
                        <?php endforeach; endif; unset($_from); ?>
                     </TD>-->
                  </tr>
                  <?php endforeach; endif; unset($_from); ?>
                  </tbody>


               </table>
   </div>
</div>
<!-- ###########    FIM  ################ -->
