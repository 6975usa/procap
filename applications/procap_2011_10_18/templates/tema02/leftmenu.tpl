                        <div class="art-layout-cell art-sidebar1">
                     	{s foreach from=$usermenu  key=level1  item=menu  s}
                     	{s if $level1 neq 'Sistemas' s}
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
                                              <h3 class="t">{s $level1 s}</h3>
                                          </div>
                                          <div class="art-vmenublockcontent">
                                              <div class="art-vmenublockcontent-body">
                                                          <ul class="art-vmenu">
                                                			   {s foreach from=$menu.submenus key=submenuname item=smenu  s}
                                                   			   {s foreach from=$smenu key=submenuname item=ssmenu  s}
                                                   				{s /foreach s}
                                                				{s /foreach s}
                                                			   {s foreach from=$menu.items  item=m  s}
                                                          	<li>
                                                          		<a href="{s $m.target s}"><span class="l"></span><span class="r"></span><span class="t">{s $m.name s}</span></a>
                                                          	</li>
                                                				{s /foreach s}
                                                          </ul>

                                          		<div class="cleared"></div>
                                              </div>
                                          </div>
                          		<div class="cleared"></div>
                              </div>
                          </div>
                        	{s /if s}
                        	{s /foreach s}
                          <div class="cleared"></div>
                        </div>








