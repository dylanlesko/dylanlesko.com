<?php session_start();
/* * ********************************************************************
*  Copyright notice PHP Enter
*
*  (c) 2011 Predrag Rukavina - admin[at]phpenter[dot]net
*  All rights reserved
*
*  This script is part of the PHP Enter project. 
*  The PHP Enter project is free software; you can redistribute it and/or
*  modify it under the terms of the GNU General Public License
*  as published by the Free Software Foundation; either version 2
*  of the License, or (at your option) any later version.
*
*  This program is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  You should have received a copy of the GNU General Public License
*  along with this program; if not, write to the Free Software
*  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
*  MA  02110-1301, USA.
*
*  This copyright notice MUST appear in all copies of the script!
* ********************************************************************** */
include ('settings.php');
require_once ('languages/lang_'.$langs.'.php');
require_once ('salt.php');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require_once ('classes/securesession.class.php');
$ss = new SecSession();
$ss->check_browser = true;
$ss->check_ip_blocks = 2;
$ss->secure_word = $salt;
$ss->regenerate_id = true;
if (!$ss->Check() || !isset($_SESSION['loggedin']) || !$_SESSION['loggedin'])
  {
     header('Location: signin.php');
     die();
  }
if (!$_SESSION['inecsess'])
  {
    header('Location: signin.php');
    die();
  }
if(get_magic_quotes_gpc()) {
	$main = stripslashes($_POST['main']);
	$comrev = stripslashes($_POST['comrev']);
	$text = stripslashes($_POST['text']);
	$newimg = stripslashes($_POST['newimg']);
	$chomes = stripslashes($_POST['chomes']);
	$ccuid = stripslashes($_POST['ccuid']);
	$text1 = stripslashes($_POST['text1']);
} else {
	$main = $_POST['main'];
	$comrev = $_POST['comrev'];
	$text = $_POST['text'];
	$newimg = $_POST['newimg'];
	$chomes = $_POST['chomes'];
	$ccuid = $_POST['ccuid'];
	$text1 = $_POST['text1'];
}
$name = array($main, $comrev, $text, $newimg, $chomes, $ccuid, $text1);
	$list = "/(content-type|mime-version|content-transfer-encoding|to:|bcc:|cc:|document.cookie|document.write|onmouse|onkey|onclick|onload)/i";
	foreach($name as $name) {
		if(preg_match($list,$name)) {
			echo "<center><font face='verdana'>$lang[INVALIDCHAR] '??' </font></center>";
			die();
		}
	}
$subtext = substr($text1,0,8);
if(@$_SESSION["reloadse"] == $subtext) {
	echo "$lang[BOOKERR9]";
	die();
}
$realmessage = $lang['VIDCOMM2'] . " " . $text;
if(preg_match("/%/",$text1)) {
	echo "<center><div id='error'>$lang[INVALIDCHAR] \"%\" </div>";
	die();
}
if(preg_match("/;/",$text1)) {
	echo "<center><div id='error'>$lang[INVALIDCHAR] \";\" </div>";
	die();
}
if(preg_match("/</",$text1)) {
	echo "<center><div id='error'>$lang[INVALIDCHAR] \"<\" </div>";
	die();
}
if(preg_match("/\\[/",$text1)) {
	echo "<center><div id='error'>$lang[INVALIDCHAR] \"[\" </div>";
	die();
}
if(strlen($chomes) > 0) {
	if(!preg_match("/^(https?:\/\/+[\w\-]+\.[\w\-]+)/i",$chomes)) {
		echo "<center><div id='error'>$lang[VIDOERR1]";
		die();
	}
}
if(strlen($chomes) > 200) {
	echo "<center>$lang[POSTERR2]
<a href=\"javascript:history.go(-1)\">$lang[BOOKBACK]</a></center>";
	die();
}
if(strlen($text1) < 5) {
	echo "<center><div id='error'>$lang[SEAERR5] <a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a></center>";
	die();
}
if(strlen($text1) > 800) {
	echo "<center><div id='error'>$lang[VIDOERR] <a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a></center>";
	die();
}
if($comrev == false) {
	echo 'Error [72]';
	die();
}
@$_SESSION["reloadse"] = $subtext;
$text1 = htmlspecialchars($text1);
$time = date("Y-m-d H:i:s");
$sql = $conn->Prepare('INSERT INTO publictime (userid,texty,imgs,date,amess) VALUES (?, ?, ?, ?, ?)');
if($conn->Execute($sql,array($ccuid,$text,$newimg,$time,$realmessage)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
	}
$sql2 = $conn->Prepare('INSERT INTO tubereview (ycomrev,ycmain,ycomenter,ycomimage,ychomes,ycdate,yctexte) VALUES (?, ?, ?, ?, ?, ?, ?)');
if($conn->Execute($sql2,array($comrev,"1",$text,$newimg,$chomes,$time,$text1)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
	}
$sql3 = $conn->Prepare('UPDATE tubevideo SET ycommno = ycommno +  ? WHERE yuid = ?');
if($conn->Execute($sql3,array("1",$comrev)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
}
$conn->Close();
$asty = $_SERVER['HTTP_REFERER']; ?>
<head>
<script type="text/javascript">
function delayer(){ 
window.location = "<?php echo $asty ?>"
    }
</script>
</head>
<body onLoad="setTimeout('delayer()', 2000)">
<center><div style='text-align:center;width:468px;margin:0px auto;min-height:70px;max-height:80px;background: #F8F8F8;font-size:12px;color:#555;font-family:tahoma;helvetica,arial;border-top: 1px dashed #EEE;margin-top:32px;padding-top:8px;'><?php echo $lang['CREDIR'] ?><br /><br /><img src="themes/<?php echo $themes; ?>/styles/images/ajax-loader.gif" border="0"><br /></div></center>
<?php
######################################
##comments.php                4.1.4.##
######################################
?>