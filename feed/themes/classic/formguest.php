<div id="incform">
<form name="cform" method="post" action="comment.php">
<input type="hidden" name="comrev" value="{$incname}">
<input type="hidden" name="main" value="0}">
<input type="hidden" name="ccuid" value="0">
<input type="hidden" name="incing" value="{$incname}">
<input type="hidden" name="newimg" value="0">
<input type="hidden" name="ctitle" value="{$ctitle}">
<input type="hidden" name="chelper" value="{$similar}">
&nbsp;Name:<br />
<input type="text" name="text" id="firstfield"><br /><br />
&nbsp;Email:<br />
<input type="text" name="guestmail" id="firstfield"><br /><br />
&nbsp;Comment:<br />
<textarea name="text1" rows="3" cols="50" id="secondfield"></textarea><br /><br />
<img src="captcha.php" id="img" border="0">
<br />
&nbsp;Captcha:<br />
<input id="firstfield" size="4" name="check"><br /><br />
<input type="submit" class="buton" name="submit" value="Submit">
</form>
</div>





