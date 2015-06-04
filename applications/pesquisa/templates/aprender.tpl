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
               <div class='pergunta'>20. Qual(is) é(são) ou foi(ram) seu(s) mestre(s) na arte de tocar Viola?
               {$mestres_required}
               </div>
               <div class="dica">Dica: Cite o nome de todos os seus professores, desde a iniciação até os estágios mais
avançados. Diga também se você aprendeu com eles através de aulas particulares ou em
instituições (conservatórios, escolas, universidades, etc.). Vale também as situações de
aprendizado não formais, como bate papos, rodas, visitas às casas dos foliões e outros artistas
populares tradicionais. Se lembrar, indique os períodos de tempo em que ficou trabalhando
com estes mestres. P. ex.: Roberto Corrêa (Escola de Música de Brasília) ? 2003 a 2006; Ivan
Vilela (USP) ? 2006 a 2009, etc.
               </div>
            </div>
            <div class="resposta">{$mestres_html}{$mestres_error}</div>
      </TD>
   </tr>


   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>21. Com quem ou onde você desejaria continuar seus estudos sobre a Viola?
               {$mestre_continua_estudo_required}
               </div>
               <div class="dica">Dica: Nesta resposta vale mais o sonho do que a realidade. Você pode responder pensando
nos próximos passos concretos que queira e possa dar, mas também, indique as pessoas
e as instituições de referência para você no ensino da Viola, independente se você, de fato,

conseguirá estudar com elas, pela distância, pelo custo, pelo tempo ou qualquer outro fator
limitante.
               </div>
            </div>
            <div class="resposta">{$mestre_continua_estudo_html}{$mestre_continua_estudo_error}</div>
      </TD>
   </tr>




   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>22. Quais as principais dificuldades enfrentadas por você no seu processo de
aprendizado?
               {$dificuldades_aprendizado_required}
               </div>
               <div class="dica">Dica: Relate em detalhe todas as carências, problemas ou entraves que fizerem ou fazem com
que você não atinja o nível de aprendizado ideal para o toque da Viola como gostaria. Pode
ser a ausência de instituições, deficiência de professores, falta de material didático adequado,
custos associados à prática da Viola, tempo de dedicação exigido, enfim, todas as questões
que dificultam ou dificultaram sua trajetória como violeiro.
               </div>
            </div>
            <div class="resposta">{$dificuldades_aprendizado_html}{$dificuldades_aprendizado_error}</div>
      </TD>
   </tr>



   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>23. Em média, quanto tempo você dedica à Viola?
               {$tempo_aprender_viola_required}
               </div>
               <div class="dica">Dica: Marque com um X a opção mais próxima à sua realidade hoje em dia.
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
               <div class='pergunta'>24. Com que recursos você mantém essa atividade de estudar Viola?
               {$recurso_aprender_viola_required}
               </div>
               <div class="dica">Dica: Responda se os custos envolvidos com esta ação são bancados por você, por alguma
outra fonte ou se é uma atividade autosustentada, no sentido de gerar recursos próprios para
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
