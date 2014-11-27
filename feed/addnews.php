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
include ('admin/admheader.php');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<head>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="admin/style.css" />
</head>
<body>
<div id="aforms">
<div id="cconfig">New Story</div>
<?php if(isset($_POST['query'])) {
	$cuniver = $_POST['bname'];
	$current_image = $_FILES['image']['name'];
	$extension = substr(strrchr($current_image,'.'),1);
	$time = date("Yhis");
	if(get_magic_quotes_gpc()) {
                $main = stripslashes(htmlspecialchars($_POST['main']));
		$univer = stripslashes(htmlspecialchars($_POST['univer']));
		$idblog = stripslashes(htmlspecialchars($_POST['idblog']));
		$editor = stripslashes(htmlspecialchars($_POST['editor']));
		$bname = stripslashes(htmlspecialchars($_POST['bname']));
		$usercc = stripslashes(htmlspecialchars($_POST['usercc']));
		$summary = stripslashes(htmlspecialchars($_POST['summary']));
		$badress = stripslashes(htmlspecialchars($_POST['badress']));
		$amess = stripslashes(htmlspecialchars($_POST['amess']));
	} else {
                $main = htmlspecialchars($_POST['main']);
		$univer = htmlspecialchars($_POST['univer']);
		$idblog = htmlspecialchars($_POST['idblog']);
		$editor = htmlspecialchars($_POST['editor']);
		$bname = htmlspecialchars($_POST['bname']);
		$usercc = htmlspecialchars($_POST['usercc']);
		$summary = htmlspecialchars($_POST['summary']);
		$badress = htmlspecialchars($_POST['badress']);
		$amess = htmlspecialchars($_POST['amess']);
	}
	if(preg_match("/</",$summary)) {
		echo "<center><div id='toprow'>Invalid Characters [Summary] '<' </div>";
		Die();
	}
	if(preg_match("/]/",$summary)) {
		echo "<center><div id='toprow'>Invalid Characters [Summary] '[' </div>";
		Die();
	}
	if(strlen($bname) < 3) {
		echo "<center>Field must be at least 3 characters long:<a href='javascript:history.go(-1)'>Go Back</a></center>";
		die();
	}
	if(strlen($bname) > 150) {
		echo "<center>Max Characters Field: 150<a href='javascript:history.go(-1)'>Go Back</a></center>";
		die();
	}
	if(strlen($summary) > 400) {
		echo "<center>Field [summary] must be at least 400 characters long:<a href='javascript:history.go(-1)'>Go Back</a></center>";
		die();
	}
	if(strlen($amess) < 10) {
		echo "<center>Field description must be at least 10 characters long:<a href='javascript:history.go(-1)'>Go Back</a></center>";
		die();
	}
	if(strlen($amess) > 25800) {
		echo "<center>Max Characters Field Description.<a href='javascript:history.go(-1)'>Go Back</a></center>";
		die();
	}
	$extension = substr(strrchr($current_image,'.'),1);
	$current_image = $_FILES['image']['name'];
	if($_FILES['image']['name'] == "") {
		$new_image = "";
	} else {
		if(($extension !== "jpg" && $extension !== "jpeg")) {
			die('Please Upload Valid .jpg or .jpeg File');
		}
		$blacklist = array(".msi",".exe",".php",".phtml",".php3",".php4",".js",".shtml",
			".pl",".py",".tpl");
		foreach($blacklist as $file) {
			if(preg_match("/$file\$/i",$_FILES['image']['name'])) {
				echo "ERROR: Uploading executable files Not Allowed\n";
				exit;
			}
		}
		$time = date("Yhis");
		$new_image = $time.".".$extension;
		$destination = "uploads/".$new_image;
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
			if($width_orig > 1480 || $height_orig > 1480) {
				echo "<br>Maximum width and height exceeded. Please upload images below  1480 x 1480 px size";
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
			$ratio_orig = $width_orig/$height_orig;
            if ($thumbnail_width/$thumbnail_height > $ratio_orig) {
            $new_height = $thumbnail_width/$ratio_orig;
            $new_width = $thumbnail_width;
            } else {
            $new_width = $thumbnail_height*$ratio_orig;
            $new_height = $thumbnail_height;
            }
            $x_mid = $new_width/2;  //horizontal middle
            $y_mid = $new_height/2; //vertical middle
            $process = imagecreatetruecolor(round($new_width), round($new_height)); 
            imagecopyresampled($process, $cimage, 0, 0, 0, 0, $new_width, $new_height, $width_orig, $height_orig);
            $thumb = imagecreatetruecolor($thumbnail_width, $thumbnail_height);
            imagecopyresampled($thumb, $process, 0, 0, ($x_mid-($thumbnail_width/2)), ($y_mid-($thumbnail_height/2)), $thumbnail_width, $thumbnail_height, $thumbnail_width, $thumbnail_height);
            imagejpeg($thumb,$filename,80);
	         return $thumb;
		}
		ccthumb($destination,'maxthumb/'.$new_image,300,250);
		ccthumb($destination,'minthumb/'.$new_image,144,82);
	}
	$zero = '0';
	$admin_image = 'admin.jpg';
        $time = date("Y-m-d H:i:s");
        $helper = preg_replace('/([?,\/,|,",\',:,%,*,(,),[,\,\],\,])/', "-", $bname);
        $helper = urlencode($helper);
        $sql = $conn->Prepare('INSERT INTO newser (main,univer,idblog,editor,buserid,buser,btexty,bhelper,brief,badress,images,bimgs,bdate,bamess) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        if($conn->Execute($sql,array($main,$univer,$idblog,$editor,$zero,$usercc,$bname,$helper,$summary,$badress,$new_image,$admin_image,$time,$amess)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
	}
        $amess = htmlspecialchars_decode($amess);
        $amess = strip_tags($amess);
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
        if($main == '2'){
        $sql3 = $conn->Prepare('UPDATE categori SET ccount = ccount +  ? WHERE catid = ?');
        if($conn->Execute($sql3,array("1",$idblog)) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
        }
        }
	$conn->Close();
    ?>
<head>
<script type="text/javascript">
<!--
function delayer(){
window.location = "addnews.php"
}
//-->
</script>
<link type="text/css" href="admin/style.css" rel="stylesheet" />
</head>
<body onLoad="setTimeout('delayer()', 10000)">
<div class="redir">
<center><font style="font-family:verdana;font-size:13px;color:#555;">You will be automatically redirected to the "Submit New Story" in 10 seconds<br /><br />
<a href="news.php?name=<?php echo $univer ?>">View "<?php echo stripslashes($bname); ?>"</font></center>
</div>
<?php } else {
	$univer = date("Yhis"); ?>
<h3>New Story [Admin Mode]</h3>
<form action="addnews.php" enctype="multipart/form-data" method="post">
Category:<br />
<input type="hidden" name="univer" value="<?php echo $univer; ?>" />
<?php $arecordSet = &$conn->Execute('SELECT * FROM categori ORDER by parent, catid ASC');
	echo "<select name='idblog' onChange='Load_id()'>";
	if(!$arecordSet)
		print $conn->ErrorMsg();
	else
		while(!$arecordSet->EOF) {
			$catid = $arecordSet->fields['catid'];
			$name = $arecordSet->fields['name'];
                        if($arecordSet->fields['cord'] == 0){
			echo "<option style='background:#f8f8f8;' value='".$catid."'> ".$name." </option>";
                        }else{
                         echo "<option value='".$catid."'> - - ".$name." </option>";
                        }
			$arecordSet->MoveNext();
		}
	echo '</select>';
	$brecordSet = &$conn->Execute('SELECT * FROM cpadmin LIMIT 1');
	if(!$brecordSet)
		print $conn->ErrorMsg();
	else
		while(!$brecordSet->EOF) {
			$ausername = $brecordSet->fields['ausername'];
			echo " <input type='hidden' name='usercc' value='".$ausername."'>";
			$brecordSet->MoveNext();
		}
	if($editortrue == 2) {
		echo " <input type='hidden' name='editor' value='2'>";
	}
	if($editortrue == 1) { ?>
<script type="text/javascript" src="scripts/tiny_mce/tiny_mce.js" ></script >
<script type="text/javascript">
tinyMCE.init({
        mode : "textareas",
        height : '400',
        theme : "advanced",
        plugins : "autolink,style,advimage,advlink,insertdatetime,preview,media,contextmenu,paste,directionality,fullscreen,visualchars,xhtmlxtras,template",
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
        content_css : "css/example.css",
        template_external_list_url : "js/template_list.js",
        external_link_list_url : "js/link_list.js",
        external_image_list_url : "js/image_list.js",
        media_external_list_url : "js/media_list.js",
        template_replace_values : {
                username : "Some User",
                staffid : "991234"
        }
});
</script>
<?php echo " <input type='hidden' name='editor' value='1'>"; } ?>
<input type="hidden" name="badress" value="0" class="incc" />
<br /><br />
Title:
<br />
<input type="text" name="bname" id="incc" />
<br />
<br />
Summary (optional; max 250 characters):
<br />
<input type="text" name="summary" id="incc" />
<br />
<br />
Image:(only .jpg .jpeg formats);
<br />
<input type="file" name="image" />
<br />
<br />
Description:
<br />
<br />
Publish News:
<br />
<br />
<input type="radio" name="main" id="0" value="0" checked="checked" />Yes
<input type="radio" name="main" id="4" value="4" />No, Just save it
<input type="radio" name="main" id="2" value="2" />Featured
<br />
<br />
<textarea name="amess" style="width:550px;height:250px;"></textarea><br />
<input class="incc" type="submit" value="Submit" name="query" style="color:#555;border:1px solid #ccc;background:#f8f8f8" />
</form>
<?php
$arecordSet->Close();
$brecordSet->Close();
$conn->Close();
}
?>
</div>
<?php
include ('admin/admfooter.php');
######################################
##addnews.php                 4.1.4.##
######################################
?>