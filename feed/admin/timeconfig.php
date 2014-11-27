<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig"><a href="timeline.php">Public Timeline</a></div>
<?php if(isset($_POST['submit'])) {
        $newstitle = $_POST['newstitle'];
	$newstext = $_POST['newstext'];
	if(get_magic_quotes_gpc()) {
                $newstitle = stripslashes($newstitle);
		$newstext = stripslashes($newstext);
	}
       $newstext = htmlspecialchars($newstext);
$newstext = $conn->qstr($newstext);

        $sql = 'UPDATE modules SET modname = '.$conn->qstr($newstitle).' WHERE idmod = '.$conn->qstr(40).'';
	if($conn->Execute($sql) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
        
	$sql1 = 'UPDATE modules SET mabstrt = '.$newstext.' WHERE idmod = '.$conn->qstr(40).'';
	if($conn->Execute($sql1) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
        
	echo "<div id ='information'>&nbsp;Successfully. ";
    ?>
<a href="timeconfig.php">Back to Public Timeline</a></div>
<?php
} else { 
$brecordSet = &$conn->Execute('SELECT * FROM modules where idmod = '.$conn->qstr(40).'');
if(!$brecordSet)
	print $conn->ErrorMsg();
else
	while(!$brecordSet->EOF) {
		$imodname = $brecordSet->fields['modname'];
                $imabstrt = $brecordSet->fields['mabstrt'];
                $brecordSet->MoveNext();
	}
        $imabstrt = htmlspecialchars_decode($imabstrt);
        $imabstrt = stripslashes($imabstrt);
?>
<form method="post" action="timeconfig.php">
<input id="incc" type="text" name="newstitle" value="<?php echo $imodname; ?>" size="35" />
<br /><br />Text<br />
<textarea id="incc" name="newstext"><?php echo $imabstrt ?></textarea><br /><br />
<br /><br />
<?php
echo $imabstrt;
?>
<br /><br />
<input type="submit" class="topicbuton" name="submit" value="Submit" /><br /><br />
</form>
<?php } ?>
</div>
<?php
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.4.1.4.
***************************************/
?>