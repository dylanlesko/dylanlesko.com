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
require_once ('./languages/lang_' . $langs . '.php');
$url = $_GET['id'];
?>
<head>
<script type="text/javascript" src="scripts/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.8.14.custom.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){$("a.sendName").click(function(){
var jsuser=$("#jsuser").val();
var jusid=$("#jusid").val();
var juser=$("#juser").val();
var jurl=$("#jurl").val();
$.post("recomend.php",{jsuser:jsuser,jusid:jusid,juser:juser,jurl:jurl},function(data){$("#loadName")
.html(data)
.effect('bounce', { times: 3, distance: 30 }, 100);
  });
 });
});
$('#start').click(function() {
  $('#effect').toggle('fast', function() {
   });
});
</script>
</head>
<body>
<div id="effect" style="background:#FFF;">
<form class="message">
<h1 class="h1"><?php echo $lang['MESSAGE'] ?> </h1>
            <br />
<?php echo $lang['TELLA1']; ?><br />
<input type="text" name="jsuser" id="jsuser">
<?php echo $lang['TELLA2']; ?><br />
<input type="text" name="jusid" id="jusid">
<?php echo $lang['TELLA3']; ?><br />
<input type="text" name="juser" id="juser">
<input type="hidden" name="jurl" id="jurl" value="<?php echo $url ?>">
<br />
<div id="inputsubmit"><a style="align:center;text-decoration:none" href="javascript:submit();" id="start" class="sendName"><?php echo $lang['MESSASE'] ?></a></div>
</form>
</div>
<div id="loadName"></div>
<?php
######################################
##tella.php                   4.1.4.##
######################################
?>