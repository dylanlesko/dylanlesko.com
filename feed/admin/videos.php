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
var msg = confirm("Are you sure you want to delete this entry? This action cannot be undone!")
if (msg) {window.location.href = site}
else (null)
}
</script>
<div id="vforms">
<a href="videos.php"><div id="cconfig">Videos</div></a>
<?php
if(@$_GET["page"] != ""):
	$page = @$_GET["page"];
else:
	$page = 1;
endif;
	define('RECORDS_BY_PAGE',12);
	define('CURRENT_PAGE',$page);
	$strSQL = "SELECT * FROM tubevideo ORDER by yuid DESC";
	$conn->SetFetchMode(ADODB_FETCH_ASSOC);
	$rs = $conn->PageExecute($strSQL,RECORDS_BY_PAGE,CURRENT_PAGE);
	if(!$rs->EOF) {
		$recordsFound = $rs->_maxRecordCount;
		while(!$rs->EOF) {
echo "<font size='2'>".$rs->fields["yuname"]."</font><br /><a href=\"javascript:goto('deletevideo.php?id=".$rs->fields["yuid"]."')\"><img id='corect' src='images/delete.png' border='0'><font color='#BB0000'>Delete</font></a><br /><br />";			
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