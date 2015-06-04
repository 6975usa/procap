                        <div class="art-layout-cell art-sidebar1">





	{s foreach from=$usermenu  key=level1  item=menu  s}
	{s if $level1 neq 'Sistemas' s}

                          <div class="art-block">
                              <div class="art-block-tl"></div>
                              <div class="art-block-tr"></div>
                              <div class="art-block-bl"></div>
                              <div class="art-block-br"></div>
                              <div class="art-block-tc"></div>
                              <div class="art-block-bc"></div>
                              <div class="art-block-cl"></div>

                              <div class="art-block-cr"></div>
                              <div class="art-block-cc"></div>
                              <div class="art-block-body">
                                          <div class="art-blockheader">
                                              <div class="l"></div>
                                              <div class="r"></div>
                                              <h3 class="t">{s $level1 s}</h3>
                                          </div>

                                          <div class="art-blockcontent">
                                              <div class="art-blockcontent-tl"></div>
                                              <div class="art-blockcontent-tr"></div>
                                              <div class="art-blockcontent-bl"></div>
                                              <div class="art-blockcontent-br"></div>
                                              <div class="art-blockcontent-tc"></div>
                                              <div class="art-blockcontent-bc"></div>
                                              <div class="art-blockcontent-cl"></div>
                                              <div class="art-blockcontent-cr"></div>

                                              <div class="art-blockcontent-cc"></div>
                                              <div class="art-blockcontent-body">

			   {s foreach from=$menu.submenus key=submenuname item=smenu  s}
   			   {s foreach from=$smenu key=submenuname item=ssmenu  s}
   				{s /foreach s}
				{s /foreach s}
			   {s foreach from=$menu.items  item=m  s}
                                                   <span class="art-button-wrapper">
                                                      <span class="art-button-l"> </span>
                                                      <span class="art-button-r"> </span>
                                                      <input type="submit" name="task_button" class="art-button" value="{s $m.name s}" onclick="window.location.href='{s $m.target s}'" />
                                                   </span>
				{s /foreach s}


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






<!--                                                <div class="art-layout-cell art-sidebar1">
                          <div class="art-block">
                              <div class="art-block-tl"></div>
                              <div class="art-block-tr"></div>
                              <div class="art-block-bl"></div>
                              <div class="art-block-br"></div>
                              <div class="art-block-tc"></div>
                              <div class="art-block-bc"></div>
                              <div class="art-block-cl"></div>

                              <div class="art-block-cr"></div>
                              <div class="art-block-cc"></div>
                              <div class="art-block-body">
                                          <div class="art-blockheader">
                                              <div class="l"></div>
                                              <div class="r"></div>
                                              <h3 class="t">Main Menu</h3>
                                          </div>

                                          <div class="art-blockcontent">
                                              <div class="art-blockcontent-tl"></div>
                                              <div class="art-blockcontent-tr"></div>
                                              <div class="art-blockcontent-bl"></div>
                                              <div class="art-blockcontent-br"></div>
                                              <div class="art-blockcontent-tc"></div>
                                              <div class="art-blockcontent-bc"></div>
                                              <div class="art-blockcontent-cl"></div>
                                              <div class="art-blockcontent-cr"></div>

                                              <div class="art-blockcontent-cc"></div>
                                              <div class="art-blockcontent-body">
                                                          <ul>
                                                           <li class="active"><a href="#"><span>Home</span></a></li>
                                                           <li class="parent"><a href="#"><span>Joomla! Overview</span></a></li>
                                                           <li><a href="#"><span>Joomla! License</span></a></li>
                                                           <li><a href="#"><span>More about Joomla!</span></a></li>

                                                           <li><a href="#"><span>FAQ</span></a></li>
                                                           <li><a href="#"><span>Hyperlink</span></a></li>
                                                           <li><a href="#" class="visited"><span>Visited link</span></a></li>
                                                           <li><a href="#" class="hover"><span>Hovered link</span></a></li>

                                                          </ul>

                                          		<div class="cleared"></div>
                                              </div>

                                          </div>
                          		<div class="cleared"></div>
                              </div>
                          </div>
                          <div class="art-block">
                              <div class="art-block-tl"></div>
                              <div class="art-block-tr"></div>
                              <div class="art-block-bl"></div>
                              <div class="art-block-br"></div>

                              <div class="art-block-tc"></div>
                              <div class="art-block-bc"></div>
                              <div class="art-block-cl"></div>
                              <div class="art-block-cr"></div>
                              <div class="art-block-cc"></div>
                              <div class="art-block-body">
                                          <div class="art-blockheader">
                                              <div class="l"></div>
                                              <div class="r"></div>

                                              <h3 class="t">Polls</h3>
                                          </div>
                                          <div class="art-blockcontent">
                                              <div class="art-blockcontent-tl"></div>
                                              <div class="art-blockcontent-tr"></div>
                                              <div class="art-blockcontent-bl"></div>
                                              <div class="art-blockcontent-br"></div>
                                              <div class="art-blockcontent-tc"></div>

                                              <div class="art-blockcontent-bc"></div>
                                              <div class="art-blockcontent-cl"></div>
                                              <div class="art-blockcontent-cr"></div>
                                              <div class="art-blockcontent-cc"></div>
                                              <div class="art-blockcontent-body">
                                                          <form action="index.php" method="post" name="form2">
                                                           <table width="95%" border="0" cellspacing="0" cellpadding="1" align="center" class="poll">
                                                            <thead>
                                                             <tr>

                                                              <td style="font-weight: bold;">Joomla! is used for?</td>
                                                             </tr>
                                                            </thead>
                                                            <tr>
                                                             <td align="center">
                                                              <table class="pollstableborder" cellspacing="0" cellpadding="0" border="0">
                                                               <tr>
                                                                <td class="sectiontableentry2" valign="top">

                                                                 <input type="radio" name="voteid" id="voteid1" value="1" alt="1" />
                                                                </td>
                                                                <td class="sectiontableentry2" valign="top">
                                                                 <label for="voteid1">Community Sites</label>
                                                                </td>
                                                               </tr>
                                                               <tr>
                                                                <td class="sectiontableentry1" valign="top">

                                                                 <input type="radio" name="voteid" id="voteid2" value="2" alt="2" />
                                                                </td>
                                                                <td class="sectiontableentry1" valign="top">
                                                                 <label for="voteid2">Public Brand Sites</label>
                                                                </td>
                                                               </tr>
                                                               <tr>
                                                                <td class="sectiontableentry2" valign="top">

                                                                 <input type="radio" name="voteid" id="voteid3" value="3" alt="3" />
                                                                </td>
                                                                <td class="sectiontableentry2" valign="top">
                                                                 <label for="voteid3">eCommerce</label>
                                                                </td>
                                                               </tr>
                                                               <tr>
                                                                <td class="sectiontableentry1" valign="top">

                                                                 <input type="radio" name="voteid" id="voteid4" value="4" alt="4" />
                                                                </td>
                                                                <td class="sectiontableentry1" valign="top">
                                                                 <label for="voteid4">Blogs</label>
                                                                </td>
                                                               </tr>
                                                               <tr>
                                                                <td class="sectiontableentry2" valign="top">

                                                                 <input type="radio" name="voteid" id="voteid5" value="5" alt="5" />
                                                                </td>
                                                                <td class="sectiontableentry2" valign="top">
                                                                 <label for="voteid5">Intranets</label>
                                                                </td>
                                                               </tr>
                                                               <tr>
                                                                <td class="sectiontableentry1" valign="top">

                                                                 <input type="radio" name="voteid" id="voteid6" value="6" alt="6" />
                                                                </td>
                                                                <td class="sectiontableentry1" valign="top">
                                                                 <label for="voteid6">Photo and Media Sites</label>
                                                                </td>
                                                               </tr>
                                                               <tr>
                                                                <td class="sectiontableentry2" valign="top">

                                                                 <input type="radio" name="voteid" id="voteid7" value="7" alt="7" />
                                                                </td>
                                                                <td class="sectiontableentry2" valign="top">
                                                                 <label for="voteid7">All of the Above!</label>
                                                                </td>
                                                               </tr>
                                                              </table>
                                                             </td>

                                                            </tr>
                                                            <tr>
                                                             <td>
                                                              <div align="center">
                                                               <span class="art-button-wrapper">
                                                                <span class="art-button-l"> </span>
                                                                <span class="art-button-r"> </span>
                                                                <input type="submit" name="task_button" class="art-button" value="Vote" />

                                                               </span>&nbsp;
                                                               <span class="art-button-wrapper">
                                                                <span class="art-button-l"> </span>
                                                                <span class="art-button-r"> </span>
                                                                <input type="button" name="option" class="art-button" value="Results" />
                                                               </span>
                                                              </div>
                                                             </td>

                                                            </tr>
                                                           </table>
                                                          </form>

                                          		<div class="cleared"></div>
                                              </div>
                                          </div>
                          		<div class="cleared"></div>
                              </div>
                          </div>

                          <div class="art-block">
                              <div class="art-block-tl"></div>
                              <div class="art-block-tr"></div>
                              <div class="art-block-bl"></div>
                              <div class="art-block-br"></div>
                              <div class="art-block-tc"></div>
                              <div class="art-block-bc"></div>
                              <div class="art-block-cl"></div>
                              <div class="art-block-cr"></div>

                              <div class="art-block-cc"></div>
                              <div class="art-block-body">
                                          <div class="art-blockheader">
                                              <div class="l"></div>
                                              <div class="r"></div>
                                              <h3 class="t">Key Concepts</h3>
                                          </div>
                                          <div class="art-blockcontent">

                                              <div class="art-blockcontent-tl"></div>
                                              <div class="art-blockcontent-tr"></div>
                                              <div class="art-blockcontent-bl"></div>
                                              <div class="art-blockcontent-br"></div>
                                              <div class="art-blockcontent-tc"></div>
                                              <div class="art-blockcontent-bc"></div>
                                              <div class="art-blockcontent-cl"></div>
                                              <div class="art-blockcontent-cr"></div>
                                              <div class="art-blockcontent-cc"></div>

                                              <div class="art-blockcontent-body">
                                                          <ul>
                                                           <li><a href="#"><span>Extensions</span></a></li>
                                                           <li><a href="#"><span>Content Layouts</span></a></li>
                                                           <li><a href="#"><span>Example Pages</span></a></li>
                                                          </ul>

                                          		<div class="cleared"></div>

                                              </div>
                                          </div>
                          		<div class="cleared"></div>
                              </div>
                          </div>
                          <div class="art-block">
                              <div class="art-block-tl"></div>
                              <div class="art-block-tr"></div>
                              <div class="art-block-bl"></div>

                              <div class="art-block-br"></div>
                              <div class="art-block-tc"></div>
                              <div class="art-block-bc"></div>
                              <div class="art-block-cl"></div>
                              <div class="art-block-cr"></div>
                              <div class="art-block-cc"></div>
                              <div class="art-block-body">
                                          <div class="art-blockheader">
                                              <div class="l"></div>

                                              <div class="r"></div>
                                              <h3 class="t">Who's Online</h3>
                                          </div>
                                          <div class="art-blockcontent">
                                              <div class="art-blockcontent-tl"></div>
                                              <div class="art-blockcontent-tr"></div>
                                              <div class="art-blockcontent-bl"></div>
                                              <div class="art-blockcontent-br"></div>

                                              <div class="art-blockcontent-tc"></div>
                                              <div class="art-blockcontent-bc"></div>
                                              <div class="art-blockcontent-cl"></div>
                                              <div class="art-blockcontent-cr"></div>
                                              <div class="art-blockcontent-cc"></div>
                                              <div class="art-blockcontent-body">
                                                          We have&nbsp;1 guest&nbsp;online

                                          		<div class="cleared"></div>

                                              </div>
                                          </div>
                          		<div class="cleared"></div>
                              </div>
                          </div>
                          <div class="art-block">
                              <div class="art-block-tl"></div>
                              <div class="art-block-tr"></div>
                              <div class="art-block-bl"></div>

                              <div class="art-block-br"></div>
                              <div class="art-block-tc"></div>
                              <div class="art-block-bc"></div>
                              <div class="art-block-cl"></div>
                              <div class="art-block-cr"></div>
                              <div class="art-block-cc"></div>
                              <div class="art-block-body">
                                          <div class="art-blockheader">
                                              <div class="l"></div>

                                              <div class="r"></div>
                                              <h3 class="t">Login Form</h3>
                                          </div>
                                          <div class="art-blockcontent">
                                              <div class="art-blockcontent-tl"></div>
                                              <div class="art-blockcontent-tr"></div>
                                              <div class="art-blockcontent-bl"></div>
                                              <div class="art-blockcontent-br"></div>

                                              <div class="art-blockcontent-tc"></div>
                                              <div class="art-blockcontent-bc"></div>
                                              <div class="art-blockcontent-cl"></div>
                                              <div class="art-blockcontent-cr"></div>
                                              <div class="art-blockcontent-cc"></div>
                                              <div class="art-blockcontent-body">
                                                          <form action="#" method="post" name="login" id="form-login" >
                                                           <fieldset class="input">
                                                            <p id="form-login-username">

                                                             <label for="modlgn_username">Username</label><br />
                                                             <input id="modlgn_username" type="text" name="username" class="inputbox" alt="username" size="18" />
                                                            </p>
                                                            <p id="form-login-password">
                                                             <label for="modlgn_passwd">Password</label><br />
                                                             <input id="modlgn_passwd" type="password" name="passwd" class="inputbox" size="18" alt="password" />
                                                            </p>
                                                            <p id="form-login-remember">

                                                             <label for="modlgn_remember">Remember Me</label>
                                                             <input id="modlgn_remember" type="checkbox" name="remember" class="inputbox" value="yes" alt="Remember Me" />
                                                            </p>
                                                          	<span class="art-button-wrapper">
                                                          		<span class="art-button-l"> </span>
                                                          		<span class="art-button-r"> </span>
                                                          		<input type="submit" name="Submit" class="art-button" value="Login" />

                                                          	</span>
                                                           </fieldset>
                                                           <ul>
                                                            <li><a href="#">Forgot your password?</a></li>
                                                            <li><a href="#">Forgot your username?</a></li>
                                                            <li><a href="#">Create an account</a></li>
                                                           </ul>

                                                          </form>

                                          		<div class="cleared"></div>
                                              </div>
                                          </div>
                          		<div class="cleared"></div>
                              </div>
                          </div>
                          <div class="art-block">
                              <div class="art-block-tl"></div>

                              <div class="art-block-tr"></div>
                              <div class="art-block-bl"></div>
                              <div class="art-block-br"></div>
                              <div class="art-block-tc"></div>
                              <div class="art-block-bc"></div>
                              <div class="art-block-cl"></div>
                              <div class="art-block-cr"></div>
                              <div class="art-block-cc"></div>
                              <div class="art-block-body">

                                          <div class="art-blockheader">
                                              <div class="l"></div>
                                              <div class="r"></div>
                                              <h3 class="t">Advertisement</h3>
                                          </div>
                                          <div class="art-blockcontent">
                                              <div class="art-blockcontent-tl"></div>
                                              <div class="art-blockcontent-tr"></div>

                                              <div class="art-blockcontent-bl"></div>
                                              <div class="art-blockcontent-br"></div>
                                              <div class="art-blockcontent-tc"></div>
                                              <div class="art-blockcontent-bc"></div>
                                              <div class="art-blockcontent-cl"></div>
                                              <div class="art-blockcontent-cr"></div>
                                              <div class="art-blockcontent-cc"></div>
                                              <div class="art-blockcontent-body">
                                                          <div class="bannergroup_text">

                                                           <div class="bannerheader">Featured Links:</div>
                                                           <div class="banneritem_text"><a href="/Joomla-1.5/index.php?option=com_banners&amp;task=click&amp;bid=3" target="_blank">Joomla!</a><br />
                                                           Joomla! The most popular and widely used Open Source CMS Project in the world.<div class="clr"></div></div>
                                                           <div class="banneritem_text"><a href="/Joomla-1.5/index.php?option=com_banners&amp;task=click&amp;bid=4" target="_blank">JoomlaCode</a><br />
                                                           JoomlaCode, development and distribution made easy.<div class="clr"></div></div>
                                                           <div class="banneritem_text"><a href="/Joomla-1.5/index.php?option=com_banners&amp;task=click&amp;bid=5" target="_blank">Joomla! Extensions</a><br />

                                                           Joomla! Components, Modules, Plugins and Languages by the bucket load.<div class="clr"></div></div>
                                                           <div class="banneritem_text"><a href="/Joomla-1.5/index.php?option=com_banners&amp;task=click&amp;bid=6" target="_blank">Joomla! Shop</a><br />
                                                           For all your Joomla! merchandise.<div class="clr"></div></div>
                                                           <div class="bannerfooter_text"><a href="http://www.joomla.org">Ads by Joomla!</a></div>
                                                          </div>

                                          		<div class="cleared"></div>
                                              </div>

                                          </div>
                          		<div class="cleared"></div>
                              </div>
                          </div>
                          <div class="cleared"></div>
                        </div>

                        -->