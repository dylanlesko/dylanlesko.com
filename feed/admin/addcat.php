<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">New Category</div>
<?php
if (isset($_POST['submit'])) {
    $parent = $_POST['parent'];
    $name = $_POST['name'];
    if (strlen($name) < 2) {
        echo "Field must be at least 2 characters long: <a href='javascript:history.go(-1)'>Go Back</a>";
        die();
    }
$zero = '0';
$sql = 'INSERT INTO categori (parent, cord, name, cuscat)';
$sql .= 'VALUES ('.$conn->qstr($parent).','.$conn->qstr($zero).','.$conn->qstr($name).','.$conn->qstr($zero).')';
	if($conn->Execute($sql) === false) {
		print '<br /><div id="error">error inserting[2]: '.$conn->ErrorMsg().'</div><br />';
	}
    echo "<div id ='information'>Successfully. ";
    echo "New Category " . $name . " ";
?>
<a href="addcat.php">Back to New Category</a></div>
<?php
} else {
$brecordSet = &$conn->Execute('SELECT MAX(catid) FROM `categori`');
$rs = $brecordSet->fetchRow() ;
$lastitem = $rs['MAX(catid)'] + 1;
?>
<form method="post" action="addcat.php">
Category Name:<br /><input name="name" id="incc" size="25" /><br /><br />
<input type="hidden" name="parent" value="<?php echo $lastitem ?>" /><br />
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