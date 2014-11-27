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
?>
<div id="blockhead"><?php echo $lang['LINKMESS'] ?></div>
<div id="blockhead" style="margin-bottom:28px;color:#555;">
<div style="float:left;width:80px"><?php echo $lang['GESIMAGE'] ?></div>
<div style="float:left;width:182px"><?php echo $lang['GESUSER'] ?></div>
<div style="float:left;width:160px"><?php echo $lang['GESDATE'] ?></div>
<div style="float:left;width:298px"><?php echo $lang['MESSAGE'] ?></div>
<div style="float:left;width:160px"><?php echo $lang['LINKDEL'] ?></div>
<div style="float:left;width:90px"><?php echo $lang['IDMESVIW'] ?></div></div>
<?php 
    if(isset($_POST['query'])) {
	if(!$_POST["mesid"]) {
		echo "Go Back and check something</div>";
		$smarty->display('footer.php');
		die();
	}
	for($i = 0; $i < count($_POST["mesid"]); $i++) {
		if($_POST["mesid"][$i] != "") {
$checked = $_POST['mesid'][$i];
			$sql = 'DELETE FROM messages WHERE messid = ?';
			if($conn->Execute($sql,array($checked)) === false) {
				print '<br /><div id="error">error: '.$conn->ErrorMsg().'</div><br />';
			}
		}
	}
	echo "<a href='messages.php'>$lang[EDITSUCC] - $lang[LINKMESS]</a>";
	$conn->Close();
} else {
    ?>
<form action="messages.php" method="post">
<?php
    $shouter = $_SESSION['INC_USER_ID'];
	$brecordSet = &$conn->Execute('SELECT * FROM messages WHERE toid = ? || fromid = ? ORDER BY messid DESC', array($shouter, $shouter));
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
			echo "<div style='height:52px;border-top:1px solid #ffffff;'><div style='float:left;width:42px;'>";
			if($toid == $shouter) {
				echo "<img style='float:left;margin-right:4px;padding:1px;border:1px solid #ccc;' src='minthumb/$fromimg' width='25px' height='25px' border='0'>";
			} else {
				echo "<img style='float:left;margin-right:4px;padding:1px;border:1px solid #ccc;' src='minthumb/$toimage' width='25px' height='25px' border='0'>";
			}
			echo "</div>";
			if($toid == $shouter) {
				echo "<div style='float:left;height:52px;background:#FFFFEF'>";
				if($raeder == '1') {
					echo "<img src='themes/$themes/styles/images/sends.png' width='20px' height='20px' border='0' />";
				}
				if($raeder == '2') {
					echo "<img src='themes/$themes/styles/images/rsend.png' width='20px' height='20px' border='0' />";
				}
				echo "</div>";
				echo "<div style='float:left;width:180px;height:52px;background:#FFFFEF'>";
				echo "<span class='ha3'><a href='messid.php?id=$messid'>$fromname</span></a>";
				echo "</div>";
				echo "<div style='float:left;width:160px;height:52px;background:#FFFFEF'>";
				echo $mdate;
				echo "</div>";
				echo "<div style='float:left;width:298px;padding-right:5px;height:52px;background:#FFFFEF'>";
				$length = 80;
				$display = substr($messege,0,$length);
				echo $display;
				echo "...";
				echo "</div>";
			}
			if($fromid == $shouter) {
				echo "<div style='float:left;height:52px;background:#FCFCFC'>";
				echo "<img src='themes/$themes/styles/images/reply.png' width='20px' height='20px' border='0' />";
				echo "</div>";
				echo "<div style='float:left;width:180px;height:52px;background:#FCFCFC'>";
				echo "<span class='hal3'><a href='messid.php?id=$messid'>$toname</span></a>";
				echo "</div>";
				echo "<div style='float:left;width:160px;height:52px;background:#FCFCFC'>";
				echo $mdate;
				echo "</div>";
				echo "<div style='float:left;width:298px;padding-right:5px;height:52px;background:#FCFCFC'>";
				if($raeder == '1') {
					echo $lang['MESESTA']."&nbsp;<font color='556E89'>".$lang['MESEREC']."</font>";
				}
				if($raeder == '2') {
					echo $lang['MESESTA']."&nbsp;<font color='4BA458'>".$lang['MESEOPN']."</font>";
				}
				echo "</div>";
			}
			echo "<div style='float:left;width:160px;height:52px;background:#FFFFEF'>";
            ?>
<input style="width:15px;float:left;" type="checkbox" name="mesid[]" value="<?php echo $messid; ?>">
<?php 		
            echo "</div>";
			echo "<div style='float:left;width:90px;height:52px;background:#FFFFEF'>";
			if($fromid == $shouter) {
				echo "<a href='profile.php?id=$toid'>$lang[IDMESVIW]</a>";
			}
			if($toid == $shouter) {
				echo "<a href='profile.php?id=$fromid'>$lang[IDMESVIW]</a>";
			}
			echo "</div>";
			echo "</div>";
		}
	if(@$messid == true) {
	   ?>
<input class="incc" type="submit" value="<?php echo $lang['GESREMOV'] ?>" name="query" style="float:right;width:162px;margin-top:45px;color:#555;border:1px solid #ccc;background:#f8f8f8" />
<?php 	} else {
		//do nothing
	}
    ?>
</form>
<?php }
echo "</div>";
$smarty->display('footer.php');
$conn->Close();
######################################
##messages.php                4.1.4.##
######################################
?>