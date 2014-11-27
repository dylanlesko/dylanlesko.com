<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">Newsletter</div>
<script type="text/javascript" src="<?php echo $sitepath; ?>/scripts/tiny_mce/tiny_mce.js" ></script >
<script type="text/javascript">
tinyMCE.init({
        // General options
        mode : "textareas",
        height : '300',
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
<?php
if(isset($_POST['submit'])) {
	$btextyx = $_POST['btextyx'];
	$bamessy = $_POST['bamessy'];
	if(get_magic_quotes_gpc()) {
		$btextyx = stripslashes($btextyx);
		$bamessy = stripslashes($bamessy);
	}
	if(strlen($btextyx) < 3) {
		echo "Field must be at least 3 characters long:
<a href='javascript:history.go(-1)'>Go Back</a></div></div></div>";
		include ('footer.php');
		die();
	}
	if(strlen($bamessy) < 3) {
		echo "Field must be at least 3 characters long:
<a href='javascript:history.go(-1)'>Go Back</a></div></div></div>";
		include ('footer.php');
		die();
	}
$brecordSet = &$conn->Execute("SELECT * FROM users ORDER by usid desc");
if(!$brecordSet)
	print $conn->ErrorMsg();
else	
while(!$brecordSet->EOF) {
?>
Username: <?php echo $brecordSet->fields['username'] ?> - 
Email: <?php echo $brecordSet->fields['email'] ?><br />
<?php $headers = 'MIME-Version: 1.0'."\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
		$headers .= "From: $sitemail"."\r\n";
		$juser = $brecordSet->fields['email'];
		mail($juser,$btextyx,$bamessy,$headers);
$brecordSet->MoveNext();
	}
	echo "<div id ='information'>&nbsp;Successfully. ";
?>
<a href="newsletter.php">Back to Manage Newsletter</a></div>
<?php } else {
	?>
<br />
<form method="post" action="newsletter.php" method="post">
Subject:<br /> <input id="incc" name="btextyx" maxlength="255" />
<br /><br />
Description:<br /><textarea style="width:460px;height:333px;" name="bamessy"></textarea>
<br /><br />
<input type="submit" class="topicbuton" name="submit" value="Send" />
</form>
</div></div></div>
<?php
}
include ('footer.php');
/**************************************
* Revision: v.4.1.4.
***************************************/
?>