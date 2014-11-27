<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">Banners</div>
HTML or Adsense
<?php
if(isset($_POST['submit'])) {
	$adsoffon = $_POST['adsoffon'];
	$senseup = $_POST['senseup'];
	$sensedown = $_POST['sensedown'];
	if(get_magic_quotes_gpc()) {
		$adsoffon = stripslashes($adsoffon);
		$senseup = stripslashes($senseup);
		$sensedown = stripslashes($sensedown);
	}
	$sql = 'UPDATE abcoption SET valueopt = '.$conn->qstr($adsoffon).' WHERE optionid = '.$conn->qstr("28").'';
	if($conn->Execute($sql) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
        $sql2 = 'UPDATE abcoption SET valueopt = '.$conn->qstr($senseup).' WHERE optionid = '.$conn->qstr("29").'';
	if($conn->Execute($sql2) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
        $sql3 = 'UPDATE abcoption SET valueopt = '.$conn->qstr($sensedown).' WHERE optionid = '.$conn->qstr("30").'';
	if($conn->Execute($sql3) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
	echo "<div id ='information'>&nbsp;Successfully. ";
    ?>
<a href="ads.php">Back to Google Adsense</a></div>
<?php } else { ?>
<form method="post" action="ads.php">
Google Adsense Off/On<br />
<?php 	if($adsoffon == 1) { ?>
<select style="background:#FFF6C1;" id="incc" name="adsoffon">
<option value='1'>- Adsense Off</option>
<option style="background:#ffffff;" value='1'>---- Off</option>
<option style="background:#ffffff;" value='2'>------On</option>
</select>
<?php 	} ?>
<?php 	if($adsoffon == 2) { ?>
<select style="background:#EEFFE3;" id="incc" name="adsoffon">
<option value='2'>-- Adsense On</option>
<option style="background:#ffffff;" value='1'>---- Off</option>
<option style="background:#ffffff;" value='2'>------ On</option>
</select>
<?php 	} ?>
<br /><br />
Adsense I [300 x 250]<br /><textarea id="incc" name="senseup"><?php echo @$senseup; ?></textarea><br /><br />
<br /><br />
Adsense II [728 x 90]<br /><textarea id="incc" name="sensedown"><?php echo @$sensedown; ?></textarea><br /><br />
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