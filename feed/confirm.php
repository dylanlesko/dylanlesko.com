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
$smarty->assign('subcat', @$nval);
$smarty->display('blank.php');
if(@$_SESSION['INC_USER_ID'] == true) {
	echo "<div id='error'>Error [1]</div></div>";
	$smarty->display('footer.php');
        $conn->Close();
	die();
}
$ccid = @(int)$_GET['id'];
if($ccid == false) {
	echo "<div id='error'>Error [2]</div></div>";
	$smarty->display('footer.php');
        $conn->Close();
	die();
}
$ccid = addslashes($ccid);
if(preg_match("/%/",$ccid)) {
	echo "<div id='error'>$lang[INVALIDCHAR] '%' </div></div>";
	$smarty->display('footer.php');
        $conn->Close();
	die();
}
if(preg_match("/;/",$ccid)) {
	echo "<div id='error'>$lang[INVALIDCHAR] ';' </div></div>";
	$smarty->display('footer.php');
        $conn->Close();
	die();
}
if(preg_match("/</",$ccid)) {
	echo "<div id='error'>$lang[INVALIDCHAR] '<' </div></div>";
	$smarty->display('footer.php');
        $conn->Close();
	die();
}
if(preg_match("/\\[/",$ccid)) {
	echo "<div id='error'>$lang[INVALIDCHAR] '[' </div></div>";
	$smarty->display('footer.php');
        $conn->Close();
	die();
}
$brecordSet = $conn->Execute('SELECT * FROM users WHERE keysi = ? && active = ? LIMIT 1', array($conn->addq($ccid),"0"));
if($brecordSet) {
	if($brecordSet->fields == 0) {
		echo "<div>Error.</div></div>";
                $smarty->display('footer.php');
		$conn->Close();
		die();
	}
}
if($signupapp == 2) {
        $sql = $conn->Prepare('UPDATE users SET active = ? WHERE active = ? and keysi = ? LIMIT 1');
        if($conn->Execute($sql,array("1","0",$conn->addq($ccid))) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
	}

	if($conn->affected_rows() == 0) {
		echo "<div id='error'>Error [3]</div></div>";
		$smarty->display('footer.php');
		$conn->Close();
		die();
	} else {
		echo "<div id='info'>$lang[ACTREG] $sitetitle <a href='$sitepath/link.php'>$lang[LOGLOGIN]</a></div></div>";
		$smarty->display('footer.php');
                $conn->Close();
		die();
	}
}
if($signupapp == 1) {
        $sql = $conn->Prepare('UPDATE users SET active = ? WHERE active = ? and keysi = ? LIMIT 1');
        if($conn->Execute($sql,array("3","0",$conn->addq($ccid))) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
	}
	if($conn->affected_rows() == 0) {
		echo "<div id='error'>Error [4]</div></div>";
		$smarty->display('footer.php');
		$conn->Close();
		die();
	} else {
		echo "<div id='info'>$lang[PANREG] $sitetitle. $lang[PANWAT]</div></div>";
		$smarty->display('footer.php');
                $conn->Close(); 
		die();
	}
}
$conn->Close();
######################################
##confirm.php                 4.1.4.##
######################################
?>