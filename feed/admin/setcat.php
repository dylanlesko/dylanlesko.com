<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
$id = $_GET['id']; ?>
<script>
function goto(site) {
var msg = confirm("Deleting a category will also delete ALL subcategories below the category. This action cannot be undone!")
if (msg) {window.location.href = site}
else (null)
}
</script>
<div id="vforms">
<div id="cconfig">Categories</div>
<?php
$id = $_GET['id'];
if(isset($_POST['submit'])) {
	$caty = $_POST['caty'];
        $custom = $_POST['custom'];
    if(get_magic_quotes_gpc()) {
    $caty = stripslashes($caty);
    $custom = stripslashes($custom);
             }
    if (strlen($custom) < 1) {
        echo "Field must be at least 1 characters long: <a href='javascript:history.go(-1)'>Go Back</a>";
        die();
    }
$custom = htmlspecialchars($custom);
$custom = $conn->addq($custom);
	$sql = 'UPDATE categori SET name= '.$conn->qstr($caty).', cuscat= '.$conn->qstr($custom).' WHERE catid = '.$conn->qstr($id).'';
	if($conn->Execute($sql) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
	echo "<div id ='information'>&nbsp;Successfully. ";
    ?>
<a href="editcat.php">Back to Manage Categories</a></div>
<?php
} else {
	$brecordSet = &$conn->Execute('SELECT * FROM categori WHERE catid = '.$conn->qstr($id).'');
	if(!$brecordSet)
		print $conn->ErrorMsg();
	else
		while(!$brecordSet->EOF) {
?>
<form method="post" action="setcat.php?id=<?php echo $id ?>">
<font color="#3A586A">Category Name</font><br />
<input name="caty" value="<?php echo $brecordSet->fields['name']; ?>" id="incc" /><br /><br />
Custom Code: [Optional] - 0 for disabled<br /><textarea name="custom" id="incc" /><?php echo $brecordSet->fields['cuscat']; ?></textarea><br /><br />
<br /><br />
<input type="submit" class="topicbuton" name="submit" value="Submit" />
</form><br />
<?php
echo "<div id='delete'><a href=\"javascript:goto('deletecat.php?id=".$id."')\">Delete</a></div>";
$brecordSet->MoveNext();
		}
}
?>
</div>
<?php
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.4.1.4.
***************************************/
?>