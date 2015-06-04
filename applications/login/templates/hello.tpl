{s include file=$header s}

<div class="art-content-layout">
  <div class="art-content-layout-row">

  <!--s include file=$leftmenu s-->

      <div class="art-layout-cell art-content">

         <!--      primeiro bloco INICIO-->
         <div class="art-post">
            <div class="art-post-body">
               <div class="art-post-inner art-article">


                                    {s foreach from=$messages.success item=message  s}
                                       <div id="showMessage" class="successMessage">{s $message s}</div>
                                    {s /foreach s}
                                    {s foreach from=$messages.error item=message  s}
                                       <div id="showMessage" class="errorMessage">{s $message s}</div>
                                    {s /foreach s}



                                    <!--inicio-->
                                       <center>
                                          <div class="login">
                                          <table class="geral">
                                             <tr >
                                                <td>
                                             <fieldset class="interno"><legend>Escolha o Sistema</legend>
                                                <form {s $formOptions s} >
                                                   {s $jsValidationScript s}
                                                   <table class="geral" >
                                                      <tr><td rowspan="5" colspan="3"><img src="{s $static_url s}/login/images/sistemas.jpg"  border="0" ></td></tr>
                                                      <tr><td><select ></select></td><td></td></tr>
                                                      <tr><td></td><td></td></tr>
                                                      <tr><td></td><td></td></tr>
                                                   </table>

                                                </form>
                                             </fieldset>
                                          </td></tr></table>
                                          </div>
                                       </center>
                                       <!--fim-->

                  <h2 class="art-postheader"></h2>
                  <div class="art-postheadericons art-metadata-icons"></div>
                  <div class="art-postcontent"></div>
                  <div class="cleared"></div>
                  <div class="art-postfootericons art-metadata-icons"></div>
               </div>
               <div class="cleared"></div>
            </div>
         </div>
         <div class="cleared"></div>
         <!--      primeiro bloco FINAL-->

      </div>
   </div>
</div>
<div class="cleared"></div>
</center>

{s include file=$footer s}










