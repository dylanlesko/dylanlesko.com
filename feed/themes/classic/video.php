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
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/video.css" />
<link rel="alternate" type="application/atom+xml" title="{$sitetitle} - RSS" href="{$sitepath}/rss.php" />
<title>{#videos#} - {$sitetitle}</title>
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/scripts.js"></script>
</head> 
<body>
<div id="content">
{include file="themes/$themes/maindir.php"}
<div id="blanks">
<div>
<div id="blockhead">{$sitetitle} - {#videos#}</div>
<div class="gallery">
{section name="results" loop=$results}
<div>
<ul><li>
<a href="videoinc.php?vid={$results[results].yuid}"><img id="videoimage" src="http://i1.ytimg.com/vi/{$results[results].yucvideo}/default.jpg" width="120" height="90" border="0" title="{$results[results].yuname}" /></a>
<span class="icaption">&nbsp;&nbsp;{$results[results].ydate|date_format:"%a, %B %e, %y"}</span>
<div id="stars">
{if $results[results].yrating == 0}<img style="position:relative;bottom:2px;border:0px;" src="themes/{$themes}/styles/images/stars0.gif" border="1" />{/if}
{if $results[results].yrating == 1.0}<img style="position:relative;bottom:2px;border:0px;" src="themes/{$themes}/styles/images/stars1.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].yrating == 1.5}<img style="position:relative;bottom:2px;border:0px;" src="themes/{$themes}/styles/images/stars2.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].yrating == 2.0}<img style="position:relative;bottom:2px;border:0px;" src="themes/{$themes}/styles/images/stars2.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].yrating == 2.5}<img style="position:relative;bottom:2px;border:0px;" src="themes/{$themes}/styles/images/stars3.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].yrating == 3.0}<img style="position:relative;bottom:2px;border:0px;" src="themes/{$themes}/styles/images/stars3.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].yrating == 3.5}<img style="position:relative;bottom:2px;border:0px;" src="themes/{$themes}/styles/images/stars4.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].yrating == 4.0}<img style="position:relative;bottom:2px;border:0px;" src="themes/{$themes}/styles/images/stars4.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].yrating == 4.5}<img style="position:relative;bottom:2px;border:0px;" src="themes/{$themes}/styles/images/stars5.gif" width="50px" height="10px" border="0" />{/if}
{if $results[results].yrating == 5.0}<img style="position:relative;bottom:2px;border:0px;" src="themes/{$themes}/styles/images/stars5.gif" width="50px" height="10px" border="0" />{/if}
</div>
<div class="fontgallery">{$results[results].yuname|truncate:52}</div>
</li></ul>
</div>
{/section}
</div>
<div id="paginate">
<span class="disabled">{#videos#} {$paginate.first} - {$paginate.last} {#of#} {$paginate.total}.</span>
{paginate_prev}{paginate_next}
</div>
</div>
</div>