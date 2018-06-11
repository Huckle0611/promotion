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
<title>Home of Rest - 后台管理系统 - 登录</title>        
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
        <img src="/data/admin/imgs/logo-big.png" alt="" /> 
    </div>
    <!-- END LOGO -->

    <!-- BEGIN LOGIN -->
    <div class="content">

        <!-- BEGIN LOGIN FORM -->
        <form class="form-vertical login-form" method="post" action="/admin.php/login/enterAdmin">

            <h3 class="form-title">登录你的帐号</h3>
            <div class="alert alert-error hide">
                <button class="close" data-dismiss="alert"></button>
                <span>帐号或密码错误</span>
            </div>

            <div class="control-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">帐号</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="icon-user"></i>
                        <input class="m-wrap placeholder-no-fix" type="text" placeholder="帐号" name="username"/>
                    </div>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label visible-ie8 visible-ie9">密码</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="icon-lock"></i>
                        <input class="m-wrap placeholder-no-fix" type="password" placeholder="密码" name="password"/>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn green pull-right loginbtn">
                登录 <i class="m-icon-swapright m-icon-white"></i>
                </button>            
            </div>

        </form>
        <!-- END LOGIN FORM -->        

    </div>
    <!-- END LOGIN -->

    <!-- BEGIN COPYRIGHT -->
    <div class="copyright">2018 &copy; Home of Rest 后台管理系统</div>
    <!-- END COPYRIGHT -->

    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

    <!-- BEGIN CORE PLUGINS -->
    <?php $this->load->view('pub/public_js'); ?>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="/data/admin/js/jquery.validate.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/data/admin/js/app.js" type="text/javascript"></script>
    <script src="/data/admin/js/login.js" type="text/javascript" charset="gbk"></script> 
    <!-- END PAGE LEVEL SCRIPTS --> 

    <script>
    jQuery(document).ready(function(){
        App.init();
        Login.init();
    });
    </script>

    <script type="text/javascript">
    $(function(){
        $(document).keydown(function(event){
            if(event.keyCode==13){
                $(".loginbtn").click();
            }
        });
    });
    </script>
    <!-- END JAVASCRIPTS -->

<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = '/data/admin/js/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>
<!-- END BODY -->

</html>