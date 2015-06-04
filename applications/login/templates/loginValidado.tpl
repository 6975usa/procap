{include file=$header}
<body>
   <center><h1>Formul�rio Validado</h1></center>
   {$jsValidationScript}
   <div align="center" id="form" >
   {$jsScript}
   <form {$formOptions} >
<table>
   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>1. Qual � seu nome?{$nome_required}</div>
               <div class="dica">
                  Dica: Responda o nome completo exatamente como ele aparece nos documentos oficiais de
               identidade (Certid�o de Nascimento, Carteira de Identidade, Carteira Nacional de Habilita��o,
               etc.).
               </div>
            </div>
            <div class="resposta">{$nome_html}{$nome_error}</div>
      </TD>
   </tr>

   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>
                  2. Qual(is) �(s�o) o(s) nome(s) art�stico(s) ou apelido(s) atrav�s do(s) qual(is) voc� � conhecido pela(s) comunidade(s) violeira?{$apelido_required}
                  {$apelido_required}
               </div>
               <div class="dica">
                  Dica: Diga qual � o nome pelo qual voc� � mais identificado. Se tiver mais de um nome art�stico ou apelido, cite todos. E, se voc� achar importante, diga algo sobre o significado ou a hist�ria desse nome. Se for conhecido apenas pelo seu nome original, ou parte dele, escreva-o de novo neste espa�o.
               </div>
            </div>
            <div class="resposta">{$apelido_html}{$apelido_error}</div>
      </TD>
   </tr>


   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>
                  3. Qual � sua naturalidade?{$naturalidade_required}
               </div>
               <div class="dica">
                  Dica: Diga em que munic�pio voc� nasceu, o estado onde ele se localiza e o pa�s de origem.

               </div>
            </div>
            <div class="resposta">
               {$naturalidade_html}{$naturalidade_error}{$formErrorMessages.naturalidade}
            </div>
      </TD>
   </tr>

   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>4. Qual a naturalidade de seus pais � av�s?{$avos_naturalidade_required}
               </div>
               <div class="dica">Dica: Diga em que munic�pio eles nasceram, os estados onde eles se localizam e os pa�ses de
origem.
               </div>
            </div>
            <div class="resposta">
               {$avos_naturalidade_html}{$avos_naturalidade_error}{$formErrorMessages.avos_naturalidade}
            </div>
      </TD>
   </tr>


   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>5. Seus antepassados diretos (pais e av�s) toca(ou) Viola ou algum outro
instrumento?
               {$avos_instrumentos_required}
               </div>
               <div class="dica">Dica: Responda se h� a ocorr�ncia de m�sicos nas matrizes de sua fam�lia, especialmente os
dedicados � Viola.
               </div>
            </div>
            <div class="resposta">
               {$avos_instrumentos_html}{$avos_instrumentos_error}
            </div>
      </TD>
   </tr>


   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>
               6. Em que dia, m�s e ano voc� nasceu?
                  {$nascimento_required}
               </div>
               <div class="dica">
               Dica: Aqui, diga a data completa do seu nascimento.
               </div>
            </div>
            <div class="resposta">
               {$nascimento_html}{$nascimento_error}
               <br><br>{$nascimento2_html}{$nascimento2_error}
            </div>
      </TD>
   </tr>

   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>
                  7. Qual � seu n�mero de identidade?
                  {$identidade_required}
               </div>
               <div class="dica">
                  Dica: Informar o n�mero da Carteira de Identidade ou Registro Geral (RG). Diga, tamb�m, que
�rg�o emitiu o documento (p. ex.: SSP-SP ? Secretaria de Seguran�a P�blica do Estado de
S�o Paulo).
               </div>
            </div>
            <div class="resposta">
               {$identidade_html}{$identidade_error}
            </div>
      </TD>
   </tr>

   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>
               8. Voc� � filiado(a) � Ordem dos M�sicos do Brasil (OMB) ou outras entidades
profissionais ou representativas de classe?
                  {$omb_required}
               </div>
               <div class="dica">
               Dica: Informe seu n�mero de registro nesta entidade se voc� for filiado a ela. Se n�o for, diga
por qu�. Diga tamb�m se � membro de alguma outra entidade profissional, como o Sindicato
de Artistas e T�cnicos em Espet�culos de Divers�es (SATED) do seu estado, associa��o de
violeiros ou institui��es similares.
               </div>
            </div>
            <div class="resposta">
               {$omb_html}{$omb_label}{$omb_error}
               <br>{$registro_entidade_label}<br>{$registro_entidade_html}{$registro_entidade_error}{$formErrorMessages.registro_entidade}
            </div>
      </TD>
   </tr>


   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>
               9. Indique endere�o(s) para correspond�ncia.
                  {$endereco_required}
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
               {$endereco1_label}<br>{$endereco1_html}{$endereco1_error}{$formErrorMessages.endereco1}
               <br><br>{$endereco2_label}<br>{$endereco2_html}{$endereco2_error}{$formErrorMessages.endereco2}
            </div>
      </TD>
   </tr>



   <tr class="blocoPergunta">
      <TD >
            <div class="perguntaDica">
               <div class='pergunta'>
               10. Indique n�mero(s) de telefone(s) para contato.
                  {$telefones_required}
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
                  <td>{$ddd_residencial_label}{$ddd_residencial_html}{$ddd_residencial_error}{$formErrorMessages.ddd_residencial}</td>
                  <td>{$telefone_residencial_label}{$telefone_residencial_html}{$telefone_residencial_error}{$formErrorMessages.telefone_residencial}</td>
               </tr>

               <tr>
                  <td>Comercial</td>
                  <td>{$ddd_comercial_label}{$ddd_comercial_html}{$ddd_comercial_error}{$formErrorMessages.ddd_comercial}</td>
                  <td>{$telefone_comercial_label}{$telefone_comercial_html}{$telefone_comercial_error}{$formErrorMessages.telefone_comercial}</td>
               </tr>

               <tr>
                  <td>Celular</td>
                  <td>{$ddd_celular_label}{$ddd_celular_html}{$ddd_celular_error}{$formErrorMessages.ddd_celular}</td>
                  <td>{$telefone_celular_label}{$telefone_celular_html}{$telefone_celular_error}{$formErrorMessages.telefone_celular}</td>
               </tr>
               <tr>
                  <td>Recado</td>
                  <td>{$ddd_recado_label}{$ddd_recado_html}{$ddd_recado_error}{$formErrorMessages.ddd_recado}</td>
                  <td>{$telefone_recado_label}{$telefone_recado_html}{$telefone_recado_error}{$formErrorMessages.telefone_recado}</td>
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
                  {$email1_required}
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
               E-mail:<br>{$email1_html}{$email1_error}
               <br><br>Outro E-mail:<br>{$email2_html}{$email2_error}
            </div>
      </TD>
   </tr>

   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>
               12. Indique p�gina(s) da internet onde existam informa��es sobre voc� e seu
trabalho com Viola.
                  {$paginas_internet_required}
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
            {$paginas_internet_html}{$paginas_internet_error}
            </div>
      </TD>
   </tr>

   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>
               13. Para voc�, o que � ser violeiro?
                  {$ser_violeiro_required}
               </div>
               <div class="dica">
               Dica: Defina da melhor maneira poss�vel (musicalmente, filosoficamente, teoricamente,
poeticamente, anedoticamente, etc.) o que representa para voc� tocar/ouvir/viver Viola e
fazer parte deste universo simb�lico, compartilhando desta express�o cultural t�o antiga e t�o
disseminada?
               </div>
            </div>
            <div class="resposta">
            {$ser_violeiro_html}{$ser_violeiro_error}

            </div>
      </TD>
   </tr>

   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>
               14. Quais as principais a��es relacionadas � Viola praticadas por voc�?
                  {$ouvir_required}
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
                     <td align="left" width="60%">{$ouvir_html}{$ouvir_label}{$ouvir_error}</td>
                     <td>{$ouvir_posicao_html}{$ouvir_posicao_error}{$formErrorMessages.ouvir}</td>
                  </tr>
                  <tr>
                     <td align="left">{$aprender_html}{$aprender_label}{$aprender_error}</td>
                     <td>{$aprender_posicao_html}{$aprender_posicao_error}{$formErrorMessages.aprender}</td>
                  </tr>
                  <tr>
                     <td align="left">{$tocar_html}{$tocar_label}{$tocar_error}</td>
                     <td>{$tocar_posicao_html}{$tocar_posicao_error}{$formErrorMessages.tocar}</td>
                  </tr>
                  <tr>
                     <td align="left">{$compor_html}{$compor_label}{$compor_error}</td>
                     <td>{$compor_posicao_html}{$compor_posicao_error}{$formErrorMessages.compor}</td>
                  </tr>
                  <tr>
                     <td align="left">{$ensinar_html}{$ensinar_label}{$ensinar_error}</td>
                     <td>{$ensinar_posicao_html}{$ensinar_posicao_error}{$formErrorMessages.ensinar}</td>
                  </tr>
                  <tr>
                     <td align="left">{$produzir_html}{$produzir_label}{$produzir_error}</td>
                     <td>{$produzir_posicao_html}{$produzir_posicao_error}{$formErrorMessages.produzir}</td>
                  </tr>
                  <tr>
                     <td align="left">{$elaborar_html}{$elaborar_label}{$elaborar_error}</td>
                     <td>{$elaborar_posicao_html}{$elaborar_posicao_error}{$formErrorMessages.elaborar}</td>
                  </tr>
                  <tr>
                     <td align="left">{$loginr_html}{$loginr_label}{$loginr_error}</td>
                     <td>{$loginr_posicao_html}{$loginr_posicao_error}{$formErrorMessages.loginr}</td>
                  </tr>
                  <tr>
                     <td align="left">{$divulgar_html}{$divulgar_label}{$divulgar_error}</td>
                     <td>{$divulgar_posicao_html}{$divulgar_posicao_error}{$formErrorMessages.divulgar}</td>
                  </tr>
                  <tr>
                     <td align="left">{$construir_html}{$construir_label}{$construir_error}</td>
                     <td>{$construir_posicao_html}{$construir_posicao_error}{$formErrorMessages.construir}</td>
                  </tr>
                  <tr>
                     <td align="left">{$vender_html}{$vender_label}{$vender_error}</td>
                     <td>{$vender_posicao_html}{$vender_posicao_error}{$formErrorMessages.vender}</td>
                  </tr>
                  <tr>
                     <td align="left">{$colecionar_html}{$colecionar_label}{$colecionar_error}</td>
                     <td>{$colecionar_posicao_html}{$colecionar_posicao_error}{$formErrorMessages.colecionar}</td>
                  </tr>
                  <tr>
                     <td align="left">{$gerir_html}{$gerir_label}{$gerir_error}</td>
                     <td>{$gerir_posicao_html}{$gerir_posicao_error}{$formErrorMessages.gerir}</td>
                  </tr>
                  <tr>
                     <td align="left">{$louvar_html}{$louvar_label}{$louvar_error}</td>
                     <td>{$louvar_posicao_html}{$louvar_posicao_error}{$formErrorMessages.louvar}</td>
                  </tr>
                  <tr>
                     <td colspan="2" align="left">{$outras_atividades_label}{$outras_atividades_html}{$outras_atividades_error}</td>
                  </tr>
               </table>
            </div>
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
         <br><br>
      </td>
   </tr>
</table>

   </form>
   </div>



</html>
