
{s include file=$header s}
<body>
   <center><h1>Formulário Validado</h1></center>
   {s $jsValidationScript s}
   <div align="center" id="form" >
   {s $jsScript s}
   <form {s $formOptions s} >
<table>
   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>1. Qual é seu nome?{s $nome_required s}</div>
               <div class="dica">
                  Dica: Responda o nome completo exatamente como ele aparece nos documentos oficiais de
               identidade (Certidão de Nascimento, Carteira de Identidade, Carteira Nacional de Habilitação,
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
                  2. Qual(is) é(são) o(s) nome(s) artístico(s) ou apelido(s) através do(s) qual(is) você é conhecido pela(s) comunidade(s) violeira?{s $apelido_required s}
                  {s $apelido_required s}
               </div>
               <div class="dica">
                  Dica: Diga qual é o nome pelo qual você é mais identificado. Se tiver mais de um nome artístico ou apelido, cite todos. E, se você achar importante, diga algo sobre o significado ou a história desse nome. Se for conhecido apenas pelo seu nome original, ou parte dele, escreva-o de novo neste espaço.
               </div>
            </div>
            <div class="resposta">{s $apelido_html s}{s $apelido_error s}</div>
      </TD>
   </tr>


   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>
                  3. Qual é sua naturalidade?{s $naturalidade_required s}
               </div>
               <div class="dica">
                  Dica: Diga em que município você nasceu, o estado onde ele se localiza e o país de origem.

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
               <div class='pergunta'>4. Qual a naturalidade de seus pais é avós?{s $avos_naturalidade_required s}
               </div>
               <div class="dica">Dica: Diga em que município eles nasceram, os estados onde eles se localizam e os países de
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
               <div class='pergunta'>5. Seus antepassados diretos (pais e avós) toca(ou) Viola ou algum outro
instrumento?
               {s $avos_instrumentos_required s}
               </div>
               <div class="dica">Dica: Responda se há a ocorrência de músicos nas matrizes de sua família, especialmente os
dedicados à Viola.
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
               6. Em que dia, mês e ano você nasceu?
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
                  7. Qual é seu número de identidade?
                  {s $identidade_required s}
               </div>
               <div class="dica">
                  Dica: Informar o número da Carteira de Identidade ou Registro Geral (RG). Diga, também, que
órgão emitiu o documento (p. ex.: SSP-SP ? Secretaria de Segurança Pública do Estado de
São Paulo).
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
               8. Você é filiado(a) à Ordem dos Músicos do Brasil (OMB) ou outras entidades
profissionais ou representativas de classe?
                  {s $omb_required s}
               </div>
               <div class="dica">
               Dica: Informe seu número de registro nesta entidade se você for filiado a ela. Se não for, diga
por quê. Diga também se é membro de alguma outra entidade profissional, como o Sindicato
de Artistas e Técnicos em Espetáculos de Diversões (SATED) do seu estado, associação de
violeiros ou instituições similares.
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
               9. Indique endereço(s) para correspondência.
                  {s $endereco_required s}
               </div>
               <div class="dica">
               Dica: Aqui, é preciso indicar os dados completos do(s) endereço(s). Lembre de incluir todas
as informações importantes (Nome da rua, avenida, alameda ou estrada; Nome ou número
do prédio ou edifício; Número da casa ou apartamento; Cidade; Estado; CEP). Pode ser o
endereço da casa onde você mora ou de algum outro local de referência. Neste caso, sinalize
que o endereço não é seu de forma clara.
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
               10. Indique número(s) de telefone(s) para contato.
                  {s $telefones_required s}
               </div>
               <div class="dica">
               Dica: Você deve indicar o(s) número(s) começando pelo código da cidade (DDD) com, pelo
menos, dois dígitos, como, por exemplo: 31 ou 031 (Belo Horizonte), 62 ou 062 (Goiânia). Você
pode indicar quantos telefones quiser (residencial, celular, comercial, do cônjuge, dos filhos,
etc.). Também é preciso dizer se o número é seu ou de alguém conhecido, que anota seus
recados.
               </div>
            </div>
            <div class="resposta">
               <table>
               <tr>
                  <td>&nbsp;</td>
                  <td>DDD</td>
                  <td>Número</td>
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
               11. Indique endereço(s) eletrônico(s) para contato.
                  {s $email1_required s}
               </div>
               <div class="dica">
               Dica: Quem usa a internet, geralmente, tem endereço(s) eletrônico(s), conhecido(s) como e-
mail(s). Só é preciso indicar esse(s) endereço(s) se você utilizar com facilidade a Internet e
tiver um endereço desses. Se não tiver, indique endereço(s) de alguém próximo que possa
lhe transmitir mensagens com facilidade. Se você não usa e-mail e não tiver ninguém a quem
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
               12. Indique página(s) da internet onde existam informações sobre você e seu
trabalho com Viola.
                  {s $paginas_internet_required s}
               </div>
               <div class="dica">
               Dica: Muitas pessoas que usam a internet para se comunicar possuem página(s) ou site(s),
blog(s) e perfis cadastrados em redes sociais (Voa Viola, Orkut, Facebook, Twitter, Myspace,
Flicker, etc.). Essa questão só precisa ser respondida se você estiver representado em alguma
dessas páginas ou se alguém fez uma matéria sobre seu trabalho e publicou na internet. Caso
contrário, responda apenas: Não tenho informações cadastradas na internet. Indique também
se você usa serviços de voz por IP (VOIP), como o Skype, MSM ou outros.
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
               13. Para você, o que é ser violeiro?
                  {s $ser_violeiro_required s}
               </div>
               <div class="dica">
               Dica: Defina da melhor maneira possível (musicalmente, filosoficamente, teoricamente,
poeticamente, anedoticamente, etc.) o que representa para você tocar/ouvir/viver Viola e
fazer parte deste universo simbólico, compartilhando desta expressão cultural tão antiga e tão
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
               14. Quais as principais ações relacionadas à Viola praticadas por você?
                  {s $ouvir_required s}
               </div>
               <div class="dica">
               Dica: Marque com um X no primeiro espaço todas as atividades listadas que você pratica em
alguma medida, mesmo que pequena. Marque quantas atividades você quiser. No segundo
espaço marque com números aquelas atividades que você mais pratica. Número 1 para a
atividade mais praticada, número 2 para a segunda mais praticada e, assim por diante. Se
faltou alguma ação praticada por você na lista, marque o item outra(s), e, em seguida, cite-a(s)
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
