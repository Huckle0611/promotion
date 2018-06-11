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
<title>Home of Rest - 后台管理系统 - 分类管理 - 修改分类</title>
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
                                    <span class="hidden-480">修改分类</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="tabbable portlet-tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab">EDIT</a></li>
                                    </ul>
                                    <div class="tab-content">                                                    
                                        <?php if(!empty($first['firstid'])){ ?>
                                        <div class="tab-pane active" id="portlet_tab1">
                                            <!-- BEGIN FORM-->
                                            <form action="" class="form-horizontal">    
                                            <div class="control-group">
                                                <label class="control-label">分类名称</label>
                                                <div class="controls">
                                                    <input type="text" class="m-wrap medium catename" name="catename" placeholder="<?php echo $first['catename']; ?>" />
                                                    <span class="help-inline firsterror"></span>
                                                </div>
                                            </div> 

                                            <div class="form-actions">
                                                <input type="hidden" name="firstid" value="<?php echo $first['firstid']; ?>" />
                                                <button type="button" class="btn blue firstbtn"><i class="icon-ok"></i> 保存</button>                                                                    
                                            </div>
                                            </form>
                                            <!-- END FORM-->  
                                        </div>   
                                        <?php }else{ ?>
                                        <div class="tab-pane active">
                                            请进入<a href="/admin.php/cate/lists">分类列表</a>进行修改
                                        </div>         
                                        <?php } ?>
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
    $('.firstbtn').click(function(){
        $(this).parents('form').find('.firsterror').text('');
        var catename=$(this).parents('form').find('.catename').val();
        if(!catename.match(/^[\u4e00-\u9fa5]+$/))
        {
            $(this).parents('form').find('.firsterror').text('只能为中文！');
            return false;
        }
        if(catename.length>20)
        {
            $(this).parents('form').find('.firsterror').text('长度不可大于10位！');
            return false;
        }
        
        var formdata=$(this).parents('form').serialize();
        $.ajax({
            type: "POST",
            url: "/admin.php/cate/getfirstedit",
            data: formdata,
            dataType: "json",
            success: function(data){
                if(data.status===1)
                {
                    window.location.href="/admin.php/cate/lists";
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

</body>
<!-- END BODY -->
</html>