<div id="incform" style="margin-top:14px;">
{if $usercc == true}
<form name="cform" method="post" action="comments.php">
<input type="hidden" name="comrev" value="{$incname}">
<input type="hidden" name="main" value="0">
<input type="hidden" name="ccuid" value="{$kori}">
<input type="hidden" name="incing" value="{$usercc}{$incname}">
<input type="hidden" name="newimg" value="{$thumbs}">
<input type="hidden" name="text" value="{$usercc}">
<br />
<font size="2" font face="verdana" font color="#555">Home Page: [with http://]</font>  
<br />
<input id="firstfield" name="chomes"><br /><br />
<font size="2" font face="verdana" font color="#555">Comment:</font><br>
<textarea name="text1" rows="4" cols="8" id="secondfield"></textarea><br /><br />
<input type="submit" class="buton" name="submit" value="Submit">
</form><br /><br />
{/if}
</div>