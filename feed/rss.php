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
require_once ('settings.php');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$arecordSet = &$conn->Execute('SELECT * FROM newser where main <> '.$conn->qstr('4').' ORDER by blogid DESC LIMIT 20');
if(!$arecordSet)
	print $conn->ErrorMsg();
else
	while(!$arecordSet->EOF) {
		$aval[] = $arecordSet->fields;
		$arecordSet->MoveNext();
	}
$smarty->caching = 1;
$smarty->assign('newser', @$aval);
$smarty->display('rss.php');
$arecordSet->Close();
$conn->Close();
######################################
##rss.php                     4.1.4.##
######################################
?>