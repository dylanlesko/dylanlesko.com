<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">Custom Header</div>
<?php
if (isset($_POST['submit'])) {
    $custom = $_POST['custom'];
    if(get_magic_quotes_gpc()) {
    $custom = stripslashes($custom);
             }
    if (strlen($custom) < 1) {
        echo "Field must be at least 1 characters long: <a href='javascript:history.go(-1)'>Go Back</a>";
        die();
    }
$custom = htmlspecialchars($custom);
$custom = $conn->addq($custom);
$sql = 'UPDATE abcoption SET valueopt = '.$conn->qstr($custom).' WHERE optionid = '.$conn->qstr("13").'';
	if($conn->Execute($sql) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
	echo "<div id ='information'>&nbsp;Successfully. "; 
?>
<a href="cheader.php">Back to Custom Header</a></div>
<?php
} else {
?>
<form method="post" action="cheader.php">
0 for Disabled<br />
Code:<br /><textarea name="custom" id="incc" /><?php echo stripslashes($customheader); ?></textarea><br /><br />
<input type="Submit" class="topicbuton" name="submit" value=" Submit" />
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