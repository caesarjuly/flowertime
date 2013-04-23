<div id="main_zone">
    <table width="99%" border="0" align="center"  cellpadding="3" cellspacing="1" class="table_style">
    <tr>
      <td class="left_title_2">订购者姓名：</td>
      <td >&nbsp;&nbsp;&nbsp;<?php echo $contents['customer_name']?></td>
    </tr>
    <tr>
      <td class="left_title_1">孩子姓名：</td>
      <td>&nbsp;&nbsp;&nbsp;<?php echo $contents['kid_name']?></td>
    </tr>
    <tr>
      <td class="left_title_2">生日：</td>
      <td>&nbsp;&nbsp;&nbsp;<?php echo $contents['birthday']?></td>
    </tr>
    <tr>
      <td class="left_title_1">Email：</td>
      <td>&nbsp;&nbsp;&nbsp;<?php echo $contents['email']?></td>
    </tr>
    <tr>
      <td class="left_title_2">套系：</td>
      <td>&nbsp;&nbsp;&nbsp;<?php echo $contents['series_name']?></td>
    </tr>
    <tr>
      <td class="left_title_1">手机号：</td>
      <td>&nbsp;&nbsp;&nbsp;<?php echo $contents['telephone1']?></td>
    </tr>
    <tr>
      <td class="left_title_2">备用手机号：</td>
      <td>&nbsp;&nbsp;&nbsp;<?php echo $contents['telephone2']?></td>
    </tr>
    <?php if($contents['charge'] == 1)
    {?>
    <tr>
      <td class="left_title_1">是否付款：</td>
      <td>&nbsp;&nbsp;&nbsp;<font color = "red"><?php 
      	echo "是";
     ?></font></td>
    </tr>
    <?php }
    else {?>
    <tr>
      <td class="left_title_1">是否付款：</td>
      <td>&nbsp;&nbsp;&nbsp;<font color = "red"><?php 
      	echo "否";
     ?></font></td>
    </tr>
    <?php }?>
    <?php if($contents['check'] == 1)
    {?>
    <tr>
      <td class="left_title_2">是否确认付款：</td>
      <td>&nbsp;&nbsp;&nbsp;<font color = "red"><?php 
      	echo "是";
     ?></font></td>
    </tr>
    <?php }
    else {?>
    <tr>
      <td class="left_title_2">是否确认付款：</td>
      <td>&nbsp;&nbsp;&nbsp;<font color = "red"><?php 
      	echo "否";
     ?></font></td>
    </tr>
    <?php }?>
    
    <?php if($contents['is_closed'] == 1)
    {?>
    <tr>
      <td class="left_title_2">是否关闭订单：</td>
      <td>&nbsp;&nbsp;&nbsp;<font color = "red"><?php 
      	echo "是";
     ?></font></td>
    </tr>
    <?php }
    else {?>
    <tr>
      <td class="left_title_2">是否关闭订单：</td>
      <td>&nbsp;&nbsp;&nbsp;<font color = "red"><?php 
      	echo "否";
     ?></font></td>
    </tr>
    <?php }?>
  	</table>
  	<br>