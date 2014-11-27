<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">Edit Category</div>
<?php
echo '<form name="myform">';
$brecordSet = &$conn->Execute('SELECT * FROM categori WHERE cord=0 ORDER by name ASC');
if(!$brecordSet)
	print $conn->ErrorMsg();
else
	echo "<select name='gruppe' onChange='Load_id()'>";
echo "<option value>---</option>";
while(!$brecordSet->EOF) {
	echo "<option value='".$brecordSet->fields['catid']."' > - - ".$brecordSet->fields['name']."</option>";
	$brecordSet->MoveNext();
}
echo '</select>';
echo "</form>";
?>
<script type="text/javascript">
function Load_id() 
{
var id = document.myform.gruppe.options[document.myform.gruppe.selectedIndex].value
var id_txt = "setcat.php?id="
location = id_txt + id
}
</script>
</div>
<?php
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.4.1.4.
***************************************/
?>