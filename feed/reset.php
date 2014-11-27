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
}
$id = $_GET['id'];
if($id == false) {
	echo "<div id='error'>Error [2]</div></div>";
	$smarty->display('footer.php');
	die();
}
$id = addslashes($id);
if(preg_match("/%/",$id)) {
	echo "<div id='error'>$lang[INVALIDCHAR] '%' </div></div>";
	$smarty->display('footer.php');
	die();
}
if(preg_match("/;/",$id)) {
	echo "<div id='error'>$lang[INVALIDCHAR] ';' </div></div>";
	$smarty->display('footer.php');
	die();
}
if(preg_match("/</",$id)) {
	echo "<div id='error'>$lang[INVALIDCHAR] '<' </div></div>";
	$smarty->display('footer.php');
	die();
}
if(preg_match("/\\[/",$id)) {
	echo "<div id='error'>$lang[INVALIDCHAR] '[' </div></div>";
	$smarty->display('footer.php');
	die();
}
$brecordSet = &$conn->Execute('SELECT * FROM users WHERE tempass = ? LIMIT 1',array($id));
if($brecordSet) {
	if($brecordSet->fields > 0) {
		$usid = $brecordSet->fields['usid'];
		$username = $brecordSet->fields['username'];
		$password = $brecordSet->fields['password'];
		$email = $brecordSet->fields['email'];
	}
} else {
	echo "<div id='error'>Error</div></div>";
	$smarty->display('footer.php');
	$conn->Close();
	die();
}
if(!isset($_SESSION['chechinc']))
	$_SESSION['chechinc'] = 0;
    $_SESSION['chechinc'] = $_SESSION['chechinc'] + 1;
    if($_SESSION['chechinc'] > 1) {
	echo "<div id='error'>Error</div></div>";
	$smarty->display('footer.php');
	$conn->Close();
	die();
}
$tips = 'JvKnrQWPsThuJteNQAuH';
$cchash = sha1(uniqid($tips.mt_rand(),true));
$cchash = substr($cchash,0,8);
$hashe = md5($cchash);
$sql = $conn->Prepare('UPDATE users SET password = ? WHERE usid = ?');
if($conn->Execute($sql,array($conn->addq($hashe),$conn->addq($usid))) === false) {
	print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
}
$myurl = $sitepath."/link.php";
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
<h4>$sitetitle</h4>$lang[RETHEADE] '$username',<br />$lang[RETNEWP]<br /><br />
<font color='#000000'>$cchash</font>
<br /><br /><a href='$myurl'>$myurl</a><br /><br />
$lang[RETREGAR], $sitetitle $lang[RETTEAM]";
$subject = "$lang[RETSUBJ] $sitetitle";
mail($email,$subject,$bodys,$headers);
echo "<div id='info'>$lang[RETSEND]</div></div>";
$smarty->display('footer.php');
$conn->Close();
######################################
##reset.php                   4.1.4.##
######################################
?>