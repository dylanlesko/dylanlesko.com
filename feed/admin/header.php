<?php session_start();
require_once 'salt.php';
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require_once 'securesession.class.php';
$ss = new SecureSession();
$ss->check_browser = true;
$ss->check_ip_blocks = 2;
$ss->secure_word = $salt;
$ss->regenerate_id = true;
if(!$ss->Check() || !isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
	header('Location: signin.php');
	die();
}
 if (!$_SESSION['incsess'])
  {
    die();
  }
include ('../classes/adodb/adodb.inc.php');
include ('config.php');
$dbdriver = "mysql";
$ADODB_CACHE_DIR = '../db/ADODB_cache';
$conn = &ADONewConnection($dbdriver);
$conn->Connect($server,$user,$password,$database);
$recordSet = &$conn->Execute('SELECT optionid, nameopt, valueopt, module, active FROM abcoption');
if(!$recordSet)
	print $conn->ErrorMsg();
else
	while(!$recordSet->EOF) {
		if($recordSet->fields['module'] == 1) {
			$arr[] = $recordSet->fields;
		}
		$option[$recordSet->fields[0]] = $recordSet->fields[2];
		$recordSet->MoveNext();
	}
$sitetitle = $option[1];
$metadesc = $option[2];
$keywords = $option[3];
$sitepath = $option[4];
$language = $option[5];
$caching = $option[6];
$themes = $option[7];
$sitemail = $option[8];
$sitedisabled = $option[9];
$rewritemod = $option[10];
$toplinks = $option[11];
$frontext = $option[12];
$customheader = $option[13];
$signuprole = $option[14];
$signupapp = $option[15];
$newson = $option[16];
$newstext = $option[17];
$siteabout = $option[18];
$siteprivacy = $option[19];
$siteterms = $option[20];
$messaging = $option[21];
$maxposting = $option[22];
$editortrue = $option[23];
$smilestrue = $option[24];
$smilespath = $option[25];
$maxtopic = $option[26];
$hottopic = $option[27];
$adsoffon = $option[28];
$senseup = $option[29];
$sensedown = $option[30];
$stopspam = $option[31];
$incitem = $option[32];
$keypublic = $option[33];
$slider = $option[35];
$efslide = $option[36];
$payoffon = $option[37];
$payvalue = $option[38];
$payday = $option[39];
$timeline = $option[40];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<table width="850px" background="images/header.jpg" height="35px" cellspacing="2" cellpadding="5" align="center" border="0">
 <tr>
  <td align="right" width="180px">
   <div id=stopnavy><strong>Control Panel</strong></div>
   </td>
   <td>
   </td>
   <td align="left" width="180px"><strong><font color="#FFFFFF"><div id="topnavy"><div id="stopnavy">PHP Enter</div></div></font></strong>
  </td>
 </tr>
</table>
<table cellspacing=1 cellpadding=0 width="852px" align="center" border="0">
 <tr>
   <td width="180px" valign="top"><div id="border">
<div id="headers"><img src="images/home.png" width="16" height="16" border="0" />&nbsp;&nbsp;Home</div>
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="index.php">Admin</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="<?php echo $sitepath; ?>">Main</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;Version: 4.2.7.<br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;Licence: GNU GPL<br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="signout.php">Log Out</a><br />
<div id="headers"><img src="images/configuration.png" width="16" height="16" border="0">&nbsp;&nbsp;Settings</div>
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="index.php">Configuration</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="pages.php">Static Pages</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="meta.php">Meta Desc & Keywords</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="announ.php">Announcements</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="protect.php">Spam Protection</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="caching.php">Cache</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="editing.php">Editing/Deleting Posts</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="posting.php">Posting</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="register.php">Registration Settings</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="optimize.php">Optimize Tables</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="frontpage.php">Front Page</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="cheader.php">Custom Header</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="menu.php">Top Menu</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="modules.php">Modules</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="htprotect.php">Htpasswd Password</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="gcomment.php">Allow Guest Reviews</a><br />
<div id="headers"><img src="images/news.png" width="16" height="16" border="0">&nbsp;&nbsp;Listing</div>
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="<?php echo $sitepath ?>/addnews.php">Submit New Story</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="listsearch.php">Search News</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="menage.php">Manage News</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="reviews.php">News Comments</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="sponsored.php">Sponsored Listing</a><br />
<div id="headers"><img src="images/categories.png" width="16" height="16" border="0">&nbsp;&nbsp;Categories</div>
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="addcat.php">New Category</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="editcat.php">Manage Categories</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="addcsub.php">New SubCategories</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="editsub.php">Manage SubCategories</a><br />
<div id="headers"><img src="images/videos.png" width="16" height="16" border="0">&nbsp;&nbsp;Videos</div>
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="videosearch.php">Search Videos</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="videos.php">Manage Videos</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="videom.php">Video Comments</a><br />
<div id="headers"><img src="images/gallery.png" width="16" height="16" border="0">&nbsp;&nbsp;Gallery</div>
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="gallery.php">Images</a><br />
<div id="headers"><img src="images/users.png" width="16" height="16" border="0">&nbsp;&nbsp;Members</div>
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="user.php">Members</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="usersearch.php">Search Members</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="messages.php">Messages</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="newsletter.php">Newsletter</a><br />
<div id="headers"><img src="images/banner.png" width="16" height="16" border="0">&nbsp;&nbsp;Banners</div>
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="ads.php">Banners</a><br />
<div id="headers"><img src="images/support.png" width="16" height="16" border="0">&nbsp;&nbsp;Support</div>
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="http://www.phpenter.net/shop.php">Pro Shop</a><br />
&nbsp;<img src="images/bullet.gif" width="8" height="8" border="0">&nbsp;<a href="http://forums.phpenter.net">Support Forum</a><br /><br />
  </td>
  <td align="left" valign="top"><div id="borders">