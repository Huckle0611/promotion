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
<title>Home of Rest | 后台管理 - 锁定屏幕</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<?php $this->load->view('pub/public_css'); ?>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="/data/admin/css/lock.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body>
<div class="page-lock">
    <div class="page-logo">
        <a class="brand" href="/admin/login/index">
        <img src="/data/admin/imgs/logo-big.png" alt="logo" />
        </a>
    </div>
    <div class="page-body">
        <img class="page-lock-img" src="/data/admin/imgs/profile.jpg" alt="">
        <div class="page-lock-info">
            <h1><?php echo $uname; ?></h1>
            <span>Locked</span>
            <form class="form-search loginform">
                <div class="input-append">
                    <input type="hidden" class="uname" name="username" value="<?php echo $uname; ?>" />
                    <input type="password" class="m-wrap pword" name="password" placeholder="密码">
                    <button type="button" class="btn blue icn-only loginbtn"><i class="m-icon-swapright m-icon-white"></i></button>
                </div>
                <div class="relogin hide">
                    <span>密码不正确！</span>
                </div>
            </form>
        </div>
    </div>
    <div class="page-footer">
        2017 &copy; Home of Rest 后台管理系统
    </div>
</div>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<?php $this->load->view('pub/public_js'); ?>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/data/admin/js/jquery.backstretch.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->   
<script src="/data/admin/js/app.js"></script>  
<script src="/data/admin/js/lock.js"></script>      
<script>
jQuery(document).ready(function() {    
   App.init();
   Lock.init();
});
</script>
<script type="text/javascript">
$(function(){
    
    $(document).keydown(function(event){
        if(event.keyCode==13){
            $('.pword').next().focus();
            $(".loginbtn").click();
        }
    });

    $('.loginbtn').click(function(){
        var pword=$(this).parent().find('.pword').val();
        if(pword=="" || pword.length<6 || pword.length>16)
        {
            $(this).parents('.loginform').find('.relogin').removeClass('hide');
            return false;
        }
        
        var formdata=$(this).parents('form').serialize();
        $.ajax({
            type: "POST",
            url: "/admin.php/login/unlocked",
            data: formdata,
            dataType: "json",
            success: function(data){
                if(data.status===1)
                {
                    window.location.href="javascript:history.go(-1);";
                }
                if(data.status===0)
                {
                    $('.relogin').removeClass('hide');
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