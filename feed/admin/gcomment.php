<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id=vforms>
<div id="cconfig">Allow Guest Reviews</div>
<?php
if (isset($_POST['submit'])) {
    $cablock = $_POST['cablock'];
$sql3 = 'UPDATE abcoption SET valueopt = '.$conn->qstr($cablock).' WHERE optionid = '.$conn->qstr("33").'';
if($conn->Execute($sql3) === false) {
	print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
}
echo "<div id ='information'>&nbsp;Successfully. ";
?>
<a href="gcomment.php">Back to Allow Guest Reviews</a></div>
<?php
} else {
?>
<form method="post" action="gcomment.php">
Allow guest comments [Default - No]<br />
<?php if ($keypublic == 1) { ?>
<select style="background:#FFF6C1;" id="incc" name="cablock">
<option value='1'>-- Yes</option>
<option style="background:#ffffff;" value='1'>---- Yes</option>
<option style="background:#ffffff;" value='0'>------ No</option>
</select>
<?php } ?>
<?php if ($keypublic == 0) { ?>
<select style="background:#EEFFE3;" id="incc" name="cablock">
<option value='0'>-- No</option>
<option style="background:#ffffff;" value='1'>---- Yes</option>
<option style="background:#ffffff;" value='0'>------ No</option>
</select>
<?php } ?>
<br /><br />
<input type="submit" class="topicbuton" name="submit" value="Submit" /><br /><br />
</form>
<?php
}
?>
</div>
<?php
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.4.2.2.
***************************************/
?>