<?php /* Smarty version 2.6.19, created on 2011-12-13 15:21:09
         compiled from /var/www/procap/LiteFrame_1.2/config/custom/../../../../procap/applications/procap/templates/tema03/leftmenu.tpl */ ?>
                        <div class="art-layout-cell art-sidebar1">
                     	<?php $_from = $this->_tpl_vars['usermenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['level1'] => $this->_tpl_vars['menu']):
?>
                     	<?php if ($this->_tpl_vars['level1'] != 'Sistemas'): ?>
                          <div class="art-vmenublock">
                              <div class="art-vmenublock-tl"></div>
                              <div class="art-vmenublock-tr"></div>
                              <div class="art-vmenublock-bl"></div>
                              <div class="art-vmenublock-br"></div>
                              <div class="art-vmenublock-tc"></div>
                              <div class="art-vmenublock-bc"></div>
                              <div class="art-vmenublock-cl"></div>
                              <div class="art-vmenublock-cr"></div>
                              <div class="art-vmenublock-cc"></div>
                              <div class="art-vmenublock-body">
                                          <div class="art-vmenublockheader">
                                              <h3 class="t"><?php echo $this->_tpl_vars['level1']; ?>
</h3>
                                          </div>
                                          <div class="art-vmenublockcontent">
                                              <div class="art-vmenublockcontent-body">
                                                          <ul class="art-vmenu">
                                                			   <?php $_from = $this->_tpl_vars['menu']['submenus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['submenuname'] => $this->_tpl_vars['smenu']):
?>
                                                   			   <?php $_from = $this->_tpl_vars['smenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['submenuname'] => $this->_tpl_vars['ssmenu']):
?>
                                                   				<?php endforeach; endif; unset($_from); ?>
                                                				<?php endforeach; endif; unset($_from); ?>
                                                			   <?php $_from = $this->_tpl_vars['menu']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['m']):
?>
                                                          	<li>
                                                          		<a href="<?php echo $this->_tpl_vars['m']['target']; ?>
"><span class="l"></span><span class="r"></span><span class="t"><?php echo $this->_tpl_vars['m']['name']; ?>
</span></a>
                                                          	</li>
                                                				<?php endforeach; endif; unset($_from); ?>
                                                          </ul>

                                          		<div class="cleared"></div>
                                              </div>
                                          </div>
                          		<div class="cleared"></div>
                              </div>
                          </div>
                        	<?php endif; ?>
                        	<?php endforeach; endif; unset($_from); ?>
                          <div class="cleared"></div>
                        </div>







