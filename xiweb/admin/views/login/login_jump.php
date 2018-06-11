<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

	<meta charset="utf-8" />

	<title>Home of Rest - 后台管理系统 - 登录跳转</title>
        
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<!-- BEGIN GLOBAL MANDATORY STYLES -->

	<?php $this->load->view('pub/public_css'); ?>

	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->

	<link href="/data/admin/css/login.css" rel="stylesheet" type="text/css"/>

	<!-- END PAGE LEVEL STYLES -->

</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="login">

	<!-- BEGIN LOGO -->

	<div class="logo">

            <h3>
                帐号或密码错误，<b class="seconds">3</b>秒后返回
            </h3>
            <h4>
                或<a href="/admin.php">点击</a>跳转
            </h4>
                
	</div>

	<!-- END LOGO -->
	
        <script src="/data/admin/js/jquery-1.10.1.min.js" type="text/javascript"></script>
        
        <script type="text/javascript">
        $(function(){
            setTimeout("$('b.seconds').text(2)", 1000);
            setTimeout("$('b.seconds').text(1)", 2000);
            setTimeout("window.location.href='/admin.php'", 3000);
        });        
        </script>
        
</body>

<!-- END BODY -->

</html>