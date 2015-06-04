{s include file=$header s}
{s include file=$menu s}


<div class="art-content-layout">
  <div class="art-content-layout-row">
   {s include file=$leftmenu s}
      <div class="art-layout-cell art-content">

         <!--      primeiro bloco INICIO-->
         <div class="art-post">
            <div class="art-post-body">
               <div class="art-post-inner art-article">
                  {s include file=$_list s}
                  {s include file=$_form s}
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

      </div>
   </div>
</div>
<div class="cleared"></div>
</center>

{s include file=$footer s}








