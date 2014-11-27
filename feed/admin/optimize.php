<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">Optimize Table</div>
<?php 
if(isset($_POST['submit'])) {
$query = 'OPTIMIZE TABLE  `abcoption` ,  `categori` ,  `cpadmin` ,  `messages` ,  `modules` ,  `newser` ,  `onewse` ,  `publictime` ,  `reviews` ,  `users` ,  `vgalery` ,  `tubereview` ,  `tubevideo`';
            $result =&$conn->Execute($query);
            print_r("<pre>".$result."<pre>");
            echo "<br /><br />All database tables successfully optimized!";
}else{
?>
<form method="post" action="optimize.php">
<input type="submit" class="topicbuton" name="submit" value="Optimize Table" /><br /><br />
</form>
<?php
}
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.4.2.2.
***************************************/
?>