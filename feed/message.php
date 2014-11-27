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
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require_once ('classes/securesession.class.php');
$ss = new SecSession();
$ss->check_browser = true;
$ss->check_ip_blocks = 2;
$ss->secure_word = $salt;
$ss->regenerate_id = true;
if (!$ss->Check() || !isset($_SESSION['loggedin']) || !$_SESSION['loggedin'])
  {
    echo "<h1 class='h1'>".$lang['MESSAGE']."</h1>";
    echo "<div style='padding:3px;'>".$lang['MESSAMU']."</div>";
    die();
  }
$jsusid = $_SESSION['INC_USER_ID'];
$jsuser = $_SESSION['INC_USER_NAME'];
$jsthumb = $_SESSION['INC_USER_THUMB'];
?>
<head>
<script type="text/javascript" src="scripts/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.8.14.custom.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){$("a.sendName").click(function(){
var jsusid=$("#jsusid").val();
var jsuser=$("#jsuser").val();
var jsthumb=$("#jsthumb").val();
var jusid=$("#jusid").val();
var juser=$("#juser").val();
var jfeed=$("#jfeed").val();
$.post("insert.php",{jsusid:jsusid,jsuser:jsuser,jsthumb:jsthumb,jusid:jusid,juser:juser,jfeed:jfeed},function(data){$("#loadName")
.html(data)
.effect('bounce', { times: 3, distance: 30 }, 200);
  });
 });
});

$('#start').click(function() {
  $('#effect').toggle('fast', function() {
    // Animation complete.
  });
});
</script>
</head>
<body>
<div id="effect" style="background:#FFF;">
<form class="message">
<h1 class="h1"><?php echo $lang['MESSAGE'] ?> </h1>
 <?php
$jusid = (int)$_GET['cusid'];
$juser = $_GET['cuser'];
if ($jusid == $jsusid) {
    echo $lang['MESSAYU'];
    die();
}
?>             
<br />
<input type="hidden" name="jsusid" id="jsusid" value="<?php echo $jsusid; ?>">
<input type="hidden" name="jsuser" id="jsuser" value="<?php echo $jsuser; ?>">
<input type="hidden" name="jsthumb" id="jsthumb" value="<?php echo $jsthumb; ?>">
<input type="hidden" name="jusid" id="jusid" value="<?php echo $jusid; ?>">
<input type="hidden" name="juser" id="juser" value="<?php echo $juser; ?>">
<div id="inputfeed"><textarea name="jfeed" id="jfeed"></textarea></div><br />
<div id="inputsubmit"><a style="align:center;text-decoration:none" href="javascript:submit();" id="start" class="sendName"><?php echo
$lang['MESSASE'] ?></a></div>
</form>
</div>
<div id="loadName"></div>
<?php
######################################
##message.php                 4.1.4.##
######################################
?>