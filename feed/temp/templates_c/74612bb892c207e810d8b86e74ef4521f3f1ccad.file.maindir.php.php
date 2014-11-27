<?php /* Smarty version Smarty-3.0.5, created on 2014-10-28 05:42:33
         compiled from "themes/classic/maindir.php" */ ?>
<?php /*%%SmartyHeaderCode:1669411032544f8f39a438e3-39897153%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74612bb892c207e810d8b86e74ef4521f3f1ccad' => 
    array (
      0 => 'themes/classic/maindir.php',
      1 => 1414499803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1669411032544f8f39a438e3-39897153',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_replace')) include '/home/content/13/11942013/html/feed/libs/plugins/modifier.replace.php';
?><?php if ($_smarty_tpl->getVariable('newson')->value==2){?><div id="zannounc"><?php echo $_smarty_tpl->getVariable('newstext')->value;?>
</div><?php }?>
<?php if (isset($_smarty_tpl->getVariable('customheader',null,true,false)->value)&&$_smarty_tpl->getVariable('customheader')->value!='0'){?><div><?php echo stripslashes(htmlspecialchars_decode($_smarty_tpl->getVariable('customheader')->value));?>
</div><?php }?>
<div id="header">
<div id="logo"><a href="<?php echo $_smarty_tpl->getVariable('sitepath')->value;?>
"><?php echo $_smarty_tpl->getVariable('sitetitle')->value;?>
</a></div>
<div id="search">
<div id="sestext">
<form action="<?php echo $_smarty_tpl->getVariable('sitepath')->value;?>
/search.php" method="GET"><input
id="intext" class="txt" type="text" name="id" />
<button class="b-search" value="go" type="submit"></button>
</form>
</div>
</div>
</div>
<div id="menu">
<ul id="coolMenu">
<li><a href="<?php echo $_smarty_tpl->getVariable('sitepath')->value;?>
"><img src="themes/<?php echo $_smarty_tpl->getVariable('themes')->value;?>
/styles/images/homes.png" width="18" height="16" border="0" /></a></li>
<?php  $_smarty_tpl->tpl_vars['caty'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('categori')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['caty']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['caty']->index=-1;
if ($_smarty_tpl->tpl_vars['caty']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['caty']->key => $_smarty_tpl->tpl_vars['caty']->value){
 $_smarty_tpl->tpl_vars['caty']->index++;
?>
<?php $_smarty_tpl->tpl_vars["ifavaible"] = new Smarty_variable($_smarty_tpl->tpl_vars['caty']->total, null, null);?>
<?php ob_start();?><?php echo $_smarty_tpl->getVariable('toplinks')->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['caty']->index<$_tmp1){?>
<?php if ($_smarty_tpl->getVariable('rewritemod')->value==2){?>
<li><a href="categories.php?id=<?php echo stripslashes($_smarty_tpl->tpl_vars['caty']->value['catid']);?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['caty']->value['name']);?>
</a>
<?php }?>
<?php if ($_smarty_tpl->getVariable('rewritemod')->value==1){?>
<li><a href="<?php echo $_smarty_tpl->tpl_vars['caty']->value['catid'];?>
.htm" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['caty']->value['name']);?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['caty']->value['name']);?>
</a>
<?php }?>
<ul>
<?php  $_smarty_tpl->tpl_vars['inc'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('subcat')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['inc']->key => $_smarty_tpl->tpl_vars['inc']->value){
?>
<?php if ($_smarty_tpl->tpl_vars['inc']->value['cord']!=0&&$_smarty_tpl->tpl_vars['caty']->value['catid']==$_smarty_tpl->tpl_vars['inc']->value['parent']){?>
<?php if ($_smarty_tpl->getVariable('rewritemod')->value==2){?>
<li><a href="categories.php?id=<?php echo stripslashes($_smarty_tpl->tpl_vars['inc']->value['catid']);?>
"><?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['inc']->value['name'])," ","&nbsp;");?>
</a>
<?php }?>
<?php if ($_smarty_tpl->getVariable('rewritemod')->value==1){?>
<li><a href="<?php echo $_smarty_tpl->tpl_vars['inc']->value['catid'];?>
.htm" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['inc']->value['name']);?>
"><?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['inc']->value['name'])," ","&nbsp;");?>
</a>
<?php }?>
<?php }?>
<?php }} ?>
</ul>
</li>
<?php }?>
<?php }} ?>
<li>
<?php ob_start();?><?php echo $_smarty_tpl->getVariable('toplinks')->value;?>
<?php $_tmp2=ob_get_clean();?><?php if ($_smarty_tpl->getVariable('ifavaible')->value>$_tmp2){?><a href="#"><?php echo $_smarty_tpl->getConfigVariable('moremenu');?>
</a>
<ul>
<?php  $_smarty_tpl->tpl_vars['morecat'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('categori')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['morecat']->index=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['morecat']->key => $_smarty_tpl->tpl_vars['morecat']->value){
 $_smarty_tpl->tpl_vars['morecat']->index++;
?>
<?php ob_start();?><?php echo $_smarty_tpl->getVariable('toplinks')->value;?>
<?php $_tmp3=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['morecat']->value['cord']==0&&$_smarty_tpl->tpl_vars['morecat']->index>=$_tmp3){?>
<?php if ($_smarty_tpl->getVariable('rewritemod')->value==2){?>
<li><a href="categories.php?id=<?php echo stripslashes($_smarty_tpl->tpl_vars['morecat']->value['catid']);?>
"><?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['morecat']->value['name'])," ","&nbsp;");?>
</a>
<?php }?>
<?php if ($_smarty_tpl->getVariable('rewritemod')->value==1){?>
<li><a href="<?php echo $_smarty_tpl->tpl_vars['morecat']->value['catid'];?>
.htm" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['morecat']->value['name']);?>
"><?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['morecat']->value['name'])," ","&nbsp;");?>
</a>
<?php }?>
<?php }?>
<?php }} else { ?>
<li><a href="index.php">Categories</li></a>
<?php } ?>
</ul>
<?php }?>
</ul>
</div>
<div>
<ul id="sectabs">
<li><a href="link.php"><?php echo $_smarty_tpl->getConfigVariable('submit');?>
</a></li>
<li><a href="gallery.php"><?php echo $_smarty_tpl->getConfigVariable('gallery');?>
</a></li>
<li><a href="members.php"><?php echo $_smarty_tpl->getConfigVariable('members');?>
</a></li>
<li><a href="browse.php"><?php echo $_smarty_tpl->getConfigVariable('browse');?>
</a></li>
<li><a href="video.php"><?php echo $_smarty_tpl->getConfigVariable('videos');?>
</a></li>
<li><a href="toprated.php"><?php echo $_smarty_tpl->getConfigVariable('rated');?>
</a></li>
<li><a href="rsscat.php"><?php echo $_smarty_tpl->getConfigVariable('rssbycat');?>
</a></li>
<?php if (isset($_smarty_tpl->getVariable('startmenu',null,true,false)->value)){?>
<li><a href="#"><?php echo $_smarty_tpl->getConfigVariable('more');?>
 <?php echo $_smarty_tpl->getVariable('sitetitle')->value;?>
</a>
<ul>
<?php  $_smarty_tpl->tpl_vars['sm'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('startmenu')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['sm']->key => $_smarty_tpl->tpl_vars['sm']->value){
?>
<?php if ($_smarty_tpl->tpl_vars['sm']->value['active']==2){?>
<li><a href="<?php echo $_smarty_tpl->tpl_vars['sm']->value['valueopt'];?>
"><?php echo $_smarty_tpl->tpl_vars['sm']->value['nameopt'];?>
</a></li>
<?php }?>
<?php }} ?>
</ul>  
</li>
<?php }?>
<li style="float: right;"><a href="rss.php" target="_blank"><img style="padding: 0px" src="themes/<?php echo $_smarty_tpl->getVariable('themes')->value;?>
/styles/images/rss.gif" width="26px" height="14px" border="0" /></a></li>
</ul>
</div>