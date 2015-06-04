<div class="art-nav">
	<div class="l"></div>
	<div class="r"></div>
	<ul class="art-menu">

		<li>
			<a href="{s $site_url s}/procap/default/"><span class="l"></span><span class="r"></span><span class="t">Home</span></a>
		</li>

	{s foreach from=$usermenu  key=level1  item=menu  s}
	{s if $level1 neq 'Sistemas' s}
		<li>
			<a href="#"><span class="l"></span><span class="r"></span><span class="t">{s $level1  s}</span></a>
			<ul>
			   {s foreach from=$menu.submenus key=submenuname item=smenu  s}
				<li><a href="#">{s $submenuname s}</a>
      			<ul>
   			   {s foreach from=$smenu key=submenuname item=ssmenu  s}
				     <li><a href="{s $ssmenu.target s}">{s $ssmenu.name s}</a></li>
   				{s /foreach s}
      			</ul>
				</li>
				{s /foreach s}

			   {s foreach from=$menu.items  item=m  s}
				<li><a href="{s $m.target s}">{s $m.name s}</a></li>
				{s /foreach s}
			</ul>
		</li>
	{s /if s}
	{s /foreach s}


		<li>
			<a href="{s $site_url s}/login/logout"><span class="l"></span><span class="r"></span><span class="t">Sair</span></a>
		</li>

<!--
		<li>
			<a href="#"><span class="l"></span><span class="r"></span><span class="t">Outros Sistemas</span></a>
			<ul>
				<li><a href="{s $site_url s}/procap/default/">Procap</a></li>
				<li><a href="{s $site_url s}/pesquisa/default/">Pesquisa</a></li>
			</ul>
		</li>
		<li>
			<a href="{s $site_url s}/login/logout"><span class="l"></span><span class="r"></span><span class="t">Sair</span></a>
		</li>

-->
	</ul>
</div>