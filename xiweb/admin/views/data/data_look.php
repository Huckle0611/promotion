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
<title>Home of Rest - 后台管理系统 - 数据查看</title>
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
                        <div class="portlet box blue tabbable">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-table"></i>
                                    <span class="hidden-480">数据查看</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="tabbable portlet-tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a onclick="javascript:history.go(-1);" data-toggle="tab">返回</a></li>
                                    </ul>
                                    
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                        <form action="" class="form-horizontal">
                                            <div class="control-group">
                                                <label class="control-label">标题</label>
                                                <div class="controls">
                                                    <span class="help-inline"><?php echo $data['title']; ?></span>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">创建时间</label>
                                                <div class="controls">
                                                    <span class="help-inline"><?php echo $data['createtime']; ?></span>
                                                </div>
                                            </div>          
                                            <div class="control-group">
                                                <label class="control-label">更新时间</label>
                                                <div class="controls">
                                                    <span class="help-inline"><?php echo $data['updatetime']; ?></span>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">图片</label>
                                                <?php foreach($data['imgs'] as $v){ ?>
                                                <div class="controls">
                                                    <span class="help-inline">
                                                        <img width="600" src="/data/upload/<?php echo $data['tname']; ?>/<?php echo $data['createdate']; ?>/<?php echo $v['imgname']; ?>" />
                                                    </span>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">正文</label>
                                                <div class="controls">
                                                    <?php echo $data['content']; ?>
                                                </div>
                                            </div>
                                        </form>    
                                        </div>
                                    </div>                                    
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