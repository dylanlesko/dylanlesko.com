<?php
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
include('admin/admheader.php');
?>
<div id="aforms">
<div id="cconfig">Edit News</div>
<?php
$id = $_GET['id'];
if(isset($_POST['submit'])) {
        $currentmain = $_POST['currentmain'];
        $main = $_POST['main'];
	$univer = $_POST['univer'];
        $curcat = $_POST['curcat'];
	$btextyx = $_POST['btextyx'];
	$briefyx = $_POST['briefyx'];
	$bamessy = $_POST['bamessy'];
	$gruppe = $_POST['gruppe'];
	@$coption = $_POST['coption'];
	if(get_magic_quotes_gpc()) {
                $currentmain = stripslashes($currentmain);
                $main = stripslashes($main);
		$univer = stripslashes($univer);
                $curcat = stripslashes($curcat);
		$btextyx = stripslashes($btextyx);
		$briefyx = stripslashes($briefyx);
		$bamessy = stripslashes($bamessy);
		$gruppe = stripslashes($gruppe);
		$coption = stripslashes($coption);
	}
        $bamessy = htmlspecialchars($bamessy);
	$current_image = $_FILES['image']['name'];
	$extension = substr(strrchr($current_image,'.'),1);
	$time = date("Yhis");
	$blacklist = array(".msi",".exe",".php",".phtml",".php3",".php4",".js",".shtml",".pl",".py",".tpl",".zip",
		".gzip",".rar",".tar"," ");
	foreach($blacklist as $file) {
		if(preg_match("/$file\$/i",$_FILES['image']['name'])) {
                        echo "ERROR: Uploading executable files Not Allowed\n";
                        include('admin/admfooter.php');
			die();
		}
	}
	if($_FILES['image']['name'] == "") {
		$new_image = "";
	} else {
		if(($extension !== "jpg" && $extension !== "jpeg")) {
			echo "Wrong File";
			include('admin/admfooter.php');
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
        $helper = preg_replace('/([?,\/,|,",\',:,%,*,(,),[,\,\],\,])/', "-", $btextyx);
        $helper = urlencode($helper);
	if($coption == 1) {
                $sql = $conn->Prepare('UPDATE newser SET main = ?, idblog = ?, btexty = ?, bhelper = ?, brief = ?, images = ?, bamess = ? WHERE  `blogid` = ?');
                if($conn->Execute($sql,array($main,$gruppe,$btextyx,$helper,$briefyx,$new_image,$bamessy,$id)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
	}
                $bamessy = htmlspecialchars_decode($bamessy);
                $bamessy = strip_tags($bamessy);
                $sql2 = $conn->Prepare('UPDATE onewse SET  omain = ?, otexty = ?, ohelper = ?, omages = ?, oamess = ? WHERE  `oniver` = ?');
                if($conn->Execute($sql2,array($main,$btextyx,$helper,$new_image,$bamessy,$univer)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
	}

	} else {
                $sql3 = $conn->Prepare('UPDATE newser SET main = ?, idblog = ?, btexty = ?, bhelper = ?, brief = ?, bamess = ? WHERE  `blogid` = ?');
                if($conn->Execute($sql3,array($main,$gruppe,$btextyx,$helper,$briefyx,$bamessy,$id)) === false) {
	        print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
	}
                $bamessy = htmlspecialchars_decode($bamessy);
                $bamessy = strip_tags($bamessy);
                $sql4 = $conn->Prepare('UPDATE onewse SET omain = ?, otexty = ?, ohelper = ?, oamess = ? WHERE  `oniver` = ?');
                if($conn->Execute($sql4,array($main,$btextyx,$helper,$bamessy,$univer)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
	}
        }
        if($currentmain == '4' && $main == '0'){
        $sql5 = $conn->Prepare('UPDATE categori SET ccount = ccount + ? WHERE `catid` = ?');
                if($conn->Execute($sql5,array("1",$gruppe)) === false) {
		print '<br /><div id="error">error inserting[5]: '.$conn->ErrorMsg().'</div><br />';
	}
        }
        if($currentmain == '4' && $main == '2'){
        $sql5 = $conn->Prepare('UPDATE categori SET ccount = ccount + ? WHERE `catid` = ?');
                if($conn->Execute($sql5,array("1",$gruppe)) === false) {
		print '<br /><div id="error">error inserting[5]: '.$conn->ErrorMsg().'</div><br />';
	}
        }
      
        if($currentmain == '2' && $main == '4'){
        $sql5 = $conn->Prepare('UPDATE categori SET ccount = ccount - ? WHERE `catid` = ?');
                if($conn->Execute($sql5,array("1",$gruppe)) === false) {
		print '<br /><div id="error">error inserting[5]: '.$conn->ErrorMsg().'</div><br />';
	}
        }
        if($currentmain == '0' && $main == '4'){
        $sql5 = $conn->Prepare('UPDATE categori SET ccount = ccount - ? WHERE `catid` = ?');
                if($conn->Execute($sql5,array("1",$gruppe)) === false) {
		print '<br /><div id="error">error inserting[5]: '.$conn->ErrorMsg().'</div><br />';
	}
        }
        $conn->Close();
	echo "Successfully!<br />";
    ?>
- <a href="admin/menage.php">Manage News</a><br />
- <a href="news.php?name=<?php echo $univer ?>"><?php echo stripslashes($btextyx) ?> [View]</a>
<?php } else {
	$id = $_GET['id'];
	$arecordSet = &$conn->Execute('SELECT * FROM newser WHERE blogid = ? LIMIT 1', array($id));
	if(!$arecordSet)
		print $conn->ErrorMsg();
	else
		while(!$arecordSet->EOF) {
                        $main = $arecordSet->fields['main'];
			$univer = $arecordSet->fields['univer'];
			$idblog = $arecordSet->fields['idblog'];
			$images = $arecordSet->fields['images'];
			if($arecordSet->fields['editor'] == 1) { ?>
<script type="text/javascript" src="scripts/tiny_mce/tiny_mce.js" ></script >
<script type="text/javascript">
tinyMCE.init({
// General options
mode : "textareas",
height : '400',
theme : "advanced",
plugins : "autolink,style,advimage,advlink,insertdatetime,preview,media,contextmenu,paste,directionality,fullscreen,visualchars,xhtmlxtras,template",
// Theme options
theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
theme_advanced_buttons3 : "styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,|,insertfile,insertimage,|,removeformat,visualaid,|,sub,sup,|,charmap,media,|,ltr,rtl,|,fullscreen",
theme_advanced_toolbar_location : "top",
theme_advanced_toolbar_align : "left",
theme_advanced_statusbar_location : "bottom",
theme_advanced_resizing : true,
// Skin options
skin : "o2k7",
skin_variant : "silver",
// Example content CSS (should be your site CSS)
content_css : "css/example.css",
// Drop lists for link/image/media/template dialogs
template_external_list_url : "js/template_list.js",
external_link_list_url : "js/link_list.js",
external_image_list_url : "js/image_list.js",
media_external_list_url : "js/media_list.js",
// Replace values for the template plugin
template_replace_values : {
username : "Some User",
staffid : "991234"
}
});
</script>
<?php } ?>
<script>
function goto(site) {
var msg = confirm("Are you sure you want to delete this entry? This action cannot be undone!")
if (msg) {window.location.href = site}
else (null)
}
</script>
<div style="width:615px;;height:52px">
<div style="float:left">
<h3>Edit Story [Admin Mode]</h3>
</div>
<div style="float:right">
&#187;&nbsp;<a href="javascript:goto('admin/deletenews.php?id=<?php echo $id ?>&comy=<?php echo $univer ?>')">Delete</a>
</div>
</div>
<form method="post" action="editnews.php?id=<?php echo $arecordSet->fields['blogid'] ?>" enctype="multipart/form-data" method="post">
<input name="currentmain" value = "<?php echo $arecordSet->fields['main']; ?>" type="hidden" />
<input name="univer" value = "<?php echo $arecordSet->fields['univer']; ?>" type="hidden" />
<input name="curcat" value = "<?php echo $arecordSet->fields['idblog']; ?>" type="hidden" />
<?php
$firstfield = $arecordSet->fields['btexty'];
$firstfield = htmlspecialchars($firstfield);
?>
Title:<br /> <input id="incc" name="btextyx" value = "<?php echo $firstfield ?>" />
<br /><br />
<?php
$secondfield = $arecordSet->fields['brief'];
?>
Summary:<br /> <input id="incc" name="briefyx" value = "<?php echo $secondfield ?>" />
<br /><br />
Description:<br /><textarea style="width:444px;background:#ffffff;" name="bamessy"><?php echo stripslashes($arecordSet->fields['bamess']); ?></textarea>
<br /><br />
Publish News:
<br />
<br />
<?php
if($main == 0){
?>
<input type="radio" name="main" id="0" value="0" checked="checked" />Yes
<input type="radio" name="main" id="4" value="4" />No, Just save it
<input type="radio" name="main" id="2" value="2" />Featured
<?php
}
if($main == 2){
?>
<input type="radio" name="main" id="0" value="0" />Yes
<input type="radio" name="main" id="4" value="4" />No, Just save it
<input type="radio" name="main" id="2" value="2" checked="checked" />Featured
<?php
}
if($main == 4){
?>
<input type="radio" name="main" id="0" value="0" />Yes
<input type="radio" name="main" id="4" value="4"  checked="checked" />No, Just save it
<input type="radio" name="main" id="2" value="2" />Featured
<?php
}
?>
<br />
<br />
Category:<br />
<?php 		
                        $result = "SELECT * FROM categori ORDER by parent, catid ASC";
			$brecordSet = &$conn->Execute($result);
			echo "<select name='gruppe' class='incc'>";
			
			if(!$brecordSet)
				print $conn->ErrorMsg();
			else
				while(!$brecordSet->EOF) {
                                if($brecordSet->fields['catid'] == $idblog) {
				echo "<option value=\"".$brecordSet->fields['catid']."\" selected> - - ".$brecordSet->fields['name']." </option>";
					} else {
				if($brecordSet->fields['cord'] == 0){
			        echo "<option style='background:#f8f8f8;' value='".$brecordSet->fields[catid]."'> ".$brecordSet->fields[name]." </option>";
                                }else{
                                echo "<option value='".$brecordSet->fields[catid]."'> - - ".$brecordSet->fields[name]." </option>";
                                }
				}
                                $brecordSet->MoveNext();
				}
			echo '</select>';
 ?>
<br /><br />
<?php if($images == true) { ?>
<img style="padding:2px;border:1px solid #ccc;" width="144" height="82" src="<?php echo 'minthumb/'.$images; ?>">
<br />
<?php } ?>
<br />Upload New Image<br />
<input style="float:left;width:28px;" type="checkbox" name="coption" value="1">
<br /><br />
New Image:(only .jpg .jpeg formats);
<br /><br />
<input type="file" name="image" />
<br /><br />
<input type="submit" class="butons" name="submit" value="Edit News" />
</form>
<?php
$arecordSet->MoveNext();
		}
$arecordSet->Close();
$brecordSet->Close();
$conn->Close();
}
?>
</div>
<?php
include ('admin/admfooter.php');
######################################
##editnews.php                4.1.4.##
######################################
?>