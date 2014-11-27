<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html dir="{$frontext}" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
<meta http-equiv="Pragma" content="cache" />
<meta name="ROBOTS" content="All" />
<meta name="keywords" content="{$keywords}" />
<meta name="description" content="{section name="newser" loop=$newser}{if $newser[newser].brief eq true}{$newser[newser].brief|stripslashes}{else}{$metadesc}{/if}{/section}" />
<link href="themes/{$themes}/styles/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/basic.css" />
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/news.css" />
<link href="themes/{$themes}/styles/css_pirobox/style_1/style.css" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/atom+xml" title="{$sitetitle} - RSS" href="{$sitepath}/rss.php" />
<title>{if $bloginc eq true}{section name="newser" loop=$newser}{$newser[newser].btexty|stripslashes} - {$sitetitle}{sectionelse}{$sitetitle}{/section}{else}404{/if}</title>
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/scripts.js"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="scripts/pirobox_extended.js"></script>
<script type="text/javascript">
{literal}
$(document).ready(function(){$("[id^=rating_]").hover(function(){rid=$(this).attr("id").split("_")[1];$("#rating_"+rid).children("[class^=star_]").children('img').hover(function(){
$("#rating_"+rid).children("[class^=star_]").children('img').removeClass("hover");var hovered=$(this).parent().attr("class").split("_")[1];while(hovered>0){
$("#rating_"+rid).children(".star_"+hovered).children('img').addClass("hover");hovered--;}});});
$("[id^=rating_]").children("[class^=star_]").click(function(){var current_star=$(this).attr("class").split("_")[1];var rid=$(this).parent().attr("id").split("_")[1];$('#rating_'+rid).load('send.php',{rating:current_star,id:rid});});});
$(document).ready(function() {
$().piroBox_ext({
piro_speed : 700,
bg_alpha : 0.5,
piro_scroll : true
});
});
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
po.src = 'https://apis.google.com/js/plusone.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
{/literal}
</script>
</head> 
<body>
<div id="content">
{config_load file="languages/lang_$langs.conf"}
{include file="themes/$themes/maindir.php"}
<div id="blanks">
<div id="leftblock">
<div class="featuredcontainer">
{section name="newser" loop=$newser}
{if $newser[newser].badress eq true}
<a href="{$newser[newser].badress}" target="_blank" title="{$newser[newser].badress}">
<span class="ha4">{$newser[newser].btexty|stripslashes}</span></a>
{else}
<span class="ha4">{$newser[newser].btexty|stripslashes}</span>
{/if}
{if isset($newser[newser].brief)}<div id="brief">{$newser[newser].brief|stripslashes}</div>{/if}
{if $newser[newser].images neq 0}
<div class="thumb-image-wrapper"><a href="uploads/{$newser[newser].images}" rel="gallery"  class="pirobox_gall" title="{$newser[newser].btexty}">
<img src="maxthumb/{$newser[newser].images}" alt="{$newser[newser].btexty}" width="300px" height="250px" /></a>
{else}
<div>
{/if}
<img src="minthumb/{$newser[newser].bimgs}" alt="{$newser[newser].buser}" width="25px" height="25px" />
<div id="linker">
<i>{if $newser[newser].buserid == true}<a href="profile.php?id={$newser[newser].buserid}">{$newser[newser].buser|truncate:12}</a>{else}{$newser[newser].buser}{/if} {#on#} {$newser[newser].bdate|date_format:"%A, %B %e, %Y"}<br />{#comments#} [{$newser[newser].commno}]</i>
{foreach from=$subcat item=menu}
{if $menu.catid == $inccat}
{if $rewritemod == 2}
<a href="categories.php?id={$menu.catid|stripslashes}" title="{$menu.name|stripslashes}">{$menu.name|stripslashes} [{$menu.ccount}]</a>
{/if}
{if $rewritemod == 1}
<a href="{$menu.catid}.htm" title="{$menu.name|stripslashes}">{$menu.name|stripslashes} [{$menu.ccount}]</a>
{/if}
{foreach from=$categori item=mainc}
{if $menu.parent eq $mainc.catid}
{if $rewritemod == 2}
&#187;&nbsp;<a href="categories.php?id={$mainc.catid|stripslashes}" title="{$mainc.name|stripslashes}">{$mainc.name|stripslashes} [{$mainc.ccount}]</a>
{/if}
{if $rewritemod == 1}
&#187;&nbsp;<a href="{$mainc.catid}.htm" title="{$mainc.name|stripslashes}">{$mainc.name|stripslashes} [{$mainc.ccount}]</a>
{/if}
{/if}
{/foreach}
{/if}
{/foreach}
{assign var="cname" value=$inccat}
{if isset($categori)}
{foreach from=$categori item=inclink}
{if $inclink.catid eq $cname}
{if $rewritemod == 2}
<a href="categories.php?id={$inclink.catid|stripslashes}" title="{$inclink.name|stripslashes}">{$inclink.name|stripslashes} [{$inclink.ccount}]</a>
{/if}
{if $rewritemod == 1}
<a href="{$inclink.catid}.htm" title="{$inclink.name|stripslashes}">{$inclink.name|stripslashes} [{$inclink.ccount}]</a>
{/if}
{/if}
{/foreach}
{/if}
</div>
{if $newser[newser].editor eq 2}
{$newser[newser].bamess|stripslashes|regex_replace:"/[\r]/":"<br />"}
{/if}
{if $newser[newser].editor eq 1}
{$newser[newser].bamess|stripslashes|htmlspecialchars_decode}
{/if}
<div>
<div class="thumb-image-wrapper" style="float:left;line-height:30px;"><a href="uploads/{$newser[newser].bimgs}" title="{$newser[newser].buser}"></a></div>
<div style="clear:both"></div>
</div>
</div>
</div>
<div id="icons">
<span id="rating_{$newser[newser].blogid}">
<span class="star_1"><img src="themes/{$themes}/styles/images/star_blank.png" width="16px" height="16px" alt="" {if $newser[newser].rating > 0} class="hover"{/if} /></span>
<span class="star_2"><img src="themes/{$themes}/styles/images/star_blank.png" width="16px" height="16px" alt="" {if $newser[newser].rating > 1.5} class="hover"{/if} /></span>
<span class="star_3"><img src="themes/{$themes}/styles/images/star_blank.png" width="16px" height="16px" alt="" {if $newser[newser].rating > 2.5} class="hover"{/if} /></span>
<span class="star_4"><img src="themes/{$themes}/styles/images/star_blank.png" width="16px" height="16px" alt="" {if $newser[newser].rating > 3.5} class="hover"{/if} /></span>
<span class="star_5"><img src="themes/{$themes}/styles/images/star_blank.png" width="16px" height="16px" alt="" {if $newser[newser].rating > 4.5} class="hover"{/if} /></span>
</span>
&nbsp;&nbsp;&nbsp;<a title="submit to Twitter" href="http://twitter.com" onclick="window.open('http://twitter.com/home?status=Currently reading'+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title));return false;"><img src="{$sitepath}/themes/{$themes}/styles/images/twitter.png" border="0" width="16px" height="16px" /></a>
&nbsp;<a title="submit to Stumbleupon" href="http://www.stumbleupon.com" onclick="window.open('http://www.stumbleupon.com/submit?url='+encodeURIComponent(location.href)+'&amp;title='+encodeURIComponent(document.title));return false;"><img src="{$sitepath}/themes/{$themes}/styles/images/stumbleupon.png" border="0" width="16px" height="16px" /></a>
&nbsp;<a title="submit to Del.icio.us" href="http://del.icio.us/post" onclick="window.open('http://del.icio.us/post?v=2&amp;url='+encodeURIComponent(location.href)+'&amp;notes=&amp;title='+encodeURIComponent(document.title));return false;"><img src="{$sitepath}/themes/{$themes}/styles/images/delicious.png" border="0" width="16px" height="16px" /></a>
&nbsp;<a title="submit to Facebook" href="http://www.facebook.com"  onclick="window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(location.href)+'&amp;t='+encodeURIComponent(document.title));return false;"><img src="{$sitepath}/themes/{$themes}/styles/images/facebook.png" border="0" width="16px" height="16px" /></a>
&nbsp;<a title="submit to Technorati" href="http://www.technorati.com" onclick="window.open('http://www.technorati.com/faves?add='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title));return false;"><img src="{$sitepath}/themes/{$themes}/styles/images/technorati.png" border="0" width="16px" height="16px" /></a>
&nbsp;<a title="submit to Digg" href="http://digg.com"  onclick="window.open('http://digg.com/submit?phase=2&amp;url='+encodeURIComponent(location.href)+'&amp;title='+encodeURIComponent(document.title));return false;"><img src="{$sitepath}/themes/{$themes}/styles/images/digg.png" border="0" width="16px" height="16px" /></a>
&nbsp;<a title="submit to yahoo" href="http://myweb2.search.yahoo.com" onclick="window.open('http://myweb2.search.yahoo.com/myreviews/bookmarklet?u='+encodeURIComponent(location.href)+'&amp;title='+encodeURIComponent(document.title));return false;"><img src="{$sitepath}/themes/{$themes}/styles/images/yahoo.png" border="0" width="16px" height="16px" /></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{$sitepath}/print.php?name={$newser[newser].univer}" title="{#print#}" target="_blank"><img src="{$sitepath}/themes/{$themes}/styles/images/print.png" border="0" width="16px" height="16px" /></a>
&nbsp;&nbsp;<a href="tella.php?id={$sitepath}/news.php?name={$newser[newser].univer}" title="{#sendto#}" rel="content-311-261" class="pirobox_gall1"><img src="themes/{$themes}/styles/images/send.png" border="0" width="16px" height="16px"></a>
{nocache}{if $smarty.session.logged_in|default eq true}{/nocache}<a href="editnews.php?id={$newser[newser].blogid}">
{nocache}&nbsp;&nbsp;<img src="themes/{$themes}/styles/images/editnews.png" title="Edit" border="0" width="16px" height="16px" /></a>{/if}{/nocache}
&nbsp;&nbsp;<g:plusone size="small"></g:plusone>
</div>
{sectionelse}
<div id="info">{#notexist#}</div></div>
{/section}
{if $bloginc eq true}
<div id="blockhead">&nbsp;&nbsp;{#commentsb#}</div>
<div id="comments">
{section name="reviews" loop=$reviews}
<div class="featurecat">
<div class="thumb-image-wrapper">
{if $reviews[reviews].comimage neq '0'}
<a href="uploads/{$reviews[reviews].comimage}" rel="gallery" class="pirobox_gall" title="{$reviews[reviews].comenter}">
<img src="minthumb/{$reviews[reviews].comimage}" alt="{$reviews[reviews].comenter}" width="25x" height="25px" border="0"></a>
</div>
<a href="uploads/{$reviews[reviews].comimage}" rel="gallery" class="pirobox_gall"><span class="haty">{$reviews[reviews].comenter}</span></a>
{else}
<img src="themes/{$themes}/styles/images/penguin.png" alt="{$reviews[reviews].comenter}" width="25x" height="25px" border="0">
</div>
<span class="haty">{$reviews[reviews].comenter}</span>
{/if}
{$reviews[reviews].ctexte|stripslashes}
<br />
<span class="smally">
<span class="docy">&nbsp;</span>{$reviews[reviews].cdate|timeAgo}&nbsp;{#ago#}&nbsp;{#via#}&nbsp;{$reviews[reviews].comenter|truncate:12}&nbsp;&nbsp;
<span class="time">&nbsp;</span>{$reviews[reviews].cdate|date_format:"%A, %B %e, %Y"}&nbsp;&nbsp;
{if $reviews[reviews].chomes eq true}
&nbsp;&nbsp;<span class="linker">&nbsp;</span><a href="{$reviews[reviews].chomes}" target="_blank">{#visitsite#}</a>
{/if}
</span>
</div>
{sectionelse}
<div id="info">&#187; {#noreview#}</div>
{/section}
</div>
<a name="section"></a>
<div>
{if $incname eq true}
{nocache}
{if $smarty.session.loggedin|default eq false && $keypublic eq 0}
{/nocache}
<h3 class="listingTitleSec">{#postcomm#}</h3>
<a href="signin.php?return={$incname}">&#187; {#mustbe#}</a>
{nocache}
{/if}
{/nocache}
{nocache}
{if $smarty.session.loggedin|default eq true && $keypublic eq 0}
{/nocache}
<h3 class="listingTitleSec">{#postcomm#}</h3>
{include file="themes/$themes/form.php"}
{nocache}
{/if}
{/nocache}
{nocache}
{if $smarty.session.loggedin|default eq true && $keypublic eq 1}
{/nocache}
<h3 class="listingTitleSec">{#postcomm#}</h3>
{include file="themes/$themes/form.php"}
{nocache}
{/if}
{/nocache}
{nocache}
{if $smarty.session.loggedin|default eq false && $keypublic eq 1}
{/nocache}
<h3 class="listingTitleSec">{#postcomm#}</h3>
<div>
&nbsp;{#notreg#}
</div>
{include file="themes/$themes/formguest.php"}
{nocache}
{/if}
{/nocache}
{/if}
{/if}
</div>
</div>
<div id="rightblock">
{if $adsoffon eq 2}
<div id="blockd">
<div id="blockhead">{#sponsor#}</div>
{$senseup}
</div>
{/if}
{if $bloginc eq true}
<div id="blockd">
<div id="blockhead">{#related#}</div>
{section name="onewse" loop=$onewse}
{if $rewritemod == 1}
<div id="rfeat"><a href="{$onewse[onewse].oniver}-{if $onewse[onewse].ohelper eq false}{$onewse[onewse].otexty|replace:"?":''|replace:"'":''|replace:'"':''|replace:'/':''|replace:':':''|urlencode}{else}{$onewse[onewse].ohelper}{/if}.html"><span class="haty">{$onewse[onewse].otexty|stripslashes|truncate:98}</span></a></div>
{/if}
{if $rewritemod == 2}
<div id="rfeat"><a href="news.php?name={$onewse[onewse].oniver}"><span class="haty">{$onewse[onewse].otexty|stripslashes|truncate:98}</span></a></div>
{/if}
{$onewse[onewse].oamess|stripslashes|truncate:180}
{sectionelse}
{#norelated#}
{/section}
</div>
{/if}
</div>
</div>