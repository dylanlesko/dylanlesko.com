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
include ('admin/config.php');
include ('classes/adodb/adodb.inc.php');
$dbdriver = "mysql";
######################################
#$ADODB_CACHE_DIR = 'db/ADODB_cache';#
######################################
$conn = &ADONewConnection($dbdriver);
$conn->Connect($server,$user,$password,$database);
##################################################
#$conn->debug = true;
#$recordSet = &$conn->CacheExecute(3600, 'SELECT optionid, nameopt, valueopt FROM abcoption');
##############################################################################################
$recordSet = &$conn->Execute('SELECT optionid, nameopt, valueopt, active FROM abcoption');
if(!$recordSet)
	print $conn->ErrorMsg();
else
	while(!$recordSet->EOF) {
        $modid = $recordSet->fields['optionid'];
        $modoffon = $recordSet->fields['active'];
        if($modid == 40 && $modoffon == 0)
        {
        $disabled = 1;
        }
		$option[$recordSet->fields[0]] = $recordSet->fields[2];
		$recordSet->MoveNext();
}

$sitetitle = $option[1];
$metadesc = $option[2];
$keywords = $option[3];
$sitepath = $option[4];
$langs = $option[5];
$caching = $option[6];
$themes = $option[7];
$sitemail = $option[8];
$sitedisabled = $option[9];
$rewritemod = $option[10];
$toplinks = $option[11];
$frontext = $option[12];
$customheader = $option[13];
$signuprole = $option[14];
$signupapp = $option[15];
$newson = $option[16];
$newstext = $option[17];
$siteabout = $option[18];
$siteprivacy = $option[19];
$siteterms = $option[20];
$messaging = $option[21];
$maxposting = $option[22];
$editortrue = $option[23];
$smilestrue = $option[24];
$smilespath = $option[25];
$maxtopic = $option[26];
$hottopic = $option[27];
$adsoffon = $option[28];
$senseup = $option[29];
$sensedown = $option[30];
$stopspam = $option[31];
$incitem = $option[32];
if($sitedisabled == 1){
echo"<center><img src='templates/classic/styles/images/under.gif' border='0'></center>";
die();
}
$recordSet->Close();
######################################
##bookconf.php                4.1.4.##
######################################
?>