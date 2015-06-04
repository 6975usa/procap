
{s include file=$header s}
<body>
   <center><h1>Formul�rio Validado</h1></center>
   {s $jsValidationScript s}
   <div align="center" id="form" >
   {s $jsScript s}
   <form {s $formOptions s} >
<table>
   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>1. Qual � seu nome?{s $nome_required s}</div>
               <div class="dica">
                  Dica: Responda o nome completo exatamente como ele aparece nos documentos oficiais de
               identidade (Certid�o de Nascimento, Carteira de Identidade, Carteira Nacional de Habilita��o,
               etc.).
               </div>
            </div>
            <div class="resposta">{s $nome_html s}{s $nome_error s}</div>
      </TD>
   </tr>

   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>
                  2. Qual(is) �(s�o) o(s) nome(s) art�stico(s) ou apelido(s) atrav�s do(s) qual(is) voc� � conhecido pela(s) comunidade(s) violeira?{s $apelido_required s}
                  {s $apelido_required s}
               </div>
               <div class="dica">
                  Dica: Diga qual � o nome pelo qual voc� � mais identificado. Se tiver mais de um nome art�stico ou apelido, cite todos. E, se voc� achar importante, diga algo sobre o significado ou a hist�ria desse nome. Se for conhecido apenas pelo seu nome original, ou parte dele, escreva-o de novo neste espa�o.
               </div>
            </div>
            <div class="resposta">{s $apelido_html s}{s $apelido_error s}</div>
      </TD>
   </tr>


   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>
                  3. Qual � sua naturalidade?{s $naturalidade_required s}
               </div>
               <div class="dica">
                  Dica: Diga em que munic�pio voc� nasceu, o estado onde ele se localiza e o pa�s de origem.

               </div>
            </div>
            <div class="resposta">
               {s $naturalidade_html s}{s $naturalidade_error s}{s $formErrorMessages.naturalidade s}
            </div>
      </TD>
   </tr>

   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>4. Qual a naturalidade de seus pais � av�s?{s $avos_naturalidade_required s}
               </div>
               <div class="dica">Dica: Diga em que munic�pio eles nasceram, os estados onde eles se localizam e os pa�ses de
origem.
               </div>
            </div>
            <div class="resposta">
               {s $avos_naturalidade_html s}{s $avos_naturalidade_error s}{s $formErrorMessages.avos_naturalidade s}
            </div>
      </TD>
   </tr>


   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>5. Seus antepassados diretos (pais e av�s) toca(ou) Viola ou algum outro
instrumento?
               {s $avos_instrumentos_required s}
               </div>
               <div class="dica">Dica: Responda se h� a ocorr�ncia de m�sicos nas matrizes de sua fam�lia, especialmente os
dedicados � Viola.
               </div>
            </div>
            <div class="resposta">
               {s $avos_instrumentos_html s}{s $avos_instrumentos_error s}
            </div>
      </TD>
   </tr>


   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>
               6. Em que dia, m�s e ano voc� nasceu?
                  {s $nascimento_required s}
               </div>
               <div class="dica">
               Dica: Aqui, diga a data completa do seu nascimento.
               </div>
            </div>
            <div class="resposta">
               {s $nascimento_html s}{s $nascimento_error s}
               <br><br>{s $nascimento2_html s}{s $nascimento2_error s}
            </div>
      </TD>
   </tr>

   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>
                  7. Qual � seu n�mero de identidade?
                  {s $identidade_required s}
               </div>
               <div class="dica">
                  Dica: Informar o n�mero da Carteira de Identidade ou Registro Geral (RG). Diga, tamb�m, que
�rg�o emitiu o documento (p. ex.: SSP-SP ? Secretaria de Seguran�a P�blica do Estado de
S�o Paulo).
               </div>
            </div>
            <div class="resposta">
               {s $identidade_html s}{s $identidade_error s}
            </div>
      </TD>
   </tr>

   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>
               8. Voc� � filiado(a) � Ordem dos M�sicos do Brasil (OMB) ou outras entidades
profissionais ou representativas de classe?
                  {s $omb_required s}
               </div>
               <div class="dica">
               Dica: Informe seu n�mero de registro nesta entidade se voc� for filiado a ela. Se n�o for, diga
por qu�. Diga tamb�m se � membro de alguma outra entidade profissional, como o Sindicato
de Artistas e T�cnicos em Espet�culos de Divers�es (SATED) do seu estado, associa��o de
violeiros ou institui��es similares.
               </div>
            </div>
            <div class="resposta">
               {s $omb_html s}{s $omb_label s}{s $omb_error s}
               <br>{s $registro_entidade_label s}<br>{s $registro_entidade_html s}{s $registro_entidade_error s}{s $formErrorMessages.registro_entidade s}
            </div>
      </TD>
   </tr>


   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>
               9. Indique endere�o(s) para correspond�ncia.
                  {s $endereco_required s}
               </div>
               <div class="dica">
               Dica: Aqui, � preciso indicar os dados completos do(s) endere�o(s). Lembre de incluir todas
as informa��es importantes (Nome da rua, avenida, alameda ou estrada; Nome ou n�mero
do pr�dio ou edif�cio; N�mero da casa ou apartamento; Cidade; Estado; CEP). Pode ser o
endere�o da casa onde voc� mora ou de algum outro local de refer�ncia. Neste caso, sinalize
que o endere�o n�o � seu de forma clara.
               </div>
            </div>
            <div class="resposta">
               {s $endereco1_label s}<br>{s $endereco1_html s}{s $endereco1_error s}{s $formErrorMessages.endereco1 s}
               <br><br>{s $endereco2_label s}<br>{s $endereco2_html s}{s $endereco2_error s}{s $formErrorMessages.endereco2 s}
            </div>
      </TD>
   </tr>



   <tr class="blocoPergunta">
      <TD >
            <div class="perguntaDica">
               <div class='pergunta'>
               10. Indique n�mero(s) de telefone(s) para contato.
                  {s $telefones_required s}
               </div>
               <div class="dica">
               Dica: Voc� deve indicar o(s) n�mero(s) come�ando pelo c�digo da cidade (DDD) com, pelo
menos, dois d�gitos, como, por exemplo: 31 ou 031 (Belo Horizonte), 62 ou 062 (Goi�nia). Voc�
pode indicar quantos telefones quiser (residencial, celular, comercial, do c�njuge, dos filhos,
etc.). Tamb�m � preciso dizer se o n�mero � seu ou de algu�m conhecido, que anota seus
recados.
               </div>
            </div>
            <div class="resposta">
               <table>
               <tr>
                  <td>&nbsp;</td>
                  <td>DDD</td>
                  <td>N�mero</td>
               </tr>
               <tr>
                  <td>Residencial</td>
                  <td>{s $ddd_residencial_label s}{s $ddd_residencial_html s}{s $ddd_residencial_error s}{s $formErrorMessages.ddd_residencial s}</td>
                  <td>{s $telefone_residencial_label s}{s $telefone_residencial_html s}{s $telefone_residencial_error s}{s $formErrorMessages.telefone_residencial s}</td>
               </tr>

               <tr>
                  <td>Comercial</td>
                  <td>{s $ddd_comercial_label s}{s $ddd_comercial_html s}{s $ddd_comercial_error s}{s $formErrorMessages.ddd_comercial s}</td>
                  <td>{s $telefone_comercial_label s}{s $telefone_comercial_html s}{s $telefone_comercial_error s}{s $formErrorMessages.telefone_comercial s}</td>
               </tr>

               <tr>
                  <td>Celular</td>
                  <td>{s $ddd_celular_label s}{s $ddd_celular_html s}{s $ddd_celular_error s}{s $formErrorMessages.ddd_celular s}</td>
                  <td>{s $telefone_celular_label s}{s $telefone_celular_html s}{s $telefone_celular_error s}{s $formErrorMessages.telefone_celular s}</td>
               </tr>
               <tr>
                  <td>Recado</td>
                  <td>{s $ddd_recado_label s}{s $ddd_recado_html s}{s $ddd_recado_error s}{s $formErrorMessages.ddd_recado s}</td>
                  <td>{s $telefone_recado_label s}{s $telefone_recado_html s}{s $telefone_recado_error s}{s $formErrorMessages.telefone_recado s}</td>
               </tr>
               </table>
            </div>
      </TD>
   </tr>



   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>
               11. Indique endere�o(s) eletr�nico(s) para contato.
                  {s $email1_required s}
               </div>
               <div class="dica">
               Dica: Quem usa a internet, geralmente, tem endere�o(s) eletr�nico(s), conhecido(s) como e-
mail(s). S� � preciso indicar esse(s) endere�o(s) se voc� utilizar com facilidade a Internet e
tiver um endere�o desses. Se n�o tiver, indique endere�o(s) de algu�m pr�ximo que possa
lhe transmitir mensagens com facilidade. Se voc� n�o usa e-mail e n�o tiver ningu�m a quem
possa pedir esse favor, deixe em branco.
               </div>
            </div>
            <div class="resposta">
               E-mail:<br>{s $email1_html s}{s $email1_error s}
               <br><br>Outro E-mail:<br>{s $email2_html s}{s $email2_error s}
            </div>
      </TD>
   </tr>

   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>
               12. Indique p�gina(s) da internet onde existam informa��es sobre voc� e seu
trabalho com Viola.
                  {s $paginas_internet_required s}
               </div>
               <div class="dica">
               Dica: Muitas pessoas que usam a internet para se comunicar possuem p�gina(s) ou site(s),
blog(s) e perfis cadastrados em redes sociais (Voa Viola, Orkut, Facebook, Twitter, Myspace,
Flicker, etc.). Essa quest�o s� precisa ser respondida se voc� estiver representado em alguma
dessas p�ginas ou se algu�m fez uma mat�ria sobre seu trabalho e publicou na internet. Caso
contr�rio, responda apenas: N�o tenho informa��es cadastradas na internet. Indique tamb�m
se voc� usa servi�os de voz por IP (VOIP), como o Skype, MSM ou outros.
               </div>
            </div>
            <div class="resposta">
            {s $paginas_internet_html s}{s $paginas_internet_error s}
            </div>
      </TD>
   </tr>

   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>
               13. Para voc�, o que � ser violeiro?
                  {s $ser_violeiro_required s}
               </div>
               <div class="dica">
               Dica: Defina da melhor maneira poss�vel (musicalmente, filosoficamente, teoricamente,
poeticamente, anedoticamente, etc.) o que representa para voc� tocar/ouvir/viver Viola e
fazer parte deste universo simb�lico, compartilhando desta express�o cultural t�o antiga e t�o
disseminada?
               </div>
            </div>
            <div class="resposta">
            {s $ser_violeiro_html s}{s $ser_violeiro_error s}

            </div>
      </TD>
   </tr>

   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>
               14. Quais as principais a��es relacionadas � Viola praticadas por voc�?
                  {s $ouvir_required s}
               </div>
               <div class="dica">
               Dica: Marque com um X no primeiro espa�o todas as atividades listadas que voc� pratica em
alguma medida, mesmo que pequena. Marque quantas atividades voc� quiser. No segundo
espa�o marque com n�meros aquelas atividades que voc� mais pratica. N�mero 1 para a
atividade mais praticada, n�mero 2 para a segunda mais praticada e, assim por diante. Se
faltou alguma a��o praticada por voc� na lista, marque o item outra(s), e, em seguida, cite-a(s)
abaixo, na pergunta Qual(is).
               </div>
            </div>
            <div class="resposta">
               <table >
                  <tr>
                     <td align="left" width="60%">{s $ouvir_html s}{s $ouvir_label s}{s $ouvir_error s}</td>
                     <td>{s $ouvir_posicao_html s}{s $ouvir_posicao_error s}{s $formErrorMessages.ouvir s}</td>
                  </tr>
                  <tr>
                     <td align="left">{s $aprender_html s}{s $aprender_label s}{s $aprender_error s}</td>
                     <td>{s $aprender_posicao_html s}{s $aprender_posicao_error s}{s $formErrorMessages.aprender s}</td>
                  </tr>
                  <tr>
                     <td align="left">{s $tocar_html s}{s $tocar_label s}{s $tocar_error s}</td>
                     <td>{s $tocar_posicao_html s}{s $tocar_posicao_error s}{s $formErrorMessages.tocar s}</td>
                  </tr>
                  <tr>
                     <td align="left">{s $compor_html s}{s $compor_label s}{s $compor_error s}</td>
                     <td>{s $compor_posicao_html s}{s $compor_posicao_error s}{s $formErrorMessages.compor s}</td>
                  </tr>
                  <tr>
                     <td align="left">{s $ensinar_html s}{s $ensinar_label s}{s $ensinar_error s}</td>
                     <td>{s $ensinar_posicao_html s}{s $ensinar_posicao_error s}{s $formErrorMessages.ensinar s}</td>
                  </tr>
                  <tr>
                     <td align="left">{s $produzir_html s}{s $produzir_label s}{s $produzir_error s}</td>
                     <td>{s $produzir_posicao_html s}{s $produzir_posicao_error s}{s $formErrorMessages.produzir s}</td>
                  </tr>
                  <tr>
                     <td align="left">{s $elaborar_html s}{s $elaborar_label s}{s $elaborar_error s}</td>
                     <td>{s $elaborar_posicao_html s}{s $elaborar_posicao_error s}{s $formErrorMessages.elaborar s}</td>
                  </tr>
                  <tr>
                     <td align="left">{s $pesquisar_html s}{s $pesquisar_label s}{s $pesquisar_error s}</td>
                     <td>{s $pesquisar_posicao_html s}{s $pesquisar_posicao_error s}{s $formErrorMessages.pesquisar s}</td>
                  </tr>
                  <tr>
                     <td align="left">{s $divulgar_html s}{s $divulgar_label s}{s $divulgar_error s}</td>
                     <td>{s $divulgar_posicao_html s}{s $divulgar_posicao_error s}{s $formErrorMessages.divulgar s}</td>
                  </tr>
                  <tr>
                     <td align="left">{s $construir_html s}{s $construir_label s}{s $construir_error s}</td>
                     <td>{s $construir_posicao_html s}{s $construir_posicao_error s}{s $formErrorMessages.construir s}</td>
                  </tr>
                  <tr>
                     <td align="left">{s $vender_html s}{s $vender_label s}{s $vender_error s}</td>
                     <td>{s $vender_posicao_html s}{s $vender_posicao_error s}{s $formErrorMessages.vender s}</td>
                  </tr>
                  <tr>
                     <td align="left">{s $colecionar_html s}{s $colecionar_label s}{s $colecionar_error s}</td>
                     <td>{s $colecionar_posicao_html s}{s $colecionar_posicao_error s}{s $formErrorMessages.colecionar s}</td>
                  </tr>
                  <tr>
                     <td align="left">{s $gerir_html s}{s $gerir_label s}{s $gerir_error s}</td>
                     <td>{s $gerir_posicao_html s}{s $gerir_posicao_error s}{s $formErrorMessages.gerir s}</td>
                  </tr>
                  <tr>
                     <td align="left">{s $louvar_html s}{s $louvar_label s}{s $louvar_error s}</td>
                     <td>{s $louvar_posicao_html s}{s $louvar_posicao_error s}{s $formErrorMessages.louvar s}</td>
                  </tr>
                  <tr>
                     <td colspan="2" align="left">{s $outras_atividades_label s}{s $outras_atividades_html s}{s $outras_atividades_error s}</td>
                  </tr>
               </table>
            </div>
      </TD>
   </tr>

</table>






<table >
   <tr>
      <td valign="top" align="left" colspan="6">
         {s foreach from=$messages.success item=message  s}
            <div id="showMessage" class="successMessage">{s $message s}</div>
         {s /foreach s}
         {s foreach from=$messages.error item=message  s}
            <div id="showMessage" class="errorMessage">{s $message s}</div>
         {s /foreach s}
         <br><br>
      </td>
   </tr>
</table>

   </form>
   </div>



</html>
