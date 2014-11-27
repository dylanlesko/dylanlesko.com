<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">Announcements</div>
<?php if(isset($_POST['submit'])) {
	$newson = $_POST['newson'];
	$newstext = $_POST['newstext'];
	if(get_magic_quotes_gpc()) {
		$newstext = stripslashes($newstext);
	}
	$sql = 'UPDATE abcoption SET valueopt = '.$conn->qstr($newson).' WHERE optionid = '.$conn->qstr("16").'';
	if($conn->Execute($sql) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
        $sql2 = 'UPDATE abcoption SET valueopt = '.$conn->qstr($newstext).' WHERE optionid = '.$conn->qstr("17").'';
	if($conn->Execute($sql2) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
	echo "<div id ='information'>&nbsp;Successfully. ";
    ?>
<a href="announ.php">Back to Announcements</a></div>
<?php } else { ?>
<form method="post" action="announ.php">
Announcement Off/On<br />
<?php 	if($newson == 1) { ?>
<select style="background:#FFF6C1;" id="incc" name="newson">
<option value='1'>- Announcements Off</option>
<option style="background:#ffffff;" value='1'>---- Announcements Off</option>
<option style="background:#ffffff;" value='2'>------Announcements On</option>
</select>
<?php 	} ?>
<?php 	if($newson == 2) { ?>
<select style="background:#EEFFE3;" id="incc" name="newson">
<option value='2'>-- Announcements On</option>
<option style="background:#ffffff;" value='1'>---- Announcements Off</option>
<option style="background:#ffffff;" value='2'>------ Announcements On</option>
</select>
<?php 	} ?>
<br /><br />Announcement<br />
<textarea id="incc" name="newstext"><?php echo $newstext; ?></textarea><br /><br />
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