<?php session_start();
/**********************************************************************
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
************************************************************************/
include ('settings.php');
require_once ('languages/lang_'.$langs.'.php');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$arecordSet =&$conn->Execute('SELECT * FROM categori ORDER BY name ASC');
if (!$arecordSet)
    print $conn->ErrorMsg();
else
    while (!$arecordSet->EOF) {
        if ($arecordSet->fields['cord'] == 0) {
            $aval[] = $arecordSet->fields;
        } else {
            $nval[] = $arecordSet->fields;
        }
        $arecordSet->MoveNext();
    }
$smarty->assign('categori',$aval);
$smarty->assign('subcat', $nval);
$smarty->display('blank.php');
if(@$_SESSION['INC_USER_ID'] == true) {
	echo "<div id='error'>".$lang['ERRORSIG']."</div></div>";
	$smarty->display('footer.php');
	die();
} ?>
<script language="JavaScript">
function validationEmail(maForm) {
if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(maForm.email.value)){
return (true)
}
alert("<?php echo $lang['WRONGEM'] ?>")
return (false)
}
</script>
<?php if(isset($_POST['Submit'])) {
	if($stopspam == 2) {
	}
	if(!isset($_SESSION['numeres']))
		$_SESSION['numeres'] = 0;
	$_SESSION['numeres'] = $_SESSION['numeres'] + 1;
	if($_SESSION['numeres'] > 2) {
		echo "<div id='error'>Error</div></div>";
		$smarty->display('footer.php');
		$conn->Close();
		die();
	}
	$ccemail = $_POST['email'];
	if(preg_match("/%/",$ccemail)) {
		echo "<div id='error'>$lang[INVALIDCHAR] '%' </div></div>";
		$smarty->display('footer.php');
		$conn->Close();
		die();
	}
	if(preg_match("/;/",$ccemail)) {
		echo "<div id='error'>$lang[INVALIDCHAR] ';' </div></div>";
		$smarty->display('footer.php');
		$conn->Close();
		die();
	}
	if(preg_match("/</",$ccemail)) {
		echo "<div id='error'>$lang[INVALIDCHAR] '<' </div></div>";
		$smarty->display('footer.php');
		$conn->Close();
		die();
	}
	if(preg_match("/\\[/",$ccemail)) {
		echo "<div id='error'>$lang[INVALIDCHAR] '[' </div></div>";
		$smarty->display('footer.php');
		$conn->Close();
		die();
	}
	if(strlen($ccemail) < 2) {
		echo "<div id='error'>$lang[POSTERR1]</div></div>";
		$smarty->display('footer.php');
		$conn->Close();
		die();
	}
	if(strlen($ccemail) > 40) {
		echo "<div id='error'>$lang[SEAERR6]</div></div>";
		$smarty->display('footer.php');
		$conn->Close();
		die();
	}
	$brecordSet = $conn->Execute('SELECT * FROM users where email = ? LIMIT 1',array($ccemail));
	if($brecordSet) {
		if($brecordSet->fields > 0) {
			while(!$brecordSet->EOF) {
				$usid = $brecordSet->fields['usid'];
				$username = $brecordSet->fields['username'];
				$password = $brecordSet->fields['password'];
				$email = $brecordSet->fields['email'];
				$tips = 'YjuPKnBfghfEeNqAuL';
				$cchash = sha1(uniqid($tips.mt_rand(),true));
				$sql = $conn->Prepare('UPDATE users SET tempass =  ? WHERE usid = ?');
				if($conn->Execute($sql,array($conn->addq($cchash),$conn->addq($usid))) === false) {
					print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
				}
				
				$myurl = $sitepath."/reset.php?id=".$cchash;
				$headers = 'MIME-Version: 1.0'."\r\n";
				$headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
				$headers .= "From: $sitemail"."\r\n";
				$bodys = "
<head>
<style>
#content{align:center;padding:5px;margin:0px auto;background:#fff;border-top:2px solid #FF8300;width:100%;font-family;tahoma;color:#222;}
</style>
</head>
<div id = 'content'>
<h4>$sitetitle</h4>$lang[RETHEADE] '$username',<br />$lang[RETMESSG]<br /><br /><a href='$myurl'>$myurl</a><br /><br />
$lang[RETREGAR], $sitetitle $lang[RETTEAM]";
				$subject = "$sitetitle";
				mail($email,$subject,$bodys,$headers);
				echo "<div id='info'>$lang[PASTHE]</div>";
				$brecordSet->MoveNext();
			}
		} else {
			echo "<div id='error'>$lang[WRONGCC]</div></div>";
			$smarty->display('footer.php');
			$conn->Close();
			die();
		}
	}
	$conn->Close();
} else {
?>
<form name="maForm" action="recovery.php" method="post" id="fincform" onSubmit="return validationEmail(this)">
<div>
<h1><?php echo $lang['RECOVERY'] ?></h1>
<?php echo $lang['RETRIVED'] ?>
</div><br />
<div>
<div><?php echo $lang['EMAIL'] ?>:</div>
<div><input id="cinput" name="email" type="text" /></div>
</div>
<div>
<div><input class="buton" type="submit" value="<?php echo $lang['RECOVERY'] ?>" name="Submit" type="button"></div>
</div>
</form>
<?php
}
echo "</div>";
$smarty->display('footer.php');
$conn->Close();
######################################
##recovery.php                4.1.4.##
######################################
?>