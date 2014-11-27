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
unset($_SESSION['cusid']);
unset($_SESSION['INC_USER_ID']);
unset($_SESSION['INC_USER_NAME']);
unset($_SESSION['CC_MODER']);
unset($_SESSION['INC_USER_THUMB']);
unset($_SESSION['INC_USER_PRIV']);
unset($_SESSION['HTTP_USER_AGENT']);
unset($_SESSION['logged_in']);
unset($_SESSION['loggedin']);
unset($_SESSION['ss_fprint']);
unset($_SESSION['incsess']);
unset($_SESSION['inecsess']);
include ('settings.php');
require_once ('languages/lang_'.$langs.'.php');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if(isset($_POST['Submit'])) {
if (!isset($_SESSION["jumps"]))
$_SESSION["jumps"] = 0;
$_SESSION["jumps"] = $_SESSION["jumps"] + 1;
if ($_SESSION["jumps"] > 25) {
//echo "<center><div style='width:468px;height:25px;margin:0px auto;background: #F8F8F8;font-size:12px;color:#404040;font-family:tahoma;helvetica,arial;border-top: 1px dashed #EEE;margin-top:32px;padding-top:8px;'>Error</div></center>";
//die();
}
if(get_magic_quotes_gpc()) {
		$ccuser = stripslashes($_POST['username']);
		$ccpass = stripslashes($_POST['password']);
		
	} else {
		$ccuser = $_POST['username'];
		$ccpass = $_POST['password'];
		}
$name = array($ccuser,$ccpass);
if($stopspam == 2) {
if((@$_POST['check']) <> @$_SESSION['check']) {
if(strlen($_POST['check']) < 4) {
		echo "<center><div style='width:468px;height:25px;margin:0px auto;background: #F8F8F8;font-size:12px;color:#404040;font-family:tahoma;helvetica,arial;border-top: 1px dashed #EEE;margin-top:32px;padding-top:8px;'>$lang[SEAERR5]</div></center>";
		die();
	}

		echo "<center><div style='width:468px;height:25px;margin:0px auto;background: #F8F8F8;font-size:12px;color:#404040;font-family:tahoma;helvetica,arial;border-top: 1px dashed #EEE;margin-top:32px;padding-top:8px;'>$lang[WRONGCAP] <a href='link.php'><font color='green'>$lang[GOBACK]</font></a></div></center>";
                unset($_SESSION['check']);
	        session_destroy();
		die();
	        }
}
@$return = $_POST['return'];
$list = "/(content-type|mime-version|content-transfer-encoding|to:|bcc:|cc:|document.cookie|document.write|onmouse|onkey|onclick|onload)/i";
	foreach($name as $name) {
		if(preg_match("/\\s/",$name)) {
			echo "<center><font face='verdana'>$lang[NOSPACE]</font></center>";
			die();
		}
		if(preg_match("/%/",$name)) {
			echo "<center><font face='verdana'>$lang[INVALIDCHAR]  '%' </font></center>";
			die();
		}
		if(preg_match("/;/",$name)) {
			echo "<center><font face='verdana'>$lang[INVALIDCHAR] ';' </font></center>";
			die();
		}
		if(preg_match("/</",$name)) {
			echo "<center><font face='verdana'>$lang[INVALIDCHAR] '<' </font></center>";
			die();
		}
		if(preg_match("/\\[/",$name)) {
			echo "<center><font face='verdana'>$lang[INVALIDCHAR] '[' </font></center>";
			die();
		}
		if(strlen($name) < 4) {
			echo "<center><font face='verdana'>$lang[SEAERR5]</font></center>";
			die();
		}
		if(strlen($name) > 40) {
			echo "<center><font face='verdana'>$lang[SEAERR6]</font></center>";
			die();
		}
		if(preg_match($list,$name)) {
			echo "<center><font face='verdana'>$lang[INVALIDCHAR] '??' </font></center>";
			die();
		}
	}
$ccpass = md5($_POST['password']);
$brecordSet = $conn->Execute('SELECT * FROM users WHERE username = ? and password = ? LIMIT 1', array($ccuser, $ccpass));
if($brecordSet) {
	if($brecordSet->fields == 0) {
        echo "<center><div style='width:468px;height:25px;margin:0px auto;background: #F8F8F8;font-size:12px;color:#404040;font-family:tahoma;helvetica,arial;border-top: 1px dashed #EEE;margin-top:32px;padding-top:8px;'>$lang[SIGFAL] <a href='link.php'><font color='green'>$lang[GOBACK]</font></a></div></center>";
        $conn->Close();
		die();
	} else {
		$sesrow = $brecordSet->fields['active'];
		if($sesrow == 0) {
			echo "<center><div style='margin-top:12px;background:#F8FAFC;text-align:left;border-top:1px solid #B5D4FE;border-bottom:1px solid #B5D4FE;width:444px;color:#444;font-family:Arial,Sans-Serif;font-size:14px;padding:5px 20px 5px 45px;'>$lang[SIGNOT]</div><br />";
			$conn->Close();
			exit();
		}
		if($sesrow == 3) {
			echo "<center><div style='margin-top:12px;background:#F8FAFC;text-align:left;border-top:1px solid #B5D4FE;border-bottom:1px solid #B5D4FE;width:444px;color:#444;font-family:'Lucida Grande',Verdana,Arial,Sans-Serif;font-size:10px;padding:5px 20px 5px 45px;'>$lang[SIGAPR]</div>";
			$conn->Close();
			exit();
		}
require_once ('salt.php');
require_once ('classes/securesession.class.php');
$ss = new SecSession();
$ss->check_browser = true;
$ss->check_ip_blocks = 2;
$ss->secure_word = $salt;
$ss->regenerate_id = true;
$ss->Open();
$_SESSION['INC_USER_ID'] = $brecordSet->fields['usid'];
$_SESSION['INC_USER_NAME'] = $brecordSet->fields['username'];
$_SESSION['INC_USER_THUMB'] = $brecordSet->fields['thumbs'];
$_SESSION['INC_USER_PRIV'] = $brecordSet->fields['privilege'];
$_SESSION['loggedin'] = true;
$incsess = md5(uniqid(rand(),TRUE));
$_SESSION['inecsess'] = $incsess;
session_write_close();
$incuser = $brecordSet->fields['usid'];
$brecordSet->MoveNext();
	}
$conn->Close();
?>
<head>
<?php
if(@$return == true) {
		$link = $return;
		$itext = $lang['SIGFIR'];
	} else{
			$link = "link.php";
			$itext = $lang['SIGSEC'];
		}
?>
<script type="text/javascript">
function delayer(){
window.location = "<?php echo $link ?>"
}
</script>
</head>
<body onLoad="setTimeout('delayer()', 1200)">
<center><div style='text-align:center;width:468px;margin:0px auto;min-height:60px;max-height:80px;background: #F8F8F8;font-size:12px;color:#555;font-family:tahoma;helvetica,arial;border-top: 1px dashed #EEE;margin-top:32px;padding-top:8px;'><?php echo $itext ?><br /><br /><img src="themes/<?php echo $themes; ?>/styles/images/ajax-loader.gif" border="0"><br /></div></center>
<?php
}
}else{
@$return = $_GET['return'];
@$creturn = $_GET['creturn'];
?>
<html>
<head>
<meta charset="UTF-8" />
<style>
body{text-align:center}
input {
padding: 6px;
font-size: 13px;
font-weight: normal;
border: 1px solid #00728F;
width: 208px;
color: #333;
margin-top: 5px;
height: 30px;
background-color:#f8f8f8;
background-image: linear-gradient(bottom, white 22%, #E5E5E5 85%);
background-image: -o-linear-gradient(bottom, white 22%, #E5E5E5 85%);
background-image: -moz-linear-gradient(bottom, white 22%, #E5E5E5 85%);
background-image: -webkit-linear-gradient(bottom, white 22%, #E5E5E5 85%);
background-image: -ms-linear-gradient(bottom, white 22%, #E5E5E5 85%);
}
h1{color:#316796;font-weight:normal;}
#content {
margin:0px auto;width:556px;
text-align:left;
background: #EBEBE5;
border: 1px solid #eee;
font-size: 13px;
font-family: Arial, sans-serif;
color:#404040;
box-shadow: 0 0 10px #B4B4B4;
-moz-box-shadow: 0 0 10px #B4B4B4;
-webkit-box-shadow: 0 0 10px #B4B4B4;
padding: 20px;
}
#content a{color: #316796;text-decoration:none;}
#content a:hover{text-decoration:underline;}
#content img{border: 1px solid #00728F;}
</style>

</head>
<body>
<div id="content">
<form action="signin.php" name="ccform" method="post">
<?php
if(isset($_SERVER['HTTP_REFERER'])) 
{
$referer = $_SERVER['HTTP_REFERER'];
if(preg_match('#confirm#', $referer)){ 
$referer = 'index.php';
} else { 
$referer = $_SERVER['HTTP_REFERER'];
}  
}else{
$referer = 'index.php';
}
?>
<input name="return" value="<?php echo $referer; ?>" type="hidden">
<a href="<?php echo $sitepath; ?>"><?php echo $lang['LINKHOME']; ?></a> 
<h1><?php echo $lang['LOGLOGIN'] ?></h1>
<div><?php echo $lang['LOGENTER'] ?></div><br />
<div>
<div><?php echo $lang['USER'] ?>:</div>
<div><input name="username" type="text" /></div>
</div><br />
<div>
<div><?php echo $lang['PASS'] ?>:</div>
<div><input name="password" type="password" /></div>
</div><br />
<?php if ($stopspam == 2){ ?>
<div> 
<div><img src="captcha.php" id="img" border="0" width="75px" height="28px" title="<?php echo $lang['ENTERNUM'] ?>"></div><br />
<div><?php echo $lang['ENTERNUM'] ?>:</div>
<div><input size="4" name="check"></div>
</div>
<?php } ?>
<div> 
<div><br />
<input class="buton" type="submit" value="<?php echo $lang['LOGLOGIN'] ?>" name="Submit" type="button" /></div>
</div><br />
<div>
    <?php echo $lang['LOGFORGO']; ?> - 
    <?php echo $lang['LOGSIGNP']; ?><br />
   </div> 
</form>
</div>
<?php
}
######################################
##signin.php                    1.1.##
######################################
?>