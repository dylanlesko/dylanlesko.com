{if $newson eq 2}<div id="zannounc">{$newstext}</div>{/if}
{if isset($customheader) and $customheader neq '0'}<div>{$customheader|htmlspecialchars_decode|stripslashes}</div>{/if}
<div id="header">
<div id="logo"><a href="{$sitepath}">{$sitetitle}</a></div>
<div id="search">
<div id="sestext">
<form action="{$sitepath}/search.php" method="GET"><input
id="intext" class="txt" type="text" name="id" />
<button class="b-search" value="go" type="submit"></button>
</form>
</div>
</div>
</div>
<div id="menu">
<ul id="coolMenu">
<li><a href="{$sitepath}"><img src="themes/{$themes}/styles/images/homes.png" width="18" height="16" border="0" /></a></li>
{foreach from=$categori item=caty}
{assign var="ifavaible" value=$caty@total}
{if $caty@index < {$toplinks}}
{if $rewritemod == 2}
<li><a href="categories.php?id={$caty.catid|stripslashes}">{$caty.name|stripslashes}</a>
{/if}
{if $rewritemod == 1}
<li><a href="{$caty.catid}.htm" alt="{$caty.name|stripslashes}">{$caty.name|stripslashes}</a>
{/if}
<ul>
{foreach from=$subcat item=inc}
{if $inc.cord neq 0 && $caty.catid eq $inc.parent}
{if $rewritemod == 2}
<li><a href="categories.php?id={$inc.catid|stripslashes}">{$inc.name|stripslashes|replace:" ":"&nbsp;"}</a>
{/if}
{if $rewritemod == 1}
<li><a href="{$inc.catid}.htm" alt="{$inc.name|stripslashes}">{$inc.name|stripslashes|replace:" ":"&nbsp;"}</a>
{/if}
{/if}
{/foreach}
</ul>
</li>
{/if}
{/foreach}
<li>
{if $ifavaible > {$toplinks}}<a href="#">{#moremenu#}</a>
<ul>
{foreach from=$categori item=morecat}
{if $morecat.cord eq 0 && $morecat@index >= {$toplinks}}
{if $rewritemod == 2}
<li><a href="categories.php?id={$morecat.catid|stripslashes}">{$morecat.name|stripslashes|replace:" ":"&nbsp;"}</a>
{/if}
{if $rewritemod == 1}
<li><a href="{$morecat.catid}.htm" alt="{$morecat.name|stripslashes}">{$morecat.name|stripslashes|replace:" ":"&nbsp;"}</a>
{/if}
{/if}
{foreachelse}
<li><a href="index.php">Categories</li></a>
{/foreach}
</ul>
{/if}
</ul>
</div>
<div>
<ul id="sectabs">
<li><a href="link.php">{#submit#}</a></li>
<li><a href="gallery.php">{#gallery#}</a></li>
<li><a href="members.php">{#members#}</a></li>
<li><a href="browse.php">{#browse#}</a></li>
<li><a href="video.php">{#videos#}</a></li>
<li><a href="toprated.php">{#rated#}</a></li>
<li><a href="rsscat.php">{#rssbycat#}</a></li>
{if isset($startmenu)}
<li><a href="#">{#more#} {$sitetitle}</a>
<ul>
{foreach from=$startmenu item=sm}
{if $sm.active eq 2}
<li><a href="{$sm.valueopt}">{$sm.nameopt}</a></li>
{/if}
{/foreach}
</ul>  
</li>
{/if}
<li style="float: right;"><a href="rss.php" target="_blank"><img style="padding: 0px" src="themes/{$themes}/styles/images/rss.gif" width="26px" height="14px" border="0" /></a></li>
</ul>
</div>