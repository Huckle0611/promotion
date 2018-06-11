<html class=" js no-touch cssanimations csstransitions" style="" lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php echo $this->aWebsite['webname']; ?> - <?php if($this->contro_name=='home'){ echo '首页';}if($this->contro_name=='products'){ echo '产品展示';}if($this->contro_name=='news'){ echo '新闻中心';}if($this->contro_name=='contact'){ echo '联系我们';} ?></title>
<meta name="keywords" content="<?php echo $this->aWebsite['keyword']; ?>">
<meta name="description" content="<?php echo $this->aWebsite['descrip']; ?>">
<!-- Styles -->
<link type="text/css" rel="stylesheet" href="/data/css/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="/data/css/pe-icon-7-stroke.css" />
<link type="text/css" rel="stylesheet" href="/data/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="/data/css/animate.min.css" />
<link type="text/css" rel="stylesheet" href="/data/css/animations.css" />
<link type="text/css" rel="stylesheet" href="/data/css/owl.carousel.css" />
<link type="text/css" rel="stylesheet" href="/data/css/style-red.css" id="style-color" />
<!-- Js -->
<script src="/data/js/modernizr.custom.js"></script>
<script src="/data/js/jquery-2.1.3.min.js"></script>
</head>
<body>

<!-- NAVIGATION -->
<nav role="navigation" class="activ"> 
    <!-- Logo --> 
    <a href="/" class="logo logo-img"> <img src="/data/imgs/logo-euforia-white.png" class="img-responsive" alt="promotion"> </a> 
    <!-- end: Logo --> 
    <!-- Menu -->
    <div class="navi-scroll">
        <div class="navi-col">
            <ul class="menu">
                <li><a class="page-link <?php if($this->contro_name=='home'){ echo 'active';} ?>" href="/index.php/home/index"><span data-hover="网站首页">网站首页</span><i class="fa fa-home"></i></a></li>
                <li><a class="page-link <?php if($this->contro_name=='products'){ echo 'active';} ?>" href="/index.php/products/index"><span data-hover="产品展示">产品展示</span><i class="fa fa-picture-o"></i></a></li>
                <li><a class="page-link <?php if($this->contro_name=='news'){ echo 'active';} ?>" href="/index.php/news/index"><span data-hover="新闻中心">新闻中心</span><i class="fa fa-pencil"></i></a></li>
                <li><a class="page-link <?php if($this->contro_name=='contact'){ echo 'active';} ?>" href="/index.php/contact/index"><span data-hover="联系我们">联系我们</span> <i class="fa fa-phone"></i></a></li>
            </ul>
        </div>
        <!-- .navi-col --> 
    </div>
    <!-- .navi-scroll --> 
    <!-- end: Menu -->
    <footer class="hidden-sm">
        <ul class="social-icons">
            <li><a href="#" data-toggle="tooltip" data-placement="top" title="微博"><i class="fa fa-weibo"></i></a></li>
            <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="微信"><i class="fa fa-weixin"></i></a></li>
            <li><a href="#" data-toggle="tooltip" data-placement="top" title="QQ"><i class="fa fa-qq"></i></a></li>
            <li><a href="#" data-toggle="tooltip" data-placement="top" title="人人网"><i class="fa fa-renren"></i></a></li>
        </ul>
        <div class="copyright"></div>
    </footer>
</nav>
<!-- end: NAVIGATION --> 

<!-- PAGE-WRAPPER -->
<div class="page-wrapper"> 