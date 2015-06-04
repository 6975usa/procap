<?php /* Smarty version 2.6.19, created on 2011-12-13 15:21:09
         compiled from /var/www/procap/LiteFrame_1.2/config/custom/../../../../procap/applications/procap/templates/tema03/menu.tpl */ ?>
<div class="art-nav">
	<div class="l"></div>
	<div class="r"></div>
	<ul class="art-menu">

		<li>
			<a href="<?php echo $this->_tpl_vars['site_url']; ?>
/procap/default/"><span class="l"></span><span class="r"></span><span class="t">Home</span></a>
		</li>

	<?php $_from = $this->_tpl_vars['usermenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['level1'] => $this->_tpl_vars['menu']):
?>
	<?php if ($this->_tpl_vars['level1'] != 'Sistemas'): ?>
		<li>
			<a href="#"><span class="l"></span><span class="r"></span><span class="t"><?php echo $this->_tpl_vars['level1']; ?>
</span></a>
			<ul>
			   <?php $_from = $this->_tpl_vars['menu']['submenus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['submenuname'] => $this->_tpl_vars['smenu']):
?>
				<li><a href="#"><?php echo $this->_tpl_vars['submenuname']; ?>
</a>
      			<ul>
   			   <?php $_from = $this->_tpl_vars['smenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['submenuname'] => $this->_tpl_vars['ssmenu']):
?>
				     <li><a href="<?php echo $this->_tpl_vars['ssmenu']['target']; ?>
"><?php echo $this->_tpl_vars['ssmenu']['name']; ?>
</a></li>
   				<?php endforeach; endif; unset($_from); ?>
      			</ul>
				</li>
				<?php endforeach; endif; unset($_from); ?>

			   <?php $_from = $this->_tpl_vars['menu']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['m']):
?>
				<li><a href="<?php echo $this->_tpl_vars['m']['target']; ?>
"><?php echo $this->_tpl_vars['m']['name']; ?>
</a></li>
				<?php endforeach; endif; unset($_from); ?>
			</ul>
		</li>
	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>


		<li>
			<a href="<?php echo $this->_tpl_vars['site_url']; ?>
/login/logout"><span class="l"></span><span class="r"></span><span class="t">Sair</span></a>
		</li>

<!--
		<li>
			<a href="#"><span class="l"></span><span class="r"></span><span class="t">Outros Sistemas</span></a>
			<ul>
				<li><a href="<?php echo $this->_tpl_vars['site_url']; ?>
/procap/default/">Procap</a></li>
				<li><a href="<?php echo $this->_tpl_vars['site_url']; ?>
/pesquisa/default/">Pesquisa</a></li>
			</ul>
		</li>
		<li>
			<a href="<?php echo $this->_tpl_vars['site_url']; ?>
/login/logout"><span class="l"></span><span class="r"></span><span class="t">Sair</span></a>
		</li>

-->
	</ul>
</div>