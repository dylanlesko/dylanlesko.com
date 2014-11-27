<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html dir="{$frontext}" xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
<meta http-equiv="Pragma" content="cache" />
<meta name="ROBOTS" content="All" />
<meta name="keywords" content="latest news, news, article, story, top story, blog, links, link, directory, free, seo" />
<meta name="description" content="php news script powered by phpenter.net" />
<link href="themes/{$themes}/styles/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/basic.css" />
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/videoinc.css" />
<link rel="alternate" type="application/atom+xml" title="{$sitetitle} - RSS" href="{$sitepath}/rss.php" />
<title>{if $videoid eq true}{section name="yuvideo" loop=$yuvideo}{$yuvideo[yuvideo].yuname|stripslashes}{/section} - Video - {$sitetitle}{else}404{/if}</title>
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/scripts.js"></script>
<script type="text/javascript">
{literal}
$(document).ready(function(){$("[id^=rating_]").hover(function(){rid=$(this).attr("id").split("_")[1];$("#rating_"+rid).children("[class^=star_]").children('img').hover(function(){
$("#rating_"+rid).children("[class^=star_]").children('img').removeClass("hover");var hovered=$(this).parent().attr("class").split("_")[1];while(hovered>0){
$("#rating_"+rid).children(".star_"+hovered).children('img').addClass("hover");hovered--;}});});
$("[id^=rating_]").children("[class^=star_]").click(function(){var current_star=$(this).attr("class").split("_")[1];var rid=$(this).parent().attr("id").split("_")[1];$('#rating_'+rid).load('sendv.php',{rating:current_star,id:rid});});});
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
<div id="leftblock">
{section name="yuvideo" loop=$yuvideo}
<div class="featurev">
<div>
{if $yuvideo[yuvideo].yuid neq 0}
<span class="ha2">{$yuvideo[yuvideo].yuname|stripslashes}</span>
<div class="thumb-image-wrapper"><object width="450" height="330">
<param name="movie" value="http://www.youtube.com/v/{$yuvideo[yuvideo].yucvideo}"></param>
<param name="allowFullScreen" value="true"></param>
<embed src="http://www.youtube.com/v/{$yuvideo[yuvideo].yucvideo}" type="application/x-shockwave-flash" allowfullscreen="true" width="450" height="320">
</embed>
</object>
</div>
{/if}
<br />
<a href="profile.php?id={$yuvideo[yuvideo].yuserid}">{$yuvideo[yuvideo].yuser}</a> {#on#} {$yuvideo[yuvideo].ydate} {#comments#} [{$yuvideo[yuvideo].ycommno}]<br /><br />
{$yuvideo[yuvideo].yuamess|stripslashes|regex_replace:"/[\r]/":"<br />"}
<div style="clear:both"></div>
</div>
</div>
<div id="icons">
<span id="rating_{$yuvideo[yuvideo].yuid}">
<span class="star_1"><img src="themes/{$themes}/styles/images/star_blank.png" width="16px" height="16px" alt="" {if $yuvideo[yuvideo].yrating > 0} class="hover"{/if} /></span>
<span class="star_2"><img src="themes/{$themes}/styles/images/star_blank.png" width="16px" height="16px" alt="" {if $yuvideo[yuvideo].yrating > 1.5} class="hover"{/if} /></span>
<span class="star_3"><img src="themes/{$themes}/styles/images/star_blank.png" width="16px" height="16px" alt="" {if $yuvideo[yuvideo].yrating > 2.5} class="hover"{/if} /></span>
<span class="star_4"><img src="themes/{$themes}/styles/images/star_blank.png" width="16px" height="16px" alt="" {if $yuvideo[yuvideo].yrating > 3.5} class="hover"{/if} /></span>
<span class="star_5"><img src="themes/{$themes}/styles/images/star_blank.png" width="16px" height="16px" alt="" {if $yuvideo[yuvideo].yrating > 4.5} class="hover"{/if} /></span>
</span>
&nbsp;<a title="submit to Twitter" href="http://twitter.com" onclick="window.open('http://twitter.com/home?status=Currently reading'+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title));return false;"><img src="{$sitepath}/themes/{$themes}/styles/images/twitter.png" border="0" width="16px" height="16px" /></a>
&nbsp;<a title="submit to Stumbleupon" href="http://www.stumbleupon.com" onclick="window.open('http://www.stumbleupon.com/submit?url='+encodeURIComponent(location.href)+'&amp;title='+encodeURIComponent(document.title));return false;"><img src="{$sitepath}/themes/{$themes}/styles/images/stumbleupon.png" border="0" width="16px" height="16px" /></a>
&nbsp;<a title="submit to Del.icio.us" href="http://del.icio.us/post" onclick="window.open('http://del.icio.us/post?v=2&amp;url='+encodeURIComponent(location.href)+'&amp;notes=&amp;title='+encodeURIComponent(document.title));return false;"><img src="{$sitepath}/themes/{$themes}/styles/images/delicious.png" border="0" width="16px" height="16px" /></a>
&nbsp;<a title="submit to Facebook" href="http://www.facebook.com"  onclick="window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(location.href)+'&amp;t='+encodeURIComponent(document.title));return false;"><img src="{$sitepath}/themes/{$themes}/styles/images/facebook.png" border="0" width="16px" height="16px" /></a>
&nbsp;<a title="submit to Technorati" href="http://www.technorati.com" onclick="window.open('http://www.technorati.com/faves?add='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title));return false;"><img src="{$sitepath}/themes/{$themes}/styles/images/technorati.png" border="0" width="16px" height="16px" /></a>
&nbsp;<a title="submit to Digg" href="http://digg.com"  onclick="window.open('http://digg.com/submit?phase=2&amp;url='+encodeURIComponent(location.href)+'&amp;title='+encodeURIComponent(document.title));return false;"><img src="{$sitepath}/themes/{$themes}/styles/images/digg.png" border="0" width="16px" height="16px" /></a>
&nbsp;<a title="submit to yahoo" href="http://myweb2.search.yahoo.com" onclick="window.open('http://myweb2.search.yahoo.com/myreviews/bookmarklet?u='+encodeURIComponent(location.href)+'&amp;title='+encodeURIComponent(document.title));return false;"><img src="{$sitepath}/themes/{$themes}/styles/images/yahoo.png" border="0" width="16px" height="16px" /></a>
&nbsp;&nbsp;&nbsp;&nbsp;<g:plusone size="small"></g:plusone>
</div>
{sectionelse}
<div id="info">{#notexist#}</div>
{/section}
{if $videoid eq true}
<div>
{nocache}
{if $smarty.session.loggedin|default eq true}
{/nocache}
{nocache}
{include file="themes/$themes/forms.php"}
{/nocache}
{nocache}
{else}
{/nocache}
{nocache}
<a href="signin.php?creturn={$incname}">&#187; {#mustbe#}</a>
{/nocache}
{nocache}
{/if}
{/nocache}
</div>
{/if}
</div>
<div id="rightblock">
<div class="featurev">
{if $videoid eq true}
<div id="blockhead">{#commentsb#}</div>
{section name="yreviews" loop=$yreviews}
<div class="vfeatured">
<a href="uploads/{$yreviews[yreviews].ycomimage}" title="{$yreviews[yreviews].ycomenter}">
<img src="minthumb/{$yreviews[yreviews].ycomimage}" width="25px" height="25px"alt="{$yreviews[yreviews].ycomenter}" width="50px" height="50px"></a>
<span class="ha3">{$yreviews[yreviews].ycomenter}</span>
{$yreviews[yreviews].yctexte|stripslashes}<br /><br />
{if $yreviews[yreviews].ychomes == true}
<a href="{$yreviews[yreviews].ychomes}">
<img style="border:0px;position:relative;top:-6px;" src="themes/{$themes}/styles/images/v_home.png" width="16px" height="16px"></a>
{/if}
<i>{$yreviews[yreviews].ycdate|date_format:"%A, %B %e, %Y - %H:%M:%S"},&nbsp;{$yreviews[yreviews].ycdate|timeAgo}&nbsp;{#ago#}</i>
</div>
{sectionelse}
&#187; {#noreview#}
{/section}
{/if}
</div>
</div>
</div>