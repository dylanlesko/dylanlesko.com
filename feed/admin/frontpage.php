<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">Front Page</div>
<?php 
if(isset($_POST['submit'])) {
    $sliders = $_POST['sliders'];
    $efslides = $_POST['efslides'];
    if(get_magic_quotes_gpc()) {
                $sliders = stripslashes($sliders);
        $efslides = stripslashes($efslides);
    }
    $sql = 'UPDATE abcoption SET valueopt = '.$conn->qstr($sliders).' WHERE optionid = '.$conn->qstr("35").'';
    if($conn->Execute($sql) === false) {
        print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
    }
        $sql2 = 'UPDATE abcoption SET valueopt = '.$conn->qstr($efslides).' WHERE optionid = '.$conn->qstr("36").'';
    if($conn->Execute($sql2) === false) {
        print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
    }
    echo "<div id ='information'>&nbsp;Successfully. ";
    ?>
<a href="frontpage.php">Back to Front Page Settings</a></div>
<?php } else { ?>
<form method="post" action="frontpage.php">
Image Slider On/Off<br />
<?php if ($slider == 1) { ?>
<select style="background:#FFF6C1;" id="incc" name="sliders">
<option value='1'>- Off</option>
<option style="background:#ffffff;" value='1'>---- Off</option>
<option style="background:#ffffff;" value='2'>------ On</option>
</select>
<?php } ?>
<?php if ($slider == 2) { ?>
<select style="background:#EEFFE3;" id="incc" name="sliders">
<option value='2'>-- On</option>
<option style="background:#ffffff;" value='1'>---- Off</option>
<option style="background:#ffffff;" value='2'>------ On</option>
</select>
<?php } ?>
<br /><br />
Slider Effect</font><br />
<?php if ($efslide == "scroller") { ?>
<select style="background:#EEFFE3;" id="incc" name="efslides">
<option value='scroller'>- Scroller</option>
<option style="background:#ffffff;" value='scroller'>Scroller</option>
<option style="background:#ffffff;" value='slider'>Slider</option>
</select>
<?php } ?>
<?php if ($efslide == "slider") { ?>
<select style="background:#EEFFE3;" id="incc" name="efslides">
<option value='slider'>- Slider</option>
<option style="background:#ffffff;" value='scroller'>Scroller</option>
<option style="background:#ffffff;" value='slider'>Slider</option>
</select>
<?php } ?>
<?php if ($efslide == "accordion") { ?>
<select style="background:#EEFFE3;" id="incc" name="efslides">
<option style="background:#ffffff;" value='scroller'>Scroller</option>
<option style="background:#ffffff;" value='slider'>Slider</option>
</select>
<?php } ?>
<br /><br />
<input type="submit" class="topicbuton" name="submit" value="Submit" /><br /><br />
</form>
<?php } ?>
</div>
<?php
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.4.1.8.
***************************************/
?>