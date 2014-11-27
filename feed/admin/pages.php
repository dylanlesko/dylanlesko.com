<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">Pages</div>
<?php if(isset($_POST['submit'])) {
	$ccaboutus = $_POST['aboutus'];
	$ccprivacy = $_POST['privacy'];
	$cctherms = $_POST['therms'];
	if(get_magic_quotes_gpc()) {
		$ccaboutus = stripslashes($ccaboutus);
		$ccprivacy = stripslashes($ccprivacy);
		$cctherms = stripslashes($cctherms);
	}
	$sql = 'UPDATE abcoption SET valueopt = '.$conn->qstr($ccaboutus).' WHERE optionid = '.$conn->qstr("18").'';
	if($conn->Execute($sql) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
$sql2 = 'UPDATE abcoption SET valueopt = '.$conn->qstr($ccprivacy).' WHERE optionid = '.$conn->qstr("19").'';
	if($conn->Execute($sql2) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
$sql3 = 'UPDATE abcoption SET valueopt = '.$conn->qstr($cctherms).' WHERE optionid = '.$conn->qstr("20").'';
	if($conn->Execute($sql3) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
	echo "<div id ='information'>&nbsp;Successfully. "; 
    ?>
<a href="pages.php">Back to Pages.</a></div>
<?php } else { ?>
<form method="post" action="pages.php">
About Us<br /><textarea id="incc" name="aboutus"><?php echo $siteabout; ?></textarea><br /><br />
<br /><br />
Privacy<br /><textarea id="incc" name="privacy"><?php echo $siteprivacy; ?></textarea><br /><br />
<br /><br />
Terms of Use<br /><textarea id="incc" name="therms"><?php echo $siteterms; ?></textarea><br /><br />
<br /><br />
<input type="submit" class="topicbuton" name="submit" value="Submit" /><br /><br />
</form>
<?php } ?>
</div>
<?php
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.4.1.4.
***************************************/
?>