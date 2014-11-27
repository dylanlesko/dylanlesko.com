<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html dir="{$frontext}" xmlns="http://www.w3.org/1999/xhtml">
{config_load file="languages/lang_$langs.conf"}
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
<meta http-equiv="Pragma" content="cache" />
<meta name="ROBOTS" content="All" />
<meta name="keywords" content="{$keywords}" />
<meta name="description" content="{$metadesc}" />
<link href="themes/{$themes}/styles/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/basic.css" />
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/browse.css" />
<link rel="alternate" type="application/atom+xml" title="{$sitetitle} - RSS" href="{$sitepath}/rss.php" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/scripts.js"></script>
<title>{#browse#} - {$sitetitle}</title>
</head>
<body>
<div id="content">
{include file="themes/$themes/maindir.php"}
<div id="blanks">
<div>
{table_foreach from=$categori item=cat cols=3 table_attr='valign="top" border="0"' tr_attr=$tr td_attr='valign="top" width="320px"'}
{assign var="catid" value=$cat}
{if $cat.cord neq 1}
<div id="blockhead">
{if $rewritemod == 2}
<img id="ccimg" src="themes/{$themes}/styles/images/document.gif" width="10" height="10" border="0" />&nbsp;&nbsp;<a href="categories.php?id={$cat.catid|stripslashes}">{$cat.name|stripslashes|replace:" ":"&nbsp;"}</a> [{$cat.ccount}]
{/if}
{if $rewritemod == 1}
<img id="ccimg" src="themes/{$themes}/styles/images/document.gif" width="10" height="10" border="0" />&nbsp;&nbsp;<a href="{$cat.catid}.htm" alt="{$cat.name|stripslashes}">{$cat.name|stripslashes|replace:" ":"&nbsp;"}</a> [{$cat.ccount}]
{/if}
</div>
{foreach from=$newser item=inclink}
{if $inclink.idblog eq $cat.catid}
{if $rewritemod == 1}
- <a href="{$inclink.univer}-{if $inclink.bhelper eq false}{$inclink.btexty|replace:"?":''|replace:"'":''|replace:'"':''|replace:'/':''|replace:':':''|urlencode}{else}{$inclink.bhelper}{/if}.html">{$inclink.btexty|stripslashes|truncate:85}</a><br />
{/if}
{if $rewritemod == 2}
- <a href="news.php?name={$inclink.univer}">{$inclink.btexty|stripslashes|truncate:85}</a><br />
{/if}
{/if}
{/foreach}
{/if}
{/table_foreach}
</div>
</div>