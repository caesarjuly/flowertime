<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理员页面</title>
	<link media="all" rel="stylesheet" href="<?php echo base_url();?>css/common.css" type="text/css" />
	<script charset="utf-8" src="<?php echo base_url();?>kindeditor/kindeditor-min.js"></script>
		<script charset="utf-8" src="<?php echo base_url();?>kindeditor/lang/zh_CN.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>

<script type="text/javascript">
$(function(){
$(".list_title").click(function(){

$(".list_detail").slideToggle(500);

});
});
</script>
<script>
function openWin()
{
	window.open ("<?php echo base_url();?>");
}
</script>
</head>

<body>
	<div class="header_content">
     <div class="logo">
	 <img src="<?php echo base_url();?>images/login_title.gif" alt="花·时间管理中心" />
	 </div>
	 <div class="right_nav">
		<ul class="nav_return">
		<li><img src="<?php echo base_url();?>images/return.gif" width="13" height="21" />&nbsp;返回 [ 
		<a href="#" onclick="openWin()">网站首页</a>|  
		<?php echo anchor('http://blog.sina.com.cn/flowertime527','新浪博客')?> |</li>
		<li> <?php echo  anchor('http://weibo.com/flowertime527','新浪微博')?>]&nbsp;&nbsp;</li>
		</ul>
		</div>
	 <div class="clear">
	 </div>
	 </div>
	<table>
	<tr>
	<td  valign="top">
	 <div id="left_content">
     <div id="user_info">欢迎您，<strong><?php echo $this->session->userdata('name');?></strong><br />[<a href="#">系统管理员</a>，<?php echo anchor('admin/Admin_index/logout','退出')?>]</div>
	 <div id="main_nav">
		<div id="right_main_nav">
		<div class="toggle">
<dl>
		