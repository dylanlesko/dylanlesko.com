<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id=vforms>
<div id="cconfig">Posting</div>
WYSIWYG Editor Yes/No (Default No)
<?php
if(isset($_POST['submit'])) {
	$editortrues = $_POST['editortrues'];
        $maxpostings = $_POST['maxpostings'];
	if(get_magic_quotes_gpc()) {
		$editortrues = stripslashes($editortrues);
                $maxpostings = stripslashes($maxpostings);
	}
	$sql = 'UPDATE abcoption SET valueopt = '.$conn->qstr($editortrues).' WHERE optionid = '.$conn->qstr("23").'';
	if($conn->Execute($sql) === false) {
		print '<br /><div id="error ">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
        $sql2 = 'UPDATE abcoption SET valueopt = '.$conn->qstr($maxpostings).' WHERE optionid = '.$conn->qstr("22").'';
	if($conn->Execute($sql2) === false) {
		print '<br /><div id="error ">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
	echo "<div id ='information'>&nbsp;Successfully. "; 
    ?>
<a href="posting.php">Back to Posting</a></div>
<?php } else { ?>
<form method="post" action="posting.php">
<?php if($editortrue == 1) { ?>
<select style="background:#EEFFE3;" id="incc" name="editortrues">
<option value='1'>-- Yes</option>
<option style="background:#ffffff;" value='1'>---- Yes</option>
<option style="background:#ffffff;" value='2'>------ No</option>
</select>
<?php } ?>
<?php if($editortrue == 2) { ?>
<select style="background:#FFF6C1;" id="incc" name="editortrues">
<option value='2'>-- No</option>
<option style="background:#ffffff;" value='1'>---- Yes</option>
<option style="background:#ffffff;" value='2'>------ No</option>
</select>
<?php
}
?>
<br /><br />
Max Characters<br />
<input id="incc" type="text" name="maxpostings" value="<?php echo $maxposting; ?>" />
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