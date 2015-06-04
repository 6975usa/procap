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

{s if $lists  s}
<div class="list"  id="list_display">

   <div id="listDiv" align="center" class="listDiv" >

	<div id="div-1">

      <div id="div-1aa"><a href="#">Mudar Período</a></div>

      <div id="div-1a">
         <form method="get" id="escolhe_data" >
            Dia:<input maxlength="10" name="dia" value="" id="dia" size="10" type="text">

            <input maxlength="10" name="dia_da_agenda" id="dia_da_agenda" value="{s $dia_da_agenda s}"  type="hidden">
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
                  <caption style="white-space: nowrap;"><h3>{s $listTitle s}</h3></caption>


                  <thead>
                  <tr class="{s $displayOptions.titleClass s}">
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
                           window.location.href = "{s $request_uri s}&concluido=" + andamento_id ;
                        }
                     }
                     </script>

                  <tbody  id="listTbody">
                  {s foreach from=$data key=k item=dados s}
                  {s assign var="item" value=$k%2  s}
                  {s assign var="class" value=$displayOptions.trClasses.$item  s}
                  {s if $dados.hoje eq $dados.termino s}
                     {s assign var="class" value=hoje  s}
                  {s /if s}
                  <tr
                  {s if $dados.hoje eq $dados.termino s}
                     class="hoje"
                  {s else s}
                     class="{s $class s}" onclick="javascript:changeTrStyle(this,'{s $displayOptions.trClasses.$item s}','{s $displayOptions.trClassSwitch s}')"
                  {s /if s}
                  >
                     <td align="left">{s $dados.termino_data s}</TD>
                     <td align="left">
                        {s if ! $dados.conclusao_data s}
                           <a onclick="javascript:if(confirm('Confirma Concluir com data de hoje?')){linkSubmit(Array('concluido','{s $dados.andamento_id s}'),'_self','{s $request_uri s}','post','agendaList','list')}" href="#" style="color:gray" >Concluir</a>
                        {s else s}
                           {s $dados.conclusao_data s}
                        {s /if s}</TD>
                     <td align="left">{s $dados.descricao|truncate:50:" ... ":true  s}</TD>
                     <td align="left">{s $dados.numero s}</TD>
                     <td align="left">{s $dados.nome s}</TD>
                     <td align="left">{s $dados.tipo s}</TD>
                     <td align="left">{s $dados.cliente s}</TD>
                     <td align="left">{s $dados.contraparte s}</TD>
                  </tr>
                  {s /foreach s}
                  </tbody>



               </table>
   </div>
</div>
{s /if s}
<!-- ###########   LISTAS FIM  ################ -->

