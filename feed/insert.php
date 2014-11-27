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
if(get_magic_quotes_gpc()) {
    $jsusid = stripslashes($_POST['jsusid']);
    $jsuser = stripslashes($_POST['jsuser']);
    $jsthumb = stripslashes($_POST['jsthumb']);
    $jusid = stripslashes($_POST['jusid']);
    $juser = stripslashes($_POST['juser']);
    $jfeed = stripslashes($_POST['jfeed']);
} else {
    $jsusid = $_POST['jsusid'];
    $jsuser = $_POST['jsuser'];
    $jsthumb = $_POST['jsthumb'];
    $jusid = $_POST['jusid'];
    $juser = $_POST['juser'];
    $jfeed = $_POST['jfeed'];
}
if(preg_match("/</",$jfeed)) {
    echo "<div style='margin-left:0px;position:relative;top:1px;color:#404040;height:26px;line-height:26px;'>$lang[INSERSV]</div>";
    die();
}
if(preg_match("/\[/",$jfeed)) {
    echo "<div style='margin-left:0px;position:relative;top:1px;color:#404040;height:26px;line-height:26px;'>$lang[INSERSV]</div>";
    die();
}
if(preg_match("/`/",$jfeed)) {
    echo "<div style='margin-left:0px;position:relative;top:1px;color:#404040;height:26px;line-height:26px;'>$lang[INSERSV]</div>";
    die();
}
if(strlen($jfeed) > 850) {
    echo "<div style='margin-left:0px;position:relative;top:1px;color:#404040;height:26px;line-height:26px;'>$lang[INSERSV]</div>";
    die();
}
if(strlen($jfeed) < 1) {
    echo "<div style='margin-left:0px;position:relative;top:1px;color:#404040;height:26px;line-height:26px;'>$lang[INSERSE]</div>";
    die();
}
$arecordSet = &$conn->Execute('SELECT * FROM users where usid = ?', array($jusid));
if(!$arecordSet)
    print $conn->ErrorMsg();
else
    while(!$arecordSet->EOF) {
        $ccemail = $arecordSet->fields['email'];
        $jthumb = $arecordSet->fields['thumbs'];
        $arecordSet->MoveNext();
    }
$time = date("Y-m-d H:i:s");
$sql = $conn->Prepare('INSERT INTO messages (fromid,fromname,fromimg,mdate,toid,toname,toimage,messege) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        if($conn->Execute($sql,array($jsusid,$jsuser,$jsthumb,$time,$jusid,$juser,$jthumb,$jfeed)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
	}
echo "<div style='margin:0px auto;position:relative;top:18px;left:1px;color:#888888;height:26px;line-height:26px;'>$lang[INSERSC]</div>";
$myurl = "$sitepath/link.php";
$headers = 'MIME-Version: 1.0'."\r\n";
$headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
$headers .= "From: $sitemail"."\r\n";
$jfeed = stripslashes($_POST['jfeed']);
$bodys = "
<head>
<style>
body{text-align:center;font-family:geneva,arial;background:#f8f8f8;font-size:12px;}
h4{color:#0033FF;}
img{position:relative;top:3px;}
a{color:#0033FF;font-size:12px;}
a visited{color:#0033FF;font-size:12px;}
#content{
text-align:left;
padding:4px;
margin:0px auto;
background:#fff;
border:1px solid #cccccc;
width:722px;
height:380px;
font-family:geneva,arial;
font-size:12px;
color:#222;
}
</style>
</head>
<div id = 'content'>
<div><h4><img src='$sitepath/themes/$themes/styles/images/message.png' border='0'>&nbsp;&nbsp;&nbsp;$sitetitle</h4></div><div>$lang[MAILHEAD] '$juser', $lang[INSBODY] <a href='$sitepath/profile.php?id=$jsusid'>$jsuser</a>.</div><br /><br />
<div style='float:left'><img style='margin-right:8px;' src='$sitepath/maxthumb/$jsthumb' border='0'></div><div style='float:left'>$jfeed</div><br /><br /><br /><br /><br />
<div><a href='$myurl'>$lang[INSCONT]</a><br /><br />$lang[INSIMPO]<br /><br />
$myurl<br /><br />
$lang[INSTHAR]<br /><br />$sitetitle</div>";
$subject = "$lang[INSSUBJ] $sitetitle";
mail($ccemail,$subject,$bodys,$headers);
$arecordSet->Close();
$conn->Close();
######################################
##insert.php                  4.1.4.##
######################################
?>