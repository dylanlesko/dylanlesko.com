<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
$id = (int)$_GET['id'];
$ref = (int)$_GET['ref'];
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">Modules</div>
<?php
if ($ref == 0) {
$sql = 'UPDATE abcoption SET active="0" WHERE  optionid = '.$conn->qstr($id).'';
if($conn->Execute($sql) === false) {
	print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
}
$sqla = 'UPDATE modules SET mactive="0" WHERE  idmod = '.$conn->qstr($id).'';
if($conn->Execute($sqla) === false) {
	print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
}
echo "<div id ='information'>&nbsp;Successfully! ";
}
if ($ref == 1) {
$sql2 = 'UPDATE abcoption SET active="1" WHERE  optionid = '.$conn->qstr($id).'';
if($conn->Execute($sql2) === false) {
	print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
}
$sql2a = 'UPDATE modules SET mactive="1" WHERE  idmod = '.$conn->qstr($id).'';
if($conn->Execute($sql2a) === false) {
	print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
}
echo "<div id ='information'>&nbsp;Successfully! ";
}
if ($ref == 2) {
$sql3 = 'UPDATE abcoption SET active="2" WHERE  optionid = '.$conn->qstr($id).'';
if($conn->Execute($sql3) === false) {
	print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
}
$sql3a = 'UPDATE modules SET mactive="1" WHERE  idmod = '.$conn->qstr($id).'';
if($conn->Execute($sql3a) === false) {
	print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
}
echo "<div id ='information'>&nbsp;Successfully! ";
}






?>
<a href="modules.php">Back to Modules</a></div>
</div>
<?php
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.4.1.4.
***************************************/
?>