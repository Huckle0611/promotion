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
<title>Home of Rest - 后台管理系统 - 管理员 - 修改密码</title>
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
                        <!-- BEGIN SAMPLE FORM PORTLET-->   
                        <div class="portlet box blue tabbable">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-reorder"></i>
                                    <span class="hidden-480">修改密码</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="tabbable portlet-tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab">EDIT</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="portlet_tab1">
                                            <!-- BEGIN FORM-->
                                            <form action="" class="form-horizontal">
                                                <div class="control-group">
                                                    <label class="control-label">新密码</label>
                                                    <div class="controls">
                                                        <input type="password" class="m-wrap medium pwd" />
                                                        <span class="help-inline pwderror hide">密码长度为6到16位！</span>
                                                        <span class="help-inline pwdreturn hide"></span>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">重复新密码</label>
                                                    <div class="controls">
                                                        <input type="password" class="m-wrap medium confirmpwd" />
                                                        <span class="help-inline confirmpwderror hide">重复新密码必须与新密码相同！</span>
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <button type="button" class="btn blue editinfobtn"><i class="icon-ok"></i> 保存</button>
                                                    <button type="reset" class="btn">取消</button>
                                                </div>
                                            </form>
                                            <!-- END FORM-->  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END SAMPLE FORM PORTLET-->
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

<script type="text/javascript">
$(function(){
    $('.editinfobtn').click(function(){
        var pwd=$('.pwd').val();
        var confirmpwd=$('.confirmpwd').val();        
        if(pwd.length<6 || pwd.length>16)
        {
            $('.pwderror').removeClass('hide');
            return false;
        }
        if(confirmpwd!==pwd)
        {
            $('.confirmpwderror').removeClass('hide');
            return false;
        }
        
        $.ajax({
            type: "POST",
            url: "/admin.php/admin/geteditpwd",
            data: "password="+pwd,
            dataType: "json",
            success: function(data){
                $('.help-inline').addClass('hide');
                $('.pwdreturn').text(data.msg);
                $('.pwdreturn').removeClass('hide');
            }
        });
    });
});
</script>

</body>
<!-- END BODY -->
</html>