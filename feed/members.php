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
/**
 * get_db_results()
 * 
 * @return
 */
function get_db_results() {
	global $conn;
	$_query = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM users ORDER by usid DESC LIMIT %d,%d", SmartyPaginate::getCurrentIndex(),SmartyPaginate::getLimit());
	$brecordSet = $conn->Execute($_query);
	if(!$brecordSet)
		print $conn->ErrorMsg();
	else
		while(!$brecordSet->EOF) {
			$_data[] = $brecordSet->GetRowAssoc(false);
			$brecordSet->MoveNext();
		}
	$_query = "SELECT FOUND_ROWS() as total";
	$crecordSet = $conn->Execute($_query);
	if(!$crecordSet)
		print $conn->ErrorMsg();
	else
		$_row = $crecordSet->GetRowAssoc();
	$total = $crecordSet->fields['total'];
	SmartyPaginate::setTotal($total);
	return @$_data;
	$brecordSet->Close();
	$crecordSet->Close();
}
require ('libs/SmartyPaginate.class.php');
SmartyPaginate::connect();
SmartyPaginate::setLimit(24);
SmartyPaginate::setUrl('members.php');
$smarty->caching = $caching;
$smarty->assign('results',get_db_results());
SmartyPaginate::assign($smarty);
$smarty->assign('categori',$aval);
$smarty->assign('subcat', $nval);
@$next = (int)$_GET['next'];
$smarty->display('members.php',$next);
$smarty->display('footer.php');
$arecordSet->Close();
$conn->Close();
######################################
##members.php                 4.1.4.##
######################################
?>