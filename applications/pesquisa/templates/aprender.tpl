{include file=$header}
<body>
   {$jsValidationScript}
   <div align="center" id="form" >
   {$jsScript}
   <form {$formOptions} >
<table>


   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>20. Qual(is) �(s�o) ou foi(ram) seu(s) mestre(s) na arte de tocar Viola?
               {$mestres_required}
               </div>
               <div class="dica">Dica: Cite o nome de todos os seus professores, desde a inicia��o at� os est�gios mais
avan�ados. Diga tamb�m se voc� aprendeu com eles atrav�s de aulas particulares ou em
institui��es (conservat�rios, escolas, universidades, etc.). Vale tamb�m as situa��es de
aprendizado n�o formais, como bate papos, rodas, visitas �s casas dos foli�es e outros artistas
populares tradicionais. Se lembrar, indique os per�odos de tempo em que ficou trabalhando
com estes mestres. P. ex.: Roberto Corr�a (Escola de M�sica de Bras�lia) ? 2003 a 2006; Ivan
Vilela (USP) ? 2006 a 2009, etc.
               </div>
            </div>
            <div class="resposta">{$mestres_html}{$mestres_error}</div>
      </TD>
   </tr>


   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>21. Com quem ou onde voc� desejaria continuar seus estudos sobre a Viola?
               {$mestre_continua_estudo_required}
               </div>
               <div class="dica">Dica: Nesta resposta vale mais o sonho do que a realidade. Voc� pode responder pensando
nos pr�ximos passos concretos que queira e possa dar, mas tamb�m, indique as pessoas
e as institui��es de refer�ncia para voc� no ensino da Viola, independente se voc�, de fato,

conseguir� estudar com elas, pela dist�ncia, pelo custo, pelo tempo ou qualquer outro fator
limitante.
               </div>
            </div>
            <div class="resposta">{$mestre_continua_estudo_html}{$mestre_continua_estudo_error}</div>
      </TD>
   </tr>




   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>22. Quais as principais dificuldades enfrentadas por voc� no seu processo de
aprendizado?
               {$dificuldades_aprendizado_required}
               </div>
               <div class="dica">Dica: Relate em detalhe todas as car�ncias, problemas ou entraves que fizerem ou fazem com
que voc� n�o atinja o n�vel de aprendizado ideal para o toque da Viola como gostaria. Pode
ser a aus�ncia de institui��es, defici�ncia de professores, falta de material did�tico adequado,
custos associados � pr�tica da Viola, tempo de dedica��o exigido, enfim, todas as quest�es
que dificultam ou dificultaram sua trajet�ria como violeiro.
               </div>
            </div>
            <div class="resposta">{$dificuldades_aprendizado_html}{$dificuldades_aprendizado_error}</div>
      </TD>
   </tr>



   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>23. Em m�dia, quanto tempo voc� dedica � Viola?
               {$tempo_aprender_viola_required}
               </div>
               <div class="dica">Dica: Marque com um X a op��o mais pr�xima � sua realidade hoje em dia.
               </div>
            </div>
            <div class="resposta">
               <table >
                  <tr>
                     <td colspan="2" class="resposta">{$tempo_aprender_viola_html}{$tempo_aprender_viola_error}{$formErrorMessages.tempo_aprender_viola}</td>
                  </tr>
               </table>
            </div>
      </TD>
   </tr>




   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>24. Com que recursos voc� mant�m essa atividade de estudar Viola?
               {$recurso_aprender_viola_required}
               </div>
               <div class="dica">Dica: Responda se os custos envolvidos com esta a��o s�o bancados por voc�, por alguma
outra fonte ou se � uma atividade autosustentada, no sentido de gerar recursos pr�prios para
se manter ao longo do tempo.
               </div>
            </div>
            <div class="resposta">{$recurso_aprender_viola_html}{$recurso_aprender_viola_error}</div>
      </TD>
   </tr>



</table>






<table >
   <tr>
      <td valign="top" align="left" colspan="6">
         {foreach from=$messages.success item=message }
            <div id="showMessage" class="successMessage">{$message}</div>
         {/foreach}
         {foreach from=$messages.error item=message }
            <div id="showMessage" class="errorMessage">{$message}</div>
         {/foreach}
         {$MM_insert_html}{$MM_update_html}&nbsp;&nbsp;&nbsp;{$MM_delete_html}&nbsp;&nbsp;&nbsp;{$MM_new_html}
         <br><br>
      </td>
   </tr>
</table>

   </form>
   </div>



</html>
