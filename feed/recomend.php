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
include ('languages/lang_' . $langs . '.php');
if (get_magic_quotes_gpc()) {
$jsuser = stripslashes($_POST['jsuser']);
$jusid = stripslashes($_POST['jusid']);
$juser = stripslashes($_POST['juser']);
$jurl = stripslashes($_POST['jurl']);
} else {
$jsuser = $_POST['jsuser'];
$jusid = $_POST['jusid'];
$juser = $_POST['juser'];
$jurl = $_POST['jurl'];
}
if (!preg_match("/([A-Z0-9_-]+\@[A-Z0-9_-]+\.[a-z.]{2,7}+)+$/i",$juser)){
echo "<div style='position:relative;top:1px;color:#555;height:26px;line-height:26px;'>$lang[INSERSV]</div>";
    die();
}
$name = array($jsuser,$jusid,$juser);
foreach ($name as $name) {
if (preg_match("/</", $name)) {
echo "<div style='position:relative;top:1px;color:#555;height:26px;line-height:26px;'>$lang[INSERSV]</div>";
    die();
}
if (preg_match("/\[/", $name)) {
echo "<div style='position:relative;top:1px;color:#555;height:26px;line-height:26px;'>$lang[INSERSV]</div>";
    die();
}
if (preg_match("/`/", $name)) {
echo "<div style='position:relative;top:1px;color:#555;height:26px;line-height:26px;'>$lang[INSERSV]</div>";
    die();
}
if (strlen($name) > 850) {
echo "<div style='position:relative;top:1px;color:#555;height:26px;line-height:26px;'>$lang[INSERSV]</div>";
    die();
}
if (strlen($name) < 1) {
echo "<div style='position:relative;top:1px;color:#555;height:26px;line-height:26px;'>$lang[INSERSV]</div>";
    die();
}
}
$time = date ("h:i A"); 
$date = date ("l, F jS, Y");
$IP = $_SERVER['REMOTE_ADDR'];
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= "From: $sitemail" . "\r\n";
$bodys = "
<head>
<style>
#content{
align:center;
padding:4px;
margin:0px auto;
border:1px dotted #f8f8f8;
width:733px;
font-family;tahoma;
color:#222;
}
</style>
</head>
<div id = 'content'>
<font color='#0E89D8'>
<h2>Hi, $jsuser, $date, $time</h2>
</font>
$lang[TAKEA]<br /><strong>$jusid</strong><br /><br />
<a href=$jurl><font color='#0E89D8'>$jurl</font></a><br /> 
<br /><br />
Sender IP Address: $IP<br>";
$subject = "Message from $jusid";
mail($juser, $subject, $bodys, $headers);
$date = date ("l, F jS, Y"); 
$time = date ("h:i A");
$subject = "Info Tell a Friend";
$bodys = "Hi Admin.<br /><br />Tell a Friend Email Notification. $date at $time.<br /><br />From IP Address.$IP<br />To E Address $juser. <br /><br />Url. $jurl "; 
mail($sitemail, $jusid, $bodys, $headers);
echo "<div style='position:relative;top:18px;left:0;color:#555;height:26px;line-height:26px;'>$lang[INSERSC]</div>";
######################################
##recomend.php                4.1.4.##
######################################
?>