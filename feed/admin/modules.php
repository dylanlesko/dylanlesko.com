<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">Modules</div>
<div id="form">
<?php
foreach($arr as $key => $field) {
	if($field['active'] == 0) {
		echo "<div id='nulled'>";
		echo "<div id='zero'>".$field['nameopt']."</div>";
		echo "<div id='first'><a href='setmodule.php?id=".$field['optionid']."&ref=1'>Activate</a></div>";
		echo "<div id='second'><a href='setmodule.php?id=".$field['optionid']."&ref=2'>Activate [Top menu active link]</a></div>";
		echo "</div>";
	}
	if($field['active'] == 1) {
		echo "<div id='nulled'>";
		echo "<div id='first'><a href='".$field['valueopt']."'>".$field['nameopt']."</a></div>";
		echo "<div id='zero'><a href='setmodule.php?id=".$field['optionid']."&ref=0'>Deactivate</a></div>";
		echo "<div id='second'><a href='setmodule.php?id=".$field['optionid']."&ref=2'>Activate [Top menu active link]</a></div>";
		echo "</div>";
	}
	if($field['active'] == 2) {
		echo "<div id='nulled'>";
		echo "<div id='second'><a href='".$field['valueopt']."'>".$field['nameopt']."</a></div>";
		echo "<div id='first'><a href='setmodule.php?id=".$field['optionid']."&ref=1'>Activate</a></div>";
		echo "<div id='zero'><a href='setmodule.php?id=".$field['optionid']."&ref=0'>Deactivate</a></div>";
		echo "</div>";
	}
}
?>
</div>
</div>
<?php
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.4.1.4.
***************************************/
?>