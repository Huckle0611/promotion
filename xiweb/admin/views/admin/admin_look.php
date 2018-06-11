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
<title>Home of Rest - 后台管理系统 - 管理员 - 查看帐号</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<?php $this->load->view('pub/public_css'); ?>
<!-- END GLOBAL MANDATORY STYLES -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
    <!-- BEGIN HEADER -->
    <?php $this->load->view('pub/header'); ?>
    <!-- END HEADER -->
	<!-- BEGIN CONTAINER -->   
	<div class="page-container row-fluid" >
            <!-- BEGIN SIDEBAR -->
            <?php $this->load->view('pub/left_nav'); ?>
            <!-- END SIDEBAR -->
            <!-- BEGIN PAGE -->
            <div class="page-content">                   
                <!-- BEGIN PAGE CONTAINER-->
                <div class="container-fluid">
                    <!-- BEGIN PAGE HEADER-->
                    <?php $this->load->view('pub/right_top'); ?>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption"><i class="icon-coffee"></i>查看帐号</div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>帐号</th>
                                                <th>创建日期</th>
                                                <th>登录时间</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($uinfo as $v): ?>
                                            <tr>
                                                <td><?php echo $v['id']; ?></td>
                                                <td><?php echo $v['uname']; ?></td>
                                                <td><?php echo $v['createtime']; ?></td>
                                                <td><?php echo $v['lastlogintime']; ?></td>
                                            </tr>	
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END SAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                    <!-- END PAGE CONTENT-->
                </div>
                <!-- END PAGE CONTAINER--> 
            </div>
            <!-- END PAGE -->    
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<?php $this->load->view('pub/footer'); ?>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<?php $this->load->view('pub/public_js'); ?>
	<!-- END CORE PLUGINS -->
	<script src="/data/admin/js/app.js"></script>      
	<script>
            jQuery(document).ready(function() {    
                App.init();
            });
	</script>
	<!-- END JAVASCRIPTS -->
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = '/data/admin/js/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>

</body>
<!-- END BODY -->
</html>