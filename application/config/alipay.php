<?php
//合作身份者ID，以2088开头的16位纯数字
$config['partner']		= "2088302219131648";

//安全检验码，以数字和字母组成的32位字符
$config['key']   			= "nvqzszzg9y7mxna4h3qa3mfmes4id77o";

//签约支付宝账号或卖家支付宝帐户
$config['seller_email']	= "251138775@qq.com";

//交易过程中服务器通知的页面 要用 http://格式的完整路径，不允许加?id=123这类自定义参数
$config['notify_url']		= "";

//付完款后跳转的页面 要用 http://格式的完整路径，不允许加?id=123这类自定义参数
$config['return_url']		= "http://127.0.0.1/flowertime/customer/Customer_pay/pay";

//网站商品的展示地址，不允许加?id=123这类自定义参数
$config['show_url']		= "http://127.0.0.1/flowertime/customer/Customer_charge";

//收款方名称，如：公司名称、网站名称、收款人姓名等
$config['mainname']		= "花时间摄影工作室";

//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
//$config['total_fee']    = 1;	//订单总金额，显示在支付宝收银台里的“应付总额”里

//签名方式 不需修改
$config['sign_type']		= "MD5";

//字符编码格式 目前支持 GBK 或 utf-8
$config['_input_charset']	= "utf-8";

//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
$config['transport']		= "http";

?>
