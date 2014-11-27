<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">Delete Message</div>
<?php
$id = $_GET['id'];
$sql = 'DELETE FROM messages WHERE messid = '.$conn->qstr($id).'';
if($conn->Execute($sql) === false) {
	print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
}
echo "<div id ='information'>&nbsp;Successfully! ";
?>
<a href="messages.php">Back to Messages</a></div>
</div>       
<?php
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.4.1.4.
***************************************/
?>