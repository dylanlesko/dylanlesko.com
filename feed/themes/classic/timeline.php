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
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/timeline.css" />
<link rel="alternate" type="application/atom+xml" title="{$sitetitle} - RSS" href="{$sitepath}/rss.php" />
<title>{#public#} - {$sitetitle}</title>
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/scripts.js"></script>
</head>
<body>
<div id="content">
{include file="themes/$themes/maindir.php"}
<div id="blanks">
<div id="leftblock">
<div id="blockhead">{#public#}</div>
{section name="results" loop=$results}
{if $results[results].isitrue|default eq 2}
<div id="mainline">
<span class="lineleft">
<a href="uploads/{$results[results].imgs}" title="{$results[results].texty}">
<img src="maxthumb/{$results[results].imgs}" alt="{$results[results].texty}" height="50px" width="50px" border="0" /></a>
</span>
<span class="lineright">
{if $rewritemod == 2}
<span class="title"><a href="{$results[results].incurl}" target="_blank" alt="{$results[results].amess}">{$results[results].amess}</a></span>
{/if}
{if $rewritemod == 1}
<span class="title"><a href="{$results[results].incurl}" target="_blank" alt="{$results[results].amess}">{$results[results].amess}</a></span>
{/if}
<br />
{$results[results].indesc|stripslashes}
<br />
<div id="timeand">{$results[results].date|date_format:"%A, %B %e, %Y, %H:%M:%S"}, {$results[results].date|timeAgo}&nbsp;{#ago#}&nbsp;{#via#}&nbsp;<a href="profile.php?id={$results[results].userid}">{$results[results].texty}</a></div>
</span>
</div>
{else}
<div id="mainline">
<span class="lineleft">
<a href="uploads/{$results[results].imgs}" title="{$results[results].texty}">
<img src="maxthumb/{$results[results].imgs}" alt="{$results[results].texty}" height="50px" width="50px" border="0" /></a>
</span>
<span class="lineright">
<span class="title">{$results[results].amess}</span>
<br />
{$results[results].indesc|stripslashes}
<br />
<div id="timeand">{$results[results].date|date_format:"%A, %B %e, %Y, %H:%M:%S"}, {$results[results].date|timeAgo}&nbsp;{#ago#}&nbsp;</div>
</span>
</div>
{/if}
{sectionelse}
{#nonewsyet#}
{/section}
<div id="paginate">
<span class="disabled">{#public#} {$paginate.first} - {$paginate.last} of {$paginate.total}.</span>
{paginate_prev}{paginate_next}
</div>
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