<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id=vforms>
<div id="cconfig">Configuration</div><br />
<?php
if(isset($_POST['submit'])) {
	$sitedisabled = $_POST['sitedisabled'];
	$rewritemod = $_POST['rewritemod'];
	$sitetitle = $_POST['sitetitle'];
	$language = $_POST['language'];
	$themes = $_POST['themes'];
	$sitepath = $_POST['sitepath'];
	$sitemail = $_POST['sitemail'];
        $ntext = $_POST['ntext'];
	if(get_magic_quotes_gpc()) {
		$sitedisabled = stripslashes($sitedisabled);
		$rewritemod = stripslashes($rewritemod);
		$sitetitle = stripslashes($sitetitle);
		$language = stripslashes($language);
		$themes = stripslashes($themes);
		$sitepath = stripslashes($sitepath);
		$sitemail = stripslashes($sitemail);
                $ntext = stripslashes($ntext);
	}
	$name = array($sitedisabled,$rewritemod,$sitetitle,$language,$themes,$sitepath,$sitemail,$ntext);
	foreach($name as $name) {
		if(strlen($name) < 1) {
			echo "<center>Field must be at least 1 characters long: <a href='index.php'>Go Back</a></center>";
			die();
		}
	}
$sql = 'UPDATE abcoption SET valueopt = '.$conn->qstr($sitedisabled).' WHERE optionid = '.$conn->qstr("9").'';
	if($conn->Execute($sql) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
$sql2 = 'UPDATE abcoption SET valueopt = '.$conn->qstr($rewritemod).' WHERE optionid = '.$conn->qstr("10").'';
	if($conn->Execute($sql2) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
$sql3 = 'UPDATE abcoption SET valueopt = '.$conn->qstr($sitetitle).' WHERE optionid = '.$conn->qstr("1").'';
	if($conn->Execute($sql3) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
$sql4 = 'UPDATE abcoption SET valueopt = '.$conn->qstr($language).' WHERE optionid = '.$conn->qstr("5").'';
	if($conn->Execute($sql4) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
$sql5 = 'UPDATE abcoption SET valueopt = '.$conn->qstr($themes).' WHERE optionid = '.$conn->qstr("7").'';
	if($conn->Execute($sql5) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
$sql6 = 'UPDATE abcoption SET valueopt = '.$conn->qstr($sitepath).' WHERE optionid = '.$conn->qstr("4").'';
	if($conn->Execute($sql6) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
$sql7 = 'UPDATE abcoption SET valueopt = '.$conn->qstr($sitemail).' WHERE optionid = '.$conn->qstr("8").'';
	if($conn->Execute($sql7) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
$sql8 = 'UPDATE abcoption SET valueopt = '.$conn->qstr($ntext).' WHERE optionid = '.$conn->qstr("12").'';
	if($conn->Execute($sql8) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}

        echo "<div id ='information'>&nbsp;Successfully. ";
    ?>
<a href="index.php">Back to Configuration</a></div>
<?php
} else {
$brecordSet = &$conn->Execute('SELECT username, email FROM users WHERE active = ?', array("3"));
        if($brecordSet) {
	if($brecordSet->fields > 0) {
        $numrows = $brecordSet->PO_RecordCount("users");
        echo "<div id='error'><a href='user.php'>Members Waiting For Approval [".$numrows."]</a></div><br /><br />";
		}
}
?>
<form method="post" action="index.php">
Enable Maintenance Mode<br />
<?php if($sitedisabled == 1) { ?>
<select style="background:#FFF6C1;" id="incc" name="sitedisabled">
<option value='1'>- Website is in maintenance mode</option>
<option style="background:#ffffff;" value='1'>---- Maintenance mode</option>
<option style="background:#ffffff;" value='2'>------ Production mode</option>
</select>
<?php } ?>
<?php if($sitedisabled == 2) { ?>
<select style="background:#EEFFE3;" id="incc" name="sitedisabled">
<option value='2'>-- Website in production mode</option>
<option style="background:#ffffff;" value='1'>---- Maintenance mode</option>
<option style="background:#ffffff;" value='2'>------ Production mode</option>
</select>
<?php } ?>
<br /><br />
Friendly URLs<br />
Requirements: Apache web server with the mod_rewrite module installed.<br />
<?php if($rewritemod == 1) { ?>
<select style="background:#EEFFE3;" id="incc" name="rewritemod">
<option value='1'>-- Friendly URLs Enabled</option>
<option style="background:#ffffff;" value='1'>---- Yes</option>
<option style="background:#ffffff;" value='2'>------ No</option>
</select>                               
<?php } ?>
<?php if($rewritemod == 2) { ?>
<select style="background:#FFF6C1;" id="incc" name="rewritemod">
<option value='2'>-- Friendly URLs Disabled</option>
<option style="background:#ffffff;" value='1'>---- Yes</option>
<option style="background:#ffffff;" value='2'>------ No</option>
</select>
<?php } ?>
<br /><br />
WebSite Name<br />
<input id="incc" type="text" name="sitetitle" value="<?php echo $sitetitle; ?>" size="35" />
<br /><br />
Language<br />
italian[SalvatoreT3], spanish[Romajisu], turkish[Murattu], dutch[-mike-], russian[serpens], english.<br />
<input id="incc" name="language" value="<?php echo $language; ?>" />
<br /><br />
Theme - <a href="http://www.phpenter.net/shop.php" target="_blank">Themes for version 4.2.x.</a><br />
<input id="incc" type="text" name="themes" value="<?php echo $themes; ?>" />
<br /><br />
URL (http://www.example.com or http://www.example.com/folder)
<br /><input id="incc" type="text" name="sitepath" value="<?php echo $sitepath; ?>" size="35" />
<br /><br />
System Email<br />
<input id="incc" type="text" name="sitemail" value="<?php echo $sitemail; ?>" size="35" />
<br /><br />
Text Direction<br />
<?php if($frontext == "ltr") { ?>
<select style="background:#EEFFE3;" id="incc" name="ntext">
<option value='ltr'>- Left To Right</option>
<option style="background:#ffffff;" value='ltr'>---- Left To Right</option>
<option style="background:#ffffff;" value='rtl'>------ Right to Left</option>
</select>
<?php } ?>
<?php if($frontext == "rtl") { ?>
<select style="background:#EEFFE3;" id="incc" name="ntext">
<option value='rtl'>-- Right to Left</option>
<option style="background:#ffffff;" value='ltr'>---- Left To Right</option>
<option style="background:#ffffff;" value='rtl'>------ Right to Left</option>
</select>
<?php } ?>
<br /><br />
<input type="submit" class="topicbuton" name="submit" value="Submit" />
<br /><br />
<br /><br />
</form>
<?php } ?>
</div>
</div>
</div>
<?php
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.4.2.1.
***************************************/
?>