<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<head>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<div id="vforms">
<div id="cconfig">PHP Enter 4.2.2.</div>
<?php

$sqlc = ("ALTER TABLE  `reviews` ADD  `usermail` VARCHAR( 100 ) NOT NULL DEFAULT  '' AFTER  `comenter`");
if($conn->Execute($sqlc) === false) {
	print '<br /><div id="error">Error: '.$conn->ErrorMsg().'</div><br />';
} else {
	echo "ALTER TABLE reviews - All Done<br />";
}

$sqld = ("ALTER TABLE  `onewse` ADD  `omain` TINYINT( 1 ) NOT NULL DEFAULT  '0' AFTER  `oids`");
if($conn->Execute($sqld) === false) {
	print '<br /><div id="error">Error: '.$conn->ErrorMsg().'</div><br />';
} else {
	echo "ALTER TABLE onewse - All Done<br />";
}
?>
</div>
<?php
include ('footer.php');
/**************************************
* Revision: v.4.2.2.
***************************************/
?>