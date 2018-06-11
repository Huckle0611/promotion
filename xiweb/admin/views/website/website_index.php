<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8" />
<title>Home of Rest - 后台管理系统 - 网站设置</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<?php $this->load->view('pub/public_css'); ?>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES --> 
<link rel="stylesheet" type="text/css" href="/data/admin/css/bootstrap-fileupload.css" />
<link rel="stylesheet" type="text/css" href="/data/admin/css/jquery.gritter.css" />
<link rel="stylesheet" type="text/css" href="/data/admin/css/chosen.css" />
<link rel="stylesheet" type="text/css" href="/data/admin/css/select2_metro.css" />
<link rel="stylesheet" type="text/css" href="/data/admin/css/jquery.tagsinput.css" />
<link rel="stylesheet" type="text/css" href="/data/admin/css/clockface.css" />
<link rel="stylesheet" type="text/css" href="/data/admin/css/bootstrap-wysihtml5.css" />
<link rel="stylesheet" type="text/css" href="/data/admin/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="/data/admin/css/timepicker.css" />
<link rel="stylesheet" type="text/css" href="/data/admin/css/colorpicker.css" />
<link rel="stylesheet" type="text/css" href="/data/admin/css/bootstrap-toggle-buttons.css" />
<link rel="stylesheet" type="text/css" href="/data/admin/css/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="/data/admin/css/datetimepicker.css" />
<link rel="stylesheet" type="text/css" href="/data/admin/css/multi-select-metro.css" />
<link href="/data/admin/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
    <!-- BEGIN HEADER -->
    <?php $this->load->view('pub/header'); ?>
    <!-- END HEADER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
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
                <div class="row-fluid">
                    <div class="span12">
                        <!-- BEGIN SAMPLE FORM PORTLET-->   
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption"><i class="icon-reorder"></i>网站设置</div>
                                <div class="tools"></div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form action="" class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label">网站名称</label>
                                        <div class="controls">
                                            <input type="text" class="span6 m-wrap webname" name="webname" value="<?php echo (!empty($website['webname']))?$website['webname']:''; ?>" />
                                            <span class="help-inline webnameerror hide">长度不可超过100位</span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">网站域名</label>
                                        <div class="controls">
                                            <input type="text" class="span6 m-wrap weburl" name="weburl" value="<?php echo (!empty($website['weburl']))?$website['weburl']:''; ?>" />
                                            <span class="help-inline weburlerror hide">长度不可超过100位</span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">网站短域名</label>
                                        <div class="controls">
                                            <input type="text" class="span6 m-wrap webshorturl" name="webshorturl" value="<?php echo (!empty($website['webshorturl']))?$website['webshorturl']:''; ?>" />
                                            <span class="help-inline webshorturlerror hide">长度不可超过100位</span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">网站关键字</label>
                                        <div class="controls">
                                            <input type="text" class="span6 m-wrap keyword" name="keyword" value="<?php echo (!empty($website['keyword']))?$website['keyword']:''; ?>" />
                                            <span class="help-inline keyworderror hide">长度不可超过100位</span>
                                        </div>
                                    </div>  
                                    <div class="control-group">
                                        <label class="control-label">网站描述</label>
                                        <div class="controls">
                                            <textarea class="span6 m-wrap descrip" rows="3" name="descrip"><?php echo (!empty($website['descrip']))?$website['descrip']:''; ?></textarea>
                                            <span class="help-inline descriperror hide">长度不可超过200位</span>
                                        </div>
                                    </div>  
                                    <div class="control-group">
                                        <label class="control-label">地址</label>
                                        <div class="controls">
                                            <textarea class="span6 m-wrap address" rows="3" name="address"><?php echo (!empty($website['address']))?$website['address']:''; ?></textarea>
                                            <span class="help-inline addresserror hide">长度不可超过200位</span>
                                        </div>
                                    </div>  
                                    <div class="control-group">
                                        <label class="control-label">电话</label>
                                        <div class="controls">
                                            <input type="text" class="span6 m-wrap phone" name="phone" value="<?php echo (!empty($website['phone']))?$website['phone']:''; ?>" />
                                            <span class="help-inline phoneerror hide">长度不可超过200位</span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">邮箱</label>
                                        <div class="controls">
                                            <input type="text" class="span6 m-wrap email" name="email" value="<?php echo (!empty($website['email']))?$website['email']:''; ?>" />
                                            <span class="help-inline emailerror hide">长度不可超过200位</span>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="button" class="btn blue websitebtn">提交</button>                        
                                    </div>
                                </form>
                                <!-- END FORM-->       
                            </div>
                        </div>
                        <!-- END SAMPLE FORM PORTLET-->
                    </div>
                </div>
                
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
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script type="text/javascript" src="/data/admin/js/ckeditor.js"></script>  
    <script type="text/javascript" src="/data/admin/js/bootstrap-fileupload.js"></script>
    <script type="text/javascript" src="/data/admin/js/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="/data/admin/js/select2.min.js"></script>
    <script type="text/javascript" src="/data/admin/js/wysihtml5-0.3.0.js"></script> 
    <script type="text/javascript" src="/data/admin/js/bootstrap-wysihtml5.js"></script>
    <script type="text/javascript" src="/data/admin/js/jquery.tagsinput.min.js"></script>
    <script type="text/javascript" src="/data/admin/js/jquery.toggle.buttons.js"></script>
    <script type="text/javascript" src="/data/admin/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="/data/admin/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="/data/admin/js/clockface.js"></script>
    <script type="text/javascript" src="/data/admin/js/date.js"></script>
    <script type="text/javascript" src="/data/admin/js/daterangepicker.js"></script> 
    <script type="text/javascript" src="/data/admin/js/bootstrap-colorpicker.js"></script>  
    <script type="text/javascript" src="/data/admin/js/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="/data/admin/js/jquery.inputmask.bundle.min.js"></script>   
    <script type="text/javascript" src="/data/admin/js/jquery.input-ip-address-control-1.0.min.js"></script>
    <script type="text/javascript" src="/data/admin/js/jquery.multi-select.js"></script>   
    <script src="/data/admin/js/bootstrap-modal.js" type="text/javascript" ></script>
    <script src="/data/admin/js/bootstrap-modalmanager.js" type="text/javascript" ></script>  
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/data/admin/js/app.js"></script>
    <script src="/data/admin/js/form-components.js"></script>           
    <!-- END PAGE LEVEL SCRIPTS -->  
    <script>
    jQuery(document).ready(function() {       
       // initiate layout and plugins
       App.init();
       FormComponents.init();
    });
    </script>
    <script type="text/javascript">
    function checkText(him, vals, classname, num)
    {
        if(vals.length>num)
        {
            him.parents('form').find('.'+classname+'error').removeClass('hide');                 
            return false;
        }
    }

    $(function(){
        $('.websitebtn').click(function(){
            var him=$(this);
            him.parents('form').find('.help-inline').addClass('hide');
            
            var webname=him.parents('form').find('.webname').val();
            var weburl=him.parents('form').find('.weburl').val();
            var webshorturl=him.parents('form').find('.webshorturl').val();            
            var keyword=him.parents('form').find('.keyword').val();
            var descrip=him.parents('form').find('.descrip').val();
            var address=him.parents('form').find('.address').val();
            var phone=him.parents('form').find('.phone').val();
            var email=him.parents('form').find('.email').val();                        
                                    
            checkText(him, webname, 'webname', 100);
            checkText(him, weburl, 'weburl', 100);
            checkText(him, webshorturl, 'webshorturl', 100);
            checkText(him, keyword, 'keyword', 100);
            checkText(him, descrip, 'descrip', 200);
            checkText(him, address, 'address', 200);
            checkText(him, phone, 'phone', 200);
            checkText(him, email, 'email', 200);
                   
            var formdata=him.parents('form').serialize();
            $.ajax({
                type: "POST",
                url: "/admin.php/website/getdata",
                data: formdata,
                dataType: "json",
                success: function(data){
                    if(data.status===1)
                    {
                        window.location.reload();
                    }
                    if(data.status===0)
                    {
                        alert(data.msg);
                    }
                }
            });
        });
        
    });
    </script>

    <!-- END JAVASCRIPTS -->
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = '/data/admin/js/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>

</body>
<!-- END BODY -->
</html>