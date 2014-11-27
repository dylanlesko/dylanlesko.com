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
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/archive.css" />
<link rel="alternate" type="application/atom+xml" title="{$sitetitle} - RSS" href="{$sitepath}/rss.php" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/scripts.js"></script>
<title>{#archive#} - {$sitetitle}</title>
</head>
<body>
<div id="content">
{include file="themes/$themes/maindir.php"}
<div id="blanks">
<div id="blockhead">{#archive#} - {$sitetitle}</div>
{table_foreach from=$data item=cat cols=3 table_attr='valign="top" border="0"' tr_attr=$tr td_attr='valign="top" width="322px"'}
{$cat.bdate|date_format:"%B, %Y"} <a href="archget.php?month={$cat.bdate|date_format:"%m"}&year={$cat.bdate|date_format:"%Y"}">[ {$cat.total} ]</a>
{/table_foreach}
</div>
