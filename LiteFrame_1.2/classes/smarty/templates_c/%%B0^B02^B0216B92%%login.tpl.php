<?php /* Smarty version 2.6.19, created on 2011-09-09 23:51:49
         compiled from /var/www/procap/LiteFrame_1.2/config/custom/../../../../procap/applications/login/templates/login.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['header'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

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
                                    <?php $_from = $this->_tpl_vars['messages']['success']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['message']):
?>
                                       <div id="showMessage" class="successMessage"><?php echo $this->_tpl_vars['message']; ?>
</div>
                                    <?php endforeach; endif; unset($_from); ?>
                                    <?php $_from = $this->_tpl_vars['messages']['error']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['message']):
?>
                                       <div id="showMessage" class="errorMessage"><?php echo $this->_tpl_vars['message']; ?>
</div>
                                    <?php endforeach; endif; unset($_from); ?>
                                    </center>


                                    <!--inicio-->
                                       <center>
                                          <div class="login">
                                          <table class="geral">
                                             <tr >
                                                <td>
                                             <fieldset class="interno"><legend>Login</legend>
                                                <form <?php echo $this->_tpl_vars['formOptions']; ?>
 >
                                                   <?php echo $this->_tpl_vars['jsValidationScript']; ?>

                                                   <table class="geral" >
                                                      <tr><td rowspan="5" colspan="3"><img src="<?php echo $this->_tpl_vars['static_url']; ?>
/login/images/login.jpg" width="50%" height="50%"></td></tr>
                                                      <tr><td><?php echo $this->_tpl_vars['office_label']; ?>
<?php echo $this->_tpl_vars['office_required']; ?>
 </td><td><?php echo $this->_tpl_vars['office_html']; ?>
<span class="error"><?php echo $this->_tpl_vars['office_error']; ?>
</span><?php echo $this->_tpl_vars['formErrorMessages']['office']; ?>
<br></td></tr>
                                                      <tr><td><?php echo $this->_tpl_vars['name_label']; ?>
<?php echo $this->_tpl_vars['name_required']; ?>
 </td><td><?php echo $this->_tpl_vars['name_html']; ?>
<span class="error"><?php echo $this->_tpl_vars['name_error']; ?>
<?php echo $this->_tpl_vars['formErrorMessages']['name']; ?>
</span><br></td></tr>
                                                      <tr><td> <?php echo $this->_tpl_vars['password_label']; ?>
<?php echo $this->_tpl_vars['password_required']; ?>
</td><td><?php echo $this->_tpl_vars['password_html']; ?>
<span class="error"><?php echo $this->_tpl_vars['password_error']; ?>
<?php echo $this->_tpl_vars['formErrorMessages']['password']; ?>
</span><br></td></tr>
                                                      <tr><td> </td><td>
                                                  <p><?php echo $this->_tpl_vars['requiredNote']; ?>
</p>
                                                   <br><p><?php echo $this->_tpl_vars['MM_insert_html']; ?>
</p></td></tr>
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

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['footer'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>









