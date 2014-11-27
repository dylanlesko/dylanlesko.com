<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html dir="{$frontext}" xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
<meta http-equiv="Pragma" content="cache" />
<meta name="ROBOTS" content="All" />
<meta name="keywords" content="latest news, news, article, story, top story, blog, links, link, directory, free, seo" />
<meta name="description" content="php news script powered by phpenter.net" />
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/basic.css" />
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/profile.css" />
<link href="themes/{$themes}/styles/css_pirobox/style_1/style.css" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/atom+xml" title="{$sitetitle} - RSS" href="{$sitepath}/rss.php" />
{section name="profile" loop=$profile}
<link href="minthumb/{$profile[profile].thumbs}" type="image/x-icon" rel="shortcut icon" />
<title>{$profile[profile].username} - Profile - {$sitetitle}</title>
{/section}
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
 piro_scroll : true // pirobox always positioned at the center of the page
 });
 });
{/literal}
</script>
<script type="text/javascript">
{literal}
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
<div class="prleft">
{section name="profile" loop=$profile}
<div class="featuredprofile"> 
<span class="ha4">{$profile[profile].username}{#spage#}</span><br />
<span class="cleft"><a href="uploads/{$profile[profile].thumbs}" rel="gallery" class="pirobox_gall"><img src="maxthumb/{$profile[profile].thumbs}" width="50px" height="50px" border="0" title="{$profile[profile].username}{#spage#}" /></a></span>
<div style="font-size:13px">
<div id="blockhead">{#about#}</div> {if $profile[profile].biosi eq false} - {#thism#}{else}
{$profile[profile].biosi|stripslashes|wordwrap:22:"\n":true}
{/if}
</div>
<br/>
<div style="font-size:13px">
<div id="blockhead">{#since#}</div> {$profile[profile].date|date_format:"%A, %B %e, %Y"}<br />{$profile[profile].date|timeAgo} {#ago#}<br /><br/>
<div id="blockhead">{#level#}</div> {if $profile[profile].privilege eq 1}{#basic#}{/if}{if $profile[profile].privilege eq 2}{#editor#}{/if}{if $profile[profile].privilege eq 3}{#journalist#}{/if}<br /><br/>
<div id="blockhead">{#name#}</div> {if $profile[profile].fullname eq true}{$profile[profile].fullname|wordwrap:18:"\n":true}{else}{$profile[profile].username|wordwrap:18:"\n":true}{/if}<br /><br/>
<div id="blockhead">{#home#}</div> {if $profile[profile].homep eq true}<a href="{$profile[profile].homep}" target="_blank" title="{$profile[profile].homep}"><img src="themes/{$themes}/styles/images/homepage.png" border="0" width="24" height="24" title="{$profile[profile].homep}"></a><br />{else}{#nosite#}<br /><br />{/if}
<div id="blockhead">{#sendpp#}</div>
<a href="message.php?cusid={$profile[profile].usid}&cuser={$profile[profile].username}" title="Message" rel="content-310-260" class="pirobox_gall1"><img style="margin-bottom:4px;" src="themes/{$themes}/styles/images/message.png" border="0" width="24" height="24"></a>
<div id="blockhead">{#share#}</div>
<div id="icons">
&nbsp;<a title="submit to Twitter" href="http://twitter.com" onclick="window.open('http://twitter.com/home?status=Currently reading'+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title));return false;"><img src="{$sitepath}/themes/{$themes}/styles/images/twitter.png" border="0" width="16px" height="16px" /></a>
&nbsp;<a title="submit to Stumbleupon" href="http://www.stumbleupon.com" onclick="window.open('http://www.stumbleupon.com/submit?url='+encodeURIComponent(location.href)+'&amp;title='+encodeURIComponent(document.title));return false;"><img src="{$sitepath}/themes/{$themes}/styles/images/stumbleupon.png" border="0" width="16px" height="16px" /></a>
&nbsp;<a title="submit to Del.icio.us" href="http://del.icio.us/post" onclick="window.open('http://del.icio.us/post?v=2&amp;url='+encodeURIComponent(location.href)+'&amp;notes=&amp;title='+encodeURIComponent(document.title));return false;"><img src="{$sitepath}/themes/{$themes}/styles/images/delicious.png" border="0" width="16px" height="16px" /></a>
&nbsp;<a title="submit to Facebook" href="http://www.facebook.com"  onclick="window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(location.href)+'&amp;t='+encodeURIComponent(document.title));return false;"><img src="{$sitepath}/themes/{$themes}/styles/images/facebook.png" border="0" width="16px" height="16px" /></a>
&nbsp;<a title="submit to Technorati" href="http://www.technorati.com" onclick="window.open('http://www.technorati.com/faves?add='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title));return false;"><img src="{$sitepath}/themes/{$themes}/styles/images/technorati.png" border="0" width="16px" height="16px" /></a>
&nbsp;<a title="submit to Digg" href="http://digg.com"  onclick="window.open('http://digg.com/submit?phase=2&amp;url='+encodeURIComponent(location.href)+'&amp;title='+encodeURIComponent(document.title));return false;"><img src="{$sitepath}/themes/{$themes}/styles/images/digg.png" border="0" width="16px" height="16px" /></a>
&nbsp;<a title="submit to yahoo" href="http://myweb2.search.yahoo.com" onclick="window.open('http://myweb2.search.yahoo.com/myreviews/bookmarklet?u='+encodeURIComponent(location.href)+'&amp;title='+encodeURIComponent(document.title));return false;"><img src="{$sitepath}/themes/{$themes}/styles/images/yahoo.png" border="0" width="16px" height="16px" /></a>
&nbsp;&nbsp;&nbsp;&nbsp;<g:plusone size="small"></g:plusone>
</div>
</div>
</div>
{sectionelse}
<div id="info">{#noprofile#}</div>
{/section}
</div>
<div class="pright"> 
{section name="results" loop=$results}
<div class="featuredcontainer"> 
<div class="featurelist">
{if $results[results].images neq 0}
<img src="minthumb/{$results[results].images}" width="144px" height="82px" alt="{$results[results].btexty}" />
{else}
<img src="themes/{$themes}/styles/images/noimage.png" width="144px" height="82px" alt="{$results[results].btexty}" /></a>
{/if}
{if $rewritemod == 1}
<a href="{$results[results].univer}-{if $results[results].bhelper eq false}{$results[results].btexty|replace:"?":''|replace:'/':''|replace:':':''|urlencode}{else}{$results[results].bhelper}{/if}.html"><span class="ha4">{$results[results].btexty|stripslashes|truncate:80}</span></a>
{/if}
{if $rewritemod == 2}
<a href="news.php?name={$results[results].univer}"><span class="ha4">{$results[results].btexty|stripslashes|truncate:80}</span></a>
{/if}
<br />
<span class="smally">
&nbsp;<span class="docy">&nbsp;</span>{$results[results].bdate|timeAgo}&nbsp;{#ago#}&nbsp;{#via#}&nbsp;<a href="profile.php?id={$results[results].buserid}">{$results[results].buser|truncate:14}</a>&nbsp;&nbsp;&nbsp;<span class="time">&nbsp;</span>{$results[results].bdate|date_format:"%a, %B %e, %Y"}&nbsp;
{if $rewritemod == 1}
<a href="{$results[results].univer}-{if $results[results].bhelper eq false}{$results[results].btexty|replace:"?":''|replace:"'":''|replace:'"':''|replace:'/':''|replace:':':''|urlencode}{else}{$results[results].bhelper}{/if}.html#section">{#comments#} [{$results[results].commno}]</a>&nbsp;
{/if}
{if $rewritemod == 2}
<a href="news.php?name={$results[results].univer}#section">{#comments#} [{$results[results].commno}]</a>&nbsp;
{/if}
{if $results[results].badress eq true}
&nbsp;&nbsp;<span class="linker">&nbsp;</span><a href="{$results[results].badress}" target="_blank">{#visitsite#}</a>
{else}
&nbsp;{#editorial#}
{/if}
<br/>
{if $results[results].rating == 0}<img style="position:relative;top:1px;border:0px;" src="themes/{$themes}/styles/images/stars0.gif" border="0" />{/if}
{if $results[results].rating == 1.0}<img style="position:relative;top:1px;border:0px;" src="themes/{$themes}/styles/images/stars1.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].rating == 1.5}<img style="position:relative;top:1px;border:0px;" src="themes/{$themes}/styles/images/stars2.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].rating == 2.0}<img style="position:relative;top:1px;border:0px;" src="themes/{$themes}/styles/images/stars2.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].rating == 2.5}<img style="position:relative;top:1px;border:0px;" src="themes/{$themes}/styles/images/stars3.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].rating == 3.0}<img style="position:relative;top:1px;border:0px;" src="themes/{$themes}/styles/images/stars3.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].rating == 3.5}<img style="position:relative;top:1px;border:0px;" src="themes/{$themes}/styles/images/stars4.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].rating == 4.0}<img style="position:relative;top:1px;border:0px;" src="themes/{$themes}/styles/images/stars4.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].rating == 4.5}<img style="position:relative;top:1px;border:0px;" src="themes/{$themes}/styles/images/stars5.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].rating == 5.0}<img style="position:relative;top:1px;border:0px;" src="themes/{$themes}/styles/images/stars5.gif" width="50px" height="10px" border="0" />{/if}
{#avgrat#}.&nbsp;&nbsp;{#usgrat#}&nbsp;{$results[results].rating} - {$results[results].total_ratings}&nbsp;{#votes#} 
</span>
</div> 
</div>
{/section}
<div id="paginate">
<span class="disabled">{#news#} {$paginate.first} - {$paginate.last} of {$paginate.total}.</span>
{paginate_prev} {paginate_next}
</div>
</div>
</div>