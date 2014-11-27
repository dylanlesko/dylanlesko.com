<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<title>{$sitetitle}</title>
<description>{$metadesc}</description>
<link>{$sitepath}</link>
{section name=newser loop=$newser}
<item>
<title>{$newser[newser].btexty|stripslashes|replace:"'":''|replace:'"':''|escape:'htmlall':'UTF-8'|replace:'&':' '} - {$sitetitle}</title>
<description>{if $newser[newser].images neq 0}<![CDATA[<img src="{$sitepath}/minthumb/{$newser[newser].images}" border="0" align="left" alt="" title="" />{$newser[newser].bamess|htmlspecialchars_decode|strip_tags|escape|truncate:280}]]>{else}{$newser[newser].bamess|htmlspecialchars_decode|strip_tags|escape|truncate:280}{/if}</description>
{if $rewritemod == 1}
<link>{$sitepath}/{$newser[newser].univer}-{if $newser[newser].bhelper eq false}{$newser[newser].btexty|replace:"?":''|replace:"'":''|replace:'"':''|replace:'/':''|replace:':':''|urlencode}{else}{$newser[newser].bhelper}{/if}.html</link>
<guid>{$sitepath}/{$newser[newser].univer}-{if $newser[newser].bhelper eq false}{$newser[newser].btexty|replace:"?":''|replace:"'":''|replace:'"':''|replace:'/':''|replace:':':''|urlencode}{else}{$newser[newser].bhelper}{/if}.html</guid>
{/if}
{if $rewritemod == 2}
<link>{$sitepath}/news.php?name={$newser[newser].univer}</link>
<guid>{$sitepath}/news.php?name={$newser[newser].univer}</guid>
{/if}
<pubDate>{$newser[newser].bdate|date_format:"%a, %e %b %Y %H:%M:%S"} GMT</pubDate>
</item>
{/section}
</channel>
</rss>