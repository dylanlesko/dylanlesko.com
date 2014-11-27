<?php /* Smarty version Smarty-3.0.5, created on 2014-10-28 05:42:32
         compiled from "themes/classic/main.php" */ ?>
<?php /*%%SmartyHeaderCode:622172114544f8f38f24764-36064607%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7589a8275e3acbf60e2e1c6c688e4fcb85bbba01' => 
    array (
      0 => 'themes/classic/main.php',
      1 => 1414499802,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '622172114544f8f38f24764-36064607',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_replace')) include '/home/content/13/11942013/html/feed/libs/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/content/13/11942013/html/feed/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_regex_replace')) include '/home/content/13/11942013/html/feed/libs/plugins/modifier.regex_replace.php';
if (!is_callable('smarty_modifier_truncate')) include '/home/content/13/11942013/html/feed/libs/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_CloseTags')) include '/home/content/13/11942013/html/feed/libs/plugins/modifier.CloseTags.php';
if (!is_callable('smarty_modifier_timeAgo')) include '/home/content/13/11942013/html/feed/libs/plugins/modifier.timeAgo.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html dir="<?php echo $_smarty_tpl->getVariable('frontext')->value;?>
" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
<meta http-equiv="Pragma" content="cache" />
<meta name="ROBOTS" content="All" />
<meta name="keywords" content="<?php echo $_smarty_tpl->getVariable('keywords')->value;?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->getVariable('metadesc')->value;?>
" />
<link href="themes/<?php echo $_smarty_tpl->getVariable('themes')->value;?>
/styles/images/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="themes/<?php echo $_smarty_tpl->getVariable('themes')->value;?>
/styles/basic.css" />
<link rel="stylesheet" type="text/css" href="themes/<?php echo $_smarty_tpl->getVariable('themes')->value;?>
/styles/main.css" />
<link href="themes/<?php echo $_smarty_tpl->getVariable('themes')->value;?>
/styles/css_pirobox/style_2/style.css" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/atom+xml" title="<?php echo $_smarty_tpl->getVariable('sitetitle')->value;?>
 - RSS" href="<?php echo $_smarty_tpl->getVariable('sitepath')->value;?>
/rss.php" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/scripts.js"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="scripts/pirobox_extended.js"></script>
<script type="text/javascript">

 $(document).ready(function() {
 $().piroBox_ext({
 piro_speed : 700,
 bg_alpha : 0.5,
 piro_scroll : true
 });
 });

</script>
<title><?php echo $_smarty_tpl->getVariable('sitetitle')->value;?>
</title>
</head> 
<body>
<div id="content">
<?php  $_config = new Smarty_Internal_Config("languages/lang_".($_smarty_tpl->getVariable('langs')->value).".conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php $_template = new Smarty_Internal_Template("themes/".($_smarty_tpl->getVariable('themes')->value)."/maindir.php", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<div id="blanks">
<div id="leftblock">
<div class="featuredcontainer">
<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['name'] = "newser";
$_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['loop'] = is_array($_loop=1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['start'] = (int)0;
$_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["newser"]['total']);
?>
<?php if ($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['blogid']==false){?><?php echo $_smarty_tpl->getConfigVariable('nonewsyet');?>
<?php }else{ ?>
<?php if ($_smarty_tpl->getVariable('rewritemod')->value==1){?>
<a href="<?php echo $_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['univer'];?>
-<?php if ($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['bhelper']==false){?><?php echo urlencode(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['btexty'],"?",''),"'",''),'"',''),'/',''),':',''));?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['bhelper'];?>
<?php }?>.html"><span class="ha4"><?php echo stripslashes($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['btexty']);?>
</span></a><br />
<?php }?>
<?php if ($_smarty_tpl->getVariable('rewritemod')->value==2){?>
<a href="news.php?name=<?php echo $_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['univer'];?>
"><span class="ha4"><?php echo stripslashes($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['btexty']);?>
</span></a><br />
<?php }?>
<?php if (isset($_smarty_tpl->getVariable('newser',null,true,false)->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['newser']['index']]['brief'])){?><div id="brief"><?php echo stripslashes($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['brief']);?>
</div><?php }?>
<?php if ($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['images']!=0){?>
<div class="thumb-image-wrapper">
<a href="uploads/<?php echo $_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['images'];?>
" rel="gallery" class="pirobox_gall" title="<?php echo $_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['btexty'];?>
">
<img src="maxthumb/<?php echo $_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['images'];?>
" width="300" height="250" alt="<?php echo $_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['btexty'];?>
" /></a>
</div>
<?php }?>
<div id="linker">
<i><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['bdate'],"%A, %B %e, %Y");?>
 by <?php echo $_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['buser'];?>
</i>
<?php if ($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['rating']==0){?><img id="starm" src="themes/<?php echo $_smarty_tpl->getVariable('themes')->value;?>
/styles/images/stars0.gif" width="50px" height="10px" border="0" /><?php }?>
<?php if ($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['rating']==1.0){?><img id="starm" src="themes/<?php echo $_smarty_tpl->getVariable('themes')->value;?>
/styles/images/stars1.gif" width="50px" height="10px" border="0" /><?php }?>
<?php if ($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['rating']==1.5){?><img id="starm" src="themes/<?php echo $_smarty_tpl->getVariable('themes')->value;?>
/styles/images/stars2.gif" width="50px" height="10px" border="0" /><?php }?>
<?php if ($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['rating']==2.0){?><img id="starm" src="themes/<?php echo $_smarty_tpl->getVariable('themes')->value;?>
/styles/images/stars2.gif" width="50px" height="10px" border="0" /><?php }?>
<?php if ($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['rating']==2.5){?><img id="starm" src="themes/<?php echo $_smarty_tpl->getVariable('themes')->value;?>
/styles/images/stars3.gif" width="50px" height="10px" border="0" /><?php }?>
<?php if ($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['rating']==3.0){?><img id="starm" src="themes/<?php echo $_smarty_tpl->getVariable('themes')->value;?>
/styles/images/stars3.gif" width="50px" height="10px" border="0" /><?php }?>
<?php if ($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['rating']==3.5){?><img id="starm" src="themes/<?php echo $_smarty_tpl->getVariable('themes')->value;?>
/styles/images/stars4.gif" width="50px" height="10px" border="0" /><?php }?>
<?php if ($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['rating']==4.0){?><img id="starm" src="themes/<?php echo $_smarty_tpl->getVariable('themes')->value;?>
/styles/images/stars4.gif" width="50px" height="10px" border="0" /><?php }?>
<?php if ($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['rating']==4.5){?><img id="starm" src="themes/<?php echo $_smarty_tpl->getVariable('themes')->value;?>
/styles/images/stars5.gif" width="50px" height="10px" border="0" /><?php }?>
<?php if ($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['rating']==5.0){?><img id="starm" src="themes/<?php echo $_smarty_tpl->getVariable('themes')->value;?>
/styles/images/stars5.gif" width="50px" height="10px" border="0" /><?php }?>
</div>
<?php if ($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['editor']==2){?>
<?php echo smarty_modifier_truncate(smarty_modifier_regex_replace(stripslashes($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['bamess']),"/[\r]/","<br />"),988);?>

<?php }?>
<?php if ($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['editor']==1){?>
<?php echo smarty_modifier_CloseTags(smarty_modifier_truncate(stripslashes(htmlspecialchars_decode($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['bamess'])),1310));?>

<?php }?>
<?php if ($_smarty_tpl->getVariable('rewritemod')->value==1){?>
<a href="<?php echo $_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['univer'];?>
-<?php if ($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['bhelper']==false){?><?php echo urlencode(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['btexty'],"?",''),"'",''),'"',''),'/',''),':',''));?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['bhelper'];?>
<?php }?>.html"><?php echo $_smarty_tpl->getConfigVariable('readmore');?>
</a>&nbsp;
<a href="<?php echo $_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['univer'];?>
-<?php if ($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['bhelper']==false){?><?php echo urlencode(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['btexty'],"?",''),"'",''),'"',''),'/',''),':',''));?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['bhelper'];?>
<?php }?>.html#section"><?php echo $_smarty_tpl->getConfigVariable('comments');?>
&nbsp;[<?php echo $_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['commno'];?>
]</a>
<?php }?>
<?php if ($_smarty_tpl->getVariable('rewritemod')->value==2){?>
<a href="news.php?name=<?php echo $_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['univer'];?>
"><?php echo $_smarty_tpl->getConfigVariable('readmore');?>
</a>&nbsp;
<a href="news.php?name=<?php echo $_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['univer'];?>
#section"><?php echo $_smarty_tpl->getConfigVariable('comments');?>
&nbsp;[<?php echo $_smarty_tpl->getVariable('newser')->value[$_smarty_tpl->getVariable('smarty')->value['section']['newser']['index']]['commno'];?>
]</a>
<?php }?>
<?php }?>
<?php endfor; endif; ?>
</div>
<div id="intro" style="float:left"><img src="themes/<?php echo $_smarty_tpl->getVariable('themes')->value;?>
/styles/images/rss.png" width="16px" height="11px" /><a href="rsscat.php"><?php echo $_smarty_tpl->getConfigVariable('intro');?>
</a></div>
<div id="list" style="float:left;">
<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['name'] = "onewse";
$_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['loop'] = is_array($_loop=17) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['start'] = (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['total']);
?>
<?php if ($_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['oamess']==false){?>.<?php }else{ ?>
<div id="side-a">
<?php if ($_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['omages']!=0){?>
<a href="uploads/<?php echo $_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['omages'];?>
" rel="gallery" class="pirobox_gall" title="<?php echo $_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['otexty'];?>
">
<img src="minthumb/<?php echo $_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['omages'];?>
" width="144px" height="82px" alt="<?php echo $_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['otexty'];?>
" /></a>
<?php }else{ ?>
<img src="themes/<?php echo $_smarty_tpl->getVariable('themes')->value;?>
/styles/images/noimage.png" width="144px" height="82px" alt="<?php echo $_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['otexty'];?>
" /></a>
<?php }?>
<br />
<?php if ($_smarty_tpl->getVariable('rewritemod')->value==1){?>
<span class="ha3"><a href="<?php echo $_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['oniver'];?>
-<?php if ($_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['ohelper']==false){?><?php echo urlencode(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['otexty'],"?",''),"'",''),'"',''),'/',''),':',''));?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['ohelper'];?>
<?php }?>.html"><?php echo smarty_modifier_truncate(stripslashes($_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['otexty']),65);?>
</a></span>
<?php }?>
<?php if ($_smarty_tpl->getVariable('rewritemod')->value==2){?>
<span class="ha3"><a href="news.php?name=<?php echo $_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['oniver'];?>
"><?php echo smarty_modifier_truncate(stripslashes($_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['otexty']),65);?>
</a></span>
<?php }?>
<br />
<?php echo smarty_modifier_truncate(stripslashes($_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['oamess']),150);?>

</div>
<?php }?>
<?php endfor; endif; ?>
</div>
</div>
<div id="rightblock">
<?php if ($_smarty_tpl->getVariable('adsoffon')->value==2){?>
<div id="blockd">
<div id="blockhead"><?php echo $_smarty_tpl->getConfigVariable('sponsor');?>
</div>
<?php echo $_smarty_tpl->getVariable('senseup')->value;?>

</div>
<?php }?>
<div id="blockd">
<div id="blockhead"><?php echo $_smarty_tpl->getConfigVariable('latest');?>
</div>
<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['name'] = "onewse";
$_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['loop'] = is_array($_loop=22) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['start'] = (int)17;
$_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["onewse"]['total']);
?>
<?php if ($_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['oamess']==false){?><?php }else{ ?>
<div id="ha5">
<?php if ($_smarty_tpl->getVariable('rewritemod')->value==1){?>
<span class="ha3"><a href="<?php echo $_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['oniver'];?>
-<?php if ($_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['ohelper']==false){?><?php echo urlencode(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['otexty'],"?",''),"'",''),'"',''),'/',''),':',''));?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['ohelper'];?>
<?php }?>.html"><?php echo $_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['otexty'];?>
</a></span>
<?php }?>
<?php if ($_smarty_tpl->getVariable('rewritemod')->value==2){?>
<span class="ha3"><a href="news.php?name=<?php echo $_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['oniver'];?>
"><?php echo $_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['otexty'];?>
</a></span>
<?php }?>
<br />
<?php echo smarty_modifier_truncate($_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['oamess'],300);?>

<br />
<?php if ($_smarty_tpl->getVariable('rewritemod')->value==1){?>
<a href="<?php echo $_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['oniver'];?>
-<?php if ($_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['ohelper']==false){?><?php echo urlencode(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['otexty'],"?",''),"'",''),'"',''),'/',''),':',''));?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['ohelper'];?>
<?php }?>.html"><?php echo $_smarty_tpl->getConfigVariable('readmore');?>
</a>
<?php }?>
<?php if ($_smarty_tpl->getVariable('rewritemod')->value==2){?>
<a href="news.php?name=<?php echo $_smarty_tpl->getVariable('onewse')->value[$_smarty_tpl->getVariable('smarty')->value['section']['onewse']['index']]['oniver'];?>
"><?php echo $_smarty_tpl->getConfigVariable('readmore');?>
</a>
<?php }?>
</div>
<?php }?>
<?php endfor; endif; ?>
</div>
<div id="blockd">
<div id="blockhead"><?php echo $_smarty_tpl->getConfigVariable('community');?>
</div>
<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['name'] = "reviews";
$_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['loop'] = is_array($_loop=$_smarty_tpl->getVariable('reviews')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["reviews"]['total']);
?>
<div id="ha5">
<?php if ($_smarty_tpl->getVariable('reviews')->value[$_smarty_tpl->getVariable('smarty')->value['section']['reviews']['index']]['comimage']!='0'){?>
<img src="minthumb/<?php echo $_smarty_tpl->getVariable('reviews')->value[$_smarty_tpl->getVariable('smarty')->value['section']['reviews']['index']]['comimage'];?>
" alt="<?php echo $_smarty_tpl->getVariable('reviews')->value[$_smarty_tpl->getVariable('smarty')->value['section']['reviews']['index']]['comenter'];?>
" width="25x" height="25px" border="0">
<a href="uploads/<?php echo $_smarty_tpl->getVariable('reviews')->value[$_smarty_tpl->getVariable('smarty')->value['section']['reviews']['index']]['comimage'];?>
" rel="gallery" class="pirobox_gall"></a>
<?php }else{ ?>
<img src="themes/<?php echo $_smarty_tpl->getVariable('themes')->value;?>
/styles/images/penguin.png" alt="<?php echo $_smarty_tpl->getVariable('reviews')->value[$_smarty_tpl->getVariable('smarty')->value['section']['reviews']['index']]['comenter'];?>
" width="25x" height="25px" border="0">
<?php }?>
<?php if ($_smarty_tpl->getVariable('rewritemod')->value==1){?>
<span class="ha3"><a href="<?php echo $_smarty_tpl->getVariable('reviews')->value[$_smarty_tpl->getVariable('smarty')->value['section']['reviews']['index']]['comrev'];?>
<?php if ($_smarty_tpl->getVariable('reviews')->value[$_smarty_tpl->getVariable('smarty')->value['section']['reviews']['index']]['chelper']==true){?>-<?php echo $_smarty_tpl->getVariable('reviews')->value[$_smarty_tpl->getVariable('smarty')->value['section']['reviews']['index']]['chelper'];?>
<?php }?>.html"><strong><?php echo $_smarty_tpl->getVariable('reviews')->value[$_smarty_tpl->getVariable('smarty')->value['section']['reviews']['index']]['comenter'];?>
</strong></a></span> - 
<?php }?>
<?php if ($_smarty_tpl->getVariable('rewritemod')->value==2){?>
<span class="ha3"><a href="news.php?name=<?php echo $_smarty_tpl->getVariable('reviews')->value[$_smarty_tpl->getVariable('smarty')->value['section']['reviews']['index']]['comrev'];?>
"><?php echo $_smarty_tpl->getVariable('reviews')->value[$_smarty_tpl->getVariable('smarty')->value['section']['reviews']['index']]['comenter'];?>
</a></span> - 
<?php }?>
<?php echo smarty_modifier_truncate(stripslashes($_smarty_tpl->getVariable('reviews')->value[$_smarty_tpl->getVariable('smarty')->value['section']['reviews']['index']]['ctexte']),200);?>
<br />
<div id="realysmall"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('reviews')->value[$_smarty_tpl->getVariable('smarty')->value['section']['reviews']['index']]['cdate'],"%A, %B %e, %Y, %H:%M:%S");?>
, <?php echo smarty_modifier_timeAgo($_smarty_tpl->getVariable('reviews')->value[$_smarty_tpl->getVariable('smarty')->value['section']['reviews']['index']]['cdate']);?>
&nbsp;<?php echo $_smarty_tpl->getConfigVariable('ago');?>
</div>
</div>
<?php endfor; endif; ?>
</div>
</div>
</div>