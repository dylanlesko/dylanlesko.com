<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
include ('../classes/class.GenericEasyPagination.php');
?>
<script>
function goto(site) {
var msg = confirm("Are you sure you want to delete this user? This action cannot be undone!")
if (msg) {window.location.href = site}
else (null)
}
function gotos(sites) {
var msg = confirm("Are you sure?")
if (msg) {window.location.href = sites}
else (null)
}
</script>
<div id="vforms">
<div id="cconfig">User Privileges and Roles</div>
<strong>User Roles</strong><br />
1. <font color="#555555">Commenter. Can only post comments</font><br />
2. <font color="#556E89">Editor. Can add news and post comments</font><br />
3. <font color="#558958">Journalist. Can add news, images, blogs and post comments</font>
<br />
<?php
if(isset($_POST['submit'])) {
	$document = $_POST['document'];
    ?>
<br />Username<br />
<form name="myforma" action="usersearch.php" method="post">
<input type="text" id="incc" value="<?php echo @$document ?>" name="document" /><br /><br />
<input type="submit" class="topicbuton" name="submit" value="Search" />
</form>
<br />
<?php
if(@$_GET["page"] != ""):
	$page = @$_GET["page"];
else:
	$page = 1;
endif;
	define('RECORDS_BY_PAGE',6);
	define('CURRENT_PAGE',$page);
	$strSQL = "SELECT * FROM users where username like '%$document%' ORDER BY username";
	$conn->SetFetchMode(ADODB_FETCH_ASSOC);
	$rs = $conn->PageExecute($strSQL,RECORDS_BY_PAGE,CURRENT_PAGE);
	if(!$rs->EOF) {
		$recordsFound = $rs->_maxRecordCount;
		echo "<br />Records Lits:<br />";
		while(!$rs->EOF) {
			if($rs->fields['active'] == 0) { ?>
<font style="color:#777777"><?php echo $rs->fields['username'] ?> [<?php echo $rs->fields['email'] ?>]<br />
<a href="userset.php?id=<?php echo $rs->fields['usid'] ?>&ref=4"><font style="color:#555">Approve [email not confirmed]</font></a></font><br />
<?php } else { ?>
        <br /><font color="#4F5870"><?php echo $rs->fields['username'] ?> [<?php echo $rs->fields['email'] ?>]<br />
<?php 				if($rs->fields['active'] == 3) { ?>
<a href="userset.php?id=<?php echo $rs->fields['usid'] ?>&ref=4"><font color="#EE6300">Activate (Account Pending Approval)</font></a></font><br />
<?php }
			}
			
echo "<a href=\"javascript:goto('userset.php?id=".$rs->fields["usid"]."&ref=7')\"><font color=\"#BB0000\">Delete</font></a>";
    echo "&nbsp;&nbsp;<a href=\"javascript:gotos('userset.php?id=".$rs->fields["usid"]."&ref=1')\"><font color=\"#555555\">Commenter</font></a>";
    echo "&nbsp;&nbsp;<a href=\"javascript:gotos('userset.php?id=".$rs->fields["usid"]."&ref=2')\"><font color=\"#556E89\">Editor</font></a>";
    echo "&nbsp;&nbsp;<a href=\"javascript:gotos('userset.php?id=".$rs->fields["usid"]."&ref=3')\"><font color=\"#558958\">Journalist</font></a><br />";
                $rs->moveNext();
		}
		$GenericEasyPagination = new GenericEasyPagination(CURRENT_PAGE,RECORDS_BY_PAGE,"eng");
		$GenericEasyPagination->setTotalRecords($recordsFound);
		echo "<br />";
		echo "<strong>Records found: </strong>".$recordsFound;
		echo "<br />Records ";
		echo $GenericEasyPagination->getListCurrentRecords();
		echo "<br />";
		echo $GenericEasyPagination->getCurrentPages();
		echo "<br />";
	}
	$conn->Close();
} else {
	@$document = $_POST['document'];
?>
<br />Username<br />
<form name="myforma" action="usersearch.php" method="post">
<input type="text" id="incc" value="<?php echo @$document ?>" name="document" /><br /><br />
<input type="submit" class="topicbuton" name="submit" value="Search" />
</form>
</div>
<?php
$conn->Close();
}
include ('footer.php');
/**************************************
* Revision: v.4.1.4.
***************************************/
?>