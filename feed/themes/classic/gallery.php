{config_load file="languages/lang_$langs.conf"}
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
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/gallery.css" />
<link href="themes/{$themes}/styles/css_pirobox/style_2/style.css" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/atom+xml" title="{$sitetitle} - RSS" href="{$sitepath}/rss.php" />
<title>{$sitetitle} - {#gallery#}</title>
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="scripts/pirobox_extended.js"></script>
<script type="text/javascript" src="scripts/scripts.js"></script>
<script type="text/javascript">
{literal}
 $(document).ready(function() {
 $().piroBox_ext({
 piro_speed : 700,
 bg_alpha : 0.5,
 piro_scroll : true
 });
});
{/literal}
</script>
</head> 
<body>
<div id="content">
{include file="themes/$themes/maindir.php"}
<div id="blanks">
<div>
<div id="blockhead">{$sitetitle} - {#gallery#}</div>
<div class="gallery">
{section name="results" loop=$results}
<div>
<ul><li style="background:{cycle values="#F8F8F8,#f5f5f5"}">
<a href="uploads/{$results[results].guniver}" rel="gallery"  class="pirobox_gall" alt="{$results[results].gtitle}" title="{$results[results].gtitle}">
<img src="minthumb/{$results[results].guniver}" alt="{$results[results].gtitle}" title="{$results[results].gtitle}" width="144" height="82" border="0" /></a>
<span class="icaption">&nbsp;&nbsp;{$results[results].gdate|date_format:"%a, %B %e, %Y"}</span>
<div class="fontgallery">{$results[results].gtitle|wordwrap:12|truncate:49}</div>
</li></ul>
</div>
{/section}
</div>
<div id="paginate">
<span class="disabled">{$paginate.first} - {$paginate.last} of {$paginate.total}.</span>
{paginate_prev}{paginate_next}
</div>
</div>
</div>