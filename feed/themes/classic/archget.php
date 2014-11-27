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
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/listing.css" />
<link href="themes/{$themes}/styles/css_pirobox/style_2/style.css" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/atom+xml" title="{$sitetitle} - RSS" href="{$sitepath}/rss.php" />
<title>{#archive#} - {$smarty.get.month}, {$smarty.get.year} - {$sitetitle}</title>
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/scripts.js"></script>
</head>
<body>
<div id="content">
{include file="themes/$themes/maindir.php"}
<div id="blanks">
<div id="leftblock">
{section name="results" loop=$results}
<div class="featuredcontainer">
<div class="featurelist">
{if $results[results].images neq 0}
<a href="uploads/{$results[results].images}" rel="gallery" class="pirobox_gall" title="{$results[results].btexty}">
<img src="minthumb/{$results[results].images}" width="144px" height="82px" alt="{$results[results].btexty}" /></a>
{else}
<img src="themes/{$themes}/styles/images/noimage.png" width="144px" height="82px" alt="{$results[results].btexty}" /></a>
{/if}
{if $rewritemod == 1}
<a href="{$results[results].univer}-{if $results[results].bhelper eq false}{$results[results].btexty|replace:"?":''|replace:"'":''|replace:'"':''|replace:'/':''|replace:':':''|urlencode}{else}{$results[results].bhelper}{/if}.html"><span class="ha4">{$results[results].btexty|stripslashes|truncate:75}</span></a>
{/if}
{if $rewritemod == 2}
<a href="news.php?name={$results[results].univer}"><span class="ha4">{$results[results].btexty|stripslashes|truncate:75}</span></a>
{/if}
<br />
<span class="smally">
<span class="docy">&nbsp;</span>{#published#}&nbsp;{$results[results].bdate|timeAgo}&nbsp;{#ago#}&nbsp;{#via#}
{if $results[results].buserid|default == true}<a href="profile.php?id={$results[results].buserid|default}">{$results[results].buser|truncate:12}</a>{else}{$results[results].buser|truncate:12}{/if}&nbsp;
<span class="time">&nbsp;</span>{$results[results].bdate|date_format:"%A, %B %e, %Y"}
<br/>
{if $results[results].badress eq true}
&nbsp;<span class="linker">&nbsp;</span><a href="{$results[results].badress}" target="_blank">{#visitsite#}</a>
{else}
&nbsp;{#editorial#}
{/if}&nbsp;<span class="comment">&nbsp;</span>
{if $rewritemod == 1}
<a href="{$results[results].univer}-{if $results[results].bhelper eq false}{$results[results].btexty|replace:"?":''|replace:"'":''|replace:'"':''|replace:'/':''|replace:':':''|urlencode}{else}{$results[results].bhelper}{/if}.html#section">{#comments#} [{$results[results].commno}]</a>&nbsp;
{/if}
{if $rewritemod == 2}
<a href="news.php?name={$results[results].univer}#section">{#comments#} [{$results[results].commno}]</a>&nbsp;
{/if}
{if $results[results].rating == 0}<img style="position:relative;top:-1px;border:0px;" src="themes/{$themes}/styles/images/stars0.gif" width="50px" height="10px" border="0" border="0" />{/if}
{if $results[results].rating == 1.0}<img style="position:relative;top:-1px;border:0px;" src="themes/{$themes}/styles/images/stars1.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].rating == 1.5}<img style="position:relative;top:-1px;border:0px;" src="themes/{$themes}/styles/images/stars2.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].rating == 2.0}<img style="position:relative;top:-1px;border:0px;" src="themes/{$themes}/styles/images/stars2.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].rating == 2.5}<img style="position:relative;top:-1px;border:0px;" src="themes/{$themes}/styles/images/stars3.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].rating == 3.0}<img style="position:relative;top:-1px;border:0px;" src="themes/{$themes}/styles/images/stars3.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].rating == 3.5}<img style="position:relative;top:-1px;border:0px;" src="themes/{$themes}/styles/images/stars4.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].rating == 4.0}<img style="position:relative;top:-1px;border:0px;" src="themes/{$themes}/styles/images/stars4.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].rating == 4.5}<img style="position:relative;top:-1px;border:0px;" src="themes/{$themes}/styles/images/stars5.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].rating == 5.0}<img style="position:relative;top:-1px;border:0px;" src="themes/{$themes}/styles/images/stars5.gif" width="50px" height="10px" border="0" />{/if}
{#avgrat#}.&nbsp;&nbsp;{#usgrat#}&nbsp;{$results[results].rating} - {$results[results].total_ratings}&nbsp;{#votes#}
</span>
</div>
</div>
{/section}
<div id="paginate">
<span class="disabled">News {$paginate.first} - {$paginate.last} of {$paginate.total}.</span>
{paginate_prev}&nbsp;{paginate_next}
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
{section name="onewse" loop=$onewse}
<div id="ha5">
{if $rewritemod == 1}
<span class="ha3"><a href="{$onewse[onewse].oniver}-{$onewse[onewse].otexty|replace:"?":''|replace:"'":''|replace:'"':''|replace:'/':''|replace:':':''|urlencode}.html"><span class="haty">{$onewse[onewse].otexty|stripslashes|truncate:98}</span></a></span><br />
{/if}
{if $rewritemod == 2}
<span class="ha3"><a href="news.php?name={$onewse[onewse].oniver}"><span class="haty">{$onewse[onewse].otexty|stripslashes|truncate:98}</span></a></span><br />
{/if}
{$onewse[onewse].oamess|stripslashes|truncate:180}
</div>
{sectionelse}
{/section}
</div>      
</div>
</div>