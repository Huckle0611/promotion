
<?php $this->load->view('pub/header'); ?>

<!-- BLOG Section -->
<section id="blog" class="section-current">
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <header>
                    <h3>新闻中心<small>News Center</small></h3>
                    <h5>我们致力于打造一个优秀的学习平台</h5>
                </header>
                <div class="blog-masonry">
                    <div class="item-sizer"></div>
                    <?php foreach($aDataList as $k => $v){ ?>
                    <div class="item">
                        <div class="blog-box anim-shadow">
                            <div class="blog-box-img"> <img src="/data/upload/news/<?php echo $v['ymd']; ?>/<?php echo $v['imgname']; ?>" alt="" class="img-responsive"> </div>
                            <div class="blog-box-caption">
                                <h5 class="title"><font color="red"><?php echo $v['title']; ?></font></h5>
                                <p> <?php echo mb_substr(strip_tags($v['content']),0,50,"UTF8"); ?>... <a class="ajax-loader page-sublink" href="/index.php/news/info?id=<?php echo $v['id']; ?>">查看更多</a> </p>
                            </div>
                            <!-- .blog-box-caption -->
                            <div class="blog-box-footer"> <span class="autor"><?php echo $v['author']; ?></span> <span class="separator">|</span> <span class="date"><i class="fa fa-fw fa-clock-o"></i><?php echo $v['date']; ?></span> </div>
                            <!-- .blog-box-footer --> 
                        </div>
                        <!-- .blog-box --> 
                    </div>
                    <?php } ?>
                    <!-- .item -->                        
                </div>
                <!-- .blog-masonry -->

                <style type="text/css">
                span.btn{ background: #ff1919; border-color: #ff1919; color: #fff;}    
                </style>
                <div class="blog-loadmore"> 
                    <?php foreach($page as $v){ ?>
                        <?php echo $v; ?>
                    <?php } ?>
                </div>
            </div>
            <!-- .col-lg-10 --> 
        </div>
        <!-- .row --> 
    </div>
    <!-- .container-fluid --> 
</div>
<!-- .content --> 
</section>
<!-- end: BLOG Section -->
  
<?php $this->load->view('pub/footer'); ?>