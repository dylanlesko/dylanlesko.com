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
     header('Location: signin.php');
     die();
  }
if (!$_SESSION['inecsess'])
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
if(isset($_POST['query'])) {
$shouter = @$_SESSION['INC_USER_ID'];
$shname = @$_SESSION['INC_USER_NAME'];
	if(get_magic_quotes_gpc()) {
		$fullname = stripslashes($_POST['fullname']);
		$homep = stripslashes($_POST['homep']);
		$biosi = stripslashes($_POST['biosi']);
                $biosi = htmlspecialchars($biosi);
                @$coption = stripslashes($_POST['coption']);
	} else {
		$fullname = $_POST['fullname'];
		$homep = $_POST['homep'];
		$biosi = $_POST['biosi'];
		$biosi = htmlspecialchars($biosi);
                @$coption = $_POST['coption'];
	}
	$name = array($fullname,$homep,$biosi);
	foreach($name as $name) {
		if(preg_match("/%/",$name)) {
			echo "<center><div id='error'>$lang[INVALIDCHAR] '%' </div></div>";
                        $smarty->display('footer.php');
			die();
		}
		if(preg_match("/;/",$name)) {
			echo "<center><div id='error'>$lang[INVALIDCHAR] ';' </div></div>";
                        $smarty->display('footer.php');
			die();
		}
		if(preg_match("/</",$name)) {
			echo "<center><div id='error'>$lang[INVALIDCHAR] '<' </div></div>";
                        $smarty->display('footer.php');
			die();
		}
		if(preg_match("/\\[/",$name)) {
			echo "<center><div id='error'>$lang[INVALIDCHAR] '[' </div></div>";
                        $smarty->display('footer.php');
			die();
		}
	}
        if(strlen($homep) > 0) {
	if(!preg_match("/^(https?:\/\/+[\w\-]+\.[\w\-]+)/i",$homep)) {
		echo "<center>$lang[VIDOERR1]&nbsp;<a href=\"javascript:history.go(-1)\">$lang[BOOKBACK]</a></center></div>";
                $smarty->display('footer.php');
		die();
	}
        }
	if(strlen($homep) > 120) {
		echo "<center>Max Characters Field (URL): 120 <a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a></center></div>";
                $smarty->display('footer.php');
		die();
	}
	if(strlen($biosi) > 800) {
		echo "<center>Max Characters Field (About Me): 800 <a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a></center></div>";
                $smarty->display('footer.php');
		die();
	}
	if(strlen($fullname) > 100) {
		echo "<center>Max Characters Field (Full Name): 100 <a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a></center></div>";
                $smarty->display('footer.php');
		die();
	}
if($coption == 1){
 $current_image = $_FILES['image']['name'];
	$extension = substr(strrchr($current_image,'.'),1);
	$time = date("Yhis");
	$blacklist = array(".msi",".exe",".php",".phtml",".php3",".php4",".js",".shtml",".pl",".py",".tpl",".zip",
		".gzip",".rar",".tar"," ");
	foreach($blacklist as $file) {
		if(preg_match("/$file\$/i",$_FILES['image']['name'])) {
			echo "<div id='errorpost'>$lang[POSTERR5]\n</div></div>";
			$smarty->display('footer.php');
			die();
		}
	}
		if(($extension !== "jpg" && $extension !== "jpeg")) {
			echo "<div id='errorpost'>$lang[POSTERR6]</div></div>";
                        $smarty->display('footer.php');
			die();
		}
		$new_image = $time.".".$extension;
		$destination = "uploads/".$new_image;
		$action = copy($_FILES['image']['tmp_name'],$destination);
		/**
		 * ccthumb()
		 * 
		 * @param mixed $image_source
		 * @param mixed $file
		 * @param mixed $xthumbnail
		 * @param mixed $ythumbnail
		 * @return
		 */
		function ccthumb($image_source,$file,$xthumbnail,$ythumbnail) {
			list($origx,$yorig) = getimagesize($image_source);
			if($origx > 1280 || $yorig > 1280) {
				echo "<div id='error'>Maximum width and height exceeded. Please upload images below  1280 x 1280 px size.</div></div>";
				exit();
			}
			$tag = explode('.',$image_source);
			if(preg_match('/jpg|jpeg/',$tag[1])) {
				if(@$cimage = imagecreatefromjpeg($image_source) == true) {
					$cimage = imagecreatefromjpeg($image_source);
				} else {
					echo "<div id='error'>Wrong File</div></div>";
					exit();
				}
			}
			$ratio = $origx / $yorig;
			if($xthumbnail / $ythumbnail > $ratio) {
				$yheight = $xthumbnail / $ratio;
				$xwidth = $xthumbnail;
			} else {
				$xwidth = $ythumbnail * $ratio;
				$yheight = $ythumbnail;
			}
			$action = imagecreatetruecolor(round($xwidth),round($yheight));
			imagecopyresampled($action,$cimage,0,0,0,0,$xwidth,$yheight,$origx,$yorig);
			$thumbnail = imagecreatetruecolor($xthumbnail,$ythumbnail);
			$xos = $xwidth / 2;
			$yos = $yheight / 2;
			imagecopyresampled($thumbnail,$action,0,0,($xos - ($xthumbnail / 2)),($yos - ($ythumbnail / 2)),$xthumbnail,
				$ythumbnail,$xthumbnail,$ythumbnail);
			imagejpeg($thumbnail,$file,80);
			return $thumbnail;
		}
		ccthumb($destination,'maxthumb/'.$new_image,50,50);
		ccthumb($destination,'minthumb/'.$new_image,25,25);
}
        if($coption == 1){
        $sql = $conn->Prepare('UPDATE users SET fullname = ?, homep = ?, biosi = ?, thumbs = ? WHERE usid = ?');
        if($conn->Execute($sql,array($fullname,$homep,$biosi,$new_image,$shouter)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
        }
        $sql2 = $conn->Prepare('UPDATE reviews SET comimage = ? WHERE comenter = ?');
        if($conn->Execute($sql2,array($new_image,$shname)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
        }
        }else{
        $sql = $conn->Prepare('UPDATE users SET fullname = ?, homep = ?, biosi = ? WHERE usid = ?');
        if($conn->Execute($sql,array($fullname,$homep,$biosi,$shouter)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
        }
        }
	echo "<br /><div id='info'>Successfully <a href='link.php'> $lang[BOOKBACK]</a></center></div></div>";
}
$smarty->display('footer.php');
$conn->Close();
######################################
##setprofile.php              4.2.0.##
######################################
?>