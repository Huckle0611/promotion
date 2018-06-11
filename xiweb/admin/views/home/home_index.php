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
<title>Home of Rest - 后台管理系统 - 首页</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<?php $this->load->view('pub/public_css'); ?>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES --> 
<link href="/data/admin/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
<link href="/data/admin/css/daterangepicker.css" rel="stylesheet" type="text/css" />
<link href="/data/admin/css/fullcalendar.css" rel="stylesheet" type="text/css"/>
<link href="/data/admin/css/jqvmap.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/data/admin/css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
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
                <div id="dashboard">
                    <!-- BEGIN DASHBOARD STATS -->
                    <div class="row-fluid">
                        <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                            <div class="dashboard-stat blue">
                                <div class="visual">
                                    <i class="icon-user"></i>
                                </div>
                                <div class="details">
                                    <div class="number"><?php echo $num['adminnum']; ?></div>
                                    <div class="desc">管理员</div>
                                </div>
                                <a class="more" href="/admin.php/admin/look">
                                显示更多 <i class="m-icon-swapright m-icon-white"></i>
                                </a>                 
                            </div>
                        </div>
                        <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                            <div class="dashboard-stat green">
                                <div class="visual">
                                    <i class="icon-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number"><?php echo $num['catenum']; ?></div>
                                    <div class="desc">分类管理</div>
                                </div>
                                <a class="more" href="/admin.php/cate/lists">
                                View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>                 
                            </div>
                        </div>
                        <div class="span3 responsive" data-tablet="span6  fix-offset" data-desktop="span3">
                            <div class="dashboard-stat purple">
                                <div class="visual">
                                    <i class="icon-globe"></i>
                                </div>
                                <div class="details">
                                    <div class="number"><?php echo $num['productnum']; ?></div>
                                    <div class="desc">产品管理</div>
                                </div>
                                <a class="more" href="/admin.php/data/lists?tname=products">
                                View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>                 
                            </div>
                        </div>
                        <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                            <div class="dashboard-stat yellow">
                                <div class="visual">
                                    <i class="icon-bar-chart"></i>
                                </div>
                                <div class="details">
                                    <div class="number"><?php echo $num['contactnum']; ?></div>
                                    <div class="desc">留言内容</div>
                                </div>
                                <a class="more" href="/admin.php/contact/index">
                                View more <i class="m-icon-swapright m-icon-white"></i>
                                </a>                 
                            </div>
                        </div>
                    </div>
                    <!-- END DASHBOARD STATS -->
                    <div class="clearfix"></div>
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
    <script src="/data/admin/js/jquery.vmap.js" type="text/javascript"></script>   
    <script src="/data/admin/js/jquery.vmap.russia.js" type="text/javascript"></script>
    <script src="/data/admin/js/jquery.vmap.world.js" type="text/javascript"></script>
    <script src="/data/admin/js/jquery.vmap.europe.js" type="text/javascript"></script>
    <script src="/data/admin/js/jquery.vmap.germany.js" type="text/javascript"></script>
    <script src="/data/admin/js/jquery.vmap.usa.js" type="text/javascript"></script>
    <script src="/data/admin/js/jquery.vmap.sampledata.js" type="text/javascript"></script>  
    <script src="/data/admin/js/jquery.flot.js" type="text/javascript"></script>
    <script src="/data/admin/js/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="/data/admin/js/jquery.pulsate.min.js" type="text/javascript"></script>
    <script src="/data/admin/js/date.js" type="text/javascript"></script>
    <script src="/data/admin/js/daterangepicker.js" type="text/javascript"></script>     
    <script src="/data/admin/js/jquery.gritter.js" type="text/javascript"></script>
    <script src="/data/admin/js/fullcalendar.min.js" type="text/javascript"></script>
    <script src="/data/admin/js/jquery.easy-pie-chart.js" type="text/javascript"></script>
    <script src="/data/admin/js/jquery.sparkline.min.js" type="text/javascript"></script>  
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/data/admin/js/app.js" type="text/javascript"></script>
    <script src="/data/admin/js/index.js" type="text/javascript"></script>        
    <!-- END PAGE LEVEL SCRIPTS -->  
    <script>
    jQuery(document).ready(function() {    
        App.init(); // initlayout and core plugins
        Index.init();
        Index.initJQVMAP(); // init index page's custom scripts
        Index.initCalendar(); // init index page's custom scripts
        Index.initCharts(); // init index page's custom scripts
        Index.initChat();
        Index.initMiniCharts();
        Index.initDashboardDaterange();
        Index.initIntro();
    });
    </script>
    <!-- END JAVASCRIPTS -->
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = '/data/admin/js/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>

</body>
<!-- END BODY -->
</html>