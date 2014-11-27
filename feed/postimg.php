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
require_once ('languages/lang_'.$langs.'.php');
$smarty->display('blank.php');
$shouter = @$_SESSION['INC_USER_ID'];
$drecordSet = &$conn->Execute('SELECT * FROM users WHERE usid = ? LIMIT 1', array($shouter));
if(!$drecordSet)
	print $conn->ErrorMsg();
else
	while(!$drecordSet->EOF) {
		$priv = $drecordSet->fields['privilege'];
		$kori = $drecordSet->fields['usid'];
		$usercc = $drecordSet->fields['username'];
		$thumbs = $drecordSet->fields['thumbs'];
		if($priv == 3) {
			//do nothing
		} else {
			echo "<div id=\"error\">".$lang['MUSTPR']."&nbsp;".$lang['MUSTCO']."&nbsp<a href=\"mailto:".$sitemail."\">".$lang['MUSTWE']."</a>&nbsp".$lang['MUSTSI']."</div></div>";
			$smarty->display('footer.php');
			die();
		}
		$drecordSet->MoveNext();
	}
$cuniver = $_POST['gtitle'];
if(@$_SESSION["reloads"] == $cuniver) {
	echo "Error</div>";
	$smarty->display('footer.php');
	die();
}
@$_SESSION["reloads"] = $cuniver;
$gtitle = $_POST['gtitle'];
if(get_magic_quotes_gpc()) {
	$gtitle = stripslashes($gtitle);
}
if(preg_match("/</",$gtitle)) {
		echo "<div id='error'>$lang[INVALIDCHAR] '<' <a href='javascript:location.reload(true)'>$lang[BOOKBACK]</a></div></div>";
	$smarty->display('footer.php');
        $conn->Close();
		die();
	}
	if(preg_match("/\\[/",$gtitle)) {
		echo "<div id='error'>$lang[INVALIDCHAR] '[' <a href='javascript:location.reload(true)'>$lang[BOOKBACK]</a></div></div>";
	$smarty->display('footer.php');
        $conn->Close();
		die();
	}
if(strlen($gtitle) < 3) {
	echo "<div id='error'>$lang[POSTERR1] <a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a></div></div>";
	$smarty->display('footer.php');
        $conn->Close();
	die();
}
if(strlen($gtitle) > 400) {
	echo "<div id='error'>$lang[POSTERR4] <a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a></div></div>";
	$smarty->display('footer.php');
        $conn->Close();
	die();
}
$current_image = $_FILES['image']['name'];
$extension = substr(strrchr($current_image,'.'),1);
if(($extension != "jpg") && ($extension != "jpeg")) {
	echo "<div id='error'>$lang[POSTERR6]</div></div>";
	$smarty->display('footer.php');
        $conn->Close();
	die();
}
$time = date("fYhis");
$new_image = $time.".".$extension;
$destination ='uploads/'.$new_image;
$action = copy($_FILES['image']['tmp_name'],$destination);
/**
 * ccthumb()
 * 
 * @param mixed $imgSrc
 * @param mixed $filename
 * @param mixed $thumbnail_width
 * @param mixed $thumbnail_height
 * @return
 */
function ccthumb($imgSrc,$filename,$thumbnail_width,$thumbnail_height) {
	list($width_orig,$height_orig) = getimagesize($imgSrc);
	if($width_orig > 1280 || $height_orig > 1280) {
		echo "<div id='error'>$lang[POSTERR7]</div></div>";
	$smarty->display('footer.php');
        $conn->Close();
		exit();
	}
	$tag = explode('.',$imgSrc);
	if(preg_match('/jpg|jpeg/',$tag[1])) {
		if(@$cimage = imagecreatefromjpeg($imgSrc) == true) {
			$cimage = imagecreatefromjpeg($imgSrc);
		} else {
			die("wrong file");
		}
	}
	$ratio_orig = $width_orig / $height_orig;
	if($thumbnail_width / $thumbnail_height > $ratio_orig) {
		$new_height = $thumbnail_width / $ratio_orig;
		$new_width = $thumbnail_width;
	} else {
		$new_width = $thumbnail_height * $ratio_orig;
		$new_height = $thumbnail_height;
	}
	$x_mid = $new_width / 2;
	$y_mid = $new_height / 2;
	$process = imagecreatetruecolor(round($new_width),round($new_height));
	imagecopyresampled($process,$cimage,0,0,0,0,$new_width,$new_height,$width_orig,
		$height_orig);
	$thumb = imagecreatetruecolor($thumbnail_width,$thumbnail_height);
	imagecopyresampled($thumb,$process,0,0,($x_mid - ($thumbnail_width / 2)),($y_mid -
		($thumbnail_height / 2)),$thumbnail_width,$thumbnail_height,$thumbnail_width,$thumbnail_height);
	imagejpeg($thumb,$filename,80);
	return $thumb;
}
ccthumb($destination,'maxthumb/'.$new_image,300,250);
ccthumb($destination,'minthumb/'.$new_image,144,82);
$time = date("Y-m-d H:i:s");
$sql = $conn->Prepare('INSERT INTO vgalery (guniver,gtitle,gdate,gamess) VALUES (?, ?, ?, ?)');
        if($conn->Execute($sql,array($new_image,$gtitle,$time,"0")) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
	}
$conn->Close();
?>
<script type="text/javascript">
<!--
function delayer(){
window.location = "index.php"
}
//-->
</script>
</head>
<body onLoad="setTimeout('delayer()', 2000)">
<center><div style='text-align:center;width:468px;margin:0px auto;min-height:60px;max-height:80px;background: #F8F8F8;font-size:12px;color:#555;font-family:tahoma;helvetica,arial;border-top: 1px dashed #EEE;margin-top:32px;padding-top:8px;'><?php echo $lang['SIGSEC']; ?><br /><br /><img src="themes/<?php echo $themes; ?>/styles/images/ajax-loader.gif" border="0"><br /></div></center>
</div>
<?php
$smarty->display('footer.php');
######################################
##postimg.php                 4.1.4.##
######################################
?>