	<div id="top">
		<p id="top_title"><?php echo $images['title']?></p>
	</div>
	<div id="main">
	<div id="content">
		<div id="detail">
			<?php echo $images['content'];?>
		</div>
	</div>
	<div id="message">
		<p id="message_title">留言板</p>
		<div id="message_textarea">
		<?php echo form_open('customer/Customer_activity/create_top_activity_message/' . $images['activity_id'])?>
		<textarea  name="top_activity_message" rows="10" cols="100"></textarea><?php echo form_error('top_activity_message')?>
		<p>
			<span >
			<input type="hidden" name="top_activity_message_hidden" value="top_activity_message_hidden"/>
			<input class="redbutton" type="submit" value = "留言">
			</span>
			<div class="clear"></div>
		</p>
		<?php echo form_close()?>
		</div>
		<hr>
		<div id="message_box">
			<?php 
			if(isset($contents) && count($contents))
			{
				?>
			<?php 
				foreach ($contents as $content)
				{		
			?>	<div class="message_content">
				<p style="color:#ed1b24;"><?php echo $content['name']?>：     <?php echo $content['content']?></p><p align="right" style= "font-size: 14px;color: #0099CC"><?php echo date('Y年m月d日  H:i:s ',$content['date'])?></p>
				<p>
					【花·时间儿童摄影】：<?php echo $content['reply'];?>
				</p>
				<p align="right" style= "font-size: 14px;color: #0099CC"><?php echo date('Y年m月d日  H:i:s ',$content['reply_date'])?></p>
				<br>
					<p></p>
			<div class="clear"></div>
			</div>
			<br>
				<?php 
				}?>
			
			<?php }?>
		</div>
	</div>

	</div>
