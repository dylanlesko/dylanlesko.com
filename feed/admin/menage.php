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
<a href="menage.php"><div id="cconfig">Manage articles and news items</div></a>
<?php
if(@$_GET["page"] != ""):
	$page = @$_GET["page"];
else:
	$page = 1;
endif;
	define('RECORDS_BY_PAGE',12);
	define('CURRENT_PAGE',$page);
	$strSQL = "SELECT * FROM newser ORDER BY blogid DESC";
	$conn->SetFetchMode(ADODB_FETCH_ASSOC);
	$rs = $conn->PageExecute($strSQL,RECORDS_BY_PAGE,CURRENT_PAGE);
	if(!$rs->EOF) {
		$recordsFound = $rs->_maxRecordCount;
		while(!$rs->EOF) {
        if($rs->fields["main"] == 2){
	echo "<font size='2'>".$rs->fields["btexty"]." - <font color='#4668ff'>[Sponsored]</font></font><br /><a href=\"javascript:goto('deletenews.php?id=".$rs->fields["blogid"]."&file=".$rs->fields["images"]."&comy=".$rs->fields["univer"]."&idblog=".$rs->fields["idblog"]."')\"><img id='corect' src='images/delete.png' border='0'><font color='#BB0000'>Delete</font></a>";
        echo "&nbsp;&nbsp;<a href='$sitepath/editnews.php?id=".$rs->fields["blogid"]."'><img id='corect' src='images/edit.png' border='0'>Edit Link</a><br /><br />";
	}else{
        echo "<font size='2'>".$rs->fields["btexty"]."</font><br /><a href=\"javascript:goto('deletenews.php?id=".$rs->fields["blogid"]."&file=".$rs->fields["images"]."&comy=".$rs->fields["univer"]."&idblog=".$rs->fields["idblog"]."')\"><img id='corect' src='images/delete.png' border='0'><font color='#BB0000'>Delete</font></a>";
        echo "&nbsp;&nbsp;<a href='$sitepath/editnews.php?id=".$rs->fields["blogid"]."'><img id='corect' src='images/edit.png' border='0'>Edit Link</a><br /><br />";
        }	
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