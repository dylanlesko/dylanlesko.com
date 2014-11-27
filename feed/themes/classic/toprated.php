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
<link rel="alternate" type="application/atom+xml" title="{$sitetitle} - RSS" href="{$sitepath}/rss.php" />
<title>{#rated#} - {$sitetitle}</title>
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/scripts.js"></script>
</head>
<body>
<div id="content">
{include file="themes/$themes/maindir.php"}
<div id="blanks">
<div id="leftblock">
<div id="blockhead">{#rated#}</div>
{section name="results" loop=$results}
<div class="featuredcontainer" style="background:{cycle values="#FFFFFF,#FAFAFA"}"> 
<div class="featurelist">
{if $results[results].images neq 0}
<img src="minthumb/{$results[results].images}" width="144px" height="82px" title="{$results[results].btexty}" />
{else}
<img src="themes/{$themes}/styles/images/noimage.png" width="144px" height="82px" title="{$results[results].btexty}" />
{/if}
{if $rewritemod == 1}
<a href="{$results[results].univer}-{if $results[results].bhelper eq false}{$results[results].btexty|replace:"?":''|replace:"'":''|replace:'"':''|replace:'/':''|replace:':':''|urlencode}{else}{$results[results].bhelper}{/if}.html" title="{$results[results].btexty|stripslashes|truncate:84}"><span class="ha4">{$results[results].btexty|stripslashes|truncate:84}</span></a>
{/if}
{if $rewritemod == 2}
<a href="news.php?name={$results[results].univer}" title="{$results[results].btexty|stripslashes|truncate:84}"><span class="ha4">{$results[results].btexty|stripslashes|truncate:84}</span></a>
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
<span class="disabled">{#news#} {$paginate.first} - {$paginate.last} of {$paginate.total}.</span>
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