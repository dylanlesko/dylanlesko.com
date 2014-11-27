<?php @session_start();
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
include ('bookconf.php');
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
require_once ('languages/lang_'.$langs.'.php');
?>
<head>
<link href="themes/{$themes}/styles/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="themes/<?php echo $themes ?>/styles/bookmark.css" />
<title><?php echo $lang['BOOKTITLE'] ?></title>
<script language="JavaScript">
function textCounter(field, countfield, maxlimit) {
if (field.value.length > maxlimit)
field.value = field.value.substring(0, maxlimit);
else 
countfield.value = maxlimit - field.value.length;
}
</script>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
<script type="text/javascript" src="scripts/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.8.14.custom.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$("a.sendName").click(function(){
var samess = $("#samess").val();
var urames = $("#urames").val();
var areass = $("#areass").val(); 
$.post("bookset.php", {samess: samess, urames: urames, areass: areass},
function(data){
$("#loadName").html(data).show('drop', { direction: 'left' }, 300)
});
});
});
</script>
</head>
<?php
if(@$disabled == 1){echo"Sorry, You don't have the required permissions to enter to this section.";die();}
$gettitle = $_GET['title'];
if($gettitle == false) {
	echo "<div id='error'>$lang[BOOKERR1]</div>";
	die();
}
$urld = $_GET['urld'];
$geturl = "http://".$urld;
if($geturl == false) {
	echo "<div id='error'>$lang[BOOKERR2]</div>";
	die();
}
if(!preg_match("/^(https?:\/\/+[\w\-]+\.[\w\-]+)/i",$geturl)) {
	echo "<div id='error'>$lang[BOOKERR3]</div>";
	exit();
}
$meta = @get_meta_tags($geturl);
$meta = @$meta['description'];
require_once ('salt.php');
require_once ('classes/securesession.class.php');
$ss = new SecSession();
$ss->check_browser = true;
$ss->check_ip_blocks = 2;
$ss->secure_word = $salt;
$ss->regenerate_id = true;
if(!$ss->Check() || !isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
	include ('bookform.php');
	die();
}
if(!$_SESSION['inecsess']) {
	include ('bookform.php');
	die();
}
?>
<body>
<div id="line"><?php echo $sitetitle ?></div>
<div id="loadName">
<center>
<form>
<input type="hidden" name="urames" id="urames" value="<?php echo $geturl ?>" /> 
<?php $lang['BOOKFIELD1'] ?>
<input type="text" name="samess" id="samess" value="<?php echo $gettitle ?>" disabled="disabled" /> 
<?php $lang['BOOKFIELD2'] ?><div>
<textarea name="areass" id="areass" onKeyDown="textCounter(this.form.areass,this.form.enter,250);" onKeyUp="textCounter(this.form.areass,this.form.enter,250);"><?php echo $meta; ?></textarea>
</div>
</center>
<div id="lines"><a href="javascript:submit();" id="start" class="sendName"><?php echo $lang['LINKSUB'] ?></a></div>
<input readonly type="text" id="counter" name="enter" size="1" maxlength="3" value="250" disable="disabled" /><?php echo $lang['BOOKERR4'] ?>
</form>
</div>
<?php
######################################
##bookmark.php                4.1.4.##
######################################
?>