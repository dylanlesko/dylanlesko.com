<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html dir="{$frontext}" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
<meta http-equiv="Pragma" content="cache" />
<meta name="ROBOTS" content="All" />
<meta name="keywords" content="{$keywords}" />
<meta name="description" content="{$metadesc}" />
<link href="themes/{$themes}/styles/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/basic.css" />
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/main.css" />
<link href="themes/{$themes}/styles/css_pirobox/style_2/style.css" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/atom+xml" title="{$sitetitle} - RSS" href="{$sitepath}/rss.php" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/scripts.js"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="scripts/pirobox_extended.js"></script>
<script type="text/javascript">
{literal}
 $(document).ready(function() {
 $().piroBox_ext({
 piro_speed : 700,
 bg_alpha : 0.5,
 piro_scroll : true
 });
 });
{/literal}
</script>
<title>{$sitetitle}</title>
</head> 
<body>
<div id="content">
{config_load file="languages/lang_$langs.conf"}
{include file="themes/$themes/maindir.php"}
<div id="blanks">
<div id="leftblock">
<div class="featuredcontainer">
{section name="newser" loop=1 start=0}
{if $newser[newser].blogid eq false}{#nonewsyet#}{else}
{if $rewritemod == 1}
<a href="{$newser[newser].univer}-{if $newser[newser].bhelper eq false}{$newser[newser].btexty|replace:"?":''|replace:"'":''|replace:'"':''|replace:'/':''|replace:':':''|urlencode}{else}{$newser[newser].bhelper}{/if}.html"><span class="ha4">{$newser[newser].btexty|stripslashes}</span></a><br />
{/if}
{if $rewritemod == 2}
<a href="news.php?name={$newser[newser].univer}"><span class="ha4">{$newser[newser].btexty|stripslashes}</span></a><br />
{/if}
{if isset($newser[newser].brief)}<div id="brief">{$newser[newser].brief|stripslashes}</div>{/if}
{if $newser[newser].images neq 0}
<div class="thumb-image-wrapper">
<a href="uploads/{$newser[newser].images}" rel="gallery" class="pirobox_gall" title="{$newser[newser].btexty}">
<img src="maxthumb/{$newser[newser].images}" width="300" height="250" alt="{$newser[newser].btexty}" /></a>
</div>
{/if}
<div id="linker">
<i>{$newser[newser].bdate|date_format:"%A, %B %e, %Y"} by {$newser[newser].buser}</i>
{if $newser[newser].rating == 0}<img id="starm" src="themes/{$themes}/styles/images/stars0.gif" width="50px" height="10px" border="0" />{/if}
{if $newser[newser].rating == 1.0}<img id="starm" src="themes/{$themes}/styles/images/stars1.gif" width="50px" height="10px" border="0" />{/if}
{if $newser[newser].rating == 1.5}<img id="starm" src="themes/{$themes}/styles/images/stars2.gif" width="50px" height="10px" border="0" />{/if}
{if $newser[newser].rating == 2.0}<img id="starm" src="themes/{$themes}/styles/images/stars2.gif" width="50px" height="10px" border="0" />{/if}
{if $newser[newser].rating == 2.5}<img id="starm" src="themes/{$themes}/styles/images/stars3.gif" width="50px" height="10px" border="0" />{/if}
{if $newser[newser].rating == 3.0}<img id="starm" src="themes/{$themes}/styles/images/stars3.gif" width="50px" height="10px" border="0" />{/if}
{if $newser[newser].rating == 3.5}<img id="starm" src="themes/{$themes}/styles/images/stars4.gif" width="50px" height="10px" border="0" />{/if}
{if $newser[newser].rating == 4.0}<img id="starm" src="themes/{$themes}/styles/images/stars4.gif" width="50px" height="10px" border="0" />{/if}
{if $newser[newser].rating == 4.5}<img id="starm" src="themes/{$themes}/styles/images/stars5.gif" width="50px" height="10px" border="0" />{/if}
{if $newser[newser].rating == 5.0}<img id="starm" src="themes/{$themes}/styles/images/stars5.gif" width="50px" height="10px" border="0" />{/if}
</div>
{if $newser[newser].editor eq 2}
{$newser[newser].bamess|stripslashes|regex_replace:"/[\r]/":"<br />"|truncate:988}
{/if}
{if $newser[newser].editor eq 1}
{$newser[newser].bamess|htmlspecialchars_decode|stripslashes|truncate:1310|CloseTags}
{/if}
{if $rewritemod == 1}
<a href="{$newser[newser].univer}-{if $newser[newser].bhelper eq false}{$newser[newser].btexty|replace:"?":''|replace:"'":''|replace:'"':''|replace:'/':''|replace:':':''|urlencode}{else}{$newser[newser].bhelper}{/if}.html">{#readmore#}</a>&nbsp;
<a href="{$newser[newser].univer}-{if $newser[newser].bhelper eq false}{$newser[newser].btexty|replace:"?":''|replace:"'":''|replace:'"':''|replace:'/':''|replace:':':''|urlencode}{else}{$newser[newser].bhelper}{/if}.html#section">{#comments#}&nbsp;[{$newser[newser].commno}]</a>
{/if}
{if $rewritemod == 2}
<a href="news.php?name={$newser[newser].univer}">{#readmore#}</a>&nbsp;
<a href="news.php?name={$newser[newser].univer}#section">{#comments#}&nbsp;[{$newser[newser].commno}]</a>
{/if}
{/if}
{/section}
</div>
<div id="intro" style="float:left"><img src="themes/{$themes}/styles/images/rss.png" width="16px" height="11px" /><a href="rsscat.php">{#intro#}</a></div>
<div id="list" style="float:left;">
{section name="onewse" loop=17 start=1}
{if $onewse[onewse].oamess eq false}.{else}
<div id="side-a">
{if $onewse[onewse].omages neq 0}
<a href="uploads/{$onewse[onewse].omages}" rel="gallery" class="pirobox_gall" title="{$onewse[onewse].otexty}">
<img src="minthumb/{$onewse[onewse].omages}" width="144px" height="82px" alt="{$onewse[onewse].otexty}" /></a>
{else}
<img src="themes/{$themes}/styles/images/noimage.png" width="144px" height="82px" alt="{$onewse[onewse].otexty}" /></a>
{/if}
<br />
{if $rewritemod == 1}
<span class="ha3"><a href="{$onewse[onewse].oniver}-{if $onewse[onewse].ohelper eq false}{$onewse[onewse].otexty|replace:"?":''|replace:"'":''|replace:'"':''|replace:'/':''|replace:':':''|urlencode}{else}{$onewse[onewse].ohelper}{/if}.html">{$onewse[onewse].otexty|stripslashes|truncate:65}</a></span>
{/if}
{if $rewritemod == 2}
<span class="ha3"><a href="news.php?name={$onewse[onewse].oniver}">{$onewse[onewse].otexty|stripslashes|truncate:65}</a></span>
{/if}
<br />
{$onewse[onewse].oamess|stripslashes|truncate:150}
</div>
{/if}
{/section}
</div>
</div>
<div id="rightblock">
{if $adsoffon eq 2}
<div id="blockd">
<div id="blockhead">{#sponsor#}</div>
{$senseup}
</div>
{/if}
<div id="blockd">
<div id="blockhead">{#latest#}</div>
{section name="onewse" loop=22 start=17}
{if $onewse[onewse].oamess eq false}{else}
<div id="ha5">
{if $rewritemod == 1}
<span class="ha3"><a href="{$onewse[onewse].oniver}-{if $onewse[onewse].ohelper eq false}{$onewse[onewse].otexty|replace:"?":''|replace:"'":''|replace:'"':''|replace:'/':''|replace:':':''|urlencode}{else}{$onewse[onewse].ohelper}{/if}.html">{$onewse[onewse].otexty}</a></span>
{/if}
{if $rewritemod == 2}
<span class="ha3"><a href="news.php?name={$onewse[onewse].oniver}">{$onewse[onewse].otexty}</a></span>
{/if}
<br />
{$onewse[onewse].oamess|truncate:300}
<br />
{if $rewritemod == 1}
<a href="{$onewse[onewse].oniver}-{if $onewse[onewse].ohelper eq false}{$onewse[onewse].otexty|replace:"?":''|replace:"'":''|replace:'"':''|replace:'/':''|replace:':':''|urlencode}{else}{$onewse[onewse].ohelper}{/if}.html">{#readmore#}</a>
{/if}
{if $rewritemod == 2}
<a href="news.php?name={$onewse[onewse].oniver}">{#readmore#}</a>
{/if}
</div>
{/if}
{/section}
</div>
<div id="blockd">
<div id="blockhead">{#community#}</div>
{section name="reviews" loop=$reviews}
<div id="ha5">
{if $reviews[reviews].comimage neq '0'}
<img src="minthumb/{$reviews[reviews].comimage}" alt="{$reviews[reviews].comenter}" width="25x" height="25px" border="0">
<a href="uploads/{$reviews[reviews].comimage}" rel="gallery" class="pirobox_gall"></a>
{else}
<img src="themes/{$themes}/styles/images/penguin.png" alt="{$reviews[reviews].comenter}" width="25x" height="25px" border="0">
{/if}
{if $rewritemod == 1}
<span class="ha3"><a href="{$reviews[reviews].comrev}{if $reviews[reviews].chelper eq true}-{$reviews[reviews].chelper}{/if}.html"><strong>{$reviews[reviews].comenter}</strong></a></span> - 
{/if}
{if $rewritemod == 2}
<span class="ha3"><a href="news.php?name={$reviews[reviews].comrev}">{$reviews[reviews].comenter}</a></span> - 
{/if}
{$reviews[reviews].ctexte|stripslashes|truncate:200}<br />
<div id="realysmall">{$reviews[reviews].cdate|date_format:"%A, %B %e, %Y, %H:%M:%S"}, {$reviews[reviews].cdate|timeAgo}&nbsp;{#ago#}</div>
</div>
{/section}
</div>
</div>
</div>