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
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/search.css" />
<link rel="alternate" type="application/atom+xml" title="{$sitetitle} - RSS" href="{$sitepath}/rss.php" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/scripts.js"></script>
<title>{$sitetitle}</title>
</head> 
<body>
<div id="content">
{config_load file="languages/lang_$langs.conf"}
{include file="themes/$themes/maindir.php"}
<div id="blanks">
{section name="results" loop=$results}
<div class="featuredcontainer" style="background:{cycle values="#FCFCFC,#F8F8F8"}">
<div class="featurelist">
{if $results[results].omages neq 0}
<a href="uploads/{$results[results].omages}" rel="gallery" class="pirobox_gall" title="{$results[results].otexty}">
<img src="minthumb/{$results[results].omages}" width="144px" height="82px" alt="{$results[results].otexty}" /></a>
{else}
<img src="themes/{$themes}/styles/images/noimage.png" width="144px" height="82px" alt="{$results[results].otexty}" /></a>
{/if}
{if $rewritemod == 1}
<a href="{$results[results].oniver}-{if $results[results].ohelper eq false}{$results[results].otexty|replace:"?":''|replace:"'":''|replace:'"':''|replace:'/':''|replace:':':''|urlencode}{else}{$results[results].ohelper}{/if}.html"><span class="ha4">{$results[results].otexty|stripslashes|highlight:$hlgid|truncate:85}</span></a>
{/if}
{if $rewritemod == 2}
<a href="news.php?name={$results[results].oniver}"><span class="ha4">{$results[results].otexty|stripslashes|highlight:$hlgid|truncate:85}</span></a>
{/if}
<br />
<span class="smally">
{$results[results].oamess|highlight:$hlgid|stripslashes|truncate:400}
</span>
</div> 
</div>
{/section}
<div id="paginate">
<span class="disabled">{#news#} {$paginate.first} - {$paginate.last} {#of#} {$paginate.total}.</span>
{paginate_prev}{paginate_next}
</div>
</div>