<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">New SubCategory</div>
       <?php
if (isset($_POST['submit'])) {
    $title = $_POST['names'];
    if (strlen($title) < 1) {
    echo "<center>Field must be at least 1 characters long: <a href='javascript:history.go(-1)'>Go Back</a></center>";
        die();
    }
    $parent = $_POST['parents'];
    if (get_magic_quotes_gpc()) {
        $title = stripslashes($title);
    }
$zero = '1';
$sql = 'INSERT INTO categori (name, parent, cord)';
$sql .= 'VALUES ('.$conn->qstr($title).','.$conn->qstr($parent).','.$conn->qstr($zero).')';
	if($conn->Execute($sql) === false) {
		print '<br /><div id="error">error inserting[2]: '.$conn->ErrorMsg().'</div><br />';
	}    
   echo "<div id ='information'>Successfully. ";
    echo "New SubCategory " . $title . " ";
?>
<a href="addcsub.php">Back to New SubCategories</a></div>
<?php
} else {
    $id = $_GET['id'];

$brecordSet = &$conn->Execute('SELECT * FROM categori WHERE catid = '.$conn->qstr($id).'');
	if(!$brecordSet)
		print $conn->ErrorMsg();
	else
		while(!$brecordSet->EOF) {
?>
<form method="post" action="addcsuby.php">
Category Name:<br/><input name="names" id="incc" size="85" /><br />
<input type="hidden" name="parents" value="<?php echo $brecordSet->fields['catid']; ?>">
<br />
<input type="submit" class="topicbuton" name="submit" value=" Submit" /> 
</form>
<?php
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