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
    die();
  }
if (!$_SESSION['inecsess'])
  {
    die();
  }
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
if($incitem == 0) {
	echo "<a href='javascript:history.go(-1)'>$lang[EDITDISB]</a>";
	echo "</div>";
	$smarty->display('footer.php');
	die();
}
?>
<div>
<?php
$shouter = @$_SESSION['INC_USER_ID'];
$shouter = $conn->addq($shouter);
$id = $_GET['id'];
$id = $conn->addq($id);
$arecordSet = &$conn->Execute('SELECT * FROM newser WHERE blogid = ? and buserid = ? LIMIT 1', array($id, $shouter));
	if($arecordSet->fields > 0) {
        while(!$arecordSet->EOF) {
        $incid = $arecordSet->fields['univer'];
        $idblog = $arecordSet->fields['idblog'];
        $arecordSet->MoveNext();
        }
       }else{
       echo "<div id='error'>Error [88]</div></div></div>";
		$smarty->display('footer.php');
                $incid = $arecordSet->fields['univer'];
		$arecordSet->Close();
		$conn->Close();
		die();	
        }
$sql = $conn->Prepare('DELETE FROM newser WHERE blogid = ? and buserid = ?');
if($conn->Execute($sql, array($id, $shouter)) === false) {
	print '<br /><div id="error">error inserting[3]: '.$conn->ErrorMsg().'</div><br />';
}
$sql2 = 'DELETE FROM onewse WHERE oniver = ?';
if($conn->Execute($sql2, array($incid)) === false) {
	print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
}
$sql3 = 'DELETE FROM reviews WHERE comrev = ?';
if($conn->Execute($sql3, array($incid)) === false) {
	print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
}
$sql4 = 'UPDATE categori SET ccount = ccount - ? WHERE catid = ?';
        if($conn->Execute($sql4, array("1", $idblog)) === false) {
	print '<br /><div id="error">error inserting[4]: '.$conn->ErrorMsg().'';
        }
echo "<div id='info'>$lang[DELTNEWS] - $lang[EDITSUCC]</div>";
if($_GET['file'] == true) {
	$file = $_GET['file'];
	$file1 = $_GET['file'];
	$file2 = $_GET['file'];
	$file = "uploads/".$file;
	$file1 = "maxthumb/".$file1;
	$file2 = "minthumb/".$file2;
	@unlink($file);
	@unlink($file1);
	@unlink($file2);
}
?>
</div>
</div>
<?php
$smarty->display('footer.php');
$arecordSet->Close();
$conn->Close();
######################################
##delete.php                  4.1.4.##
######################################
?>