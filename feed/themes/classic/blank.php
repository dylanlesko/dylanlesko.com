<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html dir="{$frontext}" xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Pragma" content="cache" />
<meta name="ROBOTS" content="All" />
<meta name="keywords" content="latest news, news, article, story, top story, blog, links, link, directory, free, seo" />
<meta name="description" content="php news script powered by phpenter.net" />
<link href="themes/{$themes}/styles/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/basic.css" />
<link rel="stylesheet" type="text/css" href="themes/{$themes}/styles/style.css" />
<link rel="alternate" type="application/atom+xml" title="{$sitetitle} - RSS" href="{$sitepath}/rss.php" />
<title>{$sitetitle}</title>
<script type="text/javascript" src="scripts/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.8.14.custom.min.js"></script>
<script type="text/javascript" src="scripts/scripts.js"></script>
<script type="text/javascript">
{literal}
$(document).ready(function(){$("a.sendName").click(function(){
var jusername=$("#jusername").val();
var jpassword=$("#jpassword").val();
$.post("signin.php",{jusername:jusername,jpassword:jpassword},function(data){$("#loadName")
.html(data)
.show('drop', { direction: 'left' }, 200)
.effect('bounce', { times: 1, distance: 10 }, 300);
  });
 });
});
{/literal}
</script>
<script type="text/javascript">
{literal}
$('#start').click(function() {
  $('#effects').toggle('fast', function() {
   });
});
{/literal}
</script>
</head>
<body>
<div id="content">
{config_load file="languages/lang_$langs.conf"}
{include file="themes/$themes/maindir.php"}
  <div id="blanks">