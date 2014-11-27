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
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$arecordSet = &$conn->Execute('SELECT * FROM categori ORDER BY name ASC');
if(!$arecordSet)
	print $conn->ErrorMsg();
else
	while(!$arecordSet->EOF) {
		if($arecordSet->fields['cord'] == 0) {
			$aval[] = $arecordSet->fields;
		} else {
			$nval[] = $arecordSet->fields;
		}
		$arecordSet->MoveNext();
	}
$smarty->assign('categori',$aval);
$smarty->assign('subcat',$nval);
$smarty->display('blank.php');
require_once ('languages/lang_'.$langs.'.php');
if(@$_SESSION['INC_USER_ID'] == true) {
	echo "<div id='error'>".$lang['ERRORSIG']."</div></div>";
	$smarty->display('footer.php');
	die();
}
?>
<script language="JavaScript">
function validationEmail(maForm) {
if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(maForm.email.value)){
return (true)
}
alert("<?php echo $lang['WRONGEM'] ?>")
return (false)
}
</script>
<?php
if(isset($_POST['Submit'])) {
	if($stopspam == 2) {
		if((@$_POST['check']) <> @$_SESSION['check']) {
			echo "<div id='error'>$lang[WRONGCAP] <a href='signup.php'>$lang[GOBACK]</a></div></div>";
			unset($_SESSION['check']);
                        $smarty->display('footer.php');
			die();
		}
	}
	$privilege = $_POST['privilege'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$ipse = $_SERVER['REMOTE_ADDR'];
	$keys = rand(111111111,888888888);
	if(get_magic_quotes_gpc()) {
		$privilege = stripslashes($privilege);
		$username = stripslashes($username);
		$password = stripslashes($password);
		$email = stripslashes($email);
		$keys = stripslashes($keys);
	}
	$list = "/(content-type|mime-version|content-transfer-encoding|to:|bcc:|cc:|document.cookie|document.write|onmouse|onkey|onclick|onload)/i";
	$name = array($username,$password,$email);
	foreach($name as $name) {
		if(preg_match("/\\s/",$name)) {
			echo "<div id='error'>$lang[NOSPACE]</font></center>";
			die();
		}
		if(preg_match($list,$name)) {
			echo "<div id='error'>$lang[INVALIDCHAR] '??' </div></div>";
			$smarty->display('footer.php');
			die();
		}
		if(preg_match("/%/",$name)) {
			echo "<div id='error'>$lang[INVALIDCHAR]  '%' </div></div>";
			$smarty->display('footer.php');
			die();
		}
		if(preg_match("/;/",$name)) {
			echo "<div id='error'>$lang[INVALIDCHAR] ';' </div></div>";
			$smarty->display('footer.php');
			die();
		}
		if(preg_match("/</",$name)) {
			echo "<div id='error'>$lang[INVALIDCHAR] '<' </div></div>";
			$smarty->display('footer.php');
			die();
		}
		if(preg_match("/\\[/",$name)) {
			echo "<div id='error'>$lang[INVALIDCHAR] '[' </div></div>";
			$smarty->display('footer.php');
			die();
		}
		if(strlen($name) < 4) {
			echo "<div id='error'>$lang[SEAERR5]</div></div>";
			$smarty->display('footer.php');
			die();
		}
		if(strlen($name) > 80) {
			echo "<div id='error'>$lang[SEAERR7] <a href='javascript:history.go(-1)'>$lang[BOOKBACK] </a></div></div>";
			$smarty->display('footer.php');
			die();
		}
	}
	if(strlen($email) < 5) {
		echo "<div id='error'>$lang[POSTERR1] <a href='javascript:history.go(-1)'>$lang[BOOKBACK] </a></div></div>";
		$smarty->display('footer.php');
		die();
	}
	if(strlen($email) > 80) {
		echo "<div id='error'>$lang[SEAERR7] <a href='javascript:history.go(-1)'>$lang[BOOKBACK] </a></div></div>";
		$smarty->display('footer.php');
		die();
	}
	if(preg_match("/ /",$username)) {
		echo "<div id='error'>$lang[INVALIDCHAR]</div></div>";
		$smarty->display('footer.php');
		die();
	}
	if(preg_match("/ /",$password)) {
		echo "<div id='error'>$lang[INVALIDCHAR]</div></div>";
		$smarty->display('footer.php');
		die();
	}
	$brecordSet = &$conn->Execute('SELECT username, email FROM users WHERE username = ? or email = ?',array($username,
		$email));
	if($brecordSet) {
		if($brecordSet->fields > 0) {
			echo "<div id='error'>$lang[ERREXIST]</div></div>";
			$smarty->display('footer.php');
			$brecordSet->MoveNext();
			die();
		}
	}
	$current_image = $_FILES['image']['name'];
	$extension = substr(strrchr($current_image,'.'),1);
	$time = date("Yhis");
	$blacklist = array(".msi",".exe",".php",".phtml",".php3",".php4",".js",".shtml",".pl",".py",".tpl",".zip",
		".gzip",".rar",".tar"," ");
	foreach($blacklist as $file) {
		if(preg_match("/$file\$/i",$_FILES['image']['name'])) {
			echo "<div id='errorpost'>$lang[POSTERR5]</div></div>";
			$smarty->display('footer.php');
			die();
		}
	}
	if(($extension !== "jpg" && $extension !== "jpeg")) {
		echo "<div id='errorpost'>$lang[POSTERR6] </div></div>";
		$smarty->display('footer.php');
		die();
	}
	$new_image = $time.".".$extension;
	$destination = "uploads/".$new_image;
	$action = copy($_FILES['image']['tmp_name'],$destination);
	function ccthumb($image_source,$file,$xthumbnail,$ythumbnail) {
		list($origx,$yorig) = getimagesize($image_source);
		if($origx > 1280 || $yorig > 1280) {
			echo "<div id='error'>Maximum width and height exceeded. Please upload images below  1280 x 1280 px size.</div></div>";
			exit();
		}
		$tag = explode('.',$image_source);
		if(preg_match('/jpg|jpeg/',$tag[1])) {
			if(@$cimage = imagecreatefromjpeg($image_source) == true) {
				$cimage = imagecreatefromjpeg($image_source);
			} else {
				echo "<div id='error'>Wrong File</div></div>";
				exit();
			}
		}
		$ratio = $origx / $yorig;
		if($xthumbnail / $ythumbnail > $ratio) {
			$yheight = $xthumbnail / $ratio;
			$xwidth = $xthumbnail;
		} else {
			$xwidth = $ythumbnail * $ratio;
			$yheight = $ythumbnail;
		}
		$action = imagecreatetruecolor(round($xwidth),round($yheight));
		imagecopyresampled($action,$cimage,0,0,0,0,$xwidth,$yheight,$origx,$yorig);
		$thumbnail = imagecreatetruecolor($xthumbnail,$ythumbnail);
		$xos = $xwidth / 2;
		$yos = $yheight / 2;
		imagecopyresampled($thumbnail,$action,0,0,($xos - ($xthumbnail / 2)),($yos - ($ythumbnail / 2)),$xthumbnail,
			$ythumbnail,$xthumbnail,$ythumbnail);
		imagejpeg($thumbnail,$file,80);
		return $thumbnail;
	}
	ccthumb($destination,'maxthumb/'.$new_image,50,50);
	ccthumb($destination,'minthumb/'.$new_image,25,25);
	$time = date("Y-m-d H:i:s");
	$sql = $conn->Prepare('INSERT INTO users (privilege, username, password, email, ipos, thumbs, date, active, keysi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
	if($conn->Execute($sql,array($privilege,$username,(md5($password)),$email,$ipse,$new_image,$time,"0",$conn->addq
		($keys))) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
	}
	$realmessage = $username." ".$lang['NEWMEM'];
	$sql2 = $conn->Prepare('INSERT INTO publictime (texty,imgs,date,amess) VALUES (?, ?, ?, ?)');
	if($conn->Execute($sql2,array($username,$new_image,$time,$realmessage)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
	}
	$myurl = $sitepath."/confirm.php";
	$headers = 'MIME-Version: 1.0'."\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
	$headers .= "From: $sitemail"."\r\n";
	$bodys = "
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<style>
#content{
align:center;
padding:4px;
margin:0px auto;
background:#fff;
border:1px dotted #f8f8f8;
width:733px;
font-family;tahoma;
color:#222;
}
</style>
</head>
<div id = 'content'>
<h4>$sitetitle</h4>$lang[MAILHEAD] \"$username\", $lang[NEWREG]<br /><br />
<a href=\"$myurl?id=$keys\">$myurl?id=$keys</a><br /><br />
$lang[THAREG]<br /><br />$sitetitle";
	$subject = "$lang[ACTREG] $sitetitle";
	mail($email,$subject,$bodys,$headers);
	$ccsubject = $sitetitle." - $lang[ADMNEW]";
	$ccbodys = "<h4>$lang[ADMSEW]<br /><br /><a href=\"$sitepath\">$sitetitle</a></h4>";
	mail($sitemail,$ccsubject,$ccbodys,$headers);
	echo "<div id='info'>$lang[PASTHE]</div>";
	$brecordSet->Close();
	$conn->Close();
	unset($_SESSION['check']);
	session_destroy();
} else {
    ?>
<form name="maForm" action="signup.php" id="inrform" enctype="multipart/form-data" method="post" onSubmit="return validationEmail(this)">
<input type="hidden" name="privilege" value="<?php echo $signuprole ?>">
<div> 
<h1><?php echo $lang['ADMNEW'] ?></h1>
</div>
<div>
<div><?php echo $lang['USER'] ?>: <?php echo $lang['REQUI'] ?></div>
<div><input name="username" id="cinput" type="text"></div>
<div></div>
<div><span class="small"><p><?php echo $lang['ONLY'] ?></p><p><?php echo $lang['ENTER'] ?></p></span></div>
</div>
<div> 
<div><?php echo $lang['PASS'] ?>: <?php echo $lang['REQUI'] ?></div>
<div><input name="password" id="cinput" type="password"></div>
<div></div>
<div><span class="small"><p><?php echo $lang['ONLY'] ?></p></span></div>
</div>
<div> 
<div><?php echo $lang['EMAIL'] ?>: <?php echo $lang['REQUI'] ?></div>
<div><input name="email" id="cinput" type="text"></div>
<div></div>
<div><span class="small"><p><?php echo $lang['CMAIL'] ?></p></span></div>
</div>
<div> 
<div><?php echo $lang['IMAGE'] ?>: <?php echo $lang['REQUI'] ?></div>
<div><input type="file" id="cinput" name="image" type="text"><p><?php echo $lang['FILES'] ?></p>
</div>
</div>
<?php if($stopspam == 2) { ?>
<div> 
<div><img src="captcha.php" id="img" border="0" style="border:1px solid #ddd;width:75px;height:28px;margin-bottom:5px;" title="<?php echo $lang['ENTERNUM'] ?>"></div>
<div><input id="cinput" size="4" name="check"></div>
<div><?php echo $lang['ENTERNUM'] ?></font></div>
</div>
<?php } ?>
<div> 
<div>
<div><input class="buton" type="submit" value="<?php echo $lang['NEWACC'] ?>" name="Submit" type="button"></div>
</div>
</form>
</div>
<?php } ?>
</div>
<?php $smarty->display('footer.php');
$arecordSet->Close();
$conn->Close();
######################################
##signup.php                  4.2.1.##
######################################
?>