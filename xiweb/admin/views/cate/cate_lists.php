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
<title>Home of Rest - 后台管理系统 - 分类管理 - 分类列表</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<?php $this->load->view('pub/public_css'); ?>
<!-- END GLOBAL MANDATORY STYLES -->
<link href="/data/admin/css/jquery.nestable.css" rel="stylesheet" type="text/css"/>
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
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption"><i class="icon-comments"></i>分类列表</div>                                                            
                            </div>
                            <div class="portlet-body ">
                                <div class="dd" id="nestable_list_1">
                                    <ol class="dd-list">
                                        <?php foreach($cate as $k => $v): ?>
                                        <li class="dd-item" data-id="<?php echo $k; ?>">
                                            <div class="dd-handle">
                                                <?php echo $v['catename']; ?>&nbsp;&nbsp;<a href="/admin.php/cate/edit?firstid=<?php echo $k; ?>">修改</a>
                                            </div>
                                            <?php if(!empty($v['son'])){ ?>
                                            <ol class="dd-list">                                                        
                                            <?php foreach($v['son'] as $key => $val): ?>
                                                <li class="dd-item" data-id="<?php echo $key; ?>">
                                                    <div class="dd-handle">
                                                        <?php echo $val['catename']; ?>
                                                        &nbsp;&nbsp;<a href="/admin.php/cate/edit?pid=<?php echo $k; ?>&secondid=<?php echo $key; ?>">修改</a>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>                                                        
                                            </ol>
                                            <?php } ?>
                                        </li>
                                        <?php endforeach; ?>                                                    
                                    </ol>
                                </div>
                            </div>
                        </div>
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

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/data/admin/js/jquery.nestable.js"></script>  
    <!-- END PAGE LEVEL SCRIPTS -->     
    <script src="/data/admin/js/ui-nestable.js"></script> 

    <script src="/data/admin/js/app.js"></script>      
    <script>
        jQuery(document).ready(function() {    
            App.init();
            UINestable.init();
        });
    </script>
    <!-- END JAVASCRIPTS -->
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = '/data/admin/js/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>

</body>
<!-- END BODY -->
</html>