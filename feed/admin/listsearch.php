<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
include ('../classes/class.GenericEasyPagination.php');
?>
<div id="vforms">
<div id="cconfig">Search Listing</div>
<?php
if(isset($_POST['submit'])) {
	$document = $_POST['document'];
    ?>
Story<br />
<form name="myforma" action="listsearch.php" method="post">
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
	define('RECORDS_BY_PAGE',10);
	define('CURRENT_PAGE',$page);
	$strSQL = "SELECT * FROM newser WHERE btexty like '%$document%'";
	$conn->SetFetchMode(ADODB_FETCH_ASSOC);
	$rs = $conn->PageExecute($strSQL,RECORDS_BY_PAGE,CURRENT_PAGE);
	if(!$rs->EOF) {
		$recordsFound = $rs->_maxRecordCount;
		while(!$rs->EOF) {
        echo "<a href='$sitepath/editnews.php?id=".$rs->fields["blogid"]."'><font color='#3B4A60'>".$rs->fields["btexty"]."</font></a>";
        echo '<br /><br />';
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
Story<br />
<form name="myforma" action="listsearch.php" method="post">
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