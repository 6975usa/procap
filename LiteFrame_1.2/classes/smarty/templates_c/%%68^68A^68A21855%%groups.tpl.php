<?php /* Smarty version 2.6.19, created on 2011-09-15 23:10:17
         compiled from /var/www/procap/LiteFrame_1.2/config/custom/../../../../procap/applications/admin/templates/groups.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['header'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['menu'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="art-content-layout">
  <div class="art-content-layout-row">
<!--      s include file=$leftmenu s-->
      <div class="art-layout-cell art-content">

         <!--      primeiro bloco INICIO-->
         <div class="art-post">
            <div class="art-post-body">
               <div class="art-post-inner art-article">
                  <center><h3>Grupos</h3></center>
                  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['groupsList'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['groupsForm'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['footer'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>









