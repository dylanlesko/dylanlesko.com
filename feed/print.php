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
$name = (int)$_GET['name'];
$arecordSet = &$conn->Execute('SELECT * FROM newser WHERE univer = ? LIMIT 1', array($conn->addq($name)));
if(!$arecordSet)
	print $conn->ErrorMsg();
else
	while(!$arecordSet->EOF) {
		$aval[] = $arecordSet->fields;
		$arecordSet->MoveNext();
	}
$brecordSet = &$conn->Execute('SELECT * FROM reviews WHERE comrev = ? ORDER BY cdate DESC', array($conn->addq($name)));
if(!$brecordSet)
	print $conn->ErrorMsg();
else
	while(!$brecordSet->EOF) {
		$bval[] = $brecordSet->fields;
		$brecordSet->MoveNext();
	}
$incname = (int)$_GET['name'];
$smarty->caching = 0;
$smarty->assign('incname',$incname);
$smarty->assign('newser',$aval);
$smarty->assign('reviews',@$bval);
$smarty->display('print.php',$name);
$arecordSet->Close();
$brecordSet->Close();
$conn->Close();
######################################
##print.php                   4.1.4.##
######################################
?>