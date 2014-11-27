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
if(!$ss->Check() || !isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
	header('Location: signin.php');
	die();
}
if(!$_SESSION['inecsess']) {
	header('Location: signin.php');
	die();
}
$arecordSet = &$conn->Execute('SELECT * FROM categori ORDER BY name ASC');
if(!$arecordSet)
	print $conn->ErrorMsg();
else
	while(!$arecordSet->EOF) {
		if($arecordSet->fields['cord'] == 0) {
			$aval[] = $arecordSet->fields;
		} else {
			$nval[] = $arecordSet->fields;
		}
		$arecordSet->MoveNext();
	}
$smarty->assign('categori',$aval);
$smarty->assign('subcat',@$nval);
$smarty->display('submit.php');
$shouter = @$_SESSION['INC_USER_ID'];
$drecordSet = &$conn->Execute('SELECT * FROM users WHERE usid = ? LIMIT 1',array($shouter));
if(!$drecordSet)
	print $conn->ErrorMsg();
else
	while(!$drecordSet->EOF) {
		$priv = $drecordSet->fields['privilege'];
		$kori = $drecordSet->fields['usid'];
		$usercc = $drecordSet->fields['username'];
		$thumbnails = $drecordSet->fields['thumbs'];
		if($priv == 1) {
			echo "<div id=\"error\">".$lang['MUSTPR']."&nbsp;".$lang['MUSTCO']."&nbsp;<a href=\"mailto:".$sitemail."\">".
				$lang['MUSTWE']."</a>&nbsp".$lang['MUSTSI']."</div></div>";
			$smarty->display('footer.php');
			die();
		}
		$drecordSet->MoveNext();
	}
if(isset($_POST['query'])) {
	if($editortrue == 2) {
		$editor = '2';
	}
	if($editortrue == 1) {
		$editor = '1';
	}
	$cuniver = $_POST['bname'];
	if(get_magic_quotes_gpc()) {
                $main = stripslashes($_POST['main']);
		$univer = stripslashes($_POST['univer']);
		$idblog = stripslashes($_POST['idblog']);
		$bname = stripslashes($_POST['bname']);
		$summary = stripslashes($_POST['summary']);
		$badress = stripslashes($_POST['badress']);
		$amess = stripslashes($_POST['amess']);
		$amess = htmlspecialchars($amess);
	} else {
                $main = $_POST['main'];
		$univer = $_POST['univer'];
		$idblog = $_POST['idblog'];
		$bname = $_POST['bname'];
		$summary = $_POST['summary'];
		$badress = $_POST['badress'];
		$amess = $_POST['amess'];
		$amess = htmlspecialchars($amess);
	}
	if(preg_match("/</",$bname)) {
		echo "<div id='errorpost'>$lang[INVALIDCHAR] '<' </div>";
		$error1 = "color:#cc0000";
		include ('form.php');
		$smarty->display('footer.php');
		die();
	}
	if(preg_match("/]/",$bname)) {
		echo "<div id='errorpost'>$lang[INVALIDCHAR] '[' </div>";
		include ('form.php');
		$error1 = "color:#cc0000";
		$smarty->display('footer.php');
		die();
	}
	if(strlen($bname) < 3) {
		echo "<div id='errorpost'>$lang[POSTERR1] </div>";
		$error1 = "color:#cc0000";
		include ('form.php');
		$smarty->display('footer.php');
		die();
	}
	if(strlen($bname) > 250) {
		echo "$<div id='errorpost'>lang[POSTERR2] </div>";
		$error1 = "color:#cc0000";
		include ('form.php');
		$smarty->display('footer.php');
		die();
	}
	if(@$_SESSION["reloadse"] == $cuniver) {
		echo "<div id='errorpost'>$lang[BOOKERR9].</div>";
		include ('form.php');
		$smarty->display('footer.php');
		die();
	}
	if(preg_match("/</",$summary)) {
		echo "<div id='errorpost'>$lang[INVALIDCHAR] '<' </div>";
		$error2 = "color:#cc0000";
		include ('form.php');
		$smarty->display('footer.php');
		die();
	}
	if(preg_match("/]/",$summary)) {
		echo "<div id='errorpost'>$lang[INVALIDCHAR] '[' </div>";
		$error2 = "color:#cc0000";
		include ('form.php');
		$smarty->display('footer.php');
		die();
	}
	if(strlen($summary) > 430) {
		echo "<div id='errorpost'>$lang[POSTERR4] </div>";
		$error2 = "color:#cc0000";
		include ('form.php');
		$smarty->display('footer.php');
		die();
	}
	if(strlen($amess) < 10) {
		echo "<div id='errorpost'>$lang[POSTERR3] </div>";
		$error4 = "color:#cc0000";
		include ('form.php');
		$smarty->display('footer.php');
		die();
	}
	if(strlen($amess) > $maxposting) {
		echo "<div id='errorpost'>Error [23] </div>";
		$error4 = "color:#cc0000";
		include ('form.php');
		$smarty->display('footer.php');
		die();
	}
        $name = array($badress, $bname, $summary, $amess);
	$list = "/(content-type|mime-version|content-transfer-encoding|to:|bcc:|cc:|document.cookie|document.write|onmouse|onkey|onclick|onload)/i";
	foreach($name as $name) {
		if(preg_match($list,$name)) {
			echo "<center><font face='verdana'>$lang[INVALIDCHAR] '??' </font></center></div>";
                        $smarty->display('footer.php');
			die();
		}
	}
	$current_image = $_FILES['image']['name'];
	$extension = substr(strrchr($current_image,'.'),1);
	$time = date("Yhis");
	$blacklist = array(".msi",".exe",".php",".phtml",".php3",".php4",".js",".shtml",".pl",".py",".tpl",".zip",
		".gzip",".rar",".tar"," ");
	foreach($blacklist as $file) {
		if(preg_match("/$file\$/i",$_FILES['image']['name'])) {
			echo "<div id='errorpost'>$lang[POSTERR5]\n</div>";
			$error3 = "color:#cc0000";
			include ('form.php');
			$smarty->display('footer.php');
			die();
		}
	}
	if($_FILES['image']['name'] == "") {
		$new_image = "";
	} else {
		if(($extension !== "jpg" && $extension !== "jpeg")) {
			echo "<div id='errorpost'>$lang[POSTERR6] </div>";
			$error3 = "color:#cc0000";
			include ('form.php');
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
				echo "<div id='error'>Maximum width and height exceeded. Please upload images below  1280 x 1280 px size.</div>";
				exit();
			}
			$tag = explode('.',$image_source);
			if(preg_match('/jpg|jpeg/',$tag[1])) {
				if(@$cimage = imagecreatefromjpeg($image_source) == true) {
					$cimage = imagecreatefromjpeg($image_source);
				} else {
					echo "<div id='error'>Wrong File</div>";
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
		ccthumb($destination,'maxthumb/'.$new_image,300,250);
		ccthumb($destination,'minthumb/'.$new_image,144,82);
	}
	@$_SESSION["reloadse"] = $cuniver;
	$time = date("Y-m-d H:i:s");
	$hcta = array("onload","onclick");
	$ycta = array("-","-");
	$amess = str_replace($hcta,$ycta,$amess);
	$helper = preg_replace('/([?,\/,|,",\',:,%,*,(,),[,\,\],\,])/',"-",$bname);
	$helper = urlencode($helper);
	$sql = $conn->Prepare('INSERT INTO newser (main,univer,idblog,editor,buserid,buser,btexty,bhelper,brief,badress,images,bimgs,bdate,bamess) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
	if($conn->Execute($sql,array($main,$univer,$idblog,$editor,$kori,$usercc,$bname,$helper,$summary,$badress,$new_image,
		$thumbnails,$time,$amess)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
	}
	$amess = htmlspecialchars_decode($amess);
	$amess = strip_tags($amess);
	$hcta = array("<",">","[","]","onload","onclick");
	$ycta = array("-","-","-","-","-","-");
	$amess = str_replace($hcta,$ycta,$amess);
	$sql2 = $conn->Prepare('INSERT INTO onewse (omain,oniver,omages,otexty,ohelper,oamess) VALUES (?, ?, ?, ?, ?, ?)');
	if($conn->Execute($sql2,array($main,$univer,$new_image,$bname,$helper,$amess)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
	}
        if($main == '0'){
	$sql3 = $conn->Prepare('UPDATE categori SET ccount = ccount +  ? WHERE catid = ?');
	if($conn->Execute($sql3,array("1",$idblog)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
	}
        }
	$conn->Close();
	$cname = "New Post - ".$bname."\r\nvia ".$usercc;
	$ctitle = "New Post [".$sitetitle."]";
	$headers = 'From:'.$sitemail."\r\n".'Reply-To: $ccmail'."\r\n".'X-Mailer: PHP/'.phpversion();
	mail($sitemail,$ctitle,$cname,$headers);
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
<div id="loader"><?php echo $lang['SIGSEC'] ?><br /><br /><img src="themes/<?php echo $themes; ?>/styles/images/ajax-loader.gif" border="0"><br /></div>
<?php } else {
	$univer = date("Yhis"); ?>
<form action="post.php" id="incform" enctype="multipart/form-data" method="post">
<h3>New Story</h3>
<div><?php echo $lang['POSTCAT']; ?>:</div>
<input type="hidden" name="univer" value="<?php echo $univer; ?>" />
<?php
if($aval == false) {
    echo "$lang[POSTNOCAT].</br /></div>";
    $smarty->display('footer.php');
    die();
}
	$smarty->display('submit_tree.php');
	@$incname = $_POST['incname'];
	if($incname == true) {
		@$url = addslashes($incname);
		if(!preg_match("/^[a-zA-Z]+[:\/\/]+[A-Za-z0-9\-_]+\\.+[A-Za-z0-9\.\/%&=\?\-_+]+$/i",$url)) {
			echo "<br /><br /><font color='red'>$lang[BOOKERR3]</font>";
			echo "</div>";
			$smarty->display('footer.php');
			die();
		}
		if(strlen($url) < 8) {
			echo "<center>Field must be at least 8 characters long:<a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a></center></div>";
			$smarty->display('footer.php');
			die();
		}
		if(strlen($url) > 220) {
			echo "<center>Max Characters Field: 220<a href='javascript:history.go(-1)'>$lang[BOOKBACK]</a></center></div>";
			$smarty->display('footer.php');
			die();
		}
		/**
		 * getUrlData()
		 * 
		 * @param mixed $url
		 * @return
		 */
		function getUrlData($url) {
			$result = false;
			$contents = getUrlContents($url);
			if(isset($contents) && is_string($contents)) {
				$title = null;
				$metaTags = null;
				preg_match('/<title>([^>]*)<\/title>/si',$contents,$match);
				if(isset($match) && is_array($match) && count($match) > 0) {
					$title = strip_tags($match[1]);
				}
				preg_match_all('/<[\s]*meta[\s]*name="?'.'([^>"]*)"?[\s]*'.'[lang="]*[^>"]*["]*'.'[\s]*content="?([^>"]*)"?[\s]*[\/]?[\s]*>/si',
					$contents,$match);
				if(isset($match) && is_array($match) && count($match) == 3) {
					$originals = $match[0];
					$names = $match[1];
					$values = $match[2];
					if(count($originals) == count($names) && count($names) == count($values)) {
						$metaTags = array();
						for($i = 0,$limiti = count($names); $i < $limiti; $i++) {
							$metaname = strtolower($names[$i]);
							$metaname = str_replace("'",'',$metaname);
							$metaname = str_replace("/",'',$metaname);
							$metaTags[$metaname] = array('html' => htmlentities($originals[$i]),'value' => $values[$i]);
						}
					}
				}
				if(sizeof($metaTags) == 0) {
					preg_match_all('/<[\s]*meta[\s]*content="?'.'([^>"]*)"?[\s]*'.'[lang="]*[^>"]*["]*'.'[\s]*name="?([^>"]*)"?[\s]*[\/]?[\s]*>/si',
						$contents,$match);
					if(isset($match) && is_array($match) && count($match) == 3) {
						$originals = $match[0];
						$names = $match[2];
						$values = $match[1];
						if(count($originals) == count($names) && count($names) == count($values)) {
							$metaTags = array();
							for($i = 0,$limiti = count($names); $i < $limiti; $i++) {
								$metaname = strtolower($names[$i]);
								$metaname = str_replace("'",'',$metaname);
								$metaname = str_replace("/",'',$metaname);
								$metaTags[$metaname] = array('html' => htmlentities($originals[$i]),'value' => $values[$i]);
							}
						}
					}
				}
				$result = array('title' => $title,'metaTags' => $metaTags);
			}
			return $result;
		}
		/**
		 * getUrlContents()
		 * 
		 * @param mixed $url
		 * @param mixed $maximumRedirections
		 * @param integer $currentRedirection
		 * @return
		 */
		function getUrlContents($url,$maximumRedirections = null,$currentRedirection = 0) {
			$result = false;
			$contents = @file_get_contents($url);
			if(isset($contents) && is_string($contents)) {
				preg_match_all('/<[\s]*meta[\s]*http-equiv="?REFRESH"?'.'[\s]*content="?[0-9]*;[\s]*URL[\s]*=[\s]*([^>"]*)"?'.
					'[\s]*[\/]?[\s]*>/si',$contents,$match);
				if(isset($match) && is_array($match) && count($match) == 2 && count($match[1]) == 1) {
					if(!isset($maximumRedirections) || $currentRedirection < $maximumRedirections) {
						return getUrlContents($match[1][0],$maximumRedirections,++$currentRedirection);
					}
					$result = false;
				} else {
					$result = $contents;
				}
			}
			return $contents;
		}
		$Domain = $url;
		$result = getUrlData($Domain);
		if($result['title'] == "") {
			$title = $lang['POSTNODAT'];
			echo "<br />$lang[POSTNODAT]";
			die();
		} else {
			$title = $result['title'];
		}
		if(@$result['metaTags']['description']['value'] == "") {
			$description = $lang['POSTNODAT'];
		} else {
			$description = $result['metaTags']['description']['value'];
		}
		if(@$result['metaTags']['keywords']['value'] == "") {
			$keywords = $lang['POSTNODAT'];
		} else {
			$keywords = $result['metaTags']['keywords']['value'];
		}
        ?>
<input type="hidden" name="badress" value="<?php echo $incname; ?>" />
<br /><br /><div id="firstfield"><?php echo $lang['POSTURL']; ?>: <?php echo $url; ?></div><br />
<div><?php echo $lang['BOOKFIELD1']; ?>:</div>
<div><input id="firstfield" type="text" name="bname" value="<?php echo $title; ?>" class="incc" /></div>
<br />
<br />
<div><?php echo $lang['POSTSUM']; ?>:</div>
<div><input id="firstfield" type="text" name="summary"  class="incc" /></div>
<br />
<br />
<?php } else { ?>
<input type="hidden" name="badress" value="0" class="incc" />
<br /><br />
<div><?php echo $lang['BOOKFIELD1']; ?>:</div>
<div><input id="firstfield" type="text" name="bname" class="incc" /></div>
<br />
<br />
<div><?php echo $lang['POSTSUM']; ?>:</div>
<div><input id="firstfield" type="text" name="summary" class="incc" /></div>
<br />
<br />
<?php } ?>
<div><?php echo $lang['POSTIMG']; ?>:</div>
<div><input type="file" id="firstfield" name="image" /></div>
<br />
<br />
Publish News:
<br />
<br />
<input type="radio" name="main" id="0" value="0" checked="checked" />&nbsp;Yes
<input type="radio" name="main" id="4" value="4" />&nbsp;No, Just save it
<br />
<br />
<div><?php echo $lang['POSTDES']; ?>:</div>
<?php if(@$description == true) { ?>
<div><textarea name="amess" class="postarea"><?php echo @$description; ?></textarea></div><br /><br />
<?php } else { ?>
<div><textarea name="amess" class="postarea"></textarea></div><br /><br />
<?php } ?>
<div><input class="buton" type="submit" value="<?php echo $lang['LINKSUB']; ?>" name="query" /></div>
</form>
<br />
<br />
<?php } ?>
</div>
<?php $smarty->display('footer.php');
$arecordSet->Close();
$conn->Close();
######################################
##post.php                    4.1.9.##
######################################
 ?>