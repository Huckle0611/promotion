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
<title>Home of Rest - 后台管理系统 - 管理员 - 修改帐号</title>
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
                                    <span class="hidden-480">修改帐号</span>
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
                                                    <label class="control-label">帐号</label>
                                                    <div class="controls">
                                                        <input type="text" placeholder="<?php echo $this->session->uinfo['uname']; ?>" class="m-wrap small uname" name="username" />
                                                        <span class="help-inline helpalert">帐号只能由“字母”组成，且长度只能大于5位小于16位！</span>
                                                        <span class="help-inline erroralert1 hide">新帐号不可为空！</span>
                                                        <span class="help-inline erroralert2 hide">新帐号格式不正确！</span>
                                                        <span class="help-inline erroralert3 hide">新帐号长度不合格！</span>
                                                        <span class="help-inline returnalert hide"></span>
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
        var username=$('.uname').val();
        if(username==='')
        {
            $('.helpalert').addClass('hide');
            $('.erroralert1').removeClass('hide');
            return false;
        }
        var sexp = /[a-z]$/;
        if(!sexp.test(username))
        {
            $('.helpalert').addClass('hide');
            $('.erroralert2').removeClass('hide');
            return false;
        }
        if(username.length<5 || username.length>16)
        {
            $('.helpalert').addClass('hide');
            $('.erroralert3').removeClass('hide');
            return false;
        }
        
        $.ajax({
            type: "POST",
            url: "/admin.php/admin/geteditinfo",
            data: "username="+username,
            dataType: "json",
            success: function(data){
                $('.help-inline').addClass('hide');
                if(data.status===1)
                {
                    $('.uname').text(data.username);
                    $('.returnalert').text(data.msg);
                    $('.returnalert').removeClass('hide');
                }
                if(data.status===0)
                {
                    $('.returnalert').text(data.msg);
                    $('.returnalert').removeClass('hide');
                }
            }
        });        
    });
});
</script>

</body>
<!-- END BODY -->
</html>