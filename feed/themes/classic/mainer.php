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
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/mainer.css" />
<link href="themes/{$themes}/styles/css_pirobox/style_2/style.css" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/atom+xml" title="{$sitetitle} - RSS" href="{$sitepath}/rss.php" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/scripts.js"></script>
<script type="text/javascript" src="scripts/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="scripts/jquery.evoslider.lite-1.1.0.js"></script>
<title>{$sitetitle}</title>
</head> 
<body>
<div id="content">
{config_load file="languages/lang_$langs.conf"}
{include file="themes/$themes/maindir.php"}
<div id="blanks">
<div id="leftblock">
<div id="top_title">Top News Story</div>
<div id="mySlider" class="evoslider default">
<dl>
{section name="newser" loop=6 start=0}
{if $newser[newser].images neq 0}
<dt></dt>
<dd>
<div class="featuredcontainer">
<div class="thumb-image-wrapper">
{if $rewritemod == 1}
<a href="{$newser[newser].univer}-{if $newser[newser].bhelper eq false}{$newser[newser].btexty|replace:"?":''|replace:"'":''|replace:'"':''|replace:'/':''|replace:':':''|urlencode}{else}{$newser[newser].bhelper}{/if}.html">
<img src="maxthumb/{$newser[newser].images}" border="0" width="300" height="250" alt="{$newser[newser].btexty}" /></a>
{/if}
{if $rewritemod == 2}
<a href="news.php?name={$newser[newser].univer}">
<img src="maxthumb/{$newser[newser].images}" border="0" width="300" height="250" alt="{$newser[newser].btexty}" /></a>
{/if}
</div>
<div id="icaption"></div>
<div id="description">
{if $rewritemod == 1}
<span class="ha8"><a href="{$newser[newser].univer}-{if $newser[newser].bhelper eq false}{$newser[newser].btexty|replace:"?":''|replace:"'":''|replace:'"':''|replace:'/':''|replace:':':''|urlencode}{else}{$newser[newser].bhelper}{/if}.html">{$newser[newser].btexty|stripslashes}</a></span><br />
{/if}
{if $rewritemod == 2}
<span class="ha8"><a href="news.php?name={$newser[newser].univer}">{$newser[newser].btexty|stripslashes}</a></span><br />
{/if}
<br />
{if isset($newser[newser].brief)}{$newser[newser].brief|stripslashes}<br />{/if}
<br />
{if $newser[newser].editor eq 2}
{$newser[newser].bamess|stripslashes|regex_replace:"/[\r]/":"<br />"|truncate:188}
{/if}
{if $newser[newser].editor eq 1}
{$newser[newser].bamess|htmlspecialchars_decode|stripslashes|truncate:230|CloseTags}
{/if}
</div>
</div>
</dd>
{/if}
{/section}
</dl> 
</div>
<script type="text/javascript">
        $("#mySlider").evoSlider({
        mode: "{$efslide}",                  // Sets slider mode ("accordion", "slider", or "scroller")
        width: 670,                         // The width of slider
        height: 260,                        // The height of slider
        slideSpace: 5,                      // The space between slides
        mouse: true,                        // Enables mousewheel scroll navigation
        keyboard: true,                     // Enables keyboard navigation (left and right arrows)
        speed: 500,                         // Slide transition speed in ms. (1s = 1000ms)
        easing: "swing",                    // Defines the easing effect mode
        loop: true,                         // Rotate slideshow
        autoplay: true,                     // Sets EvoSlider to play slideshow when initialized
        interval: 5000,                     // Slideshow interval time in ms
        pauseOnHover: true,                 // Pause slideshow if mouse over the slide
        pauseOnClick: true,                 // Stop slideshow if playing
        directionNav: false,                 // Shows directional navigation when initialized
        directionNavAutoHide: false,        // Shows directional navigation on hover and hide it when mouseout
        controlNav: true,                   // Enables control navigation
        controlNavAutoHide: false           // Shows control navigation on mouseover and hide it when mouseout 
    });                                
    </script>
<div id="intro"><img src="themes/{$themes}/styles/images/rss.png" width="16px" height="11px" /><a href="rsscat.php">{#intro#}</a></div>
<div id="list" style="float:left;">
{section name="onewse" loop=23 start=7}
{if $onewse[onewse].oamess eq false}.{else}
<div id="side-a">
{if $onewse[onewse].omages neq 0}
{if $rewritemod == 1}
<a href="{$onewse[onewse].oniver}-{if $onewse[onewse].ohelper eq false}{$onewse[onewse].otexty|replace:"?":''|replace:"'":''|replace:'"':''|replace:'/':''|replace:':':''|urlencode}{else}{$onewse[onewse].ohelper}{/if}.html">
<img src="minthumb/{$onewse[onewse].omages}" border="0" width="144" height="82" alt="{$onewse[onewse].otexty}" /></a>
{/if}
{if $rewritemod == 2}
<a href="news.php?name={$onewse[onewse].oniver}">
<img src="minthumb/{$onewse[onewse].omages}" border="0" width="144" height="82" alt="{$onewse[onewse].otexty}" /></a>
{/if}
{else}
<img src="themes/{$themes}/styles/images/noimage.png" width="144px" height="82px" alt="{$onewse[onewse].otexty}" />
{/if}
<br />
{if $rewritemod == 1}
<span class="ha3"><a href="{$onewse[onewse].oniver}-{if $onewse[onewse].ohelper eq false}{$onewse[onewse].otexty|replace:"?":''|replace:"'":''|replace:'"':''|replace:'/':''|replace:':':''|urlencode}{else}{$onewse[onewse].ohelper}{/if}.html">{$onewse[onewse].otexty|stripslashes|truncate:65}</a></span>
{/if}
{if $rewritemod == 2}
<span class="ha3"><a href="news.php?name={$onewse[onewse].oniver}">{$onewse[onewse].otexty|stripslashes|truncate:65}</a></span>
{/if}
<br />
{$onewse[onewse].oamess|stripslashes|truncate:150}
</div>
{/if}
{/section}
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
{section name="onewse" loop=$onewse start=23}
{if $onewse[onewse].oamess eq false}{else}
<div id="ha5">
{if $rewritemod == 1}
<span class="ha3"><a href="{$onewse[onewse].oniver}-{if $onewse[onewse].ohelper eq false}{$onewse[onewse].otexty|replace:"?":''|replace:"'":''|replace:'"':''|replace:'/':''|replace:':':''|urlencode}{else}{$onewse[onewse].ohelper}{/if}.html">{$onewse[onewse].otexty}</a></span>
{/if}
{if $rewritemod == 2}
<span class="ha3"><a href="news.php?name={$onewse[onewse].oniver}">{$onewse[onewse].otexty}</a></span>
{/if}
<br />
{$onewse[onewse].oamess|truncate:230}
<br />
{if $rewritemod == 1}
<a href="{$onewse[onewse].oniver}-{if $onewse[onewse].ohelper eq false}{$onewse[onewse].otexty|replace:"?":''|replace:"'":''|replace:'"':''|replace:'/':''|replace:':':''|urlencode}{else}{$onewse[onewse].ohelper}{/if}.html">{#readmore#}</a>
{/if}
{if $rewritemod == 2}
<a href="news.php?name={$onewse[onewse].oniver}">{#readmore#}</a>
{/if}
</div>
{/if}
{/section}
</div>
<div id="blockd">
<div id="blockhead">{#community#}</div>
{section name="reviews" loop=$reviews}
<div class="lfeat">
{if $reviews[reviews].comimage neq '0'}
<img src="minthumb/{$reviews[reviews].comimage}" alt="{$reviews[reviews].comenter}" width="25x" height="25px" border="0">
<a href="uploads/{$reviews[reviews].comimage}" rel="gallery" class="pirobox_gall"></a>
{else}
<img src="themes/{$themes}/styles/images/penguin.png" alt="{$reviews[reviews].comenter}" width="25x" height="25px" border="0">
{/if}
{if $rewritemod == 1}
<span class="ha3"><a href="{$reviews[reviews].comrev}{if $reviews[reviews].chelper eq true}-{$reviews[reviews].chelper}{/if}.html"><strong>{$reviews[reviews].comenter}</strong></a></span>
{/if}
{if $rewritemod == 2}
<span class="ha3"><a href="news.php?name={$reviews[reviews].comrev}"><strong>{$reviews[reviews].comenter}</strong></a></span>
{/if}
{$reviews[reviews].ctexte|stripslashes|truncate:230}<br />
<div id="realysmall">{$reviews[reviews].cdate|date_format:"%A, %B %e, %Y, %H:%M:%S"}</div>
</div>
{/section}
</div>
</div>
</div>