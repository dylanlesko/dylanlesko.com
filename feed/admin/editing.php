<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id=vforms>
<div id="cconfig">Editing/Deleting Posts</div>
Allow users to delete/edit posts.
<?php
if(isset($_POST['submit'])) {
	$incitem = $_POST['incitem'];
	if(get_magic_quotes_gpc()) {
		$incitem = stripslashes($incitem);
	}
	$sql = 'UPDATE abcoption SET valueopt = '.$conn->qstr($incitem).' WHERE optionid = '.$conn->qstr("32").'';
	if($conn->Execute($sql) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
	echo "<div id ='information'>&nbsp;Successfully. "; 
    ?>
<a href="editing.php">Back to Editing/Deleting Posts</a></div>
<?php } else { ?>
<form method="post" action="editing.php">
Editing/Deleting Posts Off/On<br>
<?php if($incitem == 1) { ?>
<select style="background:#EEFFE3;" id="incc" name="incitem">
<option value='1'>-- On</option>
<option style="background:#ffffff;" value='1'>---- On</option>
<option style="background:#ffffff;" value='0'>------ Off</option>
</select>
<?php } ?>
<?php if($incitem == 0) { ?>
<select style="background:#FFF6C1;" id="incc" name="incitem">
<option value='0'>-- Off</option>
<option style="background:#ffffff;" value='1'>---- On</option>
<option style="background:#ffffff;" value='0'>------ Off</option>
</select>
<?php } ?>
<br /><br />
<input type="submit" class="topicbuton" name="submit" value="Submit" /><br /><br />
</form>
</div>
<?php
}
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.4.1.4.
***************************************/
?>