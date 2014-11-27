<select name="idblog" id="firstfield">
{foreach from=$categori item=caty}
<option style="background:#f8f8f8;border-bottom:1px solid #ccc;" value="{$caty.catid|stripslashes}">- {$caty.name|stripslashes}
{foreach from=$subcat item=inc} 
{if $inc.cord neq 0 && $caty.catid eq $inc.parent}
<option value="{$inc.catid|stripslashes}">- - - {$inc.name|stripslashes}
{/if} 
{/foreach}
{/foreach}
</select>





