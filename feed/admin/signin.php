<?php session_start();
###############################
#signin.php       version 1.1.#
###############################
require_once 'securesession.class.php';
require_once 'salt.php';
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
include ('../classes/adodb/adodb.inc.php');
include ('config.php');
$dbdriver = "mysql";
$conn = &ADONewConnection($dbdriver);
$conn->Connect($server,$user,$password,$database);
if(isset($_POST['Submit'])) {
        $ccuser = $_POST['username'];
	$ccpass = $_POST['password'];
	if(get_magic_quotes_gpc()) {
		$ccuser = stripslashes($ccuser);
		$ccpass = stripslashes($ccpass);
	}
	$name = array($ccuser,$ccpass);
	foreach($name as $name) {
		if(preg_match("/</",$name)) {
			echo "<center><font face='verdana'>Invalid Characters '<' </font></center>";
			die();
		}
		if(preg_match("/\\[/",$name)) {
			echo "<center><font face='verdana'>Invalid Characters '[' </font></center>";
			die();
		}
		if(strlen($name) < 3) {
			echo "<center><span style=\"font-size:13px;font-family:verdana;color:#888\">The field must be at least 3 characters long.";
			die();
		}
	}
	$ccpass = md5($_POST['password']);
	$brecordSet = &$conn->Execute('SELECT * FROM cpadmin WHERE ausername = '.$conn->qstr($ccuser).' and apassword = '.$conn->qstr($ccpass).'');
	if($brecordSet) {
		if($brecordSet->fields == 0) {
			echo "Sorry, user you are looking for does not exist.";
			$brecordSet->Close();
			$conn->Close();
			die();
		}
	}
	if(!$brecordSet)
		print $conn->ErrorMsg();
	else
		while(!$brecordSet->EOF) {
			$bval[] = $brecordSet->fields;
			$uname = $brecordSet->fields['ausername'];
	                $brecordSet->MoveNext();
			$ss = new SecureSession();
			$ss->check_browser = true;
			$ss->check_ip_blocks = 2;
			$ss->secure_word = $salt;
			$ss->regenerate_id = true;
			$ss->Open();
                        $_SESSION['CC_MODER'] = $uname;
			            $_SESSION['logged_in'] = true;
                        $incsess = md5(uniqid(rand(),TRUE));
                        $_SESSION['incsess'] = $incsess;
                        session_write_close();
                        $conn->Close();
			header('Location: index.php');
			die();
		}
} else {
    ?>
<html>
<head>
<meta charset="UTF-8" />
<link type="text/css" href="style.css" rel="stylesheet" />
</head>
<br />
<form action="signin.php" name="ccform" method="post">
<div style="margin:0px auto;width:386px;background-color:#EBEBE5;border:1px dotted #DDD;padding:8px;">
<font style="font-size:22px;color:#333">Admin Login</font>
<br /><font style="font-size:12px;color:#555555">Username<br />
<input id="incc" maxlength="25"  name="username" type="text" />
<br /><br />
<font style="font-size:12px;color:#555555">Password <br />
<input id="incc" maxlength="25" name="password" type="password" /><br /><br />
<input class="topicbuton" type="submit" value="Sign In" name="Submit" type="button" /><br /><br />
<a href="http://www.phpenter.net"><span style="font-size:10px;color:#888">Powered by phpEnter.net</span></a>
</div>
</form>
<?php
$conn->Close();
}
?>