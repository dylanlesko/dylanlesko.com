<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
{config_load file="languages/lang_$langs.conf"}
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
<meta http-equiv="Pragma" content="cache" />
<meta name="ROBOTS" content="All" />
<meta name="keywords" content="latest news, news, article, story, top story, blog, links, link, directory, free, seo" />
<meta name="description" content="php news script powered by phpenter.net" />
<link href="themes/{$themes}/styles/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/basic.css" />
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/rsscat.css" />
<link rel="alternate" type="application/atom+xml" title="{$sitetitle} - RSS" href="{$sitepath}/rss.php" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/scripts.js"></script>
<title>{#rssbycat#} - {$sitetitle}</title>
</head>
<body>
<div id="content">
{include file="themes/$themes/maindir.php"}
<div id="blanks">
<div id="leftblock">
<div id="blockhead">{#rssbycat#}</div>
<div id="rsshead">{$sitetitle} {#rsstitle#}</div>
<div id="incfa">
<div id="incfb">&nbsp;&nbsp;Title</div>
<div id="incfc">Copy URL to RSS Reader</div>
<div id="incfd">Add to Google</div>
<div id="incfe">Add to Yahoo</div>
</div>
{foreach from=$categori item=caty}
<div id="floatcyrcle" style="height:22px;background:{cycle values="#F8F8F8,#F2F2F2"};">
<div id="floata"><a href="rssid.php?id={$caty.catid}"><img src="themes/{$themes}/styles/images/rsslocal.gif" border="0" width="16px" height="16px" alt="RSS Feed {$caty.name}">{$caty.name|upper}</a> [{$caty.ccount}]</div>
<div id="floatb"><input id="floatinput" name="rss" value="{$sitepath}/rssid.php?id={$caty.catid}" disabled></div>
<div id="floatc"><a href="http://fusion.google.com/add?source=atgs&feedurl={$sitepath}/rssid.php?id={$caty.catid}" target="_blank"><img src="themes/{$themes}/styles/images/rssgoogle.gif" border="0" alt="Add to Google"></a></div>
<div id="floatc"><a href="http://add.my.yahoo.com/rss?url={$sitepath}/rssid.php?id={$caty.catid}" target="_blank"><img src="themes/{$themes}/styles/images/rssyahoo.gif" border="0" alt="Add to Yahoo"></a></div>
</div>
{foreach from=$subcat item=inc}
{if $inc.cord neq 0 && $caty.catid eq $inc.parent}
<div id="floatcyrcle" style="height:22px;background:{cycle values="#F8F8F8,#F2F2F2"};">
<div id="floata"><a href="rssid.php?id={$inc.catid}"><img src="themes/{$themes}/styles/images/rsslocal.gif" border="0" width="16px" height="16px" alt="RSS Feed {$inc.name}">{$inc.name}</a> [{$inc.ccount}]</div>
<div id="floatb"><input id="floatinput" name="rss" value="{$sitepath}/rssid.php?id={$inc.catid}" disabled></div>
<div id="floatc"><a href="http://fusion.google.com/add?source=atgs&feedurl={$sitepath}/rssid.php?id={$inc.catid}" target="_blank"><img src="themes/{$themes}/styles/images/rssgoogle.gif" border="0" alt="Add to Google"></a></div>
<div id="floatc"><a href="http://add.my.yahoo.com/rss?url={$sitepath}/rssid.php?id={$inc.catid}" target="_blank"><img src="themes/{$themes}/styles/images/rssyahoo.gif" border="0" alt="Add to Yahoo"></a></div>
</div>
{/if}
{/foreach}
{/foreach}
</div>
<div id="rightblock">
{if $adsoffon eq 2}
<div id="blockd">
<div id="blockhead">{#sponsor#}</div>
{$senseup}
</div>
{/if}
</div>
</div>