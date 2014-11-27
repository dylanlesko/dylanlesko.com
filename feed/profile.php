<?php
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
$id = (int)$_GET['id'];
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
$brecordSet = &$conn->Execute('SELECT * FROM users WHERE usid = ? LIMIT 1', array($conn->addq($id)));
if(!$brecordSet)
	print $conn->ErrorMsg();
else
	while(!$brecordSet->EOF) {
		$bval[] = $brecordSet->fields;
		$brecordSet->MoveNext();
	}
/**
 * get_db_results()
 * 
 * @return
 */
function get_db_results() {
	$id = $_GET['id'];
	global $conn;
	$_query = sprintf('SELECT * FROM newser WHERE buserid = '.$conn->qstr($id).' and main <> '.$conn->qstr('4').' ORDER BY blogid DESC LIMIT %d,%d',
		SmartyPaginate::getCurrentIndex(),SmartyPaginate::getLimit());
	$crecordSet = $conn->Execute($_query);
	if(!$crecordSet)
		print $conn->ErrorMsg();
	else
		while(!$crecordSet->EOF) {
			$_data[] = $crecordSet->GetRowAssoc(false);
			$crecordSet->MoveNext();
		}
	$_query = "SELECT FOUND_ROWS() as total";
	$drecordSet = $conn->Execute($_query);
	if(!$drecordSet)
		print $conn->ErrorMsg();
	else
		$_row = $drecordSet->GetRowAssoc();
	$total = $drecordSet->fields['total'];
	SmartyPaginate::setTotal($total);
	return @$_data;
	$crecordSet->Close();
	$drecordSet->Close();
}
require ('libs/SmartyPaginate.class.php');
SmartyPaginate::connect();
SmartyPaginate::setLimit(12);
SmartyPaginate::setUrl('profile.php');
$smarty->caching = $caching;
$smarty->assign('results',get_db_results());
SmartyPaginate::assign($smarty);
$smarty->assign('categori',$aval);
$smarty->assign('subcat', $nval);
$smarty->assign('profile',@$bval);
@$next = (int)$_GET['next'];
$smarty->display('profile.php', $next);
$smarty->display('footer.php');
$arecordSet->Close();
$brecordSet->Close();
$conn->Close();
######################################
##profile.php                 4.1.4.##
######################################
?>