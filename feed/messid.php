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
$id = (int)@$_GET['id'];
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
$smarty->display('mblank.php');
if($id == false) {
	echo "<div id='error'>Error [11]</div></div>";
	$smarty->display('footer.php');
	die();
} ?>
<a href="messages.php"><div id="blockhead"><?php echo $lang['LINKMESS'] ?></div></a>
<?php
$shouter = $_SESSION['INC_USER_ID'];
$brecordSet = &$conn->Execute('SELECT * FROM messages WHERE messid = ? LIMIT 1', array($conn->addq($id)));
if(!$brecordSet)
	print $conn->ErrorMsg();
else
	while(!$brecordSet->EOF) {
		$messid = $brecordSet->fields['messid'];
		$fromid = $brecordSet->fields['fromid'];
		$fromname = $brecordSet->fields['fromname'];
		$fromimg = $brecordSet->fields['fromimg'];
		$toid = $brecordSet->fields['toid'];
		$toname = $brecordSet->fields['toname'];
		$toimage = $brecordSet->fields['toimage'];
		$mdate = $brecordSet->fields['mdate'];
		$raeder = $brecordSet->fields['raeder'];
		$messege = $brecordSet->fields['messege'];
		$brecordSet->MoveNext();
		if($fromid == $shouter or $toid == $shouter) {
			//do nothing
		} else {
			echo "<div id='error'>Error [12]</div></div>";
			$smarty->display('footer.php');
			die();
		}
		$brecordSet->MoveNext();
	}
if(@$toid == false) {
	echo "<div id='error'>Error [13]</div></div>";
	$smarty->display('footer.php');
	die();
}
if(@$fromid == false) {
	echo "<div id='error'>Error [14]</div></div>";
	$smarty->display('footer.php');
	die();
}
if($toid == $shouter) {
	echo "<div style='float:right'><a href='message.php?cusid=$fromid&cuser=$fromname' title='$lang[MESSASE]' rel='content-310-260' class='pirobox_gall1'><img style='margin-bottom:4px;' src='themes/$themes/styles/images/message.png' border='0' width='24' height='24'></a></div>";
        $sql = $conn->Prepare('UPDATE messages SET raeder = ? WHERE messid = ?');
        if($conn->Execute($sql,array("2",$id)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
        }
}
if($fromid == $shouter) {
	echo "<div style=''><img style='float:left;margin-right:8px;padding:2px;border:1px solid #ccc;' src='maxthumb/$toimage' width='50px' height='50px' border='0'></div><div><span class='ha3'>$lang[IDMESENT] $toname</a></span> - <i>$mdate</i> - <a href='profile.php?id=$toid'>$lang[IDMESVIW]</a><br />$messege</div><br />";
}
if($toid == $shouter) {
	echo "<div style=''><img style='float:left;margin-right:8px;padding:2px;border:1px solid #ccc;' src='maxthumb/$fromimg' border='0'></div><div><span class='ha3'>$lang[IDMESREC] $fromname</a></span> - <i>$mdate</i> - <a href='profile.php?id=$fromid'>$lang[IDMESVIW]</a><br />$messege</div><br />";
}
?>
</div>
<?php
$smarty->display('footer.php');
$conn->Close();
######################################
##messid.php                  4.1.4.##
######################################
?>