<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html dir="{$frontext}" xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
<meta http-equiv="Pragma" content="cache" />
<meta name="ROBOTS" content="All" />
<meta name="keywords" content="latest news, news, article, story, top story, blog, links, link, directory, free, seo" />
<meta name="description" content="php news script powered by phpenter.net" />
<link href="themes/styles/{$themes}/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/basic.css" />
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/style.css" />
<link href="themes/{$themes}/styles/css_pirobox/style_1/style.css" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/atom+xml" title="{$sitetitle} - RSS" href="{$sitepath}/rss.php" />
<title>{$sitetitle}</title>
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/scripts.js"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="scripts/pirobox_extended.js"></script>
<script type="text/javascript">
$(document).ready(function() {
 $().piroBox_ext({
 piro_speed : 700,
 bg_alpha : 0.5,
 piro_scroll : true
 });
 });
</script>
</head>
<body>
<div id="content">
{config_load file="languages/lang_$langs.conf"}
{include file="themes/$themes/maindir.php"}
<div id="blanks">  