<?php
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
$brecordSet = &$conn->Execute('SELECT * FROM newser WHERE main = '.$conn->qstr('0').' or main = '.$conn->qstr('2').' ORDER BY blogid DESC LIMIT 6');
if(!$brecordSet)
	print $conn->ErrorMsg();
else
	while(!$brecordSet->EOF) {
		$bval[] = $brecordSet->fields;
		$brecordSet->MoveNext();
	}
$crecordSet = &$conn->Execute('SELECT * FROM onewse WHERE omain = '.$conn->qstr('0').' or omain = '.$conn->qstr('2').' ORDER BY oids DESC LIMIT 28');
if(!$crecordSet)
	print $conn->ErrorMsg();
else
	while(!$crecordSet->EOF) {
		$cval[] = $crecordSet->fields;
		$crecordSet->MoveNext();
	}
$drecordSet = &$conn->Execute('SELECT * FROM reviews ORDER BY revid DESC LIMIT 4');
if(!$drecordSet)
	print $conn->ErrorMsg();
else
	while(!$drecordSet->EOF) {
		$dval[] = $drecordSet->fields;
		$drecordSet->MoveNext();
	}
$smarty->caching = $caching;
$smarty->assign('categori',$aval);
$smarty->assign('subcat', $nval);
$smarty->assign('newser',$bval);
$smarty->assign('onewse',$cval);
$smarty->assign('reviews',$dval);
if($slider == 2){
$smarty->display('mainer.php');
}
if($slider == 1){
$smarty->display('main.php');
}
$smarty->display('footer.php');
$arecordSet->Close();
$brecordSet->Close();
$crecordSet->Close();
$drecordSet->Close();
$conn->Close();
######################################
##index.php                   4.1.5.##
######################################
?>