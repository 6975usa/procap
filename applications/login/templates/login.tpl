{s include file=$header s}

<div class="art-content-layout">
  <div class="art-content-layout-row">

  <!--s include file=$leftmenu s-->

      <div class="art-layout-cell art-content">

         <!--      primeiro bloco INICIO-->
         <div class="art-post">
            <div class="art-post-body">
               <div class="art-post-inner art-article">
                  <h2 class="art-postheader"></h2>
                  <div class="art-postheadericons art-metadata-icons"></div>
                  <div class="art-postcontent">
                  </div>
                  <div class="cleared"></div>
                  <div class="art-postfootericons art-metadata-icons"></div>
               </div>
               <div class="cleared"></div>
            </div>
         </div>
         <div class="cleared"></div>
         <!--      primeiro bloco FINAL-->


         <!--segundo bloco INICIO-->
         <div class="art-post">
            <div class="art-post-body">

                                    <center>
                                    {s foreach from=$messages.success item=message  s}
                                       <div id="showMessage" class="successMessage">{s $message s}</div>
                                    {s /foreach s}
                                    {s foreach from=$messages.error item=message  s}
                                       <div id="showMessage" class="errorMessage">{s $message s}</div>
                                    {s /foreach s}
                                    </center>


                                    <!--inicio-->
                                       <center>
                                          <div class="login">
                                          <table class="geral">
                                             <tr >
                                                <td>
                                             <fieldset class="interno"><legend>Login</legend>
                                                <form {s $formOptions s} >
                                                   {s $jsValidationScript s}
                                                   <table class="geral" >
                                                      <tr><td rowspan="5" colspan="3"><img src="{s $static_url s}/login/images/login.jpg" width="50%" height="50%"></td></tr>
                                                      <tr><td>{s $office_label s}{s $office_required s} </td><td>{s $office_html s}<span class="error">{s $office_error s}</span>{s $formErrorMessages.office s}<br></td></tr>
                                                      <tr><td>{s $name_label s}{s $name_required s} </td><td>{s $name_html s}<span class="error">{s $name_error s}{s $formErrorMessages.name s}</span><br></td></tr>
                                                      <tr><td> {s $password_label s}{s $password_required s}</td><td>{s $password_html s}<span class="error">{s $password_error s}{s $formErrorMessages.password s}</span><br></td></tr>
                                                      <tr><td> </td><td>
                                                  <p>{s $requiredNote s}</p>
                                                   <br><p>{s $MM_insert_html s}</p></td></tr>
                                                   </table>

                                                </form>
                                             </fieldset>
                                          </td></tr></table>
                                          </div>
                                       </center>
                                       <!--fim-->



               <div class="art-post-inner art-article">
                  <h2 class="art-postheader"></h2>
                  <div class="art-postheadericons art-metadata-icons"></div>
                  <div class="art-postcontent">
                  </div>
                  <div class="cleared"></div>
                  <div class="art-postfootericons art-metadata-icons"></div>
               </div>
               <div class="cleared"></div>
            </div>
         </div>
         <div class="cleared"></div>
         <!--segundo bloco FINAL-->

      </div>
   </div>
</div>
<div class="cleared"></div>
</center>

{s include file=$footer s}










