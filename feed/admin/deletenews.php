<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">Delete News</div>
<?php
$id = $_GET['id'];
$comy = $_GET['comy'];
$idblog = $_GET['idblog'];
$sql = 'DELETE FROM newser WHERE blogid = '.$conn->qstr($id).'';
if($conn->Execute($sql) === false) {
	print '<br /><div id="error">error [1]: '.$conn->ErrorMsg().'';
}
$sql2 = 'DELETE FROM onewse WHERE oniver = '.$conn->qstr($comy).'';
if($conn->Execute($sql2) === false) {
	print '<br /><div id="error">error [2]: '.$conn->ErrorMsg().'';
}
$sql3 = 'DELETE FROM reviews WHERE comrev = '.$conn->qstr($comy).'';
if($conn->Execute($sql3) === false) {
	print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
}
$sql4 = 'UPDATE categori SET ccount = ccount - '.$conn->qstr(1).' WHERE catid = '.$conn->qstr($idblog).'';
        if($conn->Execute($sql4) === false) {
		print '<br /><div id="error">error inserting[4]: '.$conn->ErrorMsg().'';
        }
echo "<div id ='information'>&nbsp;Successfully! ";
?>
<a href="menage.php">Back to Manage News</a></div>  
</div>
<?php
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.4.1.4.
***************************************/
?>