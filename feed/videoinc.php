<?php
session_start();
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
include('settings.php');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$vid = $_GET['vid'];
$arecordSet =& $conn->Execute('SELECT * FROM categori ORDER BY name ASC');
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
$brecordSet = &$conn->Execute('SELECT * FROM tubevideo WHERE yuid = ? LIMIT 1', array($vid));
if(!$brecordSet)
	print $conn->ErrorMsg();
else
	while(!$brecordSet->EOF) {
		$bval[] = $brecordSet->fields;
                $idvideo[] = $brecordSet->fields['yuid'];
		$brecordSet->MoveNext();
	}
$crecordSet = &$conn->Execute('SELECT * FROM tubereview WHERE ycomrev = ? ORDER BY yrevid DESC', array($vid));
if(!$crecordSet)
	print $conn->ErrorMsg();
else
	while(!$crecordSet->EOF) {
		$cval[] = $crecordSet->fields;
		$crecordSet->MoveNext();
	}
$shouter = @$_SESSION['INC_USER_ID'];
if ($shouter == true) {
$drecordSet = &$conn->Execute('SELECT * FROM users WHERE usid = ? LIMIT 1', array($shouter));
if(!$drecordSet)
	print $conn->ErrorMsg();
else
	while(!$drecordSet->EOF) {
	$kori   = $drecordSet->fields['usid'];
        $usercc = $drecordSet->fields['username'];
        $thumbs = $drecordSet->fields['thumbs'];
        $eeuser = $drecordSet->fields['email'];
        $smarty->assign('kori', $kori);
        $smarty->assign('usercc', $usercc);
        $smarty->assign('thumbs', $thumbs);
        $drecordSet->MoveNext();
    }
}
$incname = $_GET['vid'];
$smarty->caching = $caching;
$smarty->assign('incname', $incname);
$smarty->assign('categori', $aval);
$smarty->assign('subcat', @$nval);
$smarty->assign('yuvideo', $bval);
$smarty->assign('yreviews', @$cval);
$smarty->assign('videoid', $idvideo);
$smarty->display('videoinc.php', $vid);
$smarty->display('footer.php');
$arecordSet->Close();
$brecordSet->Close();
$crecordSet->Close();
@$drecordSet->Close();
$conn->Close();
######################################
##videoinc.php                4.1.4.##
######################################
?>