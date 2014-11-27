<?php
/* * ************************************
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">Top Menu</div>
<?php 
if(isset($_POST['submit'])) {
    $plinks = $_POST['plinks'];
    if(get_magic_quotes_gpc()) {
    $plinks = stripslashes($plinks);
    }
    $sql = 'UPDATE abcoption SET valueopt = '.$conn->qstr($plinks).' WHERE optionid = '.$conn->qstr("11").'';
    if($conn->Execute($sql) === false) {
        print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
    }
    echo "<div id ='information'>&nbsp;Successfully. ";
    ?>
<a href="menu.php">Back to Top Menu Settings</a></div>
<?php } else { ?>
Links in top menu:
<form method="post" action="menu.php">
<input id="incc" type="text" name="plinks" value="<?php echo $toplinks; ?>" size="35" />
<br /><br />
<input type="submit" class="topicbuton" name="submit" value="Submit" /><br /><br />
</form>
<?php } ?>
</div>
<?php
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.1.1.
***************************************/
?>