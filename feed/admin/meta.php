<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">Meta Description & Keywords</div>
<?php
if(isset($_POST['submit'])) {
	$ccmdesc = $_POST['ccmdesc'];
	$cckwords = $_POST['cckwords'];
	if(get_magic_quotes_gpc()) {
		$ccmdesc = stripslashes($ccmdesc);
		$cckwords = stripslashes($cckwords);
	}
$sql = 'UPDATE abcoption SET valueopt = '.$conn->qstr($ccmdesc).' WHERE optionid = '.$conn->qstr("2").'';
	if($conn->Execute($sql) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
$sql2 = 'UPDATE abcoption SET valueopt = '.$conn->qstr($cckwords).' WHERE optionid = '.$conn->qstr("3").'';
	if($conn->Execute($sql2) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
	echo "<div id ='information'>&nbsp;Successfully. ";
    ?>
	<a href = "meta.php" > Back to Meta Description & Keywords</a></div> 
    <?php } else { ?>
<form method="post" action="meta.php">
Meta Description<br />
<textarea id="incc" name="ccmdesc"><?php echo $metadesc; ?></textarea><br /><br />
Meta Keywords<br />
<textarea id="incc" name="cckwords"><?php echo $keywords; ?></textarea><br /><br />
<input type="submit" class="topicbuton" name="submit" value="Submit" /><br /><br />
</form>
</div>
<?php } ?>
</div></div></div>
<?php
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.4.1.4.
***************************************/
?>