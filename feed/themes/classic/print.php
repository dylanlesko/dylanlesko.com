<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html dir="{$frontext}" xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
<meta http-equiv="Pragma" content="cache" />
<meta name="ROBOTS" content="All" />
<meta name="keywords" content="latest news, news, article, story, top story, blog, links, link, directory, free, seo" />
<meta name="description" content="php news script powered by phpenter.net" />
<link href="themes/{$themes}/styles/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/style.css" />
<link rel="alternate" type="application/atom+xml" title="{$sitetitle} - RSS" href="{$sitepath}/rss.php" />
<title>{section name="newser" loop=$newser}{$newser[newser].btexty}{/section} - {$sitetitle}</title>
</head> 
<body style="background:#ffffff">
<div id="content" style="width:678px">
<a href="index.php"><span class="ha7">Home</span></a>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" style="background:#fff;color:#555;border:1px solid #fff;font-weight:normal;font-size:12px;" value="Print Page" onclick="window.print()" />
<br /><br />
{section name="newser" loop=$newser}
<span class="ha2">{$newser[newser].btexty}</span> <br />
<br />
{if $newser[newser].editor eq 2}
{$newser[newser].bamess|stripslashes|regex_replace:"/[\r]/":"<br />"}<br /> 
{/if}
{if $newser[newser].editor eq 1}
{$newser[newser].bamess|htmlspecialchars_decode|regex_replace:"/[\r]/":"<br />"}<br /> 
{/if}
{/section}<br />
<br /> <span class="ha7">Comments</span><br />
<br />
{section name="reviews" loop=$reviews}
<span class="ha7">{$reviews[reviews].comenter}</span>
{if $reviews[reviews].chomes == true}
<a href="{$reviews[reviews].chomes}"><b>{$reviews[reviews].chomes}</b></a>
{/if}
<br /><br />{$reviews[reviews].ctexte|stripslashes}&nbsp;&nbsp;<br /><br />
{/section}<br />
<br />
</body>
</html>