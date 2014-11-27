<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
include ('../classes/class.GenericEasyPagination.php');
?>
<script>
function gotos(sites) {
var msg = confirm("Are you sure?")
if (msg) {window.location.href = sites}
else (null)
}
</script>
<div id="vforms">
<div id="cconfig">Comments</div>

<?php
if(@$_GET["page"] != ""):
	$page = @$_GET["page"];
else:
	$page = 1;
endif;
	define('RECORDS_BY_PAGE',10);
	define('CURRENT_PAGE',$page);
	$strSQL = "SELECT * FROM reviews ORDER by revid DESC";
	$conn->SetFetchMode(ADODB_FETCH_ASSOC);
	$rs = $conn->PageExecute($strSQL,RECORDS_BY_PAGE,CURRENT_PAGE);
	if(!$rs->EOF) {
		$recordsFound = $rs->_maxRecordCount;
		echo "<br />Records Lits:<br />";
		while(!$rs->EOF) {
			
    echo $rs->fields['ctexte'] . "&nbsp;&nbsp;<a href=\"javascript:gotos('deleterevs.php?id=".$rs->fields['revid']."')\"><br /><font color='red'>Delete Comment</font></a><br /><br />";
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
    ?>
</div>
<?php
include ('footer.php');
/**************************************
* Revision: v.4.1.4.
***************************************/
?>