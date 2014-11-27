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
include ('bookconf.php');
require_once ('languages/lang_'.$langs.'.php');
require_once ('salt.php');
require_once ('classes/securesession.class.php'); ?>
<head>
<link href="themes/<?php echo $themes ?>/styles/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="themes/<?php echo $themes ?>/styles/bookmark.css" />
<title><?php echo $lang['BOOKTITLE'] ?></title>
<script language="JavaScript">
function textCounter(field, countfield, maxlimit) {
if (field.value.length > maxlimit)
field.value = field.value.substring(0, maxlimit);
else 
countfield.value = maxlimit - field.value.length;
}
</script>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
</head>
<?php
if(isset($_POST['Submit'])) {
	if(get_magic_quotes_gpc()) {
		$ccuser = stripslashes($_POST['username']);
		$ccpass = stripslashes($_POST['password']);
		$geturl = stripslashes($_POST['geturl']);
		$urld = stripslashes($_POST['urld']);
		$gettitle = stripslashes($_POST['gettitle']);
	} else {
		$ccuser = $_POST['username'];
		$ccpass = $_POST['password'];
		$geturl = $_POST['geturl'];
		$urld = $_POST['urld'];
		$gettitle = $_POST['gettitle'];
	}
	if(preg_match('#[^A-Za-z0-9]#',$ccuser)) {
		echo "<div id='error'>$lang[ONLY]<a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a>";
		Die();
	}
	if(preg_match('#[^A-Za-z0-9]#',$ccpass)) {
		echo "<div id='error'>$lang[ONLY]<a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a>";
		Die();
	}
	$name = array($ccuser,$ccpass,$geturl,$urld,$gettitle);
	$list = "/(content-type|mime-version|content-transfer-encoding|to:|bcc:|cc:|document.cookie|document.write|onmouse|onkey|onclick|onload)/i";
	foreach($name as $name) {
		if(preg_match("/</",$name)) {
			echo "<div id='error'>$lang[INVALIDCHAR] '<'";
			Die();
		}
		if(preg_match("/\\[/",$name)) {
			echo "<div id='error'>$lang[INVALIDCHAR] '['";
			Die();
		}
		if(preg_match($list,$name)) {
			echo "<center><font face='verdana'>$lang[INVALIDCHAR] '??' </font></center>";
			die();
		}
	}
	if(strlen($ccuser) < 4) {
		echo "<div id='error'>$lang[ONLY]<a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a>";
		die();
	}
	if(strlen($ccuser) > 20) {
		echo "<div id='error'>$lang[ONLY]<a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a>";
		die();
	}
	if(strlen($ccpass) < 4) {
		echo "<div id='error'>$lang[ONLY]<a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a>";
		die();
	}
	if(strlen($ccpass) > 20) {
		echo "<div id='error'>$lang[ONLY]<a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a>";
		die();
	}
	if(preg_match("/\\s/",$ccuser)) {
		echo "<div id='error'>$lang[NOSPACE]</font></center>";
		die();
	}
	if(preg_match("/\\s/",$ccpass)) {
		echo "<div id='error'>$lang[NOSPACE]</font></center>";
		die();
	}
	if(preg_match("/%/",$ccuser)) {
		echo "<div id='error'>$lang[INVALIDCHAR]  '%' ";
		die();
	}
	if(preg_match("/;/",$ccpass)) {
		echo "<div id='error'>$lang[INVALIDCHAR] ';' ";
		die();
	}
	if(preg_match("/%/",$ccpass)) {
		echo "<div id='error'>$lang[INVALIDCHAR]  '%' ";
		die();
	}
	if(preg_match("/;/",$ccuser)) {
		echo "<div id='error'>$lang[INVALIDCHAR] ';' ";
		die();
	}
	if(strlen($geturl) < 4) {
		echo "<div id='error'>$lang[BOOKERR3]<a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a>";
		die();
	}
	if(strlen($geturl) > 280) {
		echo "<div id='error'>$lang[BOOKERR3]<a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a>";
		die();
	}
	if(strlen($urld) < 2) {
		echo "<div id='error'>$lang[BOOKERR3]<a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a>";
		die();
	}
	if(strlen($urld) > 280) {
		echo "<div id='error'>$lang[BOOKERR3]<a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a>";
		die();
	}
	if(strlen($gettitle) < 3) {
		echo "<div id='error'>$lang[BOOKERR5]<a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a>";
		die();
	}
	if(strlen(@gettitle) > 200) {
		echo "<div id='error'>$lang[BOOKERR6]<a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a>";
		die();
	}
	$ccpass = md5($_POST['password']);
	$ccpass = $conn->addq($ccpass);
	$ccuser = $conn->addq($ccuser);
	$brecordSet = $conn->Execute('SELECT * FROM users WHERE username = ? and password = ? LIMIT 1',array($ccuser,
		$ccpass));
	if($brecordSet) {
		if($brecordSet->fields == 0) {
			echo "<div id='error'>".$lang['SIGFAL']." <a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a></div>";
			die();
		} else {
			$sesrow = $brecordSet->fields['active'];
			if($sesrow == 0) {
				echo "<div id='error'>$lang[SIGNOT]</div><br />";
				exit();
			}
			if($sesrow == 3) {
				echo "<div id='error'>$lang[SIGAPR]</div>";
				exit();
			}
			$ss = new SecSession();
			$ss->check_browser = true;
			$ss->check_ip_blocks = 2;
			$ss->secure_word = $salt;
			$ss->regenerate_id = true;
			$ss->Open();
			$_SESSION['INC_USER_ID'] = $brecordSet->fields['usid'];
			;
			$_SESSION['INC_USER_NAME'] = $brecordSet->fields['username'];
			$_SESSION['INC_USER_THUMB'] = $brecordSet->fields['thumbs'];
			$_SESSION['INC_USER_PRIV'] = $brecordSet->fields['privilege'];
			$_SESSION['loggedin'] = true;
			$incsess = md5(uniqid(rand(),TRUE));
			$_SESSION['inecsess'] = $incsess;
			session_write_close();
			$brecordSet->MoveNext();
		}
		$link = $urld;
		$mtitle = $gettitle; ?>
<head>
<script type="text/javascript">
function delayer(){
window.location = "bookmark.php?urld=<?php echo $link; ?>&title=<?php echo $mtitle; ?>"
}
</script>
</head>
<body onLoad="setTimeout('delayer()',2000)">
<?php
}
	$brecordSet->Close();
	$conn->Close();
} else {
?>
<div id="line"><?php echo $sitetitle ?></div>
<form action="bookform.php" method="post">
<div><?php echo $lang['BOOKERR8'] ?></div>
<input type="hidden" name="geturl" value="<?php echo $geturl ?>" />
<input type="hidden" name="gettitle" value="<?php echo $gettitle ?>" />
<input type="hidden" name="urld" value="<?php echo $urld ?>" />
<br /><?php echo $lang['USER'] ?>:<br />
<input id="lareass" name="username" type="text" />
<br /><?php echo $lang['PASS'] ?>:<br />
<input id="lareass" name="password" type="password" />
<br />
<input type="submit" class="sendName" value="<?php echo $lang['LINKSUB'] ?>" name="Submit" />
</form>
<?php
}
######################################
##bookform.php                4.2.1.##
######################################
?>