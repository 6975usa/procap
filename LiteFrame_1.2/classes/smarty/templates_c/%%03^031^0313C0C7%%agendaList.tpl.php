<?php /* Smarty version 2.6.19, created on 2011-12-13 15:21:09
         compiled from /var/www/procap/LiteFrame_1.2/config/custom/../../../../procap/applications/procap/templates/agendaList.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', '/var/www/procap/LiteFrame_1.2/config/custom/../../../../procap/applications/procap/templates/agendaList.tpl', 177, false),)), $this); ?>
<!-- ###########   LISTAS INICIO  ################ -->
<style type="text/css">
<!--
#list_display #listDiv #div-1 {
	position:relative;
	margin:10px;
}
#list_display #listDiv #div-1 #div-1b {
			position:absolute;
			top:0;
			right:0;
			width:200px;
}
#list_display #listDiv #div-1a {
	color: #000;
	background-color: #82A880;
	position:absolute;
	top:0;
	left:0;
	border: 1px solid #660;
	display:none;
	padding:10px;
	white-space:nowrap;
}
#list_display #listDiv #div-1aa {
	position:absolute;
	top:0;
	left:0;
	width:200px;
}
#list_display #listDiv #div-1 #div-1a .di #inicio_data_trigger {
   position:relative;
   top:5px;
	margin: 0px;
	padding: 0px;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
   position:relative;
	left: 0px;
	top: 5px;
	right: 0px;
	bottom: 0px;
	clip: rect(0px,0px,0px,0px);
}
-->
</style>

<?php if ($this->_tpl_vars['lists']): ?>
<div class="list"  id="list_display">

   <div id="listDiv" align="center" class="listDiv" >

	<div id="div-1">

      <div id="div-1aa"><a href="#">Mudar Período</a></div>

      <div id="div-1a">
         <form method="get" id="escolhe_data" >
            Dia:<input maxlength="10" name="dia" value="" id="dia" size="10" type="text">

            <input maxlength="10" name="dia_da_agenda" id="dia_da_agenda" value="<?php echo $this->_tpl_vars['dia_da_agenda']; ?>
"  type="hidden">
            <input maxlength="10" name="semana_da_agenda" id="semana_da_agenda" value=""  type="hidden">

            <a href="javascript:void(null);" class="di">
               <img src="/procap/public/static/framework/images/calendar.gif" id="inicio_data_trigger" border="0" >
            </a>
            <input type="submit" value="Ver Dia" class="botao">

            <br><br> <a href="#" id="semana_atual" >Semana Atual</a>
            <br><br> <a href="#" id="semana_anterior">Semana Anterior</a>
            <br><br> <a href="#" id="proxima_semana" >Próxima Semana</a>
            <br><br> <p style="text-align:right;" > <a style="color:black; text-decoration:none;" href="#" id="link_fechar" >Fechar</a></p>

         </form>

         <style type="text/css">
         <!-- @import url(/procap/public/static/framework/css/calendar-win2k-1.css); -->
         </style>

         <script type="text/javascript" src="/procap/public/static/framework/js/calendar.js"></script>
         <script type="text/javascript" src="/procap/public/static/framework/js/lang/calendar-pt.js"></script>
         <script type="text/javascript" src="/procap/public/static/framework/js/calendar-setup.js"></script>
         <script type="text/javascript">
            Calendar.setup({ 'inputField' : 'dia', 'ifFormat' : '%d/%m/%Y', 'showsTime' : true, 'time24' : true, 'weekNumbers' : false
               , 'showOthers' : true, 'button' : 'inicio_data_trigger' });
         </script>
         <script type='text/javascript'>
            $(document).ready(function() {
               jQuery(function($) {
                  $('#inicio_data').mask('99/99/9999');
               });

               $("#div-1aa").click(function() {
                  $("#div-1aa").hide(300);
                  $("#div-1a").show(300);
               });

               $("#link_fechar").click(function() {
                  $("#div-1a").hide(300);
                  $("#div-1aa").show(300);
               });

               $("#semana_atual").click(function() {
                  $("#semana_da_agenda").val('atual');
                  $("#escolhe_data").submit();
               });

               $("#semana_anterior").click(function() {
                  $("#semana_da_agenda").val('anterior');
                  $("#escolhe_data").submit();
               });

               $("#proxima_semana").click(function() {
                  $("#semana_da_agenda").val('proxima');
                  $("#escolhe_data").submit();
               });

            });
         </script>
      </div>

      <div  id="div-1b" ><input class="botao" name="MM_new" value="Novo" type="button" onclick="appendHiddenToForm('MM_new',new Array('action','MM_new'));" /></div>

    </div>
               <table class="geral" >
                  <caption style="white-space: nowrap;"><h3><?php echo $this->_tpl_vars['listTitle']; ?>
</h3></caption>


                  <thead>
                  <tr class="<?php echo $this->_tpl_vars['displayOptions']['titleClass']; ?>
">
                     <th>Término</th>
                     <th>Conclusão</th>
                     <th>Descrição</th>
                     <th>Processo</th>
                     <th>Pessoa</th>
                     <th>Tipo</th>
                     <th>Cliente</th>
                     <th>Contraparte</th>
                  </tr>
                  </thead>

                     <script language="javascript">
                     function marcar_conclusao(andamento_id){
                        if(confirm('Confirma Concluir com data de hoje ?')){
                           window.location.href = "<?php echo $this->_tpl_vars['request_uri']; ?>
&concluido=" + andamento_id ;
                        }
                     }
                     </script>

                  <tbody  id="listTbody">
                  <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['dados']):
?>
                  <?php $this->assign('item', $this->_tpl_vars['k']%2); ?>
                  <?php $this->assign('class', $this->_tpl_vars['displayOptions']['trClasses'][$this->_tpl_vars['item']]); ?>
                  <?php if ($this->_tpl_vars['dados']['hoje'] == $this->_tpl_vars['dados']['termino']): ?>
                     <?php $this->assign('class', 'hoje'); ?>
                  <?php endif; ?>
                  <tr
                  <?php if ($this->_tpl_vars['dados']['hoje'] == $this->_tpl_vars['dados']['termino']): ?>
                     class="hoje"
                  <?php else: ?>
                     class="<?php echo $this->_tpl_vars['class']; ?>
" onclick="javascript:changeTrStyle(this,'<?php echo $this->_tpl_vars['displayOptions']['trClasses'][$this->_tpl_vars['item']]; ?>
','<?php echo $this->_tpl_vars['displayOptions']['trClassSwitch']; ?>
')"
                  <?php endif; ?>
                  >
                     <td align="left"><?php echo $this->_tpl_vars['dados']['termino_data']; ?>
</TD>
                     <td align="left">
                        <?php if (! $this->_tpl_vars['dados']['conclusao_data']): ?>
                           <a onclick="javascript:if(confirm('Confirma Concluir com data de hoje?')){linkSubmit(Array('concluido','<?php echo $this->_tpl_vars['dados']['andamento_id']; ?>
'),'_self','<?php echo $this->_tpl_vars['request_uri']; ?>
','post','agendaList','list')}" href="#" style="color:gray" >Concluir</a>
                        <?php else: ?>
                           <?php echo $this->_tpl_vars['dados']['conclusao_data']; ?>

                        <?php endif; ?></TD>
                     <td align="left"><?php echo ((is_array($_tmp=$this->_tpl_vars['dados']['descricao'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 50, " ... ", true) : smarty_modifier_truncate($_tmp, 50, " ... ", true)); ?>
</TD>
                     <td align="left"><?php echo $this->_tpl_vars['dados']['numero']; ?>
</TD>
                     <td align="left"><?php echo $this->_tpl_vars['dados']['nome']; ?>
</TD>
                     <td align="left"><?php echo $this->_tpl_vars['dados']['tipo']; ?>
</TD>
                     <td align="left"><?php echo $this->_tpl_vars['dados']['cliente']; ?>
</TD>
                     <td align="left"><?php echo $this->_tpl_vars['dados']['contraparte']; ?>
</TD>
                  </tr>
                  <?php endforeach; endif; unset($_from); ?>
                  </tbody>



               </table>
   </div>
</div>
<?php endif; ?>
<!-- ###########   LISTAS FIM  ################ -->
