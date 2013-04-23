<script type="text/javascript">
 function check(){
  if(form1.name.value==""){
   alert("请输入会员姓名");
   return false;
  }
 }
 </script>		
<?php $this->load->view('admin/include/message_nav.php'); ?>
<script type="text/javascript">
$(function(){
$(".toggle dl dt").click(function(){
$(".toggle dl dd").not($(this).next()).hide();
$(".toggle dl dt").not($(this).next()).removeClass("current");
$(this).next().slideToggle(500);
$(this).toggleClass("current");
});
});
</script>
	<div id="main_zone">
	<p class="title">您可以搜索所有留言：</p>
	<ul class="notice">
		<li>直接根据会员名搜索就可以了</li>
	</ul>
	<ul class="sorttype">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
	<br>
	<ul class="sorttype">
	<li>输入会员姓名：</li>
	<form name = "form1" action = "search_message" method = "post" onsubmit = "return check()">
	<li><input type="TEXT" name ="name"></li>
	<li><input type="submit" value = "提交"></li>
	</ul>

	<table class="sort">
	
	<tr>
	<th >用户</th>
	<th >内容</th>
	<th >时间</th>
	<th>是否回复</th>
	<th>操作</th>
	</tr>
	<?php if(isset($contents) && count($contents))
		{
			foreach ($contents as $content)
			{		
		?>
		<tr>
		<td><?php echo preg_replace("/($name)/i","<font color='red'><b>\\1</b></font>", $content['customer_name'])?></td>
		<td><?php echo $content['content'] ?></td>
		<td><?php echo date('Y年m月d日  H:i:s ',$content['date'])?></td>
		<?php if($content['reply'] == NULL)
		{
		?>
		<td><?php echo "未回复"?>
		<td><?php echo anchor('admin/Admin_message/reply_message_view/' . $content['message_id'],'回复')?>|<?php echo anchor('admin/Admin_message/delete_message/' . $content['message_id'],'删除')?></td>
		<?php
		}
		else 
		{
		?>
		<td><?php echo "已回复"?>
		<td><?php echo anchor('admin/Admin_message/edit_message_view/' . $content['message_id'],'编辑')?>|<?php echo anchor('admin/Admin_message/delete_reply_message/' . $content['message_id'],'删除')?></td>
		<?php }?>
		</tr>
		<?php 
			}
		}
		?>
	</table>	</div>


   	</div>
