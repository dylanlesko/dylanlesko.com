<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id=vforms>
<div id="cconfig">Sponsored Listing</div>
Sponsored Listing Yes/No
<?php
$time = date("Y-m-d H:i:s");
if(isset($_POST['submit'])) {
	$payoption = $_POST['payoption'];
        $pricevalue = $_POST['pricevalue'];
        $datevalue = $_POST['datevalue'];
	if(get_magic_quotes_gpc()) {
		$payoption = stripslashes($payoption);
                $pricevalue = stripslashes($pricevalue);
                $datevalue = stripslashes($datevalue); 
	}
	$sql = 'UPDATE abcoption SET valueopt = '.$conn->qstr($payoption).' WHERE optionid = '.$conn->qstr("37").'';
	if($conn->Execute($sql) === false) {
		print '<br /><div id="error ">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
        $sql2 = 'UPDATE abcoption SET valueopt = '.$conn->qstr($pricevalue).' WHERE optionid = '.$conn->qstr("38").'';
	if($conn->Execute($sql2) === false) {
		print '<br /><div id="error ">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
        $sql2 = 'UPDATE abcoption SET valueopt = '.$conn->qstr($datevalue).' WHERE optionid = '.$conn->qstr("39").'';
	if($conn->Execute($sql2) === false) {
		print '<br /><div id="error ">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
	echo "<div id ='information'>&nbsp;Successfully. "; 
    ?>
<a href="sponsored.php">Back to Sponsored Listing</a></div>
<?php } else { ?>
<form method="post" action="sponsored.php">
<?php if($payoffon == 1) { ?>
<select style="background:#EEFFE3;" id="incc" name="payoption">
<option value='1'>-- Yes</option>
<option style="background:#ffffff;" value='1'>---- Yes</option>
<option style="background:#ffffff;" value='0'>------ No</option>
</select>
<?php } ?>
<?php if($payoffon == 0) { ?>
<select style="background:#FFF6C1;" id="incc" name="payoption">
<option value='0'>-- No</option>
<option style="background:#ffffff;" value='1'>---- Yes</option>
<option style="background:#ffffff;" value='0'>------ No</option>
</select>
<?php
}
?>
<br /><br />
Price:<br />
<input id="incc" type="text" name="pricevalue" value="<?php echo $payvalue; ?>" />
<br /><br />
End Date: [Days]<br />
<input id="incc" type="text" name="datevalue" value="<?php echo $payday; ?>" />
<br /><br />


<input type="submit" class="topicbuton" name="submit" value="Submit" /><br /><br />
</form>
</div>
<?php
}
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.4.1.4.
***************************************/
?>