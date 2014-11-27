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
<div id="cconfig">User Privileges and Roles</div>
<?php
if ($ref == 7) {
$sql = 'DELETE FROM users WHERE usid = '.$conn->qstr($id).'';
if($conn->Execute($sql) === false) {
	print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
}
echo "<div id ='information'>&nbsp;Successfully! ";
}
if ($ref == 4) {
$sql2 = 'UPDATE users SET active="1" WHERE  usid = '.$conn->qstr($id).'';
if($conn->Execute($sql2) === false) {
	print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
}
echo "<div id ='information'>&nbsp;Successfully! ";
}
if ($ref == 1) {
$sql3 = 'UPDATE users SET privilege="1" WHERE  usid = '.$conn->qstr($id).'';
if($conn->Execute($sql3) === false) {
	print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
}
echo "<div id ='information'>&nbsp;Successfully! ";
}
if ($ref == 2) {
$sql4 = 'UPDATE users SET privilege="2" WHERE  usid = '.$conn->qstr($id).'';
if($conn->Execute($sql4) === false) {
	print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
}
echo "<div id ='information'>&nbsp;Successfully! ";
}
if ($ref == 3) {
$sql5 = 'UPDATE users SET privilege="3" WHERE  usid = '.$conn->qstr($id).'';
if($conn->Execute($sql5) === false) {
	print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
}
echo "<div id ='information'>&nbsp;Successfully! ";
}
?>
<a href="user.php">Back to User Privileges and Roles</a></div>
</div>
<?php
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.4.1.4.
***************************************/
?>