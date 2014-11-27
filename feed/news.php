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
$name = htmlspecialchars((int)$_GET['name']);
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
$brecordSet = &$conn->Execute('SELECT * FROM newser WHERE univer = ? LIMIT 1', array($conn->addq($name)));
if(!$brecordSet)
	print $conn->ErrorMsg();
else
	while(!$brecordSet->EOF) {
		$incblog = $brecordSet->fields['blogid'];
                $inccat = $brecordSet->fields['idblog'];
		$similar = $brecordSet->fields['btexty'];
		$bval[] = $brecordSet->fields;
		$brecordSet->MoveNext();
	}
$crecordSet = &$conn->Execute('SELECT * FROM onewse WHERE MATCH (otexty,oamess) AGAINST (?) and otexty <> ? LIMIT 5', array($similar, $similar));
if(!$crecordSet)
	print $conn->ErrorMsg();
else
	while(!$crecordSet->EOF) {
		$cval[] = $crecordSet->fields;
		$crecordSet->MoveNext();
	}
$drecordSet = &$conn->Execute('SELECT * FROM reviews WHERE comrev = ? ORDER BY cdate DESC', array($conn->addq($name)));
if(!$drecordSet)
	print $conn->ErrorMsg();
else
	while(!$drecordSet->EOF) {
		$dval[] = $drecordSet->fields;
		$drecordSet->MoveNext();
	}
$shouter = @$_SESSION['INC_USER_ID'];
if($shouter == true) {
	$erecordSet = &$conn->Execute('SELECT * FROM users WHERE usid= ? LIMIT 1', array($shouter));
	if(!$erecordSet)
		print $conn->ErrorMsg();
	else
		while(!$erecordSet->EOF) {
			$kori = $erecordSet->fields['usid'];
			$usercc = $erecordSet->fields['username'];
			$thumbs = $erecordSet->fields['thumbs'];
			$eeuser = $erecordSet->fields['email'];
			$erecordSet->MoveNext();
			$smarty->assign('kori',$kori);
			$smarty->assign('usercc',$usercc);
			$smarty->assign('thumbs',$thumbs);
		}
}
$smarty->caching = $caching;
$smarty->assign('bloginc', $incblog);
$smarty->assign('incname', $name);
$smarty->assign('similar', $similar);
$smarty->assign('categori',$aval);
$smarty->assign('subcat', $nval);
$smarty->assign('inccat', $inccat);
$smarty->assign('newser',$bval);
@$smarty->assign('onewse',$cval);
$smarty->assign('reviews',$dval);
$smarty->display('news.php',$name);
$smarty->display('footer.php');
$arecordSet->Close();
$brecordSet->Close();
$crecordSet->Close();
$drecordSet->Close();
$conn->Close();
######################################
##news.php                    4.1.4.##
######################################
?>