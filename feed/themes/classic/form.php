<div id="incform">
{if $usercc == true}
<form name="cform" method="post" action="comment.php">
<input type="hidden" name="comrev" value="{$incname}">
<input type="hidden" name="main" value="0">
<input type="hidden" name="ccuid" value="{$kori}">
<input type="hidden" name="incing" value="{$usercc}{$incname}">
<input type="hidden" name="newimg" value="{$thumbs}">
<input type="hidden" name="text" value="{$usercc}">
<input type="hidden" name="chelper" value="{$similar}">
<br />
&nbsp;&nbsp;Link: [with http://]
<br />
<input type="text" name="chomes" id="firstfield"><br /><br />
&nbsp;&nbsp;Comment:<br />
<textarea name="text1" rows="3" cols="50"  id="secondfield"></textarea><br /><br />
<input type="submit" class="buton" name="submit" value="Submit">
</form>
{/if}
</div>