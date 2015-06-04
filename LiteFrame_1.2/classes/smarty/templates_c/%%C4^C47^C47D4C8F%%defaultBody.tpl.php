<?php /* Smarty version 2.6.19, created on 2011-12-13 15:21:19
         compiled from /var/www/procap/LiteFrame_1.2/config/custom/../../../../procap/applications/procap/templates/tema03/defaultBody.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>

   <title>Procap - Acompanhamento de Processos</title>
   <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />

   <meta name="description" content="Projeto" />
   <meta name="author" content="Anselmo S Ribeiro" />

   <link rel="stylesheet" href="<?php echo $this->_tpl_vars['static_url']; ?>
/procap/tema03/style.css" type="text/css" media="screen" />
   <!--[if IE 6]><link rel="stylesheet" href="<?php echo $this->_tpl_vars['static_url']; ?>
/procap/tema03/style.ie6.css" type="text/css" media="screen" /><![endif]-->
   <!--[if IE 7]><link rel="stylesheet" href="<?php echo $this->_tpl_vars['static_url']; ?>
/procap/tema03/style.ie7.css" type="text/css" media="screen" /><![endif]-->

   <link href='<?php echo $this->_tpl_vars['static_url']; ?>
/procap/tema03/css/azul.css' rel='stylesheet' type='text/css'>
   <link rel="stylesheet" href="<?php echo $this->_tpl_vars['static_url']; ?>
/procap/tema03/css/menu.css" type="text/css" media="screen" />



   <script type="text/javascript" src="<?php echo $this->_tpl_vars['static_url']; ?>
/procap/tema03/jquery.js"></script>
   <script type="text/javascript" src="<?php echo $this->_tpl_vars['static_url']; ?>
/procap/tema03/script.js"></script>
   <script language="javascript" type="text/javascript" src="<?php echo $this->_tpl_vars['static_url']; ?>
/framework/js/default.js"></script>
   <script language="javascript" type="text/javascript" src="<?php echo $this->_tpl_vars['static_url']; ?>
/framework/js/jquery.js"></script>
   <script language="javascript" type="text/javascript" src="<?php echo $this->_tpl_vars['static_url']; ?>
/framework/js/jquery.maskedinput-1.2.2.js"></script>

   <script language="javascript" type="text/javascript" src="<?php echo $this->_tpl_vars['static_url']; ?>
/framework/js/autoNumeric-1.6.2.js"></script>
   <script language="javascript" type="text/javascript" src="<?php echo $this->_tpl_vars['static_url']; ?>
/framework/js/autoLoader.js"></script>

   <script language="JavaScript" src="<?php echo $this->_tpl_vars['static_url']; ?>
/procap/tema01/js/tabcontent.js"></script>


   <script src="<?php echo $this->_tpl_vars['static_url']; ?>
/procap/tema03/js/SpryTabbedPanels.js" type="text/javascript"></script>
   <link href="<?php echo $this->_tpl_vars['static_url']; ?>
/procap/tema03/css/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />


</head>
<body>
<div id="art-page-background-middle-texture">
    <div id="art-page-background-glare">
        <div id="art-page-background-glare-image">
    <div id="art-main">
        <div class="art-sheet">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['menu'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <div class="art-sheet-tl"></div>
            <div class="art-sheet-tr"></div>
            <div class="art-sheet-bl"></div>
            <div class="art-sheet-br"></div>
            <div class="art-sheet-tc"></div>
            <div class="art-sheet-bc"></div>
            <div class="art-sheet-cl"></div>
            <div class="art-sheet-cr"></div>
            <div class="art-sheet-cc"></div>
            <div class="art-sheet-body">
                <div class="art-header">
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['welcomeTpl'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    <div class="art-header-center">
                        <div class="art-header-png"></div>
                    </div>

                </div>
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['leftmenu'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        <div class="art-layout-cell art-content">




                          <?php if ($this->_tpl_vars['lists'] || $this->_tpl_vars['forms']): ?>
                          <div class="art-post">
                              <div class="art-post-tl"></div>
                              <div class="art-post-tr"></div>
                              <div class="art-post-bl"></div>
                              <div class="art-post-br"></div>
                              <div class="art-post-tc"></div>
                              <div class="art-post-bc"></div>
                              <div class="art-post-cl"></div>
                              <div class="art-post-cr"></div>
                              <div class="art-post-cc"></div>
                              <div class="art-post-body">
                          <div class="art-post-inner art-article">
                              <?php if ($this->_tpl_vars['lists']): ?>
                                 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['_list'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                              <?php else: ?>
                                 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['_form'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                              <?php endif; ?>
                          </div>
                          		<div class="cleared"></div>
                              </div>
                          </div>
                          <div class="cleared"></div>
                          <?php endif; ?>




                          <?php if ($this->_tpl_vars['ultimosAndamentos']): ?>
                          <div class="art-post">
                              <div class="art-post-tl"></div>
                              <div class="art-post-tr"></div>
                              <div class="art-post-bl"></div>
                              <div class="art-post-br"></div>
                              <div class="art-post-tc"></div>
                              <div class="art-post-bc"></div>
                              <div class="art-post-cl"></div>
                              <div class="art-post-cr"></div>
                              <div class="art-post-cc"></div>
                              <div class="art-post-body">
                          <div class="art-post-inner art-article">
                                 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['ultimosAndamentos'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                          </div>
                          		<div class="cleared"></div>
                              </div>
                          </div>
                          <div class="cleared"></div>
                          <?php endif; ?>





                        </div>
                    </div>
                </div>
                <div class="cleared"></div>
                <div class="art-footer">
                    <div class="art-footer-body">
                        <div class="art-footer-text">
                            <p>Copyright &copy; 2011. PROCAP. All Rights Reserved.</p>
                        </div>
                		<div class="cleared"></div>
                    </div>
                </div>
        		<div class="cleared"></div>
            </div>
        </div>
        <div class="cleared"></div>
    </div>
        </div>
    </div>
    </div>



</body>
</html>
