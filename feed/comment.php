<?php session_start();
/* * ********************************************************************
*  Copyright notice PHP Enter
*
*  (c) 2011 Predrag Rukavina - admin[at]phpenter[dot]org
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
?>
<head>
<style>
#error{margin-top:12px;background:#fff6bf url(themes/<?php echo $themes; ?>/styles/images/error.png) center no-repeat;background-position:15px 50%;text-align:left;border-top:1px solid #ffd324;border-bottom:1px solid #ffd324;width:644px;color:#444;font-family:Verdana,Arial,Sans-Serif;font-size:10px;padding:5px 20px 5px 45px}
</style>
</head>
<?php if(isset($_SERVER['HTTP_REFERER'])) {
   $referer = $_SERVER['HTTP_REFERER'];
} else {
   die();
}
if($keypublic == 0) {
   require_once ('salt.php');
   require_once ('classes/securesession.class.php');
   $ss = new SecSession();
   $ss->check_browser = true;
   $ss->check_ip_blocks = 2;
   $ss->secure_word = $salt;
   $ss->regenerate_id = true;
   if(!$ss->Check() || !isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
      header('Location: signin.php');
      die();
   }
   if(!$_SESSION['inecsess']) {
      header('Location: signin.php');
      die();
   }
}
if($keypublic == 1 and @$_SESSION['loggedin'] == false) {
   if((@$_POST['check']) <> @$_SESSION['check']) {
      echo "<center><div id='error'>$lang[WRONGCAP] <a href='$referer#section'>$lang[BOOKBACK]</a></div>";
      unset($_SESSION['check']);
      die();
   }
}
if(get_magic_quotes_gpc()) {
   $main = stripslashes(htmlspecialchars($_POST['main']));
   $comrev = stripslashes(htmlspecialchars($_POST['comrev']));
   $text = stripslashes(htmlspecialchars($_POST['text']));
   $newimg = stripslashes(htmlspecialchars($_POST['newimg']));
   $ccuid = stripslashes(htmlspecialchars($_POST['ccuid']));
   $chelper = stripslashes(htmlspecialchars($_POST['chelper']));
   $text1 = stripslashes(htmlspecialchars($_POST['text1']));
   if($keypublic == 1 and @$_SESSION['loggedin'] == false) {
      $guestmail = stripslashes(htmlspecialchars($_POST['guestmail']));
      if(strlen($guestmail) < 5) {
         echo "<center><div id='error'>Email - $lang[SEAERR5]&nbsp;<a href='$referer#section'>$lang[BOOKBACK]</a></div></center>";
         unset($_SESSION['check']);
         die();
      }
      if(strlen($guestmail) > 80) {
         echo "<center><div id='error'>Email - $lang[SEAERR7]&nbsp;<a href='$referer#section'>$lang[BOOKBACK]</a></div></center>";
         unset($_SESSION['check']);
         die();
      }
   }
} else {
   $main = htmlspecialchars($_POST['main']);
   $comrev = htmlspecialchars($_POST['comrev']);
   $text = htmlspecialchars($_POST['text']);
   $newimg = htmlspecialchars($_POST['newimg']);
   $ccuid = htmlspecialchars($_POST['ccuid']);
   $chelper = htmlspecialchars($_POST['chelper']);
   $text1 = htmlspecialchars($_POST['text1']);
   if($keypublic == 1 and @$_SESSION['loggedin'] == false) {
      $guestmail = htmlspecialchars($_POST['guestmail']);
      if(strlen($guestmail) < 5) {
         echo "<center><div id='error'>Email - $lang[SEAERR6]&nbsp;<a href='$referer#section'>$lang[BOOKBACK]</a></div></center>";
         unset($_SESSION['check']);
         die();
      }
      if(strlen($guestmail) > 80) {
         echo "<center><div id='error'>Email - $lang[SEAERR7]&nbsp;<a href='$referer#section'>$lang[BOOKBACK]</a></div></center>";
         unset($_SESSION['check']);
         die();
      }
   }
}
?>
<head>
<link rel="stylesheet" type="text/css" href="themes/<?php echo $themes; ?>/styles/style.css" />
</head>
<?php $subtext = substr($text1,0,8);
if(@$_SESSION["reloadse"] == $subtext) {
   echo "<center><div id='error'>$lang[BOOKERR9]</div></center>";
   unset($_SESSION['check']);
   die();
}
if(strlen($text) < 4) {
   echo "<center><div id='error'>Name - $lang[SEAERR6]&nbsp;<a href='$referer#section'>$lang[BOOKBACK]</a></div></center>";
   unset($_SESSION['check']);
   die();
}
if(strlen($text) > 60) {
   echo "<center><div id='error'>Name - $lang[SEAERR7]&nbsp;<a href='$referer#section'>$lang[BOOKBACK]</a></div></center>";
   unset($_SESSION['check']);
   die();
}
if(strlen($text1) < 10) {
   echo "<center><div id='error'>Comment $lang[POSTERR3]&nbsp;<a href='$referer#section'>$lang[BOOKBACK]</a></div></center>";
   unset($_SESSION['check']);
   die();
}
if(strlen($text1) > 800) {
   echo "<center><div id='error'>Comment $lang[VIDOERR]&nbsp;<a href=\"$referer#section\">$lang[BOOKBACK]</a></div></center>";
   unset($_SESSION['check']);
   die();
}
if($comrev == false) {
   echo 'Error [72]';
   unset($_SESSION['check']);
   die();
}
if($keypublic == 0) {
$list = "/(content-type|mime-version|content-transfer-encoding|to:|bcc:|cc:|document.cookie|document.write|onmouse|onkey|onclick|onload)/i";
   if(preg_match($list,$text1)) {
      echo "<center><font face='verdana'>$lang[INVALIDCHAR] '??' </font></center>";
      unset($_SESSION['check']);
      die();
   }
if(preg_match("/</",$text1)) {
         echo "<center><div id='error'>$lang[INVALIDCHAR] '<' </div></center>";
         die();
      }
      if(preg_match("/\\[/",$text1)) {
         echo "<center><div id='error'>$lang[INVALIDCHAR] '[' </div></center>";
         die();
      }
}
if($keypublic == 1 and @$_SESSION['loggedin'] == false) {
$name = array($text,$guestmail,$text1);
$list = "/(content-type|mime-version|content-transfer-encoding|to:|bcc:|cc:|document.cookie|document.write|onmouse|onkey|onclick|onload)/i";
foreach($name as $name) {
   if(preg_match($list,$name)) {
      echo "<center><font face='verdana'>$lang[INVALIDCHAR] '??' </font></center>";
      unset($_SESSION['check']);
      die();
   }
   if(preg_match("/</",$name)) {
         echo "<center><div id='error'>$lang[INVALIDCHAR] '<' </div></center>";
         die();
      }
   if(preg_match("/\\[/",$name)) {
         echo "<center><div id='error'>$lang[INVALIDCHAR] '[' </div></center>";
         die();
      }
}
}
$realmessage = "$lang[VIDCOMM] ".$text;
@$_SESSION["reloadse"] = $subtext;
$time = date("Y-m-d H:i:s");
$helper = preg_replace('/([?,\/,|,",\',:,%,*,(,),[,\,\],\,])/',"-",$chelper);
$helper = urlencode($helper);
if($keypublic == 0) {
$sql = $conn->Prepare('INSERT INTO publictime (userid,texty,imgs,date,amess,indesc) VALUES (?, ?, ?, ?, ?, ?)');
if($conn->Execute($sql,array($ccuid,$text,$newimg,$time,$realmessage,$text1)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
	}
$sql2 = $conn->Prepare('INSERT INTO reviews (comrev,cmain,comenter,comimage,chomes,cdate,chelper,ctexte) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
if($conn->Execute($sql2,array($comrev,"1",$text,$newimg,$chomes,$time,$helper,$text1)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
	}
$sql3 = $conn->Prepare('UPDATE newser SET commno = commno +  ? WHERE univer = ?');
if($conn->Execute($sql3,array("1",$comrev)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
}
}
if($keypublic == 1 and @$_SESSION['loggedin'] == false) {
$sql2 = $conn->Prepare('INSERT INTO reviews (comrev,cmain,comenter,usermail,comimage,chomes,cdate,chelper,ctexte) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
if($conn->Execute($sql2,array($comrev,"1",$text,$guestmail,'0','0',$time,$helper,$text1)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
	}
$sql3 = $conn->Prepare('UPDATE newser SET commno = commno +  ? WHERE univer = ?');
if($conn->Execute($sql3,array("1",$comrev)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
}
}
if($keypublic == 1 and @$_SESSION['loggedin'] == true) {
$sql = $conn->Prepare('INSERT INTO publictime (userid,texty,imgs,date,amess,indesc) VALUES (?, ?, ?, ?, ?, ?)');
if($conn->Execute($sql,array($ccuid,$text,$newimg,$time,$realmessage,$text1)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
	}
$sql2 = $conn->Prepare('INSERT INTO reviews (comrev,cmain,comenter,comimage,chomes,cdate,chelper,ctexte) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
if($conn->Execute($sql2,array($comrev,"1",$text,$newimg,$chomes,$time,$helper,$text1)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
	}
$sql3 = $conn->Prepare('UPDATE newser SET commno = commno +  ? WHERE univer = ?');
if($conn->Execute($sql3,array("1",$comrev)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
}
}
unset($_SESSION['check']);
$conn->Close();
$asty = $_SERVER['HTTP_REFERER'];
?>
<head>
<script type="text/javascript">
function delayer(){ 
window.location = "<?php echo $asty ?>"
    }
</script>
</head>
<body onLoad="setTimeout('delayer()', 1000)">
<center><div style='text-align:center;width:468px;margin:0px auto;min-height:68px;max-height:98px;background: #F8F8F8;font-size:12px;color:#555;font-family:tahoma;helvetica,arial;border-top: 1px dashed #EEE;margin-top:32px;padding-top:8px;'><?php echo $lang['CREDIR'] ?><br /><br /><img src="themes/<?php echo $themes; ?>/styles/images/ajax-loader.gif" border="0"><br /><br /></div></center>
<?php
######################################
##comment.php                 4.2.2.##
######################################
?>