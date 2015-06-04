{include file=$header}
<body>
   <h1>OUVIR</h1>
   {$jsValidationScript}
   <div align="center" id="form" >
   {$jsScript}
   <form {$formOptions} >
<table>


   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>15. Em qual(is) ambiente(s) voc� costuma ouvir m�sica com a presen�a da
Viola sendo executada ao vivo?*
               </div>
               <div class="dica">Dica: Marque com um X no primeiro espa�o todos os ambientes listados em que voc� ouve
Viola ao vivo. Marque quantos ambientes voc� quiser. No segundo espa�o marque com
n�meros aqueles ambientes mais frequentes. N�mero 1 para o ambiente mais freq�ente,
n�mero 2 para o segundo mais frequente e, assim por diante. Se faltou algum ambiente na lista
marque o item outro(s) e, em seguida, cite-o(s) abaixo, na pergunta Qual(is).
               </div>
            </div>
            <div class="resposta">
               <table >
                  <tr>
                     <td class="resposta">{$casa_html}{$casa_label}{$casa_error}</td>
                     <td>{$casa_posicao_html}{$casa_posicao_error}{$formErrorMessages.casa}</td>
                  </tr>
                  <tr>
                     <td class="resposta">{$amigo_html}{$amigo_label}{$amigo_error}</td>
                     <td>{$amigo_posicao_html}{$amigo_posicao_error}{$formErrorMessages.amigo}</td>
                  </tr>
                  <tr>
                     <td class="resposta">{$teatro_html}{$teatro_label}{$teatro_error}</td>
                     <td>{$teatro_posicao_html}{$teatro_posicao_error}{$formErrorMessages.teatro}</td>
                  </tr>
                  <tr>
                     <td class="resposta">{$festa_html}{$festa_label}{$festa_error}</td>
                     <td>{$festa_posicao_html}{$festa_posicao_error}{$formErrorMessages.festa}</td>
                  </tr>
                  <tr>
                     <td  class="resposta">{$bar_html}{$bar_label}{$bar_error}</td>
                     <td>{$bar_posicao_html}{$bar_posicao_error}{$formErrorMessages.bar}</td>
                  </tr>
                  <tr>
                     <td colspan="2"  class="resposta">{$outros_ambientes_label}{$outros_ambientes_html}{$outros_ambientes_error}</td>
                  </tr>
               </table>
            </div>
      </TD>
   </tr>




   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>16. Qual(is) meio(s) de comunica��o ou m�dia(s) mais utilizada(s) por voc�
para ouvir m�sica executada com a presen�a da Viola?
                  *
               </div>
               <div class="dica">Dica: Marque com um X no primeiro espa�o todos os meios listados que voc� utiliza para
ouvir m�sica. Marque quantos meios voc� quiser. No segundo espa�o marque com n�meros
aqueles meios que voc� mais utiliza. N�mero 1 para o meio mais utilizado. N�mero 2 para
o segundo mais utilizado e, assim por diante. Se faltou alguma m�dia na lista marque o item
outra(s) e, em seguida, cite-a(s) abaixo, na pergunta Qual(is).
               </div>
            </div>
            <div class="resposta">
               <table  >
                  <tr>
                  <tr>
                     <td  class="resposta">{$am_html}{$am_label}{$am_error}</td>
                     <td>{$am_posicao_html}{$am_posicao_error}{$formErrorMessages.am}</td>
                  </tr>
                  <tr>
                     <td  class="resposta">{$fm_html}{$fm_label}{$fm_error}</td>
                     <td>{$fm_posicao_html}{$fm_posicao_error}{$formErrorMessages.fm}</td>
                  </tr>
                  <tr>
                     <td  class="resposta">{$mp3_html}{$mp3_label}{$mp3_error}</td>
                     <td>{$mp3_posicao_html}{$mp3_posicao_error}{$formErrorMessages.mp3}</td>
                  </tr>
                  <tr>
                     <td  class="resposta">{$cd_html}{$cd_label}{$cd_error}</td>
                     <td>{$cd_posicao_html}{$cd_posicao_error}{$formErrorMessages.cd}</td>
                  </tr>
                  <tr>
                     <td  class="resposta">{$lp_html}{$lp_label}{$lp_error}</td>
                     <td>{$lp_posicao_html}{$lp_posicao_error}{$formErrorMessages.lp}</td>
                  </tr>
                  <tr>
                     <td  class="resposta">{$internet_html}{$internet_label}{$internet_error}</td>
                     <td>{$internet_posicao_html}{$internet_posicao_error}{$formErrorMessages.internet}</td>
                  </tr>
                  <tr>
                     <td  class="resposta">{$tv_html}{$tv_label}{$tv_error}</td>
                     <td>{$tv_posicao_html}{$tv_posicao_error}{$formErrorMessages.tv}</td>
                  </tr>
                  <tr>
                     <td  class="resposta">{$video_html}{$video_label}{$video_error}</td>
                     <td>{$video_posicao_html}{$video_posicao_error}{$formErrorMessages.video}</td>
                  </tr>
                  <tr>
                     <td  class="resposta">{$cinema_html}{$cinema_label}{$cinema_error}</td>
                     <td>{$cinema_posicao_html}{$cinema_posicao_error}{$formErrorMessages.cinema}</td>
                  </tr>
                  <tr>
                     <td colspan="2"  class="resposta">{$outros_meios_label}{$outros_meios_html}{$outros_meios_error}</td>
                  </tr>
               </table>
            </div>
      </TD>
   </tr>

   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>17. Em m�dia, quanto tempo voc� dedica por dia � escuta de m�sica executa
com a presen�a de Viola?
                  *
               </div>
               <div class="dica">Dica: Marque com um X a op��o mais pr�xima � sua realidade hoje em dia. Agora, nesta
resposta, tanto faz se a escuta � ao vivo ou atrav�s de alguma m�dia.
               </div>
            </div>
            <div class="resposta">
               <table >
                  <tr>
                     <td colspan="2" class="resposta">{$tempo_viola_html}{$tempo_viola_error}{$formErrorMessages.tempo_viola}</td>
                  </tr>
               </table>
            </div>
      </TD>
   </tr>




   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>18. Qual o tempo dedicado por voc� � escuta de m�sica executada com a
presen�a de Viola em rela��o aos outros g�neros de m�sica (rock, ax�, MPB,
etc.)?
                  *
               </div>
               <div class="dica">Dica: Marque com um X a op��o mais pr�xima � sua realidade hoje em dia. Aqui, tamb�m, n�o
importa se a escuta � ao vivo ou atrav�s de alguma m�dia ou meio de comunica��o.
               </div>
            </div>
            <div class="resposta">
               <table >
                  <tr>
                     <td colspan="2" class="resposta">{$tempo_outros_generos_html}{$tempo_outros_generos_error}{$formErrorMessages.tempo_outros_generos}</td>
                  </tr>
               </table>
            </div>
      </TD>
   </tr>


   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>19. Com que recursos voc� mant�m essa atividade de ouvir Viola?
               </div>
               <div class="dica">Dica: Responda se os custos envolvidos com esta a��o s�o bancados por voc�, por alguma
outra fonte ou se � uma atividade autosustentada, no sentido de gerar recursos pr�prios para
se manter ao longo do tempo.
               </div>
            </div>
            <div class="resposta">{$recursos_html}{$recursos_error}</div>
      </TD>
   </tr>


</table>






<table >
   <tr>
      <td valign="top"  class="resposta" colspan="6">
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
