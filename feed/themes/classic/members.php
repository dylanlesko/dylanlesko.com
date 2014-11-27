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
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/members.css" />
<link rel="alternate" type="application/atom+xml" title="{$sitetitle} - RSS" href="{$sitepath}/rss.php" />
<title>{$sitetitle} - {#members#} {if isset($smarty.get.next)}[{$smarty.get.next}]{else}{/if}</title>
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/scripts.js"></script>
</head>
<body>
<div id="content">
{include file="themes/$themes/maindir.php"}
<div id="blanks">
<div id="block">
{section name="results" loop=$results}
<div class="featureu">
<div class="thumb-image-wrapper">
<a href="uploads/{$results[results].thumbs}" title="{$results[results].biosi}">
<img src="maxthumb/{$results[results].thumbs}" width="50px" height="50px" border="0" alt="{$results[results].biosi}" /></a>
</div>     
<a href="profile.php?id={$results[results].usid}"><span class="ha2">{$results[results].username}</span></a>&nbsp;&nbsp;
{#since#} {$results[results].date}, {#level#}: {if $results[results].privilege eq 1}{#basic#}{/if}{if $results[results].privilege eq 2}{#editor#}{/if}{if $results[results].privilege eq 3}{#journalist#}{/if}.
</div>
{/section}
<div>
<div id="paginate">
<span class="disabled">News {$paginate.first} - {$paginate.last} of {$paginate.total}.</span>
{paginate_prev}{paginate_next}
</div>
</div>
</div>
</div>