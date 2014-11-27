<?php
@session_start();
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
    die();
  }
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
$smarty->assign('categori',$aval);
$smarty->assign('subcat', @$nval);
$smarty->display('blank.php');
$shouter = @$_SESSION['INC_USER_ID'];
$brecordSet = &$conn->Execute('SELECT * FROM users WHERE usid = ? LIMIT 1', array($shouter));
if(!$brecordSet)
	print $conn->ErrorMsg();
else
	while(!$brecordSet->EOF) {
		$priv = $brecordSet->fields['privilege'];
		$kori = $brecordSet->fields['usid'];
		$usercc = $brecordSet->fields['username'];
		$thumbs = $brecordSet->fields['thumbs'];
		if($priv == 1) {
			echo "<div id=\"error\">".$lang['MUSTPR']."&nbsp;".$lang['MUSTCO']."&nbsp;<a href='mailto:".$sitemail."'>".
				$lang['MUSTWE']."</a>&nbsp".$lang['MUSTSI']."</div></div>";
			$smarty->display('footer.php');
                        $brecordSet->MoveNext();
			die();
		}
		$brecordSet->MoveNext();
	}
if (isset($_POST['squery'])) {
    if (get_magic_quotes_gpc()) {
        $incvideo = stripslashes($_POST['incvideo']);
        $yname = stripslashes($_POST['yname']);
        $yadress = stripslashes($_POST['yadress']);
        $yamess = stripslashes($_POST['yamess']);
        $yamess = htmlspecialchars($yamess);
    } else {
        $incvideo = $_POST['incvideo'];
        $yname = $_POST['yname'];
        $yadress = $_POST['yadress'];
        $yamess = $_POST['yamess'];
        $yamess = htmlspecialchars($yamess);
    }
    $name = array($yname, $yadress, $yamess);
    foreach ($name as $name) {
        if (preg_match("/%/", $name)) {
            echo ">$lang[INVALIDCHAR] '%' <a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a></div>";
		$smarty->display('footer.php');
		die();
        }
        if (preg_match("/</", $name)) {
           echo ">$lang[INVALIDCHAR] '<' <a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a></div>";
		$smarty->display('footer.php');
		die();
        }
        if (preg_match("/\\[/", $name)) {
            echo ">$lang[INVALIDCHAR] '[' <a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a></div>";
		$smarty->display('footer.php');
		die();
        }
    }
    if (strlen($yname) < 3) {
        echo "$lang[POSTERR1] <a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a></div>";
		$smarty->display('footer.php');
		die();
    }
    if (strlen($yname) > 160) {
       echo "$lang[POSTERR2] <a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a></div>";
		$smarty->display('footer.php');
		die();;
    }
    if (strlen($yamess) < 10) {
        echo "$lang[POSTERR3] <a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a></div>";
		$smarty->display('footer.php');
		die();
    }
    if (strlen($yamess) > 1800) {
        echo "$lang[VIDOERR] <a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a></div>";
		$smarty->display('footer.php');
		die();
    }
$time = date("Y-m-d H:i:s");
$sql = $conn->Prepare('INSERT INTO tubevideo (yuname,yucvideo,yuadress,yuamess,ydate,yuserid,yuser) VALUES (?, ?, ?, ?, ?, ?, ?)');
        if($conn->Execute($sql,array($yname,$incvideo,$yadress,$yamess,$time,$kori,$usercc)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
	}
?>
<script type="text/javascript">
function delayer(){
window.location = "index.php"
}
</script>
</head>
<body onLoad="setTimeout('delayer()', 2000)">
<center><div style="width:468px;height:45px;margin:0px auto;background: #F8F8F8;font-size:12px;color:#404040;font-family:tahoma;helvetica,arial;border-top: 1px dashed #EEE;margin-top:32px;padding-top:8px;"><?php echo $lang['SIGSEC'] ?></div></center>
</div>
<?php
} else {
?>
<body>
<?php
    $yadress = $_POST['yadress'];
    if (!preg_match("/^[a-zA-Z]+[:\/\/]+[A-Za-z0-9\-_]+\\.+[A-Za-z0-9\.\/%&=\?\-_]+$/i",
        $yadress)) {
        echo "$lang[BOOKERR3] <a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a></div>";
		$smarty->display('footer.php');
		die();
    }
    if (preg_match("/youtube/", $yadress)) {
        //echo "OK";
    } else {
       echo "$lang[BOOKERR3] <a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a></div>";
		$smarty->display('footer.php');
		die();
    }
    if (preg_match("/watch/", $yadress)) {
        //echo "OK";
    } else {
       echo "$lang[BOOKERR3] <a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a></div>";
		$smarty->display('footer.php');
		die();
    }
    if (strlen($yadress) < 10) {
        echo "$lang[POSTERR3] <a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a></div>";
		$smarty->display('footer.php');
		die();
    }
    if (strlen($yadress) > 150) {
       echo "$lang[POSTERR2] <a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a></div>";
		$smarty->display('footer.php');
		die();
    }
    $getfrom = parse_url($yadress);
    parse_str(@$getfrom[query], $query);
    $tubeid = ($query['v']);
    $yimage = "http://i1.ytimg.com/vi/$tubeid/default.jpg";
   ?>
<div style="margin-left:8px;">
<form id="incform" action="postube.php" method="post">
<h1><?php echo $lang['LINKTUBE'] ?></h1>
<?php echo "<img src='$yimage;' border='0' style='margin-top:10px;border:1px solid #ccc;padding:2px;'>"; ?>
<input type="hidden" name="incvideo" value="<?php echo $tubeid; ?>" />     
<br />Title:<br />
<input style="width:318px;" name="yname" />
<br /><br />Description:<br />
<input type="hidden" name="yadress" value="<?php echo $yadress; ?>" /> 
<textarea name="yamess"></textarea><br /><br />
<input class="buton" type="submit" value="Submit" name="squery" />
</form>
</div>
</div>
<?php
}
?>
<?php
$smarty->display('footer.php');
######################################
##postube.php                 4.1.4.##
######################################
?>