<!-- ###########    FORMULARIO COMECO  ################ -->
<div class="form">

{s $jqueryInputMaskScript s}

   {s $jsValidationScript s}
   <div align="center" id="form" >
      {s $jsScript s}
      <form {s $formOptions s} >
      {s $codigo_html s}


      <center>
         {s foreach from=$messages.success item=message  s}
            <div id="showMessage" class="successMessage">{s $message s}</div>
         {s /foreach s}
         {s foreach from=$messages.error item=message  s}
            <div id="showMessage" class="errorMessage">{s $message s}</div>
         {s /foreach s}

         <table >
            <tr>
               <td>
                  {s $MM_insert_html s}{s $MM_update_html s}&nbsp;&nbsp;&nbsp;{s $MM_delete_html s}&nbsp;&nbsp;&nbsp;{s $MM_new_html s}
            </tr>
         </table>
      </center>

<table class="formTable">
   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>1. Qual é o seu nome?{s $nome_required s}</div>
               <div class="dica">
                  Dica: Responda o nome completo exatamente como ele aparece nos documentos oficiais de
               identidade (Certidão de Nascimento, Carteira de Identidade, Carteira Nacional de Habilitaçã,
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
                  Dica: Diga qual é o nome pelo qual você é mais identificado. Se tiver mais de um nome artístico ou
                  apelido, cite todos. E, se você achar importante, diga algo sobre o significado ou a história desse
                  nome. Se for conhecido apenas pelo seu nome original, ou parte dele, escreva-o de novo neste
                  espaço.
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
                  Dica: Diga em que municópio você nasceu, o estado onde ele se localiza e o paós de origem.

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
               <div class='pergunta'>4. Qual a naturalidade de seus pais ó avós?{s $avos_naturalidade_required s}
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
               <div class="dica">Dica: Responda se hó a ocorróncia de mósicos nas matrizes de sua famólia, especialmente os
dedicados ó Viola.
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
               6. Em que dia, mós e ano vocó nasceu?
                  {s $nascimento_required s}
               </div>
               <div class="dica">
               Dica: Aqui, diga a data completa do seu nascimento.
               </div>
            </div>
            <div class="resposta">
               {s $nascimento_html s}{s $nascimento_error s}
            </div>
      </TD>
   </tr>

   <tr class="blocoPergunta">
      <TD>
            <div class="perguntaDica">
               <div class='pergunta'>
                  7. Qual ó seu nómero de identidade?
                  {s $identidade_required s}
               </div>
               <div class="dica">
                  Dica: Informar o nómero da Carteira de Identidade ou Registro Geral (RG). Diga, tambóm, que
órgóo emitiu o documento (p. ex.: SSP-SP ? Secretaria de Seguranóa Póblica do Estado de
Sóo Paulo).
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
               8. Vocó ó filiado(a) ó Ordem dos Mósicos do Brasil (OMB) ou outras entidades
profissionais ou representativas de classe?
                  {s $omb_required s}
               </div>
               <div class="dica">
               Dica: Informe seu nómero de registro nesta entidade se vocó for filiado a ela. Se nóo for, diga
por quó. Diga tambóm se ó membro de alguma outra entidade profissional, como o Sindicato
de Artistas e Tócnicos em Espetóculos de Diversóes (SATED) do seu estado, associaóóo de
violeiros ou instituióóes similares.
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
               9. Indique endereóo(s) para correspondóncia.
                  {s $endereco_required s}
               </div>
               <div class="dica">
               Dica: Aqui, ó preciso indicar os dados completos do(s) endereóo(s). Lembre de incluir todas
as informaóóes importantes (Nome da rua, avenida, alameda ou estrada; Nome ou nómero
do pródio ou edifócio; Nómero da casa ou apartamento; Cidade; Estado; CEP). Pode ser o
endereóo da casa onde vocó mora ou de algum outro local de referóncia. Neste caso, sinalize
que o endereóo nóo ó seu de forma clara.
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
               10. Indique nómero(s) de telefone(s) para contato.
                  {s $telefones_required s}
               </div>
               <div class="dica">
               Dica: Vocó deve indicar o(s) nómero(s) comeóando pelo código da cidade (DDD) com, pelo
menos, dois dógitos, como, por exemplo: 31 ou 031 (Belo Horizonte), 62 ou 062 (Goiónia). Vocó
pode indicar quantos telefones quiser (residencial, celular, comercial, do cónjuge, dos filhos,
etc.). Tambóm ó preciso dizer se o nómero ó seu ou de alguóm conhecido, que anota seus
recados.
               </div>
            </div>
            <div class="resposta">
               <table>
               <tr>
                  <td>&nbsp;</td>
                  <td>DDD</td>
                  <td>Nómero</td>
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
               11. Indique endereóo(s) eletrónico(s) para contato.
                  {s $email1_required s}
               </div>
               <div class="dica">
               Dica: Quem usa a internet, geralmente, tem endereóo(s) eletrónico(s), conhecido(s) como e-
mail(s). Só ó preciso indicar esse(s) endereóo(s) se vocó utilizar com facilidade a Internet e
tiver um endereóo desses. Se nóo tiver, indique endereóo(s) de alguóm próximo que possa
lhe transmitir mensagens com facilidade. Se vocó nóo usa e-mail e nóo tiver ninguóm a quem
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
               12. Indique pógina(s) da internet onde existam informaóóes sobre vocó e seu
trabalho com Viola.
                  {s $paginas_internet_required s}
               </div>
               <div class="dica">
               Dica: Muitas pessoas que usam a internet para se comunicar possuem pógina(s) ou site(s),
blog(s) e perfis cadastrados em redes sociais (Voa Viola, Orkut, Facebook, Twitter, Myspace,
Flicker, etc.). Essa questóo só precisa ser respondida se vocó estiver representado em alguma
dessas póginas ou se alguóm fez uma matória sobre seu trabalho e publicou na internet. Caso
contrório, responda apenas: Nóo tenho informaóóes cadastradas na internet. Indique tambóm
se vocó usa servióos de voz por IP (VOIP), como o Skype, MSM ou outros.
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
               13. Para vocó, o que ó ser violeiro?
                  {s $ser_violeiro_required s}
               </div>
               <div class="dica">
               Dica: Defina da melhor maneira possóvel (musicalmente, filosoficamente, teoricamente,
poeticamente, anedoticamente, etc.) o que representa para vocó tocar/ouvir/viver Viola e
fazer parte deste universo simbólico, compartilhando desta expressóo cultural tóo antiga e tóo
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
               14. Quais as principais aóóes relacionadas ó Viola praticadas por vocó?
                  {s $ouvir_required s}
               </div>
               <div class="dica">
               Dica: Marque com um X no primeiro espaóo todas as atividades listadas que vocó pratica em
alguma medida, mesmo que pequena. Marque quantas atividades vocó quiser. No segundo
espaóo marque com nómeros aquelas atividades que vocó mais pratica. Nómero 1 para a
atividade mais praticada, nómero 2 para a segunda mais praticada e, assim por diante. Se
faltou alguma aóóo praticada por vocó na lista, marque o item outra(s), e, em seguida, cite-a(s)
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



   {s foreach from=$messages.success item=message  s}
      <div id="showMessage" class="successMessage">{s $message s}</div>
   {s /foreach s}
   {s foreach from=$messages.error item=message  s}
      <div id="showMessage" class="errorMessage">{s $message s}</div>
   {s /foreach s}

                                                  <blockquote><p>{s $requiredNote s}</p></blockquote>




<table >
   <tr>
      <td valign="top" align="left" colspan="6">
         {s $MM_insert_html s}{s $MM_update_html s}&nbsp;&nbsp;&nbsp;{s $MM_delete_html s}&nbsp;&nbsp;&nbsp;{s $MM_new_html s}
         <br><br>
      </td>
   </tr>
</table>

   </form>
   </div>


<input type="hidden" id="jsContador" value="1" />
</div>
<!-- ###########    FORMULARIO FIM  ################ -->





