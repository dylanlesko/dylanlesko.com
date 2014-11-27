<?php @session_start();
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
include_once ('bookconf.php');
require_once ('salt.php');
require_once ('classes/securesession.class.php');
$ss = new SecSession();
$ss->check_browser = true;
$ss->check_ip_blocks = 2;
$ss->secure_word = $salt;
$ss->regenerate_id = true;
if(!$ss->Check() || !isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
	die();
}
if(!$_SESSION['inecsess']) {
	die();
}
?>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
<meta http-equiv="Pragma" content="cache" />
<meta name="ROBOTS" content="All" />
<meta name="keywords" content="{$keywords}" />
<meta name="description" content="{$metadesc}" />
<link href="themes/{$themes}/styles/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="themes/<?php echo $themes; ?>/styles/bookmark.css" />
<title>{$sitetitle}</title>
</head> 
<?php
require_once ('languages/lang_'.$langs.'.php');
$shouter = @$_SESSION['INC_USER_ID'];
$drecordSet = &$conn->Execute('SELECT * FROM users WHERE usid = ? LIMIT 1',array($shouter));
if(!$drecordSet)
	print $conn->ErrorMsg();
else
	while(!$drecordSet->EOF) {
		$priv = $drecordSet->fields['privilege'];
		$kori = $drecordSet->fields['usid'];
		$usercc = $drecordSet->fields['username'];
		$thumbs = $drecordSet->fields['thumbs'];
		if($priv == 1) {
			echo "<div id='error'>".$lang['MUSTPR']."&nbsp;".$lang['MUSTCO']."<a href=\"mailto:".$sitemail."\">&nbsp".$lang['MUSTWE'].
				"</a>&nbsp".$lang['MUSTSI']."</div></div>";
			die();
		}
		$drecordSet->MoveNext();
	}
if(get_magic_quotes_gpc()) {
	$samess = stripslashes($_POST['samess']);
	$urames = stripslashes($_POST['urames']);
	$areass = stripslashes($_POST['areass']);
	$areass = htmlspecialchars($areass);
} else {
	$samess = $_POST['samess'];
	$urames = $_POST['urames'];
	$areass = $_POST['areass'];
	$areass = htmlspecialchars($areass);
}
$name = array($samess,$urames,$areass);
$list = "/(content-type|mime-version|content-transfer-encoding|to:|bcc:|cc:|document.cookie|document.write|onmouse|onkey|onclick|onload)/i";
foreach($name as $name) {
	if(preg_match($list,$name)) {
		echo "<center><font face='verdana'>$lang[INVALIDCHAR] '??' </font></center>";
		die();
	}
	if(preg_match("/</",$name)) {
		echo "<div id='error'>$lang[INVALIDCHAR] '<' <a href='javascript:location.reload(true)'>$lang[BOOKBACK]</a>";
		Die();
	}
	if(strlen($name) < 3) {
		echo "<div id='error'>$lang[BOOKERR5] <a href='javascript:location.reload(true)'>$lang[BOOKBACK]</a>";
		die();
	}
	if(strlen($name) > 300) {
		echo "<div id='error'><div id='error'>$lang[BOOKERR6] <a href='javascript:location.reload(true)'>$lang[BOOKBACK]</a>";
		die();
	}
}
if(@$_SESSION["reloads"] == $areass) {
	echo "<div id='error'>$lang[BOOKERR9]";
	die();
}
if(@$_SESSION["noreloads"] > 10) {
	echo "<div id='error'>Error [24]";
	die();
}
@$_SESSION["noreloads"] = @$_SESSION["noreloads"] + 1;
@$_SESSION["reloads"] = $areass;
$time = date("Y-m-d H:i:s");
$sql = $conn->Prepare('INSERT INTO publictime (isitrue,userid,texty,imgs,date,amess,indesc,incurl) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
if($conn->Execute($sql,array("2",$kori,$usercc,$thumbs,$time,$samess,$areass,$urames)) === false) {
	print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
}
$drecordSet->Close();
$conn->Close();
?>
<div id="slide">See You Later Alligator</div>
<script type="text/javascript">
function closeWindow() {
setTimeout(function() {
window.close();
}, 1200);
}
window.onload = closeWindow();
</script>
<?php
######################################
##bookset.php                 4.2.1.##
######################################
 ?>